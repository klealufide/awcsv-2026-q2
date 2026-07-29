<!DOCTYPE html>
<html>
<head>
  <title>Registro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="public/js/jquery-4.0.0.min.js"></script>
  <script src="public/js/auth.js"></script>
</head>
<body class="container mt-5">

  <h2>Registro</h2>

  <div class="alert alert-danger d-none" id="registerError"></div>
  <div class="alert alert-success d-none" id="registerSuccess"></div>

  <form id="formRegister">
    <input
      class="form-control mb-2"
      name="username"
      id="regUsername"
      placeholder="Usuario">

    <input
      type="password"
      class="form-control mb-2"
      name="password"
      id="regPassword"
      placeholder="Contraseña">

    <input
      type="password"
      class="form-control mb-2"
      name="confirm_password"
      id="regConfirm"
      placeholder="Confirmar contraseña">

    <select class="form-select mb-3" id="regRol" name="rol">
      <option value="user">Usuario</option>
      <option value="admin">Admin</option>
    </select>

    <button type="submit" class="btn btn-success">
      Registrarse
    </button>
    <a href="index.php" class="btn btn-secondary ms-2">Volver al Login</a>
  </form>

</body>
</html>