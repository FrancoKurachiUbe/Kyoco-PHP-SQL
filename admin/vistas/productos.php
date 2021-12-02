<?php
$productos = (new Producto())->todo();
?>
<main>
    <section class="container">
        <h1 class="text-center">Administrar Productos</h1>
        <table class="table text-center">
            <thead class="bg-dark text-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Descr-img</th>
                    <th>Precio</th>
                    <th>Borrar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($productos as $producto): ?>
                <tr class="border align-middle">
                    <td><?=$producto->getProductoId();?></td>
                    <td><?=$producto->getTitulo();?></td>
                    <td><?=$producto->getDescripcion();?></td>
                    <td class=""><img src="../img/producto/<?=$producto->getImagen();?>" alt="" class="table-img"></td>
                    <td><?=$producto->getImgDetalle();?></td>
                    <td>$<?=$producto->getPrecio();?></td>
                    <td>
                        <form action="acciones/productos-eliminar.php?id=<?= $producto->getProductoId();?>" method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($producto->getProductoId());?>">

                            <button class="btn bg-danger text-light" type="submit">Borrar <span class="visually-hidden">Borrar el Producto:<?= htmlspecialchars($producto->getTitulo());?></span></button>
                        </form>
                    </td>
                    <td>
                    <form action="acciones/productos-editar.php?id=<?= $producto->getProductoId();?>" method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($producto->getProductoId());?>">
                            
                            <button class="btn bg-success text-light" id="editar" type="submit">Editar <span class="visually-hidden">Editar el Producto:<?= htmlspecialchars($producto->getTitulo());?></span></button>
                        </form>
                    </td>
                </tr>
                <?php 
                endforeach;
                ?>
            </tbody>
        </table>
    </section>    
</main>
<!--  -->

