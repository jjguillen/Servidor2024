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

     /**
     * COMPROBAR LOGIN
     */
    function consultarProductos() {

        $con = conexion("php","root","toor");

        $consulta = $con->prepare("SELECT * FROM productos");
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();

        $productos = $consulta->fetchAll();
        
        $con = null;

        return $productos;
    }


     /**
     * INSERTAR PRODUCTO
     */
    function insertarProducto($nombre, $precio, $img, $categoria, $ivaR) {

        $con = conexion("php","root","toor");

        //Insertar usuario
        $consulta = $con->prepare("INSERT INTO productos (nombre, precio, img, categoria, ivaR, cantidad)  VALUES (?,?,?,?,?,?)");
        $consulta->bindValue(1,$nombre);
        $consulta->bindValue(2,$precio);
        $consulta->bindValue(3,$img);
        $consulta->bindValue(4,$categoria);
        $consulta->bindValue(5,$ivaR);
        $consulta->bindValue(6,1);

        $consulta->execute();

        $con = null; // Cerrar conexión

    }

    /**
     * BORRAR PRODUCTO
     */
    function borrarProducto($id) {

        $con = conexion("php","root","toor");

        //Insertar usuario
        $consulta = $con->prepare("DELETE FROM productos WHERE id=?");
        $consulta->bindValue(1,$id);

        $consulta->execute();

        $con = null; // Cerrar conexión

    }

        //Función que dado un id de producto te devuelve el producto entero con la información que tiene en la sesión
        function buscarProducto($idProducto) {
            $con = conexion("php","root","toor");

            $consulta = $con->prepare("SELECT * FROM productos WHERE id=?");
            $consulta->bindValue(1,$idProducto);
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            $consulta->execute();
    
            if ($producto = $consulta->fetch()) { 
                return $producto;
            }
            $con = null;
    
            return array();
        }

        /**
     * MODIFICAR PRODUCTO
     */
    function modificarProducto($id, $nombre, $precio, $img, $categoria, $ivaR) {

        $con = conexion("php","root","toor");

        if (strcmp($img,"") == 0) {
            $consulta = $con->prepare("UPDATE productos SET nombre=:nombre, precio=:precio, categoria=:categoria, ivaR=:ivaR WHERE id=:id");

        } else {
            $consulta = $con->prepare("UPDATE productos SET nombre=:nombre, precio=:precio, img=:img, categoria=:categoria, ivaR=:ivaR WHERE id=:id");
            $consulta->bindValue(":img",$img);
        }

        $consulta->bindValue(":nombre",$nombre);
        $consulta->bindValue(":precio",$precio);
        $consulta->bindValue(":categoria",$categoria);
        $consulta->bindValue(":ivaR",$ivaR);
        $consulta->bindValue(":id",$id);

        $consulta->execute();

        $con = null; // Cerrar conexión

    }



    /**
     * INSERTAR PEDIDO
     */
    function realizarPedido($carro) {

        $con = conexion("php","root","toor");

        try {

            $con->beginTransaction();

            //Insertar usuario
            $consulta = $con->prepare("INSERT INTO pedidos (codigo, fecha, cliente)  VALUES (?,?,?)");
            $consulta->bindValue(1,"PR000-".rand(1,100000));
            $consulta->bindValue(2,date('Y-m-d H:i:s'));
            $consulta->bindValue(3,$_SESSION['usuario']['email']);
            
            $consulta->execute();

            $idPedido = $con->lastInsertId();

            //Insertamos las líneas del pedido
            foreach($carro as $linea) {
                $consulta = $con->prepare("INSERT INTO lineasPedido (id_pedido, nombre, precio, cantidad, id_producto)  VALUES (?,?,?,?,?)");
                $consulta->bindValue(1,$idPedido);
                $consulta->bindValue(2, $linea['nombre']);
                $consulta->bindValue(3, $linea['precio']);
                $consulta->bindValue(4, $linea['cantidad']);
                $consulta->bindValue(5, $linea['id']);

                $consulta->execute();

            }

            $con->commit();
        } catch (Exception $e){

            $con->rollBack();
        }


        $con = null; // Cerrar conexión

    }

?>