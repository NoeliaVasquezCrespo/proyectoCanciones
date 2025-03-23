<?php require 'parciales/header.view.php'; ?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Canciones en Playlist</h1>
    
<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nombre</th>
            <th>Portada</th>
            <th>Artista</th>
            <th>Año de lanzamiento</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($cancionesAgregadas)) : ?>
            <?php foreach ($cancionesAgregadas as $cancion) : ?>
                <?php if ($cancion->playlist == 1) : ?> 
                    <tr>   
                        <td><?= htmlspecialchars($cancion->nombre_cancion) ?></td>
                        <td><img src="<?= htmlspecialchars($cancion->portada) ?>" style="width: 8vh; height: 8vh;" alt="Portada"/></td>
                        <td><?= htmlspecialchars($cancion->artista) ?></td>
                        <td><?= htmlspecialchars($cancion->anio) ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="5" class="text-center">No hay canciones en la playlist.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

   
    
</div>

<?php require 'parciales/footer.view.php'; ?>