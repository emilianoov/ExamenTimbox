<nav class="navbar top-navbar navbar-expand">
    <div class="collapse navbar-collapse" id="navbarSupportContent">
        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>



        <form class="nav-search-form d-none ml-auto d-md-block"></form>

        <ul class="navbar-nav right-nav align-items-center">
            <li class="nav-item">
                <a class="nav-link bx-fullscreen-btn" id="fullscreen-button">
                    <i class="bx bx-fullscreen"></i>
                </a>
            </li>

            <li class="nav-item dropdown profile-nav-item">
                <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="menu-profile">
                        <span class="name">Hola! <?php echo $_SESSION["name_person"] ?></span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</nav>