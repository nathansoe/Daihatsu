FROM webdevops/php-nginx:8.2

ENV WEB_DOCUMENT_ROOT=/app/public
ENV NVM_DIR /root/.nvm

RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs

WORKDIR /app

COPY ./ /app
RUN npm install
RUN npm run build
RUN composer install
RUN php artisan storage:link
RUN chown -R 1000:1000 /app/bootstrap/cache