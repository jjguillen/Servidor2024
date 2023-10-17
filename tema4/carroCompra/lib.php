<?php

    /**
     * FUNCIONES BBDD ------------------------------------------------------------------
     */

    /**
     * Función para conectar a BBDD
     */
    function conexion($bbdd, $usuario, $passw) {
        $host = '172.17.0.2:3306'; //La IP del contenedor Mysql, y el puerto interno del contenedor

        try {
            $dbh = new PDO("mysql:host=" . $host . ";dbname=" . $bbdd, $usuario, $passw);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e){
            echo $e->getMessage();
        }

        return $dbh;
    }

    /**
     * INSERTAR USUARIO
     */
    function insertarUsuario($nombre, $apellidos, $email, $direccion, $sexo, $provincia, $password, $intereses, $comentarios) {

        $con = conexion("php","root","toor");

        //Insertar usuario
        $consulta = $con->prepare("INSERT INTO users (nombre, apellidos, email, direccion, sexo, provincia, password, intereses, comentarios)  VALUES (?,?,?,?,?,?,?,?,?)");
        $consulta->bindValue(1,$nombre);
        $consulta->bindValue(2,$apellidos);
        $consulta->bindValue(3,$email);
        $consulta->bindValue(4,$direccion);
        $consulta->bindValue(5,$sexo);
        $consulta->bindValue(6,$provincia);
        $consulta->bindValue(7,$password);
        $consulta->bindValue(8,$intereses);
        $consulta->bindValue(9,$comentarios);

        $consulta->execute();

        $con = null; // Cerrar conexión

    }

    /**
     * COMPROBAR LOGIN
     */
    function loginCorrecto($email, $password) {

        $con = conexion("php","root","toor");

        $consulta = $con->prepare("SELECT * FROM users WHERE email = ?");
        $consulta->bindValue(1, $email);
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();

        if ($user = $consulta->fetch()) { //Solo puede haber uno
            $passBD = $user['password'];

            if (password_verify($password, $passBD)) {
                return 1; //Password correcto
            } else {
                return 0; //Password incorrecto
            }
        } else {
            return 0; //Email no encontrado
        }


        $con = null;
    }

     /**
     * COMPROBAR EMAIL
     */
    function checkEmail($email) {

        $con = conexion("php","root","toor");

        $consulta = $con->prepare("SELECT * FROM users WHERE email = ?");
        $consulta->bindValue(1, $email);
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();

        if ($user = $consulta->fetch()) { 
            //Email utilizado
            return 0;
        } else {
            return 1; //Email no utilizado, ok
        }

        $con = null;
    }


?>