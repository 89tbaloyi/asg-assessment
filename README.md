git clone git@https://github.com/89tbaloyi/asg-assessment.git

cd asg-assessment

composer install

cp .env.example .env

php artisan key:generate

Make sure you set the correct database connection information before running the migrations Environment variables

php artisan migrate

php artisan serve
