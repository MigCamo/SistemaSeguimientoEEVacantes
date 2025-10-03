#!/bin/bash
cd /home/site/wwwroot

# Opcional: ejecutar migraciones
# php artisan migrate --force

# Arrancar apache para servir Laravel
apache2-foreground
