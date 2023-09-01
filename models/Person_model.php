<?php

    class Person_model extends Conectar{
        // Insertar correo electronico en la Base de datos
        public function login() {
            $conectar = parent::conexion();
            parent::set_names();
            if(isset($_POST["enviar"])){
                $correo = $_POST["correo"];
                $password = $_POST["password"];

                if(empty($correo) and empty($password)){
                    header("Location: " . Conectar::ruta() . "index.php?m=2");
                    exit();
                }else{
                    $sql="SELECT * FROM person WHERE email_person=? AND pass_person=?";
                    $sql=$conectar->prepare($sql);
                    $sql->bindValue(1, $correo);
                    $sql->bindValue(2, $password);
                    $sql->execute();
                    $resultado=$sql->fetch();
                    if(is_array($resultado)==true and count($resultado)>0){
                        $_SESSION["id_person"]=$resultado["id_person"];
                        $_SESSION["name_person"]=$resultado["name_person"];
                        $_SESSION["email_person"]=$resultado["email_person"];
                        $_SESSION["rfc_person"]=$resultado["rfc_person"];
                        $_SESSION["pass_person"]=$resultado["pass_person"];
                        $_SESSION["phone_person"]=$resultado["phone_person"];
                        $_SESSION["web_person"]=$resultado["web_person"];
                        header("Location: " . Conectar::ruta() . "views/home");
                        exit();
                    }else{
                        header("Location: " . Conectar::ruta() . "index.php?m=1");
                        exit();
                    }
                }
            }
        }
        //modelo para editar un registro
        public function update_persona ($id_person, $name_person, $rfc_person, $email_person, $pass_person, $phone_person, $web_person){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE person SET name_person=?, email_person=?, rfc_person=?, pass_person=?,phone_person=?, web_person=? WHERE id_person=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$name_person);
            $sql->bindValue(2,$rfc_person);
            $sql->bindValue(3,$email_person);
            $sql->bindValue(4,$pass_person);
            $sql->bindValue(5,$phone_person);
            $sql->bindValue(6,$web_person);
            $sql->bindValue(7,$id_person);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        //modelo para insertar registro
        public function insert_person($name_person, $email_person, $rfc_person, $pass_person ,$phone_person, $web_person){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO person (id_person, name_person, email_person, rfc_person, pass_person,  phone_person, web_person)
                            VALUES (NULL,?,?,?,?,?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$name_person);
            $sql->bindValue(2,$email_person);
            $sql->bindValue(3,$rfc_person);
            $sql->bindValue(4,$pass_person);
            $sql->bindValue(5,$phone_person);
            $sql->bindValue(6,$web_person);
            $sql->execute();
            return $reultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        //modelo de validación del rfc (no se repita)
        function validar($rfc_person){
            $conectar=parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM person WHERE rfc_person = '$rfc_person'";
            $resultado = $conectar->query($sql);

            if ($resultado->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
        //modelo de validación del email (no se repita)
        function validarCorreo($email_person){
            $conectar=parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM person WHERE email_person = '$email_person'";
            $resultado = $conectar->query($sql);

            if ($resultado->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        //función para ingresar a cambiar contraseña
        public function recoverpass() {
            $conectar = parent::conexion();
            parent::set_names();
            if(isset($_POST["enviar"])){
                $correo = $_POST["correo"];
                $rfc = $_POST["rfc"];

                if(empty($correo) and empty($rfc)){
                    header("Location: " . Conectar::ruta() . "views/password/index.php?m=2");
                    exit();
                }else{
                    $sql="SELECT * FROM person WHERE email_person=? AND rfc_person=?";
                    $sql=$conectar->prepare($sql);
                    $sql->bindValue(1, $correo);
                    $sql->bindValue(2, $rfc);
                    $sql->execute();
                    $resultado=$sql->fetch();
                    if(is_array($resultado)==true and count($resultado)>0){
                        $_SESSION["id_person"]=$resultado["id_person"];
                        $_SESSION["name_person"]=$resultado["name_person"];
                        $_SESSION["email_person"]=$resultado["email_person"];
                        $_SESSION["rfc_person"]=$resultado["rfc_person"];
                        $_SESSION["pass_person"]=$resultado["pass_person"];
                        $_SESSION["phone_person"]=$resultado["phone_person"];
                        $_SESSION["web_person"]=$resultado["web_person"];
                        header("Location: " . Conectar::ruta() . "views/password/recoverpass.php");
                        exit();
                    }else{
                        header("Location: " . Conectar::ruta() . "views/password/index.php?m=1");
                        exit();
                    }
                }
            }
        }

    }

?>