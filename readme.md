# Sistema de consultas para el IEBO
Aplicación web para el procesamiento y cruce de datos entre el seguro facultativo del IMSS y el IEBO.

## Comenzando
Para ejecutar el proyectos de forma local seguir las siguientes instrucciones:

### Requisitos
* Instalar [XAMPP](https://www.apachefriends.org/es/index.html).
* Instalar [Composer](https://getcomposer.org/).

### Instalación
1. Clonar repositorio
```
git clone https://github.com/IrvingMg/IEBOConsultas-App.git
```

2. Copiar archivo `.env.example` y renombrarlo como `.env`

3. Instalar dependencias
```
composer install
```

4. Ejecutar el comando
```
php artisan key:generate
```

5. Ejecutar proyecto localmente
```
php artisan serve
```

## Construido con
* [Laravel 5.8](https://laravel.com) - PHP Framework