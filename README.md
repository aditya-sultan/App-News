<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## News Management System

<p align="justify">Web App untuk mengelola berita
</p>

## Features / Fitur

- Autentikasi/login-logout
- Level hak akses (admin, user)
- Admin = create, update, delete, show, comment
- User = show, comment

  ## Instalasi
  - Clone Repository
  - buat file
```
.env
  ```
  - copy isi .env.example ke file .env
  - buat database dengan nama
    ```
    newsapp
    ```

     - Jalankan perintah
```
composer install
```

- jalankan perintah untuk membuat akun

```
  php artisan db:seed --class=UserSeeder
```
- jalankan perintah

```
 php artisan serve
```
untuk menjalani sistem

## Login akun
- Admin = Email : vampireprince@tenebrare.com | Password : admin123
- User = Email : snowyowl2206@gmail.com | Password : user123
