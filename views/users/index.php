<?php
    require_once("../../config/conexion.php");
    if(isset($_SESSION["id_person"])){
?>
<!doctype html>
<html lang="es">

<head>
    <?php require_once("../html/mainHead.php") ?>
    <title>Usuarios</title>
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

                <li class="nav-item">
                    <a href="../algorithm/" class="nav-link">
                        <span class="icon"><i class='bx bx-code-alt'></i></span>
                        <span class="menu-title">Algoritmo</span>
                    </a>
                </li>

                <li class="nav-item mm-active">
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
                <h3>Registrar Usuarios</h3><br>
                <button onclick="nuevo()" class="btn btn-outline-primary" id="btn_nuevo">Nuevo Usuarios</button>
            </div>
            <div class="card-body">
                <table id="usuario_data" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>RFC</th>
                            <th>Direccion</th>
                            <th>Numero</th>
                            <th>WebSite</th>
                            <th>Creado Por</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Breadcrumb Area -->

        <div class="flex-grow-1"></div>

        <!-- Start Footer End -->
        <?php require_once('../html/mainFooter.php') ?>
        <!-- End Footer End -->

    </div>
    <!-- End Main Content Wrapper Area -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post" id="usuario_form">
                <div class="modal-header">
                    <h5 id="lbltitulo" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id_usu" name="id_usu">
                    <input type="hidden" class="form-control" id="person_id" name="person_id">
                    <div class="form-group">
                        <label for="lista">Nombre:</label>
                        <input type="text" id="name_usu" name="name_usu" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="lista">RFC:</label>
                        <input type="text" id="rfc_usu" name="rfc_usu" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="lista">Dirección:</label>
                        <input type="email" id="address_usu" name="address_usu" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="lista">Telefono:</label>
                        <input type="number" id="phone_usu" name="phone_usu" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="lista">WebSite:</label>
                        <input type="text" id="website_usu" name="website_usu" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" value="add" name="action" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- Vendors Min JS -->
    <?php require_once('../html/mainJs.php') ?>

    <script type='text/javascript'>
    function init(){
        $('#usuario_form').on("submit",function(e){
            guardaryeditar(e);
        });
    }
    function guardaryeditar(e){
        e.preventDefault();
        var formData = new FormData($("#usuario_form")[0]);
        $.ajax({
            url: "../../controller/users.php?op=guardaryeditar",
            type:"POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                console.log(data);
                $('#usuario_data').DataTable().ajax.reload();
                $('#myModal').modal('hide');
            }
        });
    }

    $(document).ready(function(){

    $('#usuario_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax":{
            url:"../../controller/users.php?op=listar",
            type:"post",
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 30,
        "order": [[ 0, "desc" ]],
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });

});

    function nuevo() {
        $('#lbltitulo').html("Nuevo Registro");
        $('#id_usu').val('');
        $('#person_id').val(<?php echo $_SESSION['id_person'] ?>);
        $('#usuario_form')[0].reset();
        $('#myModal').modal('show');
    }

    function editar(id_usu){
        console.log(id_usu);
        $('#lbltitulo').html("Editar Registro");
        $.post("../../controller/users.php?op=mostrar",{id_usu:id_usu}, function(data){
            var datos = JSON.parse(data);
            console.log(datos);
            $('#id_usu').val(datos.id_usu);
            $('#name_usu').val(datos.name_usu);
            $('#rfc_usu').val(datos.rfc_usu);
            $('#address_usu').val(datos.address_usu);
            $('#phone_usu').val(datos.phone_usu);
            $('#website_usu').val(datos.website_usu);
            $('#person_id').val(datos.person_id);
            $('#myModal').modal('show');
        });
    }

    function eliminar(id_usu){
    Swal.fire({
        title: 'Deseas eliminar el registro?',
        text: "Estas seguro de eliminar el registro?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {
            
            $.post("../../controller/users.php?op=eliminar",{id_usu:id_usu},function(data){
                $('#usuario_data').DataTable().ajax.reload();
            });
            
            Swal.fire(
                'Eliminado!',
                'Se ha eliminado correctamente.',
                'success'
            )
        }
      })
    // console.log(usu_id);
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