FROM alpine:3.22

ARG DB_ROOT_PASSWORD
ARG DB_DATABASE
ARG DB_USERNAME
ARG DB_PASSWORD

RUN apk add --no-cache mariadb mariadb-client \
    && install -d -o mysql -g mysql /run/mysqld \
    && mariadb-install-db --user=mysql --datadir=/var/lib/mysql --skip-test-db \
    && printf '%s\n' \
        "DELETE FROM mysql.global_priv WHERE User = '';" \
        "FLUSH PRIVILEGES;" \
        "ALTER USER 'root'@'localhost' IDENTIFIED BY '${DB_ROOT_PASSWORD}';" \
        "CREATE DATABASE IF NOT EXISTS \`${DB_DATABASE}\`;" \
        "CREATE USER IF NOT EXISTS '${DB_USERNAME}'@'%' IDENTIFIED BY '${DB_PASSWORD}';" \
        "GRANT ALL PRIVILEGES ON \`${DB_DATABASE}\`.* TO '${DB_USERNAME}'@'%';" \
        > /etc/my.cnf.d/init.sql

VOLUME /var/lib/mysql
EXPOSE 3306

CMD ["mariadbd", "--user=mysql", "--skip-networking=0", "--bind-address=0.0.0.0", "--init-file=/etc/my.cnf.d/init.sql", "--character-set-server=utf8mb4", "--collation-server=utf8mb4_unicode_ci"]
