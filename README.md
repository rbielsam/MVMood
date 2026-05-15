**Introduccion**<br>
LarMvmood -> Primer intento de migrar contenidos de carpeta MVMood(de PHP MVC a Laravel).<br>
MVMood -> Aplicacion en PHP, HTML y CSS nativos.<br>
mvmood -> Aplcacion actual.<br>

Hay 3 branches pero por voto popular al final se hizo todo en main a pesar de la posibilidad de los conflictos.<br>

Por temas de permisos y entornos, antes de la ejecucion del setup.sh, es necesario llevar a cabo los siguientes pasos previos:<br>
**Pasos Previos**
***1: Acceder a tu mysql en la terminal***
  mysql -u root -p
***2: Ejecutar los siguientes comandos***
  
  CREATE DATABASE IF NOT EXISTS mvmood;
  
  CREATE USER 'deploy'@'localhost' IDENTIFIED BY '1234';
  
  GRANT ALL PRIVILEGES ON mvmood.* TO 'deploy'@'localhost';
  
  FLUSH PRIVILEGES;
  
  EXIT;<br>
**3: Ejecutar setup.sh donde se encuentra***
  ./setup
