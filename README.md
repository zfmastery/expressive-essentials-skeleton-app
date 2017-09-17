# Expressive Essentials Skeleton App

This repository holds the source of a version of the Expressive app for [the Zend Expressive Essentials book](https://www.masterzendframework.com/zend-expressive-essentials/), one built using the Skeleton Installer.

## Prerequisites

There are two prerequisites for this project:

- [Git](https://git-scm.com), as you need to clone the source.
- [Docker](https://docs.docker.com/engine/installation/#supported-platforms), as that provides a complete runtime environment for running the code.

## Installation

To install it, clone the source as follows:

```console
git clone git@github.com:zfmastery/expressive-essentials-skeleton-app.git expressive-essentials-skeleton-app
```

## Running the Application

Running the application, currently, requires Docker.
If you've never used Docker before, [you need to install it](https://docs.docker.com/engine/installation/#supported-platforms).
The Docker website has plenty of instructions about doing so, no matter if you're on *Windows*, *macOS*, or *Linux*.
After you've installed Docker, from the terminal, in the top-level directory of the cloned source, run the following command:

```console
docker-compose up -d --build
```

The first time that the command runs takes a few minutes, depending on your internet connection speed, as the Docker images need to download before they can start.
Anytime after that, the build happens very quickly.
Either way, you should see output similar to the following:

```console
Building web
Step 1/7 : FROM php:7.0-apache
 ---> 23f9c84560a6
Step 2/7 : WORKDIR /var/www/html
 ---> Using cache
 ---> 6fd5d5375996
Step 3/7 : COPY ./ /var/www/html/
 ---> Using cache
 ---> 3877cacacfee
Step 4/7 : COPY ./files/default.conf /etc/apache2/sites-enabled/000-default.conf
 ---> Using cache
 ---> 750ea07a8e22
Step 5/7 : EXPOSE 80
 ---> Using cache
 ---> f65a205369cf
Step 6/7 : RUN a2enmod -q rewrite
 ---> Using cache
 ---> 92c76f431daf
Step 7/7 : RUN docker-php-ext-install pdo_mysql     && docker-php-ext-install json
 ---> Using cache
 ---> f2d98d7927f8
Successfully built f2d98d7927f8
Successfully tagged iterationfive_web:latest
Starting iterationfive_web_1 ...
Starting iterationfive_web_1
Starting iterationfive_mysql_1 ...
Starting iterationfive_web_1 ... done
```

To confirm that the containers are running properly, run `docker-compose ps`.
This command, like the Linux `ps` command, shows you information about the running containers.
If everything is working properly, it should look like the following output.

```console
        Name                       Command               State          Ports
-------------------------------------------------------------------------------------
iterationfive_mysql_1   docker-entrypoint.sh mysqld      Up      3306/tcp
iterationfive_web_1     docker-php-entrypoint apac ...   Up      0.0.0.0:8080->80/tcp
```

In the "**State**" column, you can see that both containers are marked as "**Up**", meaning that they're both running.
In the "**Ports**" column, you can see that the NGINX container is available on the local machine on port 8080.
If you now open `http://localhost:8080` in your web browser of choice, it should look similar to the image below.

![The default route of the application](./docs/images/screenshots/default-route.png)

If you want to know more about Docker, here are some excellent resources:

- [How To Build a Local Development Environment Using Docker](https://www.masterzendframework.com/docker-development-environment/)
- [Shipping Docker](https://serversforhackers.com/shipping-docker)
- [Docker for Developers](https://leanpub.com/dockerfordevs)

## Found a Bug?

If you find a bug in the code, please [create a new issue](https://github.com/zfmastery/expressive-essentials-skeleton-app-manual-build/issues/new), describing what the problem is, and how you discovered it.
I'll do my best to respond to it, as well as to correct it, as quickly as possible.

## Authors

- [Matthew Setter](https://matthewsetter.com) - [settermjd](https://twitter.com/@settermjd)

## License

This project is licensed under the MIT License - see [the LICENSE.md](LICENSE.md) file for details.
