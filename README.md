1. Install Xampp 5.6, MariaDB in a given location. 
2. Set the environment variable for PHP to use PHP commands in Command Prompt
3. Paste the project file in your xampp/htdocs folder. 
4. Run MySQL Client(MariaDB 10.11) to run the backend database. You can install it by downloading the installer from internet. Make sure you use it on port 3306.  Password also set to root. Create a database named project. I have created all the settings for a database named project. So it will be easy to connect to the database as that was my connection details in the project. So it will be easy for you to carry on. 
5. Run xampp and run the Apache server. 
6. Copy and paste the project folder in your Xampp/htdocs folder. 

7. Setup the localhost:8080 by adding the following code in your httpd.conf. (You can access this by clicking the config button in your xampp in the apache row)
	Add the following snippet at the bottom of the file.
# Be sure to only have this line once in your configuration
NameVirtualHost 127.0.0.1:8080

# This is the configuration for your project
Listen 127.0.0.1:8080

<VirtualHost 127.0.0.1:8080>
  DocumentRoot "D:\xampp\htdocs\project\web"
  DirectoryIndex index.php
  <Directory "D:\xampp\htdocs\project\web">
    AllowOverride All
    Allow from All
  </Directory>

  Alias /sf D:\xampp\htdocs\project\lib\vendor\symfony\data\web\sf
  <Directory "D:\xampp\htdocs\project\lib\vendor\symfony\data\web\sf">
    AllowOverride All
    Allow from All
  </Directory>
</VirtualHost>

Please note that you have to change the lines Document Root and <Directory D:...> lines according to where you are setting up your xampp and project. I have set it up in D:\xampp\htdocs\project. This is my project directory. Make the change according to where you have installed xampp and setting up your project. 

8. Run the following commands one after the other.
php symfony doctrine:build --model
php symfony doctrine:build --sql
php symfony doctrine:insert-sql
php symfony doctrine:build --model

9. Hereafter you can use the below command to update the database.
php symfony doctrine:build --all --no-confirmation

10. Run the following command to add all the data to the database from scheme
php symfony doctrine:data-load

11. Next clear the cache using the following command
php symfony cc

12. The project is in app/backend. The frontend app was created whilst following the documentation. But the assignment requirements can be found in the localhost:8080/backend_dev.php/ url.
There are two username and passwords. One is
Username:jona password:admin1
The other is
Username:dishi password:admin2

13. The unit test can be run using the following command.
php vendor\bin\phpunit tests\sfGuardValidatorUserTest.php

The unit test can be found in 
plugins/sfDoctrineGuardPlugin/test/unit/validator/sfGuardValidatorTest.php

I am providing the xampp file version so that you can overcome many errors you may face as this is an old symfony version therefore, it was designed for PHP version 5.6.

P.S: You are not required to use SQL to populate data. Using the schema.yml, you can set up all the requirements such that the framework will take care of the sql query writing as well. 