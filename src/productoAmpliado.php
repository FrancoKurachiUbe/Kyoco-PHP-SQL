<?php
$idProducto = (int) $_GET['id'];
$producto = new Producto();
$producto = $producto->traerPorPk($idProducto);
?>
<main class="p-3">
    <div class="card_detalle">
        <picture >
            <source >
            <img src="img/producto/<?= $producto->getImagen();?>" alt="<?= $producto->getImgDetalle(); ?>">
        </picture>
        <div class="detalle p-4">
            <h1 class="h1 mb-4"><?= $producto->getTitulo(); ?></h1>
            <p class="mb-4"><?= $producto->getDescripcion(); ?></p>
            <p class="h3">$<?= $producto->getPrecio(); ?></p>
            <button class="butt agregar">Agregar al carrito</button>
            <button class="butt ampliar">Comprar</button>
        </div>
    </div>
</main>
