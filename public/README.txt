## TODOLIST

A small web application to help you manage your life.

## TECH

Webserver : Apache (xampp)
scripting : PHP
database : phpMyAdmin ( MySQL )
frontend : jQuery , bootstrap

## SETUP

1) start xampp Control (D:\xampp) and start Apache and MySQL.

2) type http://localhost/phpmyadmin/ and create a new database with the name "todos".

3) create a new table todo with the columns :
	id : int(11) , Extra: AUTO_INCREMENT.
	title : varchar(255)
	description : varchar(255)
	priority : varchar(255)
	due_date : datetime , Default : CURRENT_TIMESTAMP


4) open your httpd-vhosts.conf file (D:\xampp\apache\conf\extra) and copy/paste this virtual host : 

<VirtualHost *:80>
    DocumentRoot "D:/xampp/htdocs/todoListMvc/public"
    ServerName todolist
</VirtualHost>


5) open the hosts file in C:\Windows\System32\drivers\etc notepad ( as admin ) with notepad and add this line :

127.0.0.1       todolist

6) restart Apache and MySQL in xampp Control.

