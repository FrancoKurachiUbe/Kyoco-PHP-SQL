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
 
        <form action="acciones/productos-editar.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="id" value="<?= $oldData['id'];?>">

            <div class="form-group mb-3">
                <label class="form-label" for="titulo">Nombre del Producto</label>

                <input
                    type="text"
                    class="form-control"
                    id="titulo"
                    name="titulo"
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

                <!-- <div class="form-help" id="help-titulo">El título debe tener al menos 3 caracteres.</div> -->
            </div>
            <div class="form-group mb-3">
                <label for="descripcion">Descripcion</label>
                <input
                    type="text"
                    class="form-control"
                    id="descripcion"
                    name="descripcion"
                    aria-describedby="help-sinopsis <?= isset($errores['descripcion']) ? 'error-descripcion' : '';?>" value="<?= $oldData['descripcion'] ?? '';?>">

                <?php
                if(isset($errores['descripcion'])):
                ?>
                    <div class="msg-error" id="error-descripcion"><?= $errores['descripcion'];?></div>
                <?php
                endif;
                ?>
                <!-- <div class="form-help" id="help-descripcion">La sinopsis debe tener como máximo 255 caracteres.</div> -->
            </div>
            <div class="row">
                <div class="form-group col-3">
                    <p>Imagen actual</p>
                    <div>
                        <img src="<?= '../img/producto/' . $producto->getImagen();?>" alt="Previsualización de la imagen">
                    </div>
                </div>

                <div class="form-group col-3">
                    <label for="imagen">Imagen (opcional)</label>
                    <input type="file" id="imagen" name="imagen" class="form-control">
                </div>

                <div class="form-group col-3 mx-auto">
                    <label for="precio">Precio</label>
                    <input
                        id="precio"
                        name="precio"
                        class="form-control"
                        <?= isset($errores['precio']) ? 'aria-describedby="error-precio"' : '';?> value="<?= $oldData['precio'] ?? '';?>"
                    >
                    <?php
                    if(isset($errores['precio'])):
                    ?>
                        <div class="msg-error" id="error-precio"><?= $errores['precio'];?></div>
                    <?php
                    endif;
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label for="imagen_descripcion">Descripción de la imagen</label>
                <input type="text" id="imagen_descripcion" name="imagen_descripcion" class="form-control" value="<?= $oldData['imagen_descripcion'] ?? '';?>">
            </div>
            <button class="btn bg-success mx-auto text-light mt-3" type="submit">Actualizar</button>
        </form>
    </div>
</main>
