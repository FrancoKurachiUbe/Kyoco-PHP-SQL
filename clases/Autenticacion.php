<?php

class Autenticacion
{
    protected $usuario;

    public function iniciarSesion(string $email, string $password): bool
    {
        $this->usuario = (new Usuario())->traerPorEmail($email);

        if($this->usuario === null) {
            return false;
        }

        if(!password_verify($password, $this->usuario->getPassword())) {
            return false;
        }

        $this->autenticarUsuario($this->usuario);

        return true;
    }

    public function autenticarUsuario(Usuario $usuario)
    {
        $_SESSION['id'] = $usuario->getUsuarioId();
    }

    public function cerrarSesion()
    {
        unset($_SESSION['id']);
    }

    public function estaAutenticado(): bool
    {
        return isset($_SESSION['id']);
    }
}
