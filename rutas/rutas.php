<?php

function getRutasSitio() {
    return [
        'home'              => ['title' => 'Sobre Kyoco',],
        'productos'         => ['title' => 'Productos'],
        'productoAmpliado'  => ['title' => 'Producto'],
        'iniciar-sesion'    => ['title' => 'Iniciar sesión',],
        'registro'          => ['title' => 'Registrarse',],
        'contacto'          => ['title' => 'Contacto'],
        '404'               => ['title' => 'Pagina no encontrada'],
    ];
}

function getRutasAdmin(): array {
    return [
        'home' => [
            'title' => 'Inicio',
            'autenticacion' => true,
        ],
        'login' => [
            'title' => 'Iniciar Sesión',
        ],
        'productos' => [
            'title' => 'Administración de Producto',
            'autenticacion' => true,
        ],
        'producto-nuevo' => [
            'title' => 'Publicar Producto',
            'autenticacion' => true,
        ],
        'productos-editar' => [
            'title' => 'Editar Noticia',
            'autenticacion' => true,
        ],
    ];
}