# Use the official WordPress image as a parent image
FROM wordpress:6.4.3

COPY ./uploads/ /var/www/html/wp-content/uploads/

# Install system dependencies for Composer
RUN apt-get update && apt-get install -y \
    git \
    unzip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
