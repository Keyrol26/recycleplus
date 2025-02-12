

<h1 align="center">RecyclePlus </h1>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About
A smart waste management system with AI-based image classification for recyclable items and a booking system for waste collection"]. The system is designed to improve efficiency, enhance user experience, and promote sustainability..

<img src="https://github.com/user-attachments/assets/ec277825-5b4b-4969-8c1f-4e196dbac2f9" width="150">
            
## Installation Guide
> - composer install
> - copy .env.example .env
> - php artisan key:generate
> - npm install && npm run build
> - php artisan migrate
> - php artisan db:seed

> - php artisan serve

## Env Guide
1  Update the .env file with your database and API configurations
2  Add the following for Email SMTP configuration:
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=your_email@example.com
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@example.com
MAIL_FROM_NAME="Your Name"
```
3  Add the following for Google Maps API configuration:
```
GOOGLE_MAPS_API_KEY=your_google_maps_api_key
```

## Image Processing Setup (Python Virtual Environment)
>- python -m venv venv
>- venv\Scripts\activate
>- pip install -r requirements.txt
>- Change Your Pyhon Path file at the ImageProcessingController.php

## Credentials
> - Client : user@demo.com || pass
> - Superadmin : superadmin@demo.com || pass
> - Admin : admin@demo.com || pass
> - Collector : collector@demo.com || pass

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

