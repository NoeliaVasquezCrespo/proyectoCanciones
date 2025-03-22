<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
       
        <div class="collapse navbar-collapse" id="navbarNav" >
            
            <a class="navbar-brand" href="<?= dirname($_SERVER['PHP_SELF']) ?>/">Inicio</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-3" >
                    <a class="nav-link text-light" href="contacto">Contacto</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link text-light" href="nosotros">Nosotros</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link text-light" href="servicios">Servicios</a>
                </li>

                <?php if(Core\Auth::verificar()): ?>
                    <li class="nav-item mx-3">
                        <div class="d-flex flex-column align-items-start">
                            <span class="navbar-text text-warning" ><?= $_SESSION['nombre']; ?> <?= $_SESSION['apellido']; ?></span>
                        </div>
                        
                    </li>
                    <li class="nav-item mx-3">
                        <form style="display: inline;" action="cerrar-sesion" method="post">
                            <button class="btn btn-outline-light" type="submit">Cerrar sesión</button>
                        </form>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
