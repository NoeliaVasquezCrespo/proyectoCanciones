<?php require 'parciales/header.view.php'; ?>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row w-100">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center mb-4">Iniciar Sesión</h1>
            <form action="login" method="post">
                <div class="mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Correo electrónico" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                </div>

                <div class="text-center">
                    <button class="btn btn-primary w-100" type="submit">Iniciar Sesión</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require 'parciales/footer.view.php'; ?>
