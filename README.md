# pinterest-mockup
***
This is a web application created using Bootstrap to create the user interface, and uses PHP 7.4 to connect and manipulate MySQL database, which is created on phpMyAdmin3. The purpose of this application is to demonstrate at least 10 different queries that supports CRUD functionalities. 

# Instructions to SETUP and RUN
***
1. Please install Ampps for your computer: https://www.apachefriends.org/
2. Open ampps, and open the Root Directory, (<YOUR_MAIN_DRIVE>\xampp\htdocs), and put this git repo into there.
3. Go to 'http://localhost/phpmyadmin/', and create a database called 'database' and import the SQL dump file: database.sql .
4. Go to 'http://localhost/pinterest-mockup/', to be able to view the web application.
5. Go to 'http://localhost/pinterest-mockup/admin/', to be able to view the web application as an admin.
6. In order to share ads to the fb-custom-clone, follow Step 1 to create your Firebase Project and registration: https://firebase.google.com/docs/web/setup
7. Replace all ENTER_YOUR_FIREBASE_HERE (found at adpost.php) with your information from the Project settings at your Firebase Console.
8. In the Firebase console, go to Authentication -> Sign-in Method. Select Google as the provider and click enable and save.
9. Clone the fb-custom-clone from github (https://github.com/SI-Encoding/fb-custom-clone) and follow the instructions found there 'for server side'.

NOTE: The fb-custom-clone by default takes up the 5000 port. This can be changed, just make sure to change the port number at Ln 449 in the adpost.php


# For those of you who want to launch the appplication using Visual Studio Code
For Visual Studio Code, there is a launch.json file inside .vscode which you can modify to launch the application. Ctrl + F5 to run the application.

IMPORTANT: in order to properly access the web application as an admin, you must attach index.php at the end of localhost for it to properly work if launched from Visual Studio Code.
It should look like http://localhost/admin/index.php

NOTE: In order for PHP to run properly on your system, you must add PHP as an environment PATH