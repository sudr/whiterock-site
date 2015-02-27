#!/usr/bin/env bash

apt-get update
apt-get install -y apache2 vim php5 php5-cli php5-mysql
if ! [ -L /var/www/html ]; then
    rm -rf /var/www/html
    ln -fs /mnt/site /var/www/html
fi

if ! [ -L /usr/local/bin/composer]; then
	ln -s /vagrant/composer.phar /usr/local/bin/composer
fi

/usr/local/bin/composer global require "laravel/installer=~1.1"

php5enmod mcrypt
