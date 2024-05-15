Instructions to run website locally.
This is a PHP website that can be hosted locally by using XAMPP.
IT IS REQUIRED TO INSTALL XAMPP TO HOST THE WEBSITE LOCALLY
Here is the download link to install XAMPP:
https://www.apachefriends.org/download.html

after installing, you will paste the entire website folder in the "xampp/htdocs" folder
then open from the app

How to clone repository.
Open git bash
Enter “cd ..” twice.
cd to “xampp”
cd to “htdocs”
Create and enter to new folder [“mkdir folder” then “cd folder”]
Enter “git init” to start git
Enter “git clone https://github.com/OluwatopeF/website2.git”
The folder should contain the entire website files.

How to open the website after cloning.
1. open xampp
2. under “actions” click “start” on both apache and mysql
3. click “admin” on mysql under actions
4. once the page opens, click on the url (http://localhost/phpmyadmin/ ) then remove "phpmyadmin" and press enter [ OR enter the url: http://localhost ]
5. click on the “website2” folder then the website should open [ OR enter the url: http://localhost/Website2 ]

NOTE: copying and pasting the content of the .sql file creates the database from the MYSQL workbench
There will be a MySQL(.sql) file within the folder that will be cloned.
open MySQL Workbench and paste the contents of the file to create the table
