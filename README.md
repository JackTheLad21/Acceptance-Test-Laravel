<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Laravel skeleton

A template by Heply for Laravel projects

## Requirements

In order to work with **Laravel** you need at least:

-   PHP 7.3+ 
-   Composer
-   Docker

```bash
brew install composer
brew cask install docker
```

In order to be able to use `sail` instead of `vendor/bin/sail` you can add an
alias inside your shell resource file (eg. `~/.bashrc` or `~/.zshrc`):

```bash
alias sail='bash vendor/bin/sail'
```

## Getting started

First of all, create a local environment file from the `.env.example` template:

```bash
cp .env.example .env
```

Then, you can edit the configuration for your project:

```bash
APP_NAME="Laravel_Skeleton"
APP_URL="http://laravel-skeleton.test"

# ...

# WARNING: don't use "root" user here!
DB_USERNAME="laravel"
DB_PASSWORD="laravel"
```

**NOTE:** you don't have to use double-quotes (e.g. `"`) to wrap string values
unless it actually contains white spaces.

When the configuration has been set, you can launch the fully development
environment with:

```bash
# Install all dependencies
composer update

# Launch all required systems and wire them together (using Docker)
sail up

# Generate a project secret key (it will edit the .env file)
sail artisan key:generate

# Apply all database migrations
sail artisan migrate:fresh --seed
```

**EXTRA NOTES FOR SAIL**

You can use the sail's `-d` option to demonize the docker environment.

You can use `sail down -v` to delete completely the containers and the volumes:

## Development workflow

After the first set up of the project, you don't need to execute all the above
commands again unless you make a fresh clone of the repository.

Having all the dependencies in place, you can simply keep the development
environment up-to-date using:

```bash
sail up
sail composer update
sail artisan migrate
```

## Learning Laravel

You can learn **Laravel** with the following great resources:

-   [Official documentation](https://laravel.com/docs)
-   [Laracasts](https://laracasts.com)

## Copyright

© 2021 Heply s.r.l. - All rights reserved
# Acceptance-Test-Laravel
