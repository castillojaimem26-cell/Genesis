# Genesis - Sistema de Gestión Hospitalaria

Sistema para la administración de pacientes, doctores, especialidades, citas y historial clínico.

**Estado:** En desarrollo

### Stack Tecnológico
- Laravel 11 / PHP 8.2
- MySQL
- Spatie Laravel-Permission para Roles

### Instalación Local
```bash
git clone https://github.com/castillojaimem26-cell/Genesis.git
cd Genesis
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
