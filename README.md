# Ayumed-Clinic-Management-System
Ayumed is a Web based Clinic Management System developed for the 2nd year group project of university

This web application currently has 5 stakeholders

<ul>
<li>Patient</li>
<li>Doctor</li>
<li>Pharmacist</li>
<li>Clinic staff member</li>
<li>Admin</li>
</ul>

## Group Details

Group No : Group 17 - Information Systems

| Name     | Student ID      |
| ------------- | ------------- |
| Dinith Kumudika | `2020/IS/059`  |
| Jayani Ranasinghe | `2020/IS/081`  |
| Pabasara Sathsarani | `2020/IS/004`  | 
| Affdha Awfar | `2020/IS/010`  | 

## Technologies

Architecture : `MVC`\
FrontEnd : `HTML` `CSS` `Javascript`\
BackEnd : `PHP`\
Package Manager : `Composer`

## Tech Stack

LAMP Stack

Web Server OS : `Linux`\
Web Server : `Apache`\
Database : `MySQL`\
Bacnkend Language : `PHP`

## Libraries

<ul>
  <li>[PHP dotenv](https://github.com/vlucas/phpdotenv)</li>
  <li>[Dompdf](https://github.com/dompdf/dompdf)</li>
</ul>

## Getting Started

###Prerequisites

<ul>
  <li>Apache Server</li>
  <li>PHP 5.6+</li>
  <li>MySQL Database</li>
  <li>Composer</li>
</ul>


1. Download the files, either directly or by cloning the repo.
2. Run composer update to install the project dependencies.
3. Install [XAMPP](https://www.apachefriends.org/it/index.html) for an easy quickstart. Also something like [WAMP](https://sourceforge.net/projects/wampserver/) can be also used instead of XAMPP


### Config Files

Modify the app/config/dbCredentials.php file according to configure the database you are using

```
// Database config
define('DB_HOST', '<your db Host>');
define('DB_USER', '<your db Username>');
define('DB_PASS', '<your db Password>');
define('DB_NAME', '<your db Name>');
```
Modify the URL_ROOT and SITE_NAME in the config.php to your project folder and name of the site name as you prefer

```
// URL root
define('URL_ROOT', 'http://localhost/<project root>');

//SITE name
define('SITE_NAME', <site name>);
```
### htaccess file

Modify the RewriteBase in the .htaccess file inside the public folder to match the name of your installation folder

```
RewriteBase /<your root folder>/public
```
### Install the Database

Create a database named as `ayumed_clinic_mgt_system` using PhpMyAdmin and import the sql file to it.

### composer installation

Go to project folder and run the composer install command

```
composer install
```
