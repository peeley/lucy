# Project Lucy

Project Lucy is a free open-source augmentative alternative communication application aimed at making communication possible for non-verbal users.

## Development

The only dependency that needs to be locally installed for development is [Docker](https://www.docker.com/get-started). After installing Docker, you'll need to change permissions on some files that Docker writes to:
```bash
chmod -R 777 storage/
```

Then, copy the environment variables over to the `.env` file:
```bash
cp .env.example .env
```

Then start Docker, create an ecryption key, and create the database:
```bash
docker-compose up -d
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate:fresh
```

...and you should be able to visit the website at `http://localhost:8080` and start coding. If you're working on the frontend, you'll need to run the JS compiler to see any changes. You can do that like so:
```bash
docker-compose exec app npm run watch
```

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
