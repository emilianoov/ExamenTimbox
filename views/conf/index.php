<?php
    require_once("../../config/conexion.php");
    if(isset($_SESSION["id_person"])){
?>
<!doctype html>
<html lang="zxx">

<head>
    <?php require_once("../html/mainHead.php") ?>
    <title>Configuración</title>
</head>

<body>

    <!-- Start Sidemenu Area -->
    <div class="sidemenu-area">
        <div class="sidemenu-header">
            <a href="dashboard-analytics.html" class="navbar-brand d-flex align-items-center">
                <img src="..\..\public\img\small-logo.png" alt="image">
                <span>Fiva</span>
            </a>

            <div class="burger-menu d-none d-lg-block">
                <span class="top-bar"></span>
                <span class="middle-bar"></span>
                <span class="bottom-bar"></span>
            </div>

            <div class="responsive-burger-menu d-block d-lg-none">
                <span class="top-bar"></span>
                <span class="middle-bar"></span>
                <span class="bottom-bar"></span>
            </div>
        </div>

        <div class="sidemenu-body">
            <ul class="sidemenu-nav metisMenu h-100" id="sidemenu-nav" data-simplebar="">
                <li class="nav-item-title">
                    Main
                </li>

                <li class="nav-item">
                    <a href="../home/" class="nav-link">
                        <span class="icon"><i class='bx bx-home'></i></span>
                        <span class="menu-title">Inicio</span>
                    </a>
                </li>

                <li class="nav-item mm-active">
                    <a href="../conf/" class="nav-link">
                        <span class="icon"><i class='bx bx-cog'></i></span>
                        <span class="menu-title">Configuración</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../algorithm/" class="nav-link">
                        <span class="icon"><i class='bx bx-code-alt'></i></span>
                        <span class="menu-title">Algoritmo</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../users/" class="nav-link">
                        <span class="icon"><i class='bx bx-user'></i></span>
                        <span class="menu-title">Usuarios</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../html/logout.php" class="nav-link">
                        <span class="icon"><i class=' bx bx-log-out '></i></span>
                        <span class="menu-title">Cerrar Sesión</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Sidemenu Area -->

    <!-- Start Main Content Wrapper Area -->
    <div class="main-content d-flex flex-column">

        <!-- Top Navbar Area -->
        <?php require_once('../html/mainNavbar.php') ?>
        <!-- End Top Navbar Area -->

        <!-- Start -->
        <!-- Breadcrumb Area -->
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Configurar cuenta</h3><br>
            </div>
            <div class="card-body">
                <form method="post" id="person_form">
                    <input type="hidden" id="id_person" name="id_person" value=<?php echo $_SESSION['id_person'] ?>>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="name_person" name="name_person"
                        value=<?php echo $_SESSION['name_person'] ?>>
                    </div>
                    <div class="form-group">
                        <label>RFC</label>
                        <input type="text" class="form-control" id="rfc_person" name="rfc_person"
                        value=<?php echo $_SESSION['rfc_person'] ?>>
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" id="email_person" name="email_person"
                        value=<?php echo $_SESSION['email_person'] ?>>
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" class="form-control" id="phone_person" name="phone_person"
                        value=<?php echo $_SESSION['phone_person'] ?>>
                    </div>
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" class="form-control" id="web_person" name="web_person"
                        value=<?php echo $_SESSION['web_person'] ?>>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="pass_person" name="pass_person"
                        value=<?php echo $_SESSION['pass_person'] ?>>
                    </div>
                    <button type="submit" value="add" name="action" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
        <!-- End Breadcrumb Area -->

        <div class="flex-grow-1"></div>

        <!-- Start Footer End -->
        <?php require_once('../html/mainFooter.php') ?>
        <!-- End Footer End -->

    </div>
    <!-- End Main Content Wrapper Area -->


    <!-- Vendors Min JS -->
    <?php require_once('../html/mainJs.php') ?>
    
    <script <script type='text/javascript'>
        function init(){
            $('#person_form').on("submit",function(e){
                guardaryeditar(e);
            });
        }
        function guardaryeditar(e){
            e.preventDefault();
            var formData = new FormData($("#person_form")[0]);
            $.ajax({
                url: "../../controller/person.php?op=guardaryeditar",
                type:"POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data){
                    console.log(data);
                    Swal.fire({
                        title: 'Se Edito Correctamente!',
                        text: 'Reinicia Sesión Para Notar Los Cambios',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
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