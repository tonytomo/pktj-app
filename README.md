# PKTJ Asset Management System

## Introduction

This is a simple asset management system that allows users to manage their assets. The system is built using Laravel 11.

## Features

-   User Management
-   Asset Management

## Installation

1. Clone the repository
1. Run `Copy-Item .env.example .env`
1. Start your Apache and MySQL server
1. Create a new database named 'pktj'
1. Update the `.env` file with your database credentials

```env
DB_CONNECTION=mysql
...
DB_DATABASE=pktj
```

6. Run `composer install`
7. Run `php artisan migrate --seed`
8. Run `php artisan serve`

## Usage

1. Visit `http://127.0.0.1:8000`
1. Login with the following credentials:

```env
Email: admin@pktj.com
Password: admin123
```

3. Have fun!

## Change the asset src

1. Go to any blade file
1. Change the image src from `src="logo.png"` to `src="{{ asset('images/logo.png') }}"`
1. Change the video src from `src="video.mp4"` to `src="{{ asset('videos/video.mp4') }}"`
