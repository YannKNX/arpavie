# Arpavie – Drupal 8

## Webserver
    - Apache 2.x 
    - The Apache 'mod_rewrite' extension is required
    - The Apache Virtualhost configuration must contain the directive AllowOverride All to allow Drupal's .htaccess file to be used.
    -  PHP > PHP 5.4.0

    - enable php extension php-gd  http://www.php.net/gd
    - enbable php XML extension http://www.php.net/manual/en/ref.xml.php

    - install drush (http://docs.drush.org/en/master/install/)
        - Command lines :
            `php -r "readfile('https://s3.amazonaws.com/files.drush.org/drush.phar');" > drush`
            `php drush core-status`
            `chmod +x drush`
            `sudo mv drush /usr/local/bin`
            `drush init`


## Database
    - create database "arpavie_rec"
    - dump database from scripts/sql/arpavie.sql

## Application Drupal8
    - git clone  git https://github.com/kernix/arpavie.git
    - composer install
    - mkdir sites/default/files
    - cd sites/default
    - cp default.settings.php settings.php
    - configuration sites/default/settings.php
        - Set the variable 
$settings['hash_salt'] = 'U-7M9jqUni2HgudgEwhI0MYJDz0DXsyEQVD6jOuVaWRI3nN-LC0M1WDjKFPymvB5M3a9AR2FOA'
;       - Add following lines to the end of the file and set your password for the database: 
            $databases['default']['default'] = array (
                'database' => 'arpavie_dev', // arpavie_rec pour la recette !!
                'username' => 'root',
                'password' => 'yourPassword',
                'prefix' => '',
                'host' => 'localhost',
                'port' => '3306',
                'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
                'driver' => 'mysql',
                 );

                $settings['install_profile'] = 'standard';
                
## Permission Check
    - sets the sites/default/files directory to 755 [drwx-rw-rw] (chmod 755 sites/default/files )
    - chmod 555 sites/default
    - chmod 444 sites/default/settings.php 
