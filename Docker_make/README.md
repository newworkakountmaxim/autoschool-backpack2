# Janado(Laravel 5.5/php 7.0.27)
version 0.1.1

## Run app

```
make start;
```
And run migration after container start
```
make refresh;
```

## Code Style

PhpStorm Settings : Open your Settings (Ctrl + Alt + S) and go to Editor > Code Style section.
Click on the Scheme wrench on the right and select Import Scheme > Intellij IDEA code style XML.
Chose /config/codestyles/Laravel.xml

## Docker

All useful commands to work with docker listed in makefile

## Mysql

- Port: 3306
- Login: root
- Password: 123321
- DB: forge

## Features

- Swagger
- REST response spec http://jsonapi.org/format/
- Image resize http://image.intervention.io/
- Sockets Ratchet http://socketo.me/
- Link preview https://github.com/dusterio/link-preview
- Social Auth https://github.com/laravel/socialite
- Tokens https://github.com/tymondesigns/jwt-auth
- Supervisor http://supervisord.org/
- Queues with priority and processed jobs log in db
- Debugbar
- Mailhog https://hub.docker.com/r/mailhog/mailhog/
- Carbon https://carbon.nesbot.com/#gettingstarted
- Stringy https://packagist.org/packages/danielstjules/stringy

## Tests

To run type:
```
make test;
```

- In memory database tests
- Mails sends to log file
- Code coverage report "storage/test-report"
