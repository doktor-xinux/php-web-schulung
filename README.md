# PHP Web Training

## Description
This project is a training environment for PHP web development. It includes example code, exercises, and a simple web application to demonstrate various PHP programming concepts. The project is intentionally kept simple to focus on the core principles.

## Requirements
- PHP (minimum version 7.4)
- Web server (Apache or Nginx recommended)
- MySQL or MariaDB (optional, if a database is used)
- Git for version control

## Installation

### Clone the repository
```sh
git clone git@github.com:doktor-xinux/php-web-schulung.git
cd php-web-schulung
```

### Set up the web server
If using Apache, the configuration may look like this:
```sh
<VirtualHost *:80>
    DocumentRoot "/path/to/project-folder"
    <Directory "/path/to/project-folder">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

### Install PHP dependencies
If using Composer:
```sh
composer install
```

## Usage
1. Start the web server.
2. Open the website in a browser at `http://localhost`.
3. Modify the files and test changes live.

## Contribution
Pull requests are welcome. Please open an issue for major changes.

## License
This project is licensed under the MIT License.

# php-web-schulung
