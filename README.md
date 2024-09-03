

## Setup on local machine

- Clone the repo
- Run composer install
- Run npm install
- Rename env.example to .env
- Fill in your database credentials
- Run php artisan migrate
- Run php artisan db:seed to seed an admin user and a few tours into the database
- Run php artisan serve --port 80
- Run npm run dev
- Run tests by running php artisan test
- Run php artisan scribe:generate to generate api documentation for your environment
- Access the api documentation by visiting http://localhost/docs/index.html
- Visit http://localhost to access the app
