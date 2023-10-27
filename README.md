# Fisrt step

Download the project in git

# Second step

Install xampp, install composer, add file .env and generate key with comand

-- php artisan key:generate

# Thrith step -- Install librarie to migrations update

--composer require doctrine/dbal

Add migrations

-- php artisan migrate

Generate routes with comand

-- php artisan route:list

# Configurations to acced to API by Products

In postman:

1.-Método HTTP: POST y GET
2.- URL: http://api/dates
3.- Cabecera: Asegúrese de que la cabecera(Headers) _token value= D8Xu3Uw521mx5YkRKuAqTyGdyRArkJ4AemhZtM5L
4.- Cuerpo (Body): Selecciona rawy JSONproporciona los datos del nuevo producto.

1.- Método HTTP: PUT y DELETE
2.- URL: http://api/create/1 (donde 1está el ID de usuario dela cita que deseas actualizar)
3.- Cabecera: Asegúrese de que la cabecera _token value= D8Xu3Uw521mx5YkRKuAqTyGdyRArkJ4AemhZtM5L
4.- Cuerpo (Body): Selecciona raw y JSON proporciona los datos actualizados del producto.

