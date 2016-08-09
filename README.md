![alt text](https://github.com/LeonLiber/tabot/blob/master/app-screenshot.png "Tabot")

# Setup guide

- Clone the repo: `git clone https://github.com/LeonLiber/tabot.git <folder name>`

- Run `php composer.phar install`

- Open `localhost/<folder name>` in you're browser

- Goto `https://developers.facebook.com/docs/messenger-platform/quickstart` and setup you're bot

  Tip: Don't forget to add 'Webhooks' product

- Use localtunnel to get a static URL by typing `lt --port 80`

#Logs
/var/log/apache2/error.log

logs.log

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

    Go to https://developers.facebook.com/apps/XXXXXX/messenger/ and make sure that under 'Webooks' the correct page is selected

4) Install/Reinstall LAMP

    https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu

    Remove existing: sudo apt-get purge apache2

5) Change document root

    Go to /etc/apache2/sites-enabled

    sudo nano 000-default.conf

    Update the path to the root folder & save

6) Where is my bot app & page?

   https://developers.facebook.com/

#Heorku deployment

1) To get the DB host, run `heroku config --app tabot` and take part of the `CLEARDB_DATABASE_URL` as the base URL

2) `heroku logs -a tabot -t`

3) SSH to dyno: `heroku run bash -a tabot`


#Database

`--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `userId` text COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=74 ;`
