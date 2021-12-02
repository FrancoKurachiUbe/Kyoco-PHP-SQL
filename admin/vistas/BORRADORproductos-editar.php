<?php

$producto = (new Producto())->traerPorPk($_GET['id']);

if(isset($_SESSION['errores'])) {
    $errores = $_SESSION['errores'];
    unset($_SESSION['errores']);
} else {
    $errores = [];
}
if(isset($_SESSION['old_data'])) {
    $oldData = $_SESSION['old_data'];
    unset($_SESSION['old_data']);
} else {
    $oldData = [
        'id' => $producto->getProductoId(),
        'titulo' => $producto->getTitulo(),
        'descripcion' => $producto->getDescripcion(),
        'precio' => $producto->getPrecio(),
        'imagen' => $producto->getImagen(),
        'imagen_descripcion' => $producto->getImgDetalle(),
    ];
}
?>
<main class="main-content">
    <div class="container">
        <h1 class="mb-1">Editar Producto</h1>
        <p>
            <?php
            //echo $producto->getTitulo();
            echo $oldData['titulo'];
            ?>
        </p>

        <!--
        Para editar, y no ser como Paul, necesitamos mandar el id de la noticia de nuevo a la acción
        de editar.
        ¿Cómo lo podemos mandar?
        Hay 2 maneras:
        1. En el query string por GET en el action del form.
            Nota: Esto solo funciona en un formulario por POST. En forms por GET, no podemos escribir
            parámetros en el query string del action del form.
        2. Usando un input de tipo hidden.
        -->
        <?php
        // Forma 1.
        /*<form action="acciones/noticias-editar.php?id=<?= $oldData['id'];?>" method="post" enctype="multipart/form-data">*/ ?>
        <form action="acciones/productos-editar.php" method="post" enctype="multipart/form-data">
            <!-- Forma 2. -->
            <input type="hidden" name="id" value="<?= $oldData['id'];?>">
            <div class="form-fila">
                <label for="titulo">Título</label>
                <input
                    type="text"
                    id="titulo"
                    name="titulo"
                    class="form-control"
                    aria-describedby="help-titulo <?= isset($errores['titulo']) ? 'error-titulo' : '';?>"
                    value="<?= $oldData['titulo'] ?? '';?>"
                >
                <?php
                if(isset($errores['titulo'])):
                ?>
                    <div class="msg-error" id="error-titulo"><span class="visually-hidden">Error: </span><?= $errores['titulo'];?></div>
                <?php
                endif;
                ?>
                <div class="form-help" id="help-titulo">El título debe tener al menos 3 caracteres.</div>
            </div>
            <div class="form-fila">
                <label for="descripcion">descripcion</label>
                <textarea
                    id="descripcion"
                    name="descripcion"
                    class="form-control"
                    aria-describedby="help-sinopsis <?= isset($errores['descripcion']) ? 'error-descripcion' : '';?>"
                ><?= $oldData['descripcion'] ?? '';?></textarea>
                <?php
                if(isset($errores['descripcion'])):
                ?>
                    <div class="msg-error" id="error-descripcion"><?= $errores['descripcion'];?></div>
                <?php
                endif;
                ?>
                <div class="form-help" id="help-descripcion">La sinopsis debe tener como máximo 255 caracteres.</div>
            </div>

            <div class="form-fila">
                <label for="texto">Precio</label>
                <textarea
                    id="precio"
                    name="precio"
                    class="form-control"
                    <?= isset($errores['precio']) ? 'aria-describedby="error-precio"' : '';?>
                ><?= $oldData['precio'] ?? '';?></textarea>
                <?php
                if(isset($errores['precio'])):
                ?>
                    <div class="msg-error" id="error-texto"><?= $errores['texto'];?></div>
                <?php
                endif;
                ?>
            </div>

            <div class="form-fila">
                <p>Imagen actual</p>
                <div>
                    <img src="<?= '../img/producto/' . $producto->getImagen();?>" alt="Previsualización de la imagen">
                </div>
                <p class="form-help">Si querés cambiar la imagen, elegí una nueva abajo. Sino, dejá el campo vacío.</p>
            </div>

            <div class="form-fila">
                <label for="imagen">Imagen (opcional)</label>
                <input type="file" id="imagen" name="imagen" class="form-control">
            </div>

            <div class="form-fila">
                <label for="imagen_descripcion">Descripción de la imagen</label>
                <input type="text" id="imagen_descripcion" name="imagen_descripcion" class="form-control" value="<?= $oldData['imagen_descripcion'] ?? '';?>">
            </div>
            <button class="button" type="submit">Actualizar</button>
        </form>
    </div>
</main>
