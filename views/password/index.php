<?php
    require_once("../../config/conexion.php");
    if(isset($_POST["enviar"]) and $_POST["enviar"]=="si"){
        require_once('../../models/Person_model.php');
        $login=new Person_model();
        $login->recoverpass();
    }
?>
<!doctype html>
<html lang="es">

<head>
    <?php require_once('../html/mainHead.php') ?>
    <title>Recuperar Contraseña</title>
</head>

<body>

    <!-- Start Register Area -->
    <div class="register-area bg-image">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="register-form">

                    <h2>Recupera tu Contraseña</h2>

                    <form  method="post" action="" >
                    <?php
                            if(isset($_GET["m"])){
                                switch ($_GET["m"]){
                                    case"1":
                                        ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Error!</strong> Sus datos estan incorrectos, verificar!.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <?php
                                    break;
                                    
                                    case"2":
                                        ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Error!</strong> Existen datos vacios.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <?php
                                    break;    
                                }
                            }
                        ?>
                        <div class="form-group">
                            <input type="email" class="form-control" name="correo" id="correo"
                                placeholder="Email">
                            <span class="label-title"><i class='bx bx-envelope'></i></span>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="rfc" id="rfc" placeholder="RFC">
                            <span class="label-title"><i class='bx bx-envelope'></i></span>
                        </div>
                        <input type="hidden" name="enviar" value="si">
                        <button type="submit" class="register-btn">Enviar</button>

                        <p class="mb-0">Ya tienes cuenta? <a href="..\..\index.php">Inicia Sesión</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Register Area -->


    <!-- Vendors Min JS -->
    <?php require_once ('../html/mainJs.php') ?>
</body>

</html>