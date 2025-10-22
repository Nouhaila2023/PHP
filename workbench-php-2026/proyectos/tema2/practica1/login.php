<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Javier Profe">
    <title>Login</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/signin.css">

    <link rel="icon" href="./img/icono.png" sizes="32x32" type="image/png">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

    <main class="form-signin w-100 m-auto">
        <form action="controlador.php" method="POST">
            <img class="mb-4" src="./img/icono.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Login</h1>
            <div class="form-floating">
                <input type="email" class="form-control" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <input class="btn btn-primary w-100 py-2" type="submit" name="login" value="Login">
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2025–2026</p>
        </form>
    </main>

    <script src="./js/bootstrap.min.js"></script>

</body>

</html>