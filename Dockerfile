FROM php:7.4-apache
ARG uid=1000
RUN useradd -G www-data,root -u $uid -d /home/testuser testuser
RUN mkdir -p /home/testuser/.composer && \
    chown -R testuser:testuser /home/testuser
RUN apt-get update --fix-missing -q
RUN apt-get install -y curl mcrypt gnupg build-essential software-properties-common wget vim zip unzip
RUN docker-php-ext-install pdo pdo_mysql
ENV NVM_VERSION v0.33.11
ENV NODE_VERSION v7.5.0
ENV NVM_DIR /home/testuser/nvm
RUN mkdir $NVM_DIR
RUN curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.11/install.sh | bash

ENV NODE_PATH $NVM_DIR/v$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

RUN echo "source $NVM_DIR/nvm.sh && \
    nvm install $NODE_VERSION && \
     nvm install --lts --latest-npm" | bash
RUN ln -sf $NVM_DIR/versions/node/v$NODE_VERSION/bin/node /usr/bin/nodejs
RUN ln -sf $NVM_DIR/versions/node/v$NODE_VERSION/bin/npm /usr/bin/npm

RUN curl -sSL https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public/
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_RUN_DIR /var/run/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2/apache2.pid
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN a2enmod rewrite
COPY . /var/www/html/
CMD ["/usr/sbin/apache2", "-DFOREGROUND"]
