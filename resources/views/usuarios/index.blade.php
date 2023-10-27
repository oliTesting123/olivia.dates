<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
</head>
<body>
    <div class="container">
        @if(isset($successMessage))
            <div class="alert alert-success">
                {{ $successMessage }}
            </div>
        @endif
        <br>
        <div class="row">
            <div class="col-lx-12">
            <form action="{{ route('usuarios.index') }}" method="get">
                <div class="form-row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="texto" value="{{ $texto ?? '' }}" placeholder="nombre o correo">
                    </div>
                    <div class="col-md-2 my-1">
                        <input type="submit" class="btn btn-primary" value="Buscar">
                    </div>

                    <div class="col-md-2 my-1">
                        <a href="{{ route('usuarios.create') }}" class="btn btn-success" >Nuevo</a>
                    </div>
                </div>
            </form>

        </div>
            <div class="col-lx-12">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>correo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($usuarios)<=0)
                            <tr>
                                <td colspan="8">No hay usuarios</td>
                            </tr>
                        @else
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <td>
                            <form action="{{route('usuarios.destroy',$usuario->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                            </form>    
                            <a href="{{route('usuarios.edit',$usuario->id)}}" class="btn btn-warning btn-sm">Editar</a> 
                        </td>
                            <td>{{ $usuario->nombre }}</td>
                            <td>{{ $usuario->correo }}</td>
                        </tr>
                            
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>