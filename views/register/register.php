<!doctype html>
<html lang="zxx">

<head>
    <?php require_once('../html/mainHead.php') ?>
    <title>Register</title>

</head>

<body>

    <!-- Start Register Area -->
    <div class="register-area bg-image">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="register-form">

                    <h2>Registrate</h2>

                    <form method="post" id="person_form" >
                        <input type="hidden" id="id_person" name="id_person">
                        <input type="hidden" id="phone_person" name="phone_person">
                        <input type="hidden" id="web_person" name="web_person">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name_person" id="name_person"
                                placeholder="Nombre" required>
                            <span class="label-title"><i class='bx bx-user'></i></span>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" name="email_person" id="email_person"
                                placeholder="Email" required>
                            <span class="label-title"><i class='bx bx-envelope'></i></span>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="rfc_person" id="rfc_person" placeholder="RFC" required>
                            <span class="label-title"><i class='bx bx-envelope'></i></span>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="pass_person" id="pass_person"
                                placeholder="Contraseña" required>
                            <span class="label-title"><i class='bx bx-lock'></i></span>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm"
                                placeholder="Confirma Contraseña" require>
                            <span class="label-title"><i class='bx bx-lock'></i></span>
                        </div>

                        <button type="submit" value="add" name="action" class="register-btn">Registate</button>

                        <p class="mb-0">Ya tienes cuenta? <a href="..\..\index.php">Inicia Sesión</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Register Area -->


    <!-- Vendors Min JS -->
    <?php require_once ('../html/mainJs.php') ?>

    <script>
    function validarRFC(rfc_person) {
        var rfcPattern = /^[A-Z]{4}\d{6}[A-Z\d]{3}$/;
        return rfcPattern.test(rfc_person);
    }

    function init(){
        $('#person_form').on("submit",function(e){
            guardaryeditar(e);
        });
    }

    function guardaryeditar(e) {
        e.preventDefault();
        var formData = new FormData($("#person_form")[0]);

        var rfcInput = document.getElementById("rfc_person");
        var contrasenaInput = document.getElementById("pass_person");
        var confirmaContrasenaInput = document.getElementById("passwordConfirm");

        var rfc_person = rfcInput.value.trim().toUpperCase();
        var pass_person = contrasenaInput.value;
        var confirmaContrasena = confirmaContrasenaInput.value;

        var rfcValido = validarRFC(rfc_person);

        if (!rfcValido) {
            Swal.fire(
                'RFC INVÁLIDO!',
                'La estructura del RFC no es la correcta.',
                'warning'
            )
            return false
        }else if (pass_person !== confirmaContrasena) {
            Swal.fire(
                'ERROR!',
                'Las contraseñas no coinciden.',
                'warning'
            )
            return false;
        }
        else{
            $.ajax({
                url: "../../controller/person.php?op=guardaryeditar",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    // console.log(data);
                    alert(data);
                    location.reload();
                    
                }
            });
        }
    }
    
    init();
    </script>
</body>

</html>