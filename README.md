# Project Lucy

Project Lucy is a free open-source augmentative alternative communication application aimed at making communication possible for non-verbal users.

## Installation

Several languages and software packages need to be installed to run Project Lucy:

- [PHP 8](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/)
- [Sqlite 3](https://sqlite.org/index.html)
- [NodeJS](https://nodejs.org/en/)

## Development

A few things are required to set up Lucy for development. First, clone this repository:

```bash
git clone git@github.com:peeley/lucy
cd lucy
```

Then, install the required PHP and JavaScript libraries using Composer and NPM:

```bash
composer install && npm install
```

Next, we need to copy over configs and generate the application encryption keys:

```bash
cp .env.example .env
php artisan key:generate
```

Then, run the server:

```bash
php artisan serve --port = 8080
```

...and you should be able to visit the website at `http://localhost:8080` and start coding.

## Contributors

- Eloisa Burton
- Mehar Mangat
- Elizabeth Schuon
- Noah Snelson
- Elvis Vong
