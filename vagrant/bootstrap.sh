#!/usr/bin/env bash

apt-get update
apt-get install -y apache2 vim php5 php5-cli php5-mysql php5-mcrypt

sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password password'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password password'
sudo apt-get install -y mysql-server 2> /dev/null
sudo apt-get install -y mysql-client 2> /dev/null

if [ ! -f /var/log/dbinstalled ];
then
    echo "CREATE USER 'mysqluser'@'localhost' IDENTIFIED BY 'password'" | mysql -uroot -ppassword
    echo "CREATE DATABASE whiterock" | mysql -uroot -ppassword
    echo "CREATE DATABASE internal" | mysql -uroot -ppassword
    echo "CREATE DATABASE helloworld" | mysql -uroot -ppassword
    echo "CREATE DATABASE admin_app" | mysql -uroot -ppassword
    echo "GRANT ALL ON internal.* TO 'mysqluser'@'localhost'" | mysql -uroot -ppassword
    echo "flush privileges" | mysql -uroot -ppassword
    touch /var/log/dbinstalled
    if [ -f /mnt/data/initial.sql ];
    then
        mysql -uroot -ppassword internal < /mnt/data/initial.sql
    fi
fi

if ! [ -L /var/www/html ]; then
    rm -rf /var/www/html
    ln -fs /mnt/site /var/www/html
fi

if ! [ -L /usr/local/bin/composer ]; then
	ln -s /vagrant/composer.phar /usr/local/bin/composer
fi

su vagrant -c '/usr/local/bin/composer global require "laravel/installer=~1.1"'
su vagrant -c '/usr/local/bin/composer global require "facebook/php-sdk-v4=~4.0"'

php5enmod mcrypt

su vagrant -c '/usr/bin/php /mnt/site/helloworld/artisan migrate'
su vagrant -c '/usr/bin/php /mnt/site/app/artisan migrate'

cp /vagrant/htaccess.conf /etc/apache2/conf-available/
a2enconf htaccess
a2enmod rewrite

service apache2 restart
