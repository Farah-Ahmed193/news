# استخدام صورة PHP مع Apache
FROM php:7.4-apache

# تثبيت الحزم المطلوبة لـ SQLite
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    && docker-php-ext-install pdo_sqlite

# تعطيل open_basedir
RUN echo "php_admin_value open_basedir none" >> /etc/apache2/conf-available/docker-php.conf

# تمكين ملف الإعدادات الجديد في Apache
RUN a2enconf docker-php

# نسخ ملفات التطبيق إلى مجلد الويب داخل الحاوية
COPY ./src/ /var/www/html/

# إعطاء أذونات للكتابة في مجلد /tmp
RUN chmod -R 777 /tmp

# إعدادات Apache
EXPOSE 80
