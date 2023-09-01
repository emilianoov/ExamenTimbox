<?php

    class Users_model extends Conectar{
        //Lista los registros
        public function get_users(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM users";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        //Inserta registros
        public function insert_usuario($name_usu, $rfc_usu, $address_usu, $phone_usu, $website_usu, $person_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO users (id_usu, name_usu, rfc_usu, address_usu, phone_usu, website_usu, person_id)
                            VALUES (NULL,?,?,?,?,?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$name_usu);
            $sql->bindValue(2,$rfc_usu);
            $sql->bindValue(3,$address_usu);
            $sql->bindValue(4,$phone_usu);
            $sql->bindValue(5,$website_usu);
            $sql->bindValue(6,$person_id);
            $sql->execute();
            return $reultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        //Obtiene registros x el id
        public function get_usuarios_x_id($id_usu){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM users WHERE id_usu=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$id_usu);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        //Actualiza registros
        public function update_usuario ($id_usu, $name_usu, $rfc_usu, $address_usu, $phone_usu, $website_usu, $person_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE users SET name_usu=?, rfc_usu=?, address_usu=?, phone_usu=?, website_usu=?, person_id=? WHERE id_usu=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$name_usu);
            $sql->bindValue(2,$rfc_usu);
            $sql->bindValue(3,$address_usu);
            $sql->bindValue(4,$phone_usu);
            $sql->bindValue(5,$website_usu);
            $sql->bindValue(6,$person_id);
            $sql->bindValue(7,$id_usu);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        //Elimina Registros
        public function delete_usuario($id_usu){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="DELETE FROM users WHERE id_usu=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$id_usu);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        
    }

?>