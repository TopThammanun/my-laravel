FROM nginx:alpine AS build
RUN mkdir -p /var/www/laravel/public
COPY ./public /var/www/laravel/public
WORKDIR /var/www/laravel/public
RUN rm -f *.php

FROM nginx:alpine
RUN mkdir -p /var/www/laravel/public
COPY docker/nginx/root /
COPY --from=build /var/www/laravel/public /var/www/laravel/public