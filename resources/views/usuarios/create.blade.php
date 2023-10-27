<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    <title>Creacion de usuario</title>
</head>
<body>
<div class="container">
  <h2>Nuevo usuario</h2>
  <div class="row">
    <div class="col-lx-12">
      <form action="{{ route('usuarios.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="nombre" type="text">NOMBRE:</label>
          <input type="text" class="form-control" name="nombre" maxlength="30" required>
        </div>
        <div class="form-group">
          <label for="correo" type="email">CORREO</label>
          <input type="email" class="form-control" name="correo" required>
        </div>
        <div class="form-group">
          <label for="contrasena" type="password">CONTRASEÑA</label>
          <input type="password" class="form-control" name="contrasena" required>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary mt-1" value="Guardar">
          <!-- <a href="javascript:history.back()">Ir a lista de usuarios</a> -->
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>