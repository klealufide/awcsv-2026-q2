<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="public/js/jquery-4.0.0.min.js"></script>
  <script src="public/js/auth.js"></script>
</head>
<body class="container mt-5">

  <h2>Login</h2>

  <div class="alert alert-danger d-none" id="loginError"></div>

  <form id="formLogin">
    <input class="form-control mb-2" name="username" id="username" placeholder="Usuario">
    <input type="password" class="form-control mb-2" name="password" id="password" placeholder="Contraseña">
    <button type="submit" class="btn btn-primary">Ingresar</button>
    <a href="index.php?page=showRegister" class="btn btn-outline-secondary ms-2">Registrarse</a>
  </form>

</body>
</html>