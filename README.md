<h2>The system uses:</h2>

<ul>
<li><b>Ubuntu 20_04</b></li>

<li><b>Apache2</b></li>

<li><b>Mysql 8</b></li>

<li><b>PHP 7.4</b></li>
</ul>

  1. Download git repository from: https://github.com/JurisSurums/OIPS and place it in the web root directory (var/www/)
        
2. Create a virtual host .conf file (books.conf) in etc/apache2/sites-available and add 2 hosts the "host" file under /etc after that run the command <b><i>a2ensite</i></b> and restart apache2 with the command <b><i>sudo systemctl restart apache2</i></b>

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

4. Run the command "php init" in the project root directory (var/www/advanced/OIPS)

5. Create a Symlink <b>from</b> OIPS->advanced->backend->web->uploads <b>to</b> OIPS->advanced->frontend->web

6. Run the command "composer require --prefer-dist yiisoft/yii2-jui" in the project root directory (var/www/advanced/OIPS)

7. Create database and user (also should add user privlages):
https://docs.bitnami.com/ibm/infrastructure/mysql/configuration/create-database/

8. setup Database config under OIPS/advanced//common/config/main-local.php in 'components' => 'db' change to created db and user

9. Run the command "php yii migrate" in the project root directory (var/www/advanced/OIPS)
