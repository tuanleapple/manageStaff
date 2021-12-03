# ManageStaff

## Install

***setup VM XAMPP:***
```
https://www.youtube.com/watch?v=K-qXW9ymeYQ
```
*** /Applications/XAMPP/xamppfiles/etc/extra/httpd-vhosts.conf:***
```
<VirtualHost *:80>
    DocumentRoot "/Applications/XAMPP/xamppfiles/htdocs/managestaff/index.php"
    ServerName manageStaff.local
	<Directory "/Applications/XAMPP/xamppfiles/htdocs/managestaff/index.php">
		Options Indexes FollowSymLinks Includes execCGI
		AllowOverride All
	</Directory>
</VirtualHost>
```
***Install:***
```
sudo nano /etc/hosts 
```
***Copy /etc/hosts:***
```
127.0.0.1  manageStaff.local
```



## Licence

Copyright &copy; 2021 khánh tuấn
#### khánh tuấn
