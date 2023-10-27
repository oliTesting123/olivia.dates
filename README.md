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

1.-Método HTTP: POST
2.- URL: http://api/products
3.- Cabecera: Asegúrese de que la cabecera(Headers) Content-Type esté configurada como application/json.
4.- Cuerpo (Body): Selecciona rawy JSONproporciona los datos del nuevo producto.

1.- Método HTTP: PUT
2.- URL: http://api/products/1 (donde 1está el ID del producto que deseas actualizar)
3.- Cabecera: Asegúrese de que la cabecera Content-Typeesté configurada como application/json.
4.- Cuerpo (Body): Selecciona raw y JSON proporciona los datos actualizados del producto.

