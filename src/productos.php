<?php
$producto = new Producto();
$productos = $producto->todo();
?>
<main>    
    <picture>
        <source media="(max-width: 800px)" srcset="img/Banner_productos_mobile2.jpg" type="">
        <source media="(max-width: 1000px)" srcset="img/Banner_productos_mobile.jpg" type="">
        <img src="img/Banner_productos.jpg" alt="Vela sobre una mesa">
    </picture>
    <h1>Velas</h1>
    <section>
        <?php 
        foreach($productos as $producto): ?>
        <article class="cards">
                    <div class="cards-detalle">
                        <h2><?= $producto->getTitulo(); ?></h2>
                        <p>$<span><?= $producto->getPrecio(); ?></span></p>
                        <button class="butt agregar">Agregar</button>
                        <a href="index.php?s=productoAmpliado&id=<?=$producto->getProductoId(); ?>" class="btn butt ampliar ampliar2">Ampliar</a>
                        
                    </div>    
                    <picture class="cards-img">
                        
                        <img src="img/producto/<?=$producto->getImagen();?>" alt="<?= $producto->getImgDetalle() ?>">
                    </picture>
        </article>
        <?php
        endforeach;
        ?>
    </section>
</main>