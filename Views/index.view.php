<?php require 'parciales/header.view.php'; ?>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Listado de canciones</h1>
        
        <div class="d-flex justify-content-between mb-3">
            <h3>Agregar Canción</h3>
            <form action="cancion/agregar" method="post">
                <input type="text" name="nombre_cancion" placeholder="Título de la canción">
                <input type="text" name="portada" placeholder="Link portada">
                <input type="text" name="artista" placeholder="Artista">
                <input type="number" name="anio" placeholder="Año de lanzamiento">
                <button class="btn btn-primary" type="submit">Agregar canción</button>
            </form>
            
            <?php if (isset($_SESSION['errores'])):  ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($_SESSION['errores'] as $campo => $mensaje): ?>
                            <li style="color: red; "> <?= $mensaje ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php
                unset($_SESSION['errores']);
                endif;
            ?>
        </div>

        <h2 class="mb-4 text-center">Canciones en playlist</h2>

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Portada</th>
                    <th>Artista</th>
                    <th>Año de lanzamiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cancionesAgregadas as $cancion) : ?>
                    <tr>   
                        <td><?= $cancion -> nombre_cancion ?></td>
                            <td><img src='<?= $cancion -> portada ?>' style="width: 8vh; height: 8vh;"/></td>
                            <td><?= $cancion -> artista ?></td>
                            <td><?= $cancion -> anio ?></td>
                        
                        <td>
                            <form onsubmit="return confirm('¿Está seguro de eliminar la canción?');" style="display: inline;" action="cancion/eliminar/<?= $cancion->id ?>" method="post">
                                <input type="hidden" name="id" value="">
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form>
                            <form style="display: inline;" action="cancion/actualizar/<?= $cancion->id ?>" method="post">
                                <input type="hidden" name="id" value="0">
                                <input type="hidden" name="playlist" value="0">
                                <button class="btn btn-secondary btn-sm" type="submit">Quitar de la playlist</button>
                            </form>
                            
                        </td>
                    <tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <h2 class="mb-4 text-center">Canciones pendientes</h2>

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Portada</th>
                    <th>Artista</th>
                    <th>Año de lanzamiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cancionesPendientes as $cancion) : ?>
                    <tr>   
                        <td><?= $cancion -> nombre_cancion ?></td>
                            <td><img src='<?= $cancion -> portada ?>' style="width: 8vh; height: 8vh;"/></td>
                            <td><?= $cancion -> artista ?></td>
                            <td><?= $cancion -> anio ?></td>
                        
                        <td>
                            <form onsubmit="return confirm('¿Está seguro de eliminar la canción?');" style="display: inline;" action="cancion/eliminar/<?= $cancion->id ?>" method="post">
                                <input type="hidden" name="id" value="">
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form>

                            <form style="display: inline;" action="cancion/actualizar/<?= $cancion->id ?>" method="post">
                                <input type="hidden" name="id" value="1">
                                <input type="hidden" name="playlist" value="1">
                                <button class="btn btn-success btn-sm" type="submit">Agregar a la playlist</button>
                            </form>
                        </td>
                    <tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
<?php require 'parciales/footer.view.php'; ?>