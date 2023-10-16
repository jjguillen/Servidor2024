<?php

    $dbh = null;

    try {
        $dsn = "mysql:host=127.0.0.1:3306;dbname=php";
        $dbh = new PDO($dsn, "root", "toor");
    } catch (PDOException $e){
        echo $e->getMessage();
    }


    $stmt = $dbh->prepare("SELECT * FROM usuarios");
    // Especificamos el fetch mode antes de llamar a fetch()
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    // Ejecutamos
    $stmt->execute();

?>