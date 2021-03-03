<?php

    class Model{

        private $id;
        private $user;
        private $pass;

        function __contruct(){

        }
        
        function logear(){

            $con = "sqlsrv:Server=DESKTOP-UFV3BVO;Database=prueba";
            $usuario = "sa";
            $password = "12345";

            $conexion = new PDO($con, $usuario, $password);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try{
                /*$sql = "select * from usuario where username=:parametro1 
                and clave=(select dbo.fun_encriptar(:parametro2))";*/

                $sql = "exec consulta :parametro1, select dbo.fun_encriptar(:parametro2)";

                $consulta = $conexion->prepare($sql);

                $consulta->bindValue(":parametro1", $this->user);
                $consulta->bindValue(":parametro2", $this->pass);

                $consulta->execute();

                $fila = $consulta->fetch();

                return $fila;

            }catch(PDOException $e){
                echo "Error " . $e;
            }

        }

        function set_usuario($user){
            $this->user = $user;
        }

        function set_pass($pass){
            $this->pass = $pass;
        }
        
    }

?>
