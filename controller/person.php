<?php
    require_once("../config/conexion.php");
    require_once("../models/Person_model.php");
    $persona   =new Person_model();

    switch($_GET["op"]){
        //Controller para poder Guardar nuevo registro
        case "guardaryeditar":
            if(empty($_POST["id_person"])){
                if($persona->validar($_POST["rfc_person"])){
                    echo json_encode('Este RFC ya se encuentra registrado');;
                }elseif($persona->validarCorreo($_POST["email_person"])){
                    echo json_encode('Este correo ya se encuentra registrado');
                }
                else{
                    $persona->insert_person($_POST["name_person"], $_POST["email_person"], $_POST["rfc_person"], $_POST["pass_person"], $_POST["phone_person"], $_POST["web_person"]);
                    echo json_encode('Datos insertados');
                }
            //Función del controlador para editar registro
            }else{
                $persona->update_persona($_POST["id_person"],$_POST["name_person"], $_POST["email_person"], $_POST["rfc_person"], $_POST["pass_person"], $_POST["phone_person"], $_POST["web_person"]); 
                echo 'Datos Editados Correctamente';
            }
        break;
    }
    

?>