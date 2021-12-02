<main>
<?php
    /* echo "<pre>";
    print_r($_SESSION['errores']);
    echo "</pre>"; */

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
        $oldData = [];
    }
    ?>
<section class="container contacto my-5 row mx-auto">
    <h1 class="col-12 mx-auto text-center ">Cargar Productos</h1>
    
    <form action="acciones/producto-crear.php" method="post" enctype="multipart/form-data" class="col-sm-11 col-md-10 col-lg-8 mx-auto">

        <div class="form-group mb-3">
            <label class="form-label" for="titulo">Nombre del Producto</label>

            <input 
                type="text" 
                class="form-control" 
                id="titulo" 
                name="titulo" 
                placeholder="Ej: Hologram" aria-describedby="help-titulo <?= isset($errores['titulo']) ? 'error-titulo' : '';?>"
                value="<?= $oldData['titulo'] ?? '';?>">

            <?php
                if(isset($errores['titulo'])):
            ?>

            <div class="msg-error" id="error-titulo"><span class="visually-hidden">Error: </span><?= $errores['titulo'];?></div>

            <?php endif; ?>
                <!--<div class="form-help" id="help-titulo">El título debe tener al menos 3 caracteres.</div>-->                
        </div>
                        
        <div class="form-group mb-3">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ej: Vela aromatizada a base de soja..." aria-describedby="help-descripcion <?= isset($errores['descripcion']) ? 'error-descripcion' : '';?>"<?= $oldData['descripcion'] ?? '';?>>
            <?php if(isset($errores['descripcion'])): ?>
                <div class="msg-error" id="error-descripcion"><?= $errores['descripcion'];?></div>
            <?php endif; ?>
                <!--<div class="form-help" id="help-sinopsis">La sinopsis debe tener como máximo 255 caracteres.</div>-->                
        </div>
    
        <div class="row">    
            <div class="form-group col-6">
                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" class="form-control-file">
            </div>
            <!--  VALIDAR PRECIO -->
            <div class="form-group col-3 mx-auto">
                <label for="precio">Precio</label>
                <input 
                    type="text" class="form-control" id="precio" 
                    name="precio"
                    placeholder="Ej: $500">
            </div>
        </div>    
        <div class="form-group">
            <label for="imagen_descripcion">Descripcion de la imagen</label>
            <input type="text" class="form-control" id="imagen_descripcion" name="imagen_descripcion" placeholder="Ej: Vela aromatizada en recipiente de vidrio" value="<?= $oldData['imagen_descripcion'] ?? '';?>">
        </div>
        
        <!-- <div class="row mt-3"> -->    
            <!--<input type="submit" class="btn btn-success col-6 mx-auto btn-lg">-->
            <button class="btn bg-success mx-auto text-light mt-3" type="submit">Publicar</button>
        <!-- </div> -->
    </form>
</section>
</main>