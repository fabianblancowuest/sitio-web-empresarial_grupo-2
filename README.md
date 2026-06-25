# CodeBridge - Portafolio Empresarial

Sistema web de portafolio empresarial para una agencia de desarrollo con 7 desarrolladores. Permite la gestión de proyectos, pedidos de clientes y perfiles de desarrolladores con tres roles de usuario: **admin**, **developer** y **cliente**.

## Funcionalidades

- **Público**: Landing page, galería de proyectos, equipo de desarrolladores, formulario de contacto.
- **Cliente**: Registro/login, panel para crear/ver/editar/eliminar pedidos, enviar mensajes en cada pedido.
- **Developer**: Login, edición de perfil personal (bio, skills, foto, etc.).
- **Admin**: Login, CRUD de desarrolladores, gestión de pedidos (cambio de estado, mensajes).

## Stack

- **Backend**: Laravel 12, PHP 8.2+
- **Frontend**: Blade, Tailwind CSS, Alpine.js, Vite
- **Base de datos**: SQLite
- **Autenticación**: Laravel Breeze con verificación de email

## Requisitos

- PHP ^8.2
- Composer
- Node.js y npm

## Instalación

```bash
# Clonar el repositorio y entrar al directorio
cd int

# Copiar archivo de entorno
cp .env.example .env

# Instalar dependencias de PHP
composer install

# Generar clave de aplicación
php artisan key:generate

# Ejecutar migraciones
php artisan migrate

# Instalar dependencias de frontend
npm install

# Compilar assets
npm run build
```

## Desarrollo

```bash
# Iniciar servidor de desarrollo (Laravel + Vite + Queue + Logs)
composer dev
```

Esto ejecuta concurrentemente:
- `php artisan serve` — servidor HTTP
- `php artisan queue:listen` — cola de trabajos
- `php artisan pail` — logs en tiempo real
- `npm run dev` — Vite HMR

## Tests

```bash
composer test
```

## Estructura de roles

| Rol | Acceso |
|------|--------|
| `admin` | Panel `/admin` — CRUD developers, gestión de pedidos |
| `developer` | Panel `/developer/perfil` — editar perfil |
| `cliente` | Panel `/cliente/dashboard` — gestión de pedidos |

Los roles se asignan en la tabla `users`, columna `role`.
