# Utiliser une image officielle PHP avec Apache
FROM php:8.2-apache

# Installer les extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    curl \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le dossier de travail
WORKDIR /var/www

# Copier les fichiers Laravel
COPY . .

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader --no-progress --no-suggest

# Définir les permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Activer le module rewrite d'Apache
RUN a2enmod rewrite

# Copier la configuration Apache
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Exposer le port HTTP
EXPOSE 80

# Démarrer Apache en premier plan
CMD ["apache2-foreground"]
