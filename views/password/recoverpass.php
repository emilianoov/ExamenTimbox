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

                    <form method="post" id="recover_form">

                        <input type="hidden" id="id_person" name="id_person" value=<?php echo $_SESSION['id_person'] ?>>
                        <input type="hidden" class="form-control" id="name_person" name="name_person"
                            value=<?php echo $_SESSION['name_person'] ?>>
                        <input type="hidden" class="form-control" id="rfc_person" name="rfc_person"
                            value=<?php echo $_SESSION['rfc_person'] ?>>
                        <input type="hidden" class="form-control" id="email_person" name="email_person"
                            value=<?php echo $_SESSION['email_person'] ?>>
                        <input type="hidden" class="form-control" id="phone_person" name="phone_person"
                            value=<?php echo $_SESSION['phone_person'] ?>>
                        <input type="hidden" class="form-control" id="web_person" name="web_person"
                            value=<?php echo $_SESSION['web_person'] ?>>
                        <!-- <input type="hidden" class="form-control" id="pass_person" name="pass_person" value=<?php echo $_SESSION['pass_person'] ?>> -->

                        <div class="form-group">
                            <input type="text" class="form-control" id="pass_person" name="pass_person"
                                placeholder="Contraseña Nueva" required>
                            <span class="label-title"><i class='bx bx-lock'></i></span>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="confirmpass" id="confirmpass"
                                placeholder="Confirma Constraseña" required>
                            <span class="label-title"><i class='bx bx-lock'></i></span>
                        </div>

                        <button type="submit" value="add" name="action" class="btn btn-primary">Guardar</button>
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
    function init() {
        $('#recover_form').on("submit", function(e) {
            guardaryeditar(e);
        });
    }

    function guardaryeditar(e) {
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
        } else {
            $.ajax({
                url: "../../controller/person.php?op=guardaryeditar",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    // console.log(data);
                    // alert(data);
                    Swal.fire({
                        title: 'Se Edito Correctamente!',
                        text: 'La contraseña se a restablecido',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
                    location.href = '../html/logout.php';
                    
                }
            });
        }
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