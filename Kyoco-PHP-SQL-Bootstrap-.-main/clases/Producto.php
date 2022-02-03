<?php
class Producto
{
    protected $producto_id;
    protected $titulo;
    protected $imagen;
    protected $imagen_descripcion;
    protected $descripcion;
    protected $precio;
     



    public function todo(): array
    {
        $db = (new Conexion())->getConexion(); 
        $query = "SELECT * FROM productos";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        return $stmt->fetchAll();
    }

    public function traerPorPk(int $pk): ?Producto
    {
        $db = (new Conexion())->getConexion();
        $query = "SELECT * FROM productos
                  WHERE producto_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$pk]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $producto = $stmt->fetch();

        if(!$producto) {
            return null;
        }
        return $producto;
    }

    public function crear(array $data) {
        $db = (new Conexion())->getConexion();
        $query = "INSERT INTO productos (usuario_fk, titulo, descripcion, imagen, imagen_descripcion, precio) VALUES (:usuario_fk, :titulo, :descripcion, :imagen, :imagen_descripcion, :precio)";
        $stmt= $db->prepare($query);
        $stmt-> execute([
            'usuario_fk' => $data['usuario_fk'],
            'titulo' => $data['titulo'],
            'descripcion' => $data['descripcion'],
            'imagen' => $data['imagen'],
            'imagen_descripcion' => $data['imagen_descripcion'],
            'precio' => $data['precio'],
        ]);
    }
    public function editar($pk, array $data)
    {
        $db = (new Conexion())->getConexion();
        $query = "UPDATE productos
                SET titulo = :titulo,
                    descripcion = :descripcion,
                    imagen = :imagen,
                    imagen_descripcion = :imagen_descripcion,
                    precio = :precio
                WHERE prodcuto_id = :prodcuto_id";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'titulo' => $data['titulo'],
            'descripcion' => $data['descripcion'],
            'imagen' => $data['imagen'],
            'imagen_descripcion' => $data['imagen_descripcion'],
            'precio' => $data['precio'],
            'producto_id' => $pk,
        ]);
    }

    public function eliminar(int $pk)
    {
        $db = (new Conexion())->getConexion();
        $query = "DELETE FROM productos
                  WHERE producto_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$pk]);
    }

    public function loadDataFromArray(array $data): void {
        $this->setProductoId($data['producto_id']);
        $this->setTitulo($data['titulo']);
        $this->setDescripcion($data['descripcion']);
        $this->setImagen($data['imagen']);
        $this->setImgDetalle($data['imagen_descripcion']);
        $this->setPrecio($data['precio']);
        
    }

    public function getProductoId(): int 
    {
        return $this->producto_id;
    }

    public function setProductoId(int $producto_id): void{
        $this->producto_id = $producto_id;
    }

    public function getTitulo(): string{
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void{
        $this->titulo = $titulo;
    }
    
    public function getImagen(): string{
        return $this->imagen;
    }
    
    public function setImagen(string $imagen): void {
        $this->imagen = $imagen;
    }

    public function getImgDetalle(): string{
        return $this->imagen_descripcion;
    }
    public function setImgDetalle(string $imagen_descripcion): void {
            $this->imagen_descripcion = $imagen_descripcion;
    }

    public function getDescripcion(): string {
        return $this->descripcion;
    }
    public function setDescripcion(string $descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function getPrecio(): int {
        return $this->precio;
    }
    public function setPrecio(int $precio ): void {
        $this->precio = $precio;
    }
}