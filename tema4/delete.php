<?php

    $dbh = null;

    define('DB_NAME', 'php');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'toor');
    define('DB_HOST', '172.17.0.2:3306'); //La IP del contenedor Mysql, y el puerto interno del contenedor

    try {
        $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e){
        echo $e->getMessage();
    } 

    //Insertar usuario
    $consulta = $dbh->prepare("DELETE FROM usuarios WHERE id=:id");
    $consulta->bindValue(':id', 3);

    $consulta->execute();

    echo "Borrado";


?>