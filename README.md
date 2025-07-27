# 🛒 Tienda Oficial River Plate - Portales y Comercio Electrónico

Este proyecto fue desarrollado como parte del trabajo práctico de la materia **Portales y Comercio Electrónico** en el marco de la Tecnicatura en Diseño y Programación Web.

Se trata de un sitio web dinámico hecho con **Laravel 11**, que simula una tienda oficial de River Plate, con funcionalidades como:

- Listado de artículos (camisetas, productos oficiales)
- Carrito de compras
- CRUD para administración de artículos, talles y categorías
- Sistema de autenticación y administración de usuarios
- Diseño responsive con Bootstrap 5

---

## ⚙️ Tecnologías utilizadas

- Laravel 11
- PHP 8.2+
- Composer
- MySQL / MariaDB
- Bootstrap 5.3
- Blade templates
- Artisan CLI

---
## 🗄️ Repositorio en GitHub

https://github.com/M4ttux/portales-y-comercio-parcial02

## 🧰 Instalación del proyecto

### 📦 Requisitos previos

- Tener instalado **XAMPP** con Apache y MySQL
- Tener instalado **Composer**
- Tener activado PHP 8.2.12

---

### 🚀 Instrucciones paso a paso

#### 1. Cloná o copiá este repositorio en tu `htdocs` de XAMPP


C:\xampp\htdocs\river



#### 2. Abrí una terminal y ubicáte en la carpeta del proyecto

```bash
cd C:/xampp/htdocs/river
```

#### 3. Instalá las dependencias del proyecto

```bash
composer install
```

#### 4. Copiá el archivo .env

```bash
cp .env.example .env
```
(En Windows podés usar copy .env.example .env)

#### 5. Generá la APP_KEY

```bash
php artisan key:generate
``` 

#### 6. Configurá la base de datos en el archivo .env

Asegurate de tener una base de datos vacía creada, por ejemplo portales.

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tienda
DB_USERNAME=root
DB_PASSWORD=
```

#### 7. Ejecutá migraciones, seeders y storages
Esto creará todas las tablas necesarias y poblará datos de prueba:

```bash
php artisan migrate
```

```bash
php artisan db:seed
```

```bash
php artisan storage:link
```

#### 8. Iniciá el servidor local
```bash
php artisan serve
```

### 🌐 Acceso al sitio
Para el correcto funcionamiento, se recomienda el uso de Ngrok y agregarlo al .env


```bash
APP_URL=https://123123123123.ngrok-free.app <- Esto es un ejemplo
```

### 🧪 Usuarios de prueba
El sistema incluye usuarios precreados desde los seeders. Podés iniciar sesión con:

```bash
Email: admin@admin.com

Contraseña: admin
```

(Ver UserSeeder.php para más detalles)
# TiendaRiver
