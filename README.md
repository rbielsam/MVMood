**Introduccion**<br>
LarMvmood -> Primer intento de migrar contenidos de carpeta MVMood(de PHP MVC a Laravel).<br>
MVMood -> Aplicacion en PHP, HTML y CSS nativos.<br>
mvmood -> Aplcacion actual.<br>

Hay 3 branches pero por voto popular al final se hizo todo en main a pesar de la posibilidad de los conflictos.<br>

Por temas de permisos y entornos, antes de la ejecucion del setup.sh, es necesario llevar a cabo los siguientes pasos previos:<br>

**Pasos Previos**<br>

***1: Acceder a tu mysql en la terminal***<br>
  mysql -u root -p<br>

***2: Ejecutar los siguientes comandos***<br>
  
  CREATE DATABASE IF NOT EXISTS mvmood;
  
  CREATE USER 'deploy'@'localhost' IDENTIFIED BY '1234';
  
  GRANT ALL PRIVILEGES ON mvmood.* TO 'deploy'@'localhost';
  
  FLUSH PRIVILEGES;
  
  EXIT;<br>

**3: Ejecutar setup.sh donde se encuentra***<br>
  ./setup

**Posibles problemas**

En los test hechos hasta ahora los problemas mas comunes es que por tipo de sistema puede haber fallos
Tambien puede que el puerto de Mysql este ocupado, en este caso se deberia cambiar tanto en el archivo .env como en el archivo de configuracion de mysql para que pueda escuchar otro puerto, el nombre del archivo puede ser uno de estos:

/etc/mysql/mysql.conf.d/mysqld.cnf
/etc/mysql/my.cnf
