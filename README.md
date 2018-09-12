# azure-linux-wordpress-local

This image allows for you to add your WordPress content in the `app` folder and run locally on the Worker for Azure Web Apps for Containers.

This images is using parent Azure App Services [parent image](https://hub.docker.com/r/appsvcorg/wordpress-alpine-php/).

# Please note. This is for testing and proof of concept and should be used as 

## Components
This docker image currently contains the following components:

1. WordPress
2. Nginx(1.14.0)
3. PHP (7.2.8)
4. MariaDB ( 10.1.32/if using Local Database )
5. Phpmyadmin ( 4.8.0/if using Local Database )

## How to configure to use Azure Database for MySQL with web app 
1. Create a Web App for Containers
2. Add new App Settings for your Azure Database for MySQL credentials

Name | Value
---- | -------------
DATABASE_HOST | database.mysql.database.azure.com
DATABASE_NAME | azurewpdb
DATABASE_USERNAME | username@database
DATABASE_PASSWORD | some-string

## How to configure to use Local Database with web app 
For testing only as data will not persist.
1. Create a Web App for Containers 
2. Add new App Settings 

Name | Default Value
---- | -------------
DATABASE_TYPE | local
DATABASE_USERNAME | wordpress
DATABASE_PASSWORD | some-string

>Note: We create a database "azurelocaldb" when using local mysql . Hence use this name when setting up the app

3. Browse your site 
4. Complete WordPress install

>Note: Do not use the app setting DATABASE_TYPE=local if using Azure database for MySQL

## How to turn on Xdebug
1. By default Xdebug is turned off as turning it on impacts performance.
2. Connect by SSH.
3. Go to ```/usr/local/etc/php/conf.d```,  Update ```xdebug.ini``` as wish, don't modify the path of below line.
```zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20170718/xdebug.so```
4. Save ```xdebug.ini```, 
5. Restart php-fpm by below cmd: 
```
# find gid of php-fpm
ps aux
# Kill master process of php-fpm
kill -INT <gid>
# start php-fpm again
php-fpm -D
```
5. Xdebug is turned on.

## Updating WordPress version , themes , files
Recommend you DO NOT update the WordPress core version, themes or files from WordPress Admin Dashboard as data will not persist.
Update `app` folder with your latest files and rebuild image.

## Connect WordPress to Redis
1. Log-in to WordPress admin. In the left navigation, select **Plugins**, and then select **Add New**.
2. Search **Redis Object Cache**, Click **Install**, wait, then click **Activate**.
3. In the left navigation, select **Plugins**, and then select **Installed Plugins**.
4. In the plugins page, find **Redis Object Cache** and click **Settings**.
5. Click the **Enable Object Cache** button.
6. WordPress connects to the Redis server. The connection status appears on the same page.
7. [More infomation about **Redis Object Cache**](https://wordpress.org/plugins/redis-cache)

## Limitations
- Some unexpected issues may happen after you scale out your site to multiple instances, if you deploy a WordPress site on Azure with this docker image and use the MariaDB built in this docker image as the database.
- The phpMyAdmin built in this docker image is available only when you use the MariaDB built in this docker image as the database.
