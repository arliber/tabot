#URL
localhost

#Logs
/var/log/apache2/error.log
logs.log

#TODO
1) Add PHPDoc documentation lines to methods and stuff

#Facebook related stuff
https://developers.facebook.com/docs/messenger-platform/quickstart
https://www.facebook.com/tabotapp/
https://developers.facebook.com/apps/1054507434620690/webhooks/

#FAQ

1) .htaccess issues?
    1) Put it in the root /var/www/
    2) nano  /etc/apache2/apache2.conf
    Change the <Directory> directive pointing to your public web pages, where the htaccess file resides. Change from AllowOverride None to AllowOverride All
        <Directory /var/www/>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
        </Directory>
2) Restart apache
    sudo service apache2 restart      
3) Bot not getting messages from FB?
    Go to https://developers.facebook.com/apps/1054507434620690/messenger/ and make sure that under 'Webooks' the correct page is selected
4) Install/Reinstall LAMP
    https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu
    Remove existing: sudo apt-get purge apache2
5) Change document root
    Go to /etc/apache2/sites-enabled
    sudo nano 000-default.conf
    Update the path to the root folder & save