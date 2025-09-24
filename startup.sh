#!/bin/bash

# 1. Compilación de Activos (Node/NPM)
echo "Instalando dependencias de Node.js y compilando para producción..."
npm install
npm run build --if-present

# 2. Caché de Configuración y Rutas (Asegura que la APP_KEY se use)
# Borrar la caché para forzar al framework a leer las variables de entorno de Azure.
echo "Limpiando cachés del framework..."
php artisan config:clear
php artisan route:clear
php artisan view:clear

# 3. Configuración del Document Root de Nginx (Soluciona el 404)
# Modifica el archivo de configuración por defecto de Nginx
echo "Aplicando configuración Nginx para el directorio public..."

# 3a. Reemplazar la carpeta raíz (Document Root)
sed -i 's|root /home/site/wwwroot;|root /home/site/wwwroot/public;|g' /etc/nginx/sites-available/default

# 3b. Reemplazar el ruteo para rutas del framework
sed -i 's|try_files $uri $uri/ =404;|try_files $uri $uri/ /index.php?$query_string;|g' /etc/nginx/sites-available/default

# 4. Reiniciar Nginx para aplicar la nueva configuración
echo "Reiniciando servicio Nginx"
service nginx reload

# 5. Mantener el contenedor activo (Final)
echo "Ejecutando proceso principal Nginx..."
/usr/sbin/nginx -g 'daemon off;'
