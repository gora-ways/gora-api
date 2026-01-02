FROM bitnamilegacy/laravel:12.1.0
WORKDIR /app

# Copy application code
COPY . .

# php.ini override
COPY php.ini /opt/bitnami/php/etc/conf.d/php.ini

USER root

# ✅ Install PostgreSQL PHP extensions + Supervisor

RUN install_packages supervisor postgresql-client libpq5 libpq-dev \
    && mkdir -p /etc/supervisor/conf.d \
    && mkdir -p /var/log/supervisor \
    && echo "extension=pdo_pgsql" > /opt/bitnami/php/etc/conf.d/pdo_pgsql.ini \
    && echo "extension=pgsql" > /opt/bitnami/php/etc/conf.d/pgsql.ini

# Copy Supervisor configuration (you will create this file next)
COPY supervisord.conf /etc/supervisor/supervisord.conf
COPY laravel-worker.conf /etc/supervisor/conf.d/laravel-worker.conf
COPY laravel-scheduler.conf /etc/supervisor/conf.d/laravel-scheduler.conf

# Copy Docker entrypoint
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh \
    && chown 1001:1001 /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
# Bitnami's default CMD will still be invoked by the script
