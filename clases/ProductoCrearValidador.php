<?php
class ProductoCrearValidador{
    
    protected $data = [];
    protected $errores = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function ejecutar()
    {
        if(empty($this->data['titulo'])) {
            $this->errores['titulo'] = 'Tenés que escribir un título.';
        } else if(strlen($this->data['titulo']) < 3) {
            $this->errores['titulo'] = 'El título tiene que tener al menos 3 caracteres.';
        }
     
        if(empty($this->data['descripcion'])) {
            $this->errores['descripcion'] = 'Tenés que escribir la descripcion.';
        } else if(strlen($this->data['descripcion']) > 255) {
            $this->errores['descripcion'] = 'El título tiene que tener como máximo 255 caracteres.';
        }

        if(empty($this->data['precio'])) {
            $this->errores['precio'] = 'Tenés que escribir el precio de la noticia .';
        }
    }

    public function hasErrors(): bool
    {
        return count($this->errores) > 0;
    }

    public function getErrores(): array
    {
        return $this->errores;
    }
}
