# Dockerfile

FROM php:8.3-fpm

# Instala dependências básicas
RUN apt-get update && apt-get install -y \
    unzip zip curl git libzip-dev libpq-dev \
    && docker-php-ext-install zip pdo_pgsql pgsql
# or for mysql     && docker-php-ext-install zip pdo pdo_mysql

# Instala dependências e Xdebug
RUN apt-get install -y unzip \
    && pecl install xdebug

# Habilita exibição de erros (opcional)
RUN echo "display_errors=On" >> /usr/local/etc/php/conf.d/docker-php.ini \
    && echo "error_reporting=E_ALL" >> /usr/local/etc/php/conf.d/docker-php.ini

# Cria arquivo de configuração do Xdebug
RUN echo "zend_extension=xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.discover_client_host=0" >> /usr/local/etc/php/conf.d/xdebug.ini    

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Cria o mesmo usuário e grupo do host (garante permissões corretas)
ARG UID=1000
ARG GID=1000
RUN groupadd -g ${GID} appuser && \
    useradd -u ${UID} -g ${GID} -m appuser

# Define o usuário padrão para evitar problemas de permissão
USER appuser

# Entrypoint opcional se quiser garantir permissão automática
COPY entrypoint.sh /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]
CMD ["php-fpm"]
