FROM php
WORKDIR /home

COPY . .

#composer install
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
RUN composer install

# RUN docker-php-ext-install pdo pdo_mysql
#env
RUN mv .env.example .env
RUN mv .env.example.testing .env.testing

#laravel
RUN php artisan key:generate
RUN php artisan config:clear
