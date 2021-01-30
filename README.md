The system uses:
Ubuntu 20_04
apache2
Mysql 8
PHP 7.4

1. Download this git repository from: https://github.com/JurisSurums/OIPS and place it in the web root directory (var/www/)
2. Create a virtual host .conf file (books.conf) in etc/apache2/sites-available:
<b>
<VirtualHost *:80>
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
</b>
Then run the command a2ensite
    
3. pie hosts attiecīgi izveidot divus ierakstus hipersaitei. (manā piemērā tas būtu 127.0.0.1	OIPS.ork
un
127.0.0.1	dev.OIPS.ork)
4. Restartēt apache
5. Palaist "composer update" sistēmas root direktorijā
6. Palaist komandu "php init" sistēmas root direktorijā
7. Izveidot symlinku no OIPS->advanced->backend->web->uploads uz OIPS->advanced->frontend->web
8. palaist komandu "composer require --prefer-dist yiisoft/yii2-jui" sistēmas root direktorijā
9. palaist komandu "php yii migrate"
