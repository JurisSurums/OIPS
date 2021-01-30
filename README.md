<h2>The system uses:</h2>

<b>
Ubuntu 20_04
        
apache2

Mysql 8

PHP 7.4
</b>

<br>
1. Download this git repository from: https://github.com/JurisSurums/OIPS and place it in the web root directory (var/www/)
2. Create a virtual host .conf file (books.conf) in etc/apache2/sites-available and change the "host" file in /etc after that run the command a2ensite and restart apache2 (sudo systemctl restart apache2)

VirtualHost:
<VirtualHost *:80>
        ServerName OIPS.ork
        DocumentRoot "/var/www/OIPS/advanced/frontend/web/"
           
        <Directory "/var/www/OIPS/advanced/frontend/web/">
            # use mod_rewrite for pretty URL support
            RewriteEngine on
            # If a directory or a file exists, use the request directly
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Otherwise forward the request to index.php
            RewriteRule . index.php
            Require all granted
            # use index.php as index file
            DirectoryIndex index.php

            # ...other settings...
        </Directory>
    </VirtualHost>
       
    <VirtualHost *:80>
        ServerName dev.OIPS.ork
        DocumentRoot "/var/www/OIPS/advanced/backend/web/"
           
        <Directory "/var/www/OIPS/advanced/backend/web/">
            # use mod_rewrite for pretty URL support
            RewriteEngine on
            # If a directory or a file exists, use the request directly
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Otherwise forward the request to index.php
            RewriteRule . index.php
            Require all granted
            # use index.php as index file
            DirectoryIndex index.php

            # ...other settings...
        </Directory>
    </VirtualHost>

in "host" file:

127.0.0.1	OIPS.ork

127.0.0.1	dev.OIPS.ork

from Yii2 documentation:

https://www.yiiframework.com/extension/yiisoft/yii2-app-advanced/doc/guide/2.0/en/start-installation

3. Run the command "composer update" in the project root directory (var/www/advanced/OIPS)

4. Palaist komandu "php init" sistēmas root direktorijā

5. Izveidot symlinku no OIPS->advanced->backend->web->uploads uz OIPS->advanced->frontend->web

6. palaist komandu "composer require --prefer-dist yiisoft/yii2-jui" sistēmas root direktorijā

<b> 7. palaist komandu "php yii migrate" </b>
