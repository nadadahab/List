To Run Application 

1-clone repo 
 git clone https://github.com/nadadahab/List.git

2-Make  sure running mongodb server (mongod --smallfiles --port 27018)


3-Edit your .env file 

4-Run command
  composer install

5-Run command
   php artisan migrate

6-Run Laravel server 
   php artisan serve

7-To Run Test Cases
  vendor/phpunit/phpunit/phpunit

NOTE:
mongodb listens on port 27018 .


For Docker 

1-sudo docker-compose build

2-sudo docker-compose run web mongod --smallfiles --port 27018

3-sudo docker-compose up 

NOTE:
Make sure you have Docker and Docker-compose . 

