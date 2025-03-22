<nav>
    <a href="<?= dirname($_SERVER['PHP_SELF']) ?>/">Inicio</a>
    <a href="contacto">Contacto</a>
    <a href="nosotros">Nosotros</a>
    <a href="servicios">Servicios</a>
    <?php if(Core\Auth::verificar()): ?>
        <span><?= $_SESSION['nombre']; ?> <?= $_SESSION['apellido']; ?></span>

        <form style="display: inline;" action="cerrar-sesion" method="post">
            <button style="background-color: transparent; border:0; color:blue;" type="submit">Cerrar sesión</button>
        </form>

    <?php endif; ?>
</nav>