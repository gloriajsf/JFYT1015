## Alexa Global Sites Parser
This project reads top sites from http://www.alexa.com/topsites/global and insert into local database.
It uses Laravel scheduler to run on a daily basis.
It's built in Laravel 5.1 framework and Homestead, with PostgreSql database. 

## Requirement
*Virtualbox 5.*
*PHP 5.5
*Vagrant

## Installation
1.Run the following commands from terminal
	-git clone git@github.com:gloriajsf/JFYT1015
	-cp .env.example .env
	-composer install
	-php artisan key:generate
2.In .env, update database connection details
3.Create homestead schema in local database
4.Run command
	-php artisan migrate --seed
	-php artisan pullsites

## Login
+Username admin@gmail.com
+Password adminpass

## Search and Edit
Database is updated daily with top sites names and ranks. Users can login and type in as many domains as you wish, separated by a new line. Submitting these domains will display a table showing the domain name and its alexa rank, if it has one available.
Additionally, admin users can edit an exiting domain rank or add a new domain and its rank.
