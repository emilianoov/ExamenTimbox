<?php
    require_once("../../config/conexion.php");
    if(isset($_SESSION["id_person"])){
?>
<!doctype html>
<html lang="esp">

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

                    <h2>Cambia tu contraseña</h2>

                    <form  onsubmit="return validarFormulario()" method="post" id="person_form">
                        <input type="hidden" id="id_person" name="id_person" val="<?php echo $_SESSION['id_person'] ?>">
                        <input type="hidden" id="name_person" name="name_person" val="<?php echo $_SESSION['name_person'] ?>">
                        <input type="hidden" id="email_person" name="email_person" val="<?php echo $_SESSION['email_person'] ?>">
                        <input type="hidden" id="rfc_person" name="rfc_person" val="<?php echo $_SESSION['rfc_person'] ?>">
                        <input type="hidden" id="phone_person" name="phone_person" val="<?php echo $_SESSION['phone_person'] ?>">
                        <input type="hidden" id="web_person" name="web_person" val="<?php echo $_SESSION['web_person'] ?>">
                        
                        <div class="form-group">
                            <input type="text" class="form-control" name="pass_person" id="pass_person"
                                placeholder="Contraseña Nueva">
                            <span class="label-title"><i class='bx bx-lock'></i></span>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="confirmpass" id="confirmpass" placeholder="Confirma Constraseña">
                            <span class="label-title"><i class='bx bx-lock'></i></span>
                        </div>

                        <button type="submit" class="btn btn-outline-success">Enviar</button>
                        <p class="mb-0"><a href="../html/logout.php">CANCELAR</a></p>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Register Area -->


    <!-- Vendors Min JS -->
    <?php require_once ('../html/mainJs.php') ?>

    <script>
    
    function init(){
        $('#person_form').on("submit",function(e){
            validarFormulario(e);
        });
    }

    function validarFormulario(e) {
        e.preventDefault();
        var formData = new FormData($("#recover_form")[0]);

        var contrasenaInput = document.getElementById("pass_person");
        var confirmaContrasenaInput = document.getElementById("confirmpass");


        var pass_person = contrasenaInput.value;
        var confirmaContrasena = confirmaContrasenaInput.value;


        if (pass_person !== confirmaContrasena) {
            Swal.fire(
                'ERROR!',
                'Las contraseñas no coinciden.',
                'warning'
            )
            return false;
        }
        
        $.ajax({
            url: "../../controller/person.php?op=guardaryeditar",
            type:"POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                console.log(data);
                // alert(data);
                location.href = '../html/logout.php';
            }
        });
    }
    
    init();
    </script>
</body>
</html>
<?php
    }else{
        header("Location: " . Conectar::ruta() . "../../index.php");
    }
?>