<?php

    require_once("../config/conexion.php");
    require_once("../models/Users_model.php");
    $usuarios = new Users_model();

    switch($_GET["op"]){
        //Función para editar registros
        case "listar":
            $datos = $usuarios->get_users();
            $data = array();

            foreach($datos as $key){
                $row =array();
                $row[]=$key["name_usu"];
                $row[]=$key["rfc_usu"];
                $row[]=$key["address_usu"];
                $row[]=$key["phone_usu"];
                $row[]=$key["website_usu"];
                $row[]=$key["person_id"];
                $row[] = '<center><button type="button" onClick="editar('.$key["id_usu"].')" class="btn btn-outline-success" 
                            id="'.$key['id_usu'].'" ><i class="bx bx-edit"></i></button></center>'; //Edita Usarios
                $row[] = '<center><button type="button" onClick="editar('.$key["id_usu"].')" class="btn btn-outline-danger" 
                            id="'.$key['id_usu'].'" ><i class="bx bx-trash"></i></button></center>';//Elimina Usuarios

                $data[]=$row;
            }
            $result = array('data' => $data);
            echo json_encode($result);
        break;
        //Función para editar y guardar registros
        case "guardaryeditar":
            if(empty($_POST["id_usu"])){
                $usuarios->insert_usuario($_POST["name_usu"], $_POST["rfc_usu"], $_POST["address_usu"], $_POST["phone_usu"], $_POST["website_usu"], $_POST["person_id"]);
            }else{
                $usuarios->update_usuario($_POST["id_usu"],$_POST["name_usu"], $_POST["rfc_usu"], $_POST["address_usu"], $_POST["phone_usu"], $_POST["website_usu"], $_POST["person_id"]);
            }
        break;
        //Función que muestra los datos a editar
        case "mostrar":
            $datos=$usuarios->get_usuarios_x_id($_POST["id_usu"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["id_usu"] = $row["id_usu"];
                    $output["name_usu"] = $row["name_usu"];
                    $output["rfc_usu"] = $row["rfc_usu"];
                    $output["address_usu"] = $row["address_usu"];
                    $output["phone_usu"] = $row["phone_usu"];
                    $output["website_usu"] = $row["website_usu"];
                    $output["person_id"] = $row["person_id"];
                }
                echo json_encode($output);
            }
        break;
        //Función para eliminar registros
        case "eliminar":
            $usuarios->delete_usuario($_POST["id_usu"]);
        break;
        
    }

?>