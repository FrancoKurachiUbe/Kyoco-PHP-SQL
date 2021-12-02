<main class="main-content">
    <div class="container">
        <h1 class="mb-1">Ingresar al Panel de Administración</h1>

        <p>Para ingresar al panel es necesario que te autentiques a través de tus credenciales.</p>

        <form action="acciones/auth-iniciar-sesion.php" method="post">
            <div class="form-fila">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-fila">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn bg-success mx-auto text-light mt-3">Ingresar</button>
        </form>
    </div>
</main>
