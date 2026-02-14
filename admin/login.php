<!DOCTYPE html>
<html lang="es">
<head>
    <!--Inicio Fuentes-->
    <!--Fuente Judson-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Judson:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <!--Fin Fuente-->
    <!--Fuente League Spartan-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Judson:ital,wght@0,400;0,700;1,400&family=League+Spartan:wght@100..900&display=swap"
        rel="stylesheet">
    <!--Fin Fuente-->
    <!--Fuente Inter-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Judson:ital,wght@0,400;0,700;1,400&family=League+Spartan:wght@100..900&display=swap"
        rel="stylesheet">
    <!--Fin Fuente-->
    <!--Inicio Fuente Instrument Sans-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=League+Spartan:wght@100..900&display=swap"
        rel="stylesheet">
    <!--Fin Fuente-->
    <!--Cierre Fuentes-->

    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<header>
        <figure class="logo">
            <a href="#"><img src="../recursos/Logo.png" alt=""></a>
            <span>Panel Administrativo</span>
        </figure>
    </header>

    <figure class="cont_login">
        <h1>Inicio de Sesion</h1>
        <form action="validar_login.php" method="POST" class="login">
    
            <div class="campo">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" placeholder="Usuario" required>
            </div>
            <div class="campo">
                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="Contraseña" required>

            </div>

            <button type="submit">Iniciar Sesión</button>
</form>
    </figure>


</body>
</html>