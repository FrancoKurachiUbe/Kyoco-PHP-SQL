<?php 

function productoTodos(): array {
    $filename   = __DIR__ . '/../json/productos.json';
    $json = file_get_contents($filename);
    $productosData = json_decode($json, true);
    $salida = [];

    foreach($productosData as $producto){
        $productoObj = new Producto;
        $productoObj->loadDataFromArray($producto);
        $salida[] = $productoObj;
    }
    return $salida;
}

function productoTraerPorId(int $id): ?Producto{
    $productos = productoTodos();

    foreach($productos as $producto){
        if($producto->getProductoId() === $id) {
            return $producto;
        }
    }
    return null;
}
