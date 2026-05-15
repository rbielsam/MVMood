**Introduccion**<br>
LarMvmood -> Primer intento de migrar contenidos de carpeta MVMood(de PHP MVC a Laravel).<br>
MVMood -> Aplicacion en PHP, HTML y CSS nativos.<br>
mvmood -> Aplcacion actual.<br>

Hay 3 branches pero por voto popular al final se hizo todo en main a pesar de la posibilidad de los conflictos.<br>

Por temas de permisos y entornos, antes de la ejecucion del setup.sh, es necesario llevar a cabo los siguientes pasos previos:<br>

**Pasos Previos**<br>

***1: Instalar php, extensiones y composer***<br>
  apt install php php-xml php-cli php-mysql php-curl<br>

  php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"<br>
  php -r "if (hash_file('sha384', 'composer-setup.php') === 'c8b085408188070d5f52bcfe4ecfbee5f727afa458b2573b8eaaf77b3419b0bf2768dc67c86944da1544f06fa544fd47') { echo 'Installer verified'.PHP_EOL; } else { echo 'Installer corrupt'.PHP_EOL; unlink('composer-setup.php'); exit(1); }"<br>
  php composer-setup.php<br>
  php -r "unlink('composer-setup.php');"<br>

  mv composer.phar /usr/local/bin/composer<br>

***2: Acceder a tu mysql en la terminal***<br>
  mysql -u root -p<br>

***3: Ejecutar los siguientes comandos***<br>
  
  CREATE DATABASE IF NOT EXISTS mvmood;
  
  CREATE USER 'deploy'@'localhost' IDENTIFIED BY '1234';
  
  GRANT ALL PRIVILEGES ON mvmood.* TO 'deploy'@'localhost';
  
  FLUSH PRIVILEGES;
  
  EXIT;<br>

**4: Ejecutar setup.sh donde se encuentra***<br>
  ./setup
