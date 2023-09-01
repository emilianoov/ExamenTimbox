<?php
    require_once("../../config/conexion.php");
    if(isset($_SESSION["id_person"])){
?>
<!doctype html>
<html lang="zxx">

<head>
    <?php require_once("../html/mainHead.php") ?>
    <title>Algoritmo</title>
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

                <li class="nav-item">
                    <a href="../conf/" class="nav-link">
                        <span class="icon"><i class='bx bx-cog'></i></span>
                        <span class="menu-title">Configuración</span>
                    </a>
                </li>

                <li class="nav-item mm-active">
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
                <h3>Algoritmo</h3><br>
            </div>
            <div class="card-body">
                <h1>Verificador de Palíndromos</h1>
                <label for="words">Ingrese las palabras separadas por comas:</label><br>
                <label for="words">(Las palabras no tienen que tener ninguna separación)</label>
                <input class="form-control" type="text" id="words" name="words"><br>
                <button class="btn btn-primary" onclick="verificarPalindromos()">Verificar Palíndromos</button>
                <div id="result"></div>
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
    <script>
    function verificarPalindromos() {
        const wordsInput = document.getElementById("words");
        const resultDiv = document.getElementById("result");

        const words = wordsInput.value.toUpperCase();

        fetch('../../controller/algoritmo.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'words=' + encodeURIComponent(words)
            })
            .then(response => response.json())
            .then(data => {
                resultDiv.innerHTML = "Palíndromos encontrados: " + data.join(", ");
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
    </script>
</body>

</html>
<?php
    }else{
        header("Location: " . Conectar::ruta() . "../../index.php");
    }
?>