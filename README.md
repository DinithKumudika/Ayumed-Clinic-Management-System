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

## Getting Started

###Prerequisites

<ul>
  <li>Apache Server</li>
  <li>PHP 5.6+</li>
  <li>MySQL Database</li>
</ul>

Install [XAMPP](https://www.apachefriends.org/it/index.html) for an easy quickstart. Also something like WAMP(https://sourceforge.net/projects/wampserver/) can be also used instead of XAMPP

### Config File

Modify the app/config/dbCredentials.php file according to configure the database you are using

```
// Database config
define('DB_HOST', '<your db Host>');
define('DB_USER', '<your db Username>');
define('DB_PASS', '<your db Password>');
define('DB_NAME', '<your db Name>');
```
### htaccess file

Modify the RewriteBase in the .htaccess file inside the public folder to match the name of your installation folder

```
RewriteBase /<your root folder>/public
```
