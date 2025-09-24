#!/bin/bash

# 1. Instalar dependencias de Node.js y compilar activos (Paso de 'npm run dev' para producción)
# Nota: Esto solo funciona si tienes el binario 'node' y 'npm' disponible, lo cual es común.
echo "Instalando dependencias de Node.js y compilando activos..."
npm install
npm run build # Asumiendo que tu script de producción se llama 'build' o similar

# 2. Configurar el Document Root de Nginx
echo "Copiando configuración de Nginx para el directorio public..."

# Crear un archivo de configuración de Nginx
cat > /etc/nginx/sites-available/default << EOL
server {
    listen 8080;
    listen [::]:8080;
    root /home/site/wwwroot/public; # <--- EL CAMBIO CLAVE
    index index.php index.html;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    # Pasar archivos PHP a PHP-FPM
    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
    }
}
EOL

# 3. Recargar Nginx para aplicar la nueva configuración
echo "Recargando servicio Nginx..."
service nginx reload

# 4. Mantener el proceso principal activo
# Este comando es a menudo el último y mantiene el contenedor en ejecución
/usr/sbin/nginx -g 'daemon off;'
