# Vehicle  Parking Management. 

Introducing Vehicle Parking Management - a complete management solution to manage your Vehicle Category, Add Vehicle, Manage Incoming and Outgoing Vehicle, Reports & etc.

---

<a href="https://code-with-rashed.github.io/vehicle_management_template" target="_blank">Demo of the vehicle parking management</a>

---

### Version Requirment

---

- php >= 8.1.2
- phpmyadmin >= 5.1.1

---

## Installation Proccess

---
- [ ] Step - 1  

[Download the Project](https://github.com/code-with-Rashed/manage_parking_vehicle/archive/refs/heads/master.zip)  

- [ ] Step - 2  

After downloading the Project archive, and uploading it to your server, the first thing you have to do is to create the DATABASE where system tables will be created. Lat's say, you create the database called <strong>manage_parking_vehicle</strong>  

- [ ] Step - 3  

### Set Environment Variables  
- To open the Configuration/env.php file.  
- You have to fill in your app url , app folder , database credentials and time zone.  
For Example...  

```php 
//application information
$APP_URL = "http://localhost/vehicle";
$APP_FOLDER = "/vehicle";
//-----------------------

//mysql database information
$MSDB_HOST = "localhost";
$MSDB_PORT = 3306;
$MSDB_USERNAME = "root";
$MSDB_PASSWORD = "";
$MSDB_NAME = "vehicle";
//--------------------------

// set default timezone
$DEFAULT_TIMEZONE = "Asia/Dhaka";
//---------------------
``` 
- Insure your server is active.  
- To open the terminal in your project directory.  
then run this commands.  
```
composer dump-autoload 
```
```
php Schema/schema-install.php
```
### Admin login details
Username : admin  
Password : admin







