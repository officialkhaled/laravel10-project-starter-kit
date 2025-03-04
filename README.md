<p align="center">
    <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" width="90" alt="Laravel Logo">
    &nbsp;&nbsp;&nbsp;&nbsp;
    <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg" width="120" alt="Tailwind CSS Logo">
    &nbsp;&nbsp;&nbsp;&nbsp;
    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b2/Bootstrap_logo.svg" width="100" alt="Bootstrap Logo">
</p>


# Laravel 10 Starter Kit
This repository provides a pre-configured Laravel 10 application with different styling options to help you quickly start new projects.

# Project Structure
This project has three branches to choose from based on your styling preference and layout options:

- **Multiple Styling Options:** Choose from three branches:
  - **Master:** Plain Laravel setup with basic styling included with Breeze.
  - **TailwindCSS:** Integrated with TailwindCSS and Flowbite.
  - **Bootstrap:** Uses Bootstrap for styling.

- **Flexible Layout Options:**
  - **Breeze App Layout:** Uses Laravel Breeze's default layout for authentication and UI.
  - **Skeleton Layout:** A minimal layout for full customization.

# How to Clone
You can clone the repository and switch to your desired branch:

Clone the repository
```bash
git clone https://github.com/officialkhaled/laravel10-project-starter-kit.git
```
Navigate into the project directory
```bash
cd laravel10-project-starter-kit
```
Checkout your preferred branch
```bash
git checkout tailwindcss  # or bootstrap or master
```

# Installation
Install dependencies
```bash
composer install
npm install
```

Copy .env file
```bash
cp .env.example .env
```

Generate application key
```bash
php artisan key:generate
```

Run migrations and DB seeder
```bash
php artisan migrate:fresh
php artisan db:seed --class="UserRolePermissionSeeder" 
```

# Features
- Pre-configured Authentication (Laravel Breeze)
- Roles & Permission 
- Choice of Styling: TailwindCSS (Flowbite) or Bootstrap v5
- OAuth Sign In Integration

# Contribution
Feel free to contribute by creating issues or submitting pull requests.

