#!/bin/bash
set -e

echo "===== Iniciando startup.sh para Laravel en Azure ====="

cd /home/site/wwwroot

# 1. Compilar assets si existen
if [ -f package.json ]; then
    echo "Instalando dependencias de Node.js..."
    npm install
    echo "Compilando assets..."
    npm run build --if-present
else
    echo "No se encontró package.json, saltando compilación de frontend."
fi

# 2. Limpiar cachés de Laravel
echo "Limpiando caches de Laravel..."
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

# 3. Configurar Document Root
echo "Configurando raíz web correctamente..."

# Eliminar archivos que puedan causar conflictos
rm -f /home/site/wwwroot/index.php
rm -f /home/site/wwwroot/.htaccess
rm -f /home/site/wwwroot/robots.txt

# Crear symlink html -> public
if [ -d "/home/site/wwwroot/public" ]; then
    rm -rf /home/site/wwwroot/html
    ln -s /home/site/wwwroot/public /home/site/wwwroot/html
    echo "Symlink creado: /home/site/wwwroot/html -> public"
else
    echo "⚠️ No existe carpeta public/, revisa el deploy"
fi

# 4. Asegurar permisos
chmod -R 775 storage bootstrap/cache

echo "Startup script terminado, Azure manejará nginx/php-fpm."
