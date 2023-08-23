#!/bin/bash

# Detener MySQL
sudo service mysql stop

# Detener Apache
sudo service apache2 stop

cd 
# Cambiar al directorio /opt/lampp
cd /opt/lampp

# Ejecutar el archivo manager-linux-x64.run
sudo ./manager-linux-x64.run

firefox http://localhost/Encuesta/public_html/index.html

