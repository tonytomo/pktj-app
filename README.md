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
1. Run `composer install`
1. Run `php artisan migrate --seed`
1. Run `php artisan serve`

## Usage

1. Visit `http://127.0.0.1:8000`
1. Login with the following credentials:
```env
Email: admin@pktj.com
Password: admin123
```
1. Have fun!
