# Project Lucy

Project Lucy is a free open-source augmentative alternative communication application aimed at making communication possible for non-verbal users.

## Installation

Several languages and software packages need to be installed to run Project Lucy:

- [PHP 8](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/)
- [sqlite3](https://sqlite.org/index.html)
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
php artisan serve --port=8080
```

...and you should be able to visit the website at `http://localhost:8080` and start coding.

## Contributing

To track your feature's changes on a separate Git branch, run the following:

```bash
git checkout -b my-feature-branch
```

Then, once your changes are committed and ready, push the branch up to the repository:

```bash
git push origin my-feature-branch
```

Then make a new pull request in GitHub. You can do this by going to the `Pull requests` tab, clicking `New pull request`, and then setting your feature branch as the `compare` branch. Once your pull request is created, post a link in the `#pull-requests` room of the Discord. Once another teammate has pulled and verified your changes, you're good to merge!

## Contributors

- Eloisa Burton
- Mehar Mangat
- Elizabeth Schuon
- Noah Snelson
- Elvis Vong
