<?php require 'parciales/header.view.php'; ?>
<h1>Iniciar Sesión</h1>
<form action="login" method="post">
    <div>
        <input style="margin-top: 10px;" type="text" name="email" placeholder="Correo electrónico">
    </div>

    <div>
        <input style="margin-top: 10px;" type="password" name="password" placeholder="Contraseña">
    </div>

    <div>
        <button style="margin-top: 10px;" type="submit">Iniciar Sesión</button>
    </div>
</form>
<?php require 'parciales/footer.view.php'; ?>