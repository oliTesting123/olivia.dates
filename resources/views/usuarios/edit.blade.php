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
  <h2>Editar usuario</h2>
  <div class="row">
    <div class="col-lx-12">
      <form action="{{ route('usuarios.update', $usuario->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="nombre" type="text">NOMBRE:</label>
          <input type="text" class="form-control" name="nombre" maxlength="30" required value="{{$usuario->nombre}}">
        </div>
        <div class="form-group">
          <label for="correo" type="email">CORREO</label>
          <input type="email" class="form-control" name="correo" required value="{{$usuario->correo}}">
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary mt-1" value="Actualizar">
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>