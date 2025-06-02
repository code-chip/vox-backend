# Vox Backend
<div align="center">
<h3><a href="https://gitlab.com/voxtecnologia/quadro-societario">Challenge - Corporate Structure</a></h3>
</div>

## 🧭 Overview

This project was developed and tested only in the Linux environment.   
The project is a Backend application with:

- Backend: Symfony 7.3 with PHP 8.3.
- Database: PostreSQL 15 with tables for company, partner and user.
- Docker: Containers for Symfony, NGINX and database with networking for inter-container communication.

<p align="center"><a href="https://symfony.com" target="_blank">
    <img src="https://symfony.com/logos/symfony_dynamic_01.svg" alt="Symfony Logo">
</a></p>

[Symfony][1] is a **PHP framework** for web and console applications and a set
of reusable **PHP components**. Symfony is used by thousands of web
applications and most of the [popular PHP projects][2].

## 📚 Table of Contents

- ⚙️ [Services](#services)
- ✅ [Requirements](#requirements)
- 🧰 [Installation and execution with a single command](#installation-and-execution-with-a-single-command)
- 📝 [How to Use](#how-to-use)
- 💻 [Available development commands](#available-development-commands)
- 🌐 [Access broswer](#access-broswer)
- 📘 [API Documentation Project](#-api-documentation-project)
- 🐳 [Access information for Docker](#access-information-for-docker)
- 🤝 [Sponsor Symfony](#sponsor-symfony)
- 📖 [Documentation Symfony](#documentation-symfony)
- 🌍 [Community Symfony](#community-symfony)
- 🧑‍💻 [Contributing Symfony](#contributing-symfony)
- 🔐 [Security Issues Symfony](#security-issues-symfony)
- 👥 [About Us Symfony](#about-us-symfony)
- 🚀 [API Platform](#api-platform)
- 🛠️ [Getting Started API Platform](#getting-started-api-platform)
- 🏅 [Credits API Platform](#credits-api-platform)

## ⚙️ Services
PHP 8.3  
PostgreSQL 15  
NGINX    

## ✅ Requirements

- **Docker** 20.10.12+
- **Docker Compose** 1.25+
- **GIT** 2.25.1+

## 🧰 Installation and execution with a single command

```bash
git clone git@github.com:code-chip/vox-backend.git vox-codechip && \
cd vox-codechip && \
bin/dev build && \
bin/dev up -d && \
echo "⏳ Waiting for the backend to start..." && \
until [ -f vendor/autoload.php ]; do
  echo "⏳ Waiting for autoload to be generated..."
  sleep 2
done && \
echo "✅ Backend ready, executing commands..." && \
bin/dev console -T php sh -c "mkdir -p config/jwt && \
openssl genrsa -out config/jwt/private.pem 4096 && \
openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem && \
chmod 600 config/jwt/private.pem"
bin/dev console -T php sh -c "bin/console doctrine:migrations:migrate && bin/console hautelook:fixtures:load"
```

## 📝 How to Use
1- Download the shellscript run command `git clone git@github.com:code-chip/vox-backend.git vox-codechip`  
2- Access the fold with `cd vox-codechip`  
3- Fill in the values ​​of the environment variables in the .docker/.env file. It is important to fill in the correct values ​​of MY_UID and GID, to confirm your user id in Linux run the id command, the terminal should display something close to this:  
```bash
uid=1000(will) gid=1000(will) grupos=1000(will),4(adm),24(cdrom),27(sudo),30(dip),33(www-data),46(plugdev),100(users),105(lpadmin),125(sambashare),127(docker)
```
4- Run the command `bin/dev build` or `docker-compose build`.  
5- Start services `bin/dev up` or `docker-compose up -d`.  
6- Generate JWT private and public key:
```bash
bin/dev console php
mkdir -p config/jwt
openssl genrsa -out config/jwt/private.pem 4096
openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
```
Inside the container, give the appropriate permissions to the files::  
```bash
chmod 600 config/jwt/private.pem
```
7- Run database migrations and fixtures, Access the php container bash:
```bash
bin/dev console php
bin/console doctrine:migrations:migrate
bin/console hautelook:fixtures:load
```

## 💻 Available development commands
* `bin/dev build` will force (re)building the docker-compose stack.
* `bin/dev rebuild` will update the base docker images, build the docker-compose stack, stop the running containers and restart with the freshly built images.
* `bin/dev up`/`bin/dev start` or `bin/dev up <service>` will start the docker-compose stack.
* `bin/dev status` will print the current status of the docker-compose stack.
* `bin/dev restart` will restart the docker-compose stack.
* `bin/dev logs <service>` will print the logs for the given container.
* `bin/dev console <service>` will start a bash console inside the `app(laravel), nginx, mysql or composer` container.
* `bin/dev stop` or `bin/dev stop <service>` will stop all running docker-compose stack containers or specify just one.
* `bin/dev down` or `bin/dev down <service>` will stop and remove all docker-compose stack containers or specify just one.
* `bin/dev exec --args` will start a bash console inside the `app(laravel), nginx, mysql or composer` container.

## 🌐 Access broswer
Symfony application [http:localhost:8000](http:localhost:8000)  

## 📘 API Documentation Project
Acesse a documentação da API em:  
[http://localhost:8000/api/docs](http://localhost:8000/api/docs)  
ReDoc:  
[http://localhost:8000/api/docs?ui=re_doc](http://localhost:8000/api/docs?ui=re_doc)  

## 🐳 Access information for Docker

| Service Name | Container Name                               |
|--------------|----------------------------------------------|
| `php`        | vox_backend                                  |
| `nginx`      | vox_nginx                                    |
| `postgres`   | vox_database                                 |


🤝 Sponsor Symfony
-------

Symfony 7.3 is [backed][27] by
- [Sulu][29]
- [Rector][30]

**Sulu** is the CMS for Symfony developers. It provides pre-built content-management
features while giving developers the freedom to build, deploy, and maintain custom
solutions using full-stack Symfony. Sulu is ideal for creating complex websites,
integrating external tools, and building custom-built solutions.

**Rector** helps successful and growing companies to get the most of the code
they already have. Including upgrading to the latest Symfony LTS. They deliver
automated refactoring, reduce maintenance costs, speed up feature delivery, and
transform legacy code into a strategic asset. They can handle the dirty work,
so you can focus on the features.

Help Symfony by [sponsoring][28] its development!

📖 Documentation Symfony
-------------

* Read the [Getting Started guide][7] if you are new to Symfony.
* Try the [Symfony Demo application][23] to learn Symfony in practice.
* Discover Symfony ecosystem in detail with [Symfony The Fast Track][26].
* Master Symfony with the [Guides and Tutorials][8], the [Components docs][9]
  and the [Best Practices][10] reference.

🌍 Community Symfony
---------

* [Join the Symfony Community][11] and meet other members at the [Symfony events][12].
* [Get Symfony support][13] on GitHub Discussions, Slack, etc.
* Follow us on [GitHub][14], [Twitter][15] and [Facebook][16].
* Read our [Code of Conduct][24] and meet the [CARE Team][25].

🧑‍💻 Contributing Symfony
------------

Symfony is an Open Source, community-driven project with thousands of
[contributors][19]. Join them [contributing code][17] or [contributing documentation][18].

🔐 Security Issues Symfony
---------------

If you discover a security vulnerability within Symfony, please follow our
[disclosure procedure][20].

👥 About Us Symfony
--------

Symfony development is led by the [Symfony Core Team][22]
and supported by [Symfony contributors][19].

[1]: https://symfony.com
[2]: https://symfony.com/projects
[3]: https://symfony.com/doc/current/reference/requirements.html
[4]: https://symfony.com/doc/current/setup.html
[5]: https://semver.org
[6]: https://symfony.com/doc/current/contributing/community/releases.html
[7]: https://symfony.com/doc/current/page_creation.html
[8]: https://symfony.com/doc/current/index.html
[9]: https://symfony.com/doc/current/components/index.html
[10]: https://symfony.com/doc/current/best_practices/index.html
[11]: https://symfony.com/community
[12]: https://symfony.com/events/
[13]: https://symfony.com/support
[14]: https://github.com/symfony
[15]: https://twitter.com/symfony
[16]: https://www.facebook.com/SymfonyFramework/
[17]: https://symfony.com/doc/current/contributing/code/index.html
[18]: https://symfony.com/doc/current/contributing/documentation/index.html
[19]: https://symfony.com/contributors
[20]: https://symfony.com/security
[22]: https://symfony.com/doc/current/contributing/code/core_team.html
[23]: https://github.com/symfony/symfony-demo
[24]: https://symfony.com/coc
[25]: https://symfony.com/doc/current/contributing/code_of_conduct/care_team.html
[26]: https://symfony.com/book
[27]: https://symfony.com/backers
[28]: https://symfony.com/sponsor
[29]: https://sulu.io
[30]: https://getrector.com
[31]: https://gitlab.com/voxtecnologia/quadro-societario

## 🚀 API Platform

<p align="center"><img src="https://camo.githubusercontent.com/1dda7b42ea0e6ac854a4879763d1cd36c10d37168abbf268b2425b67f68c4520/68747470733a2f2f6170692d706c6174666f726d2e636f6d2f696d616765732f6c6f676f732f4c6f676f5f436972636c65253230776562627925323074657874253230626c75652e706e67" width="250" height="250" alt="API Platform"></p>

API Platform is a next-generation web framework designed to easily create API-first projects without
compromising extensibility and flexibility:

* Design your own data model as plain old PHP classes or [**import an existing one**](https://api-platform.com/docs/schema-generator/) from the [Schema.org](https://schema.org/) vocabulary
* **Expose in minutes a hypermedia REST API** with pagination, data validation, access control, relation embedding, filters and error handling...
* Benefit from Content Negotiation: [JSON-LD](http://json-ld.org), [Hydra](http://hydra-cg.com), [HAL](http://stateless.co/hal_specification.html), [YAML](http://yaml.org/), [JSON](http://www.json.org/), [XML](https://www.w3.org/XML/) and [CSV](https://www.ietf.org/rfc/rfc4180.txt) are supported out of the box
* Enjoy the **beautiful automatically generated API documentation** (Swagger/OpenAPI)
* Add [**a convenient Material Design administration interface**](https://github.com/api-platform/admin) built with [React](https://facebook.github.io/react/) without writing a line of code
* **Scaffold a fully functional Single-Page-Application** built with [React](https://facebook.github.io/react/), [Redux](http://redux.js.org/), [React Router](https://reacttraining.com/react-router/) and [Bootstrap](https://getbootstrap.com/) thanks to [the client generator](https://api-platform.com/docs/client-generator/)
* Install a development environment and deploy your project in production using **[Docker](https://docker.com)**
* Easily add **[JSON Web Token](https://jwt.io/) or [OAuth](https://oauth.net/) authentication**
* Create specs and tests with a **developer friendly API testing tool** on top
  of [Behat](http://behat.org/)

[![Build Status](https://travis-ci.org/api-platform/core.svg?branch=master)](https://travis-ci.org/api-platform/core)
[![Build status](https://ci.appveyor.com/api/projects/status/grwuyprts3wdqx5l?svg=true)](https://ci.appveyor.com/project/dunglas/dunglasapibundle)
[![Coverage Status](https://coveralls.io/repos/github/api-platform/core/badge.svg)](https://coveralls.io/github/api-platform/core)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/92d78899-946c-4282-89a3-ac92344f9a93/mini.png)](https://insight.sensiolabs.com/projects/92d78899-946c-4282-89a3-ac92344f9a93)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/api-platform/core/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/api-platform/core/?branch=master)

The official project documentation is available **[on the API Platform website](https://api-platform.com)**.

API Platform embraces open web standards (Swagger, JSON-LD, Hydra, HAL, JWT, OAuth,
HTTP...) and the [Linked Data](https://www.w3.org/standards/semanticweb/data) movement. Your API will automatically
expose structured data in Schema.org/JSON-LD. It means that your API Platform application
is usable **out of the box** with technologies of the semantic
web.

It also means that **your SEO will be improved** because **[Google leverages these
formats](https://developers.google.com/structured-data/)**.

Last but not least, API Platform is built on top of the [Symfony](https://symfony.com) framework.
It means than you can:

* use **thousands of Symfony bundles** with API Platform
* integrate API Platform in **any existing Symfony application**
* reuse **all your Symfony skills** and benefit of the incredible
  amount of Symfony documentation
* enjoy the popular [Doctrine ORM](http://www.doctrine-project.org/projects/orm.html) (used by default, but fully optional: you can
  use the data provider you want, including but not limited to MongoDB ODM and ElasticSearch)

🛠️ Getting Started API Platform
-------

[Read the official "Getting Started" guide](https://api-platform.com/docs/core/getting-started).

🏅 Credits API Platform
-------

Created by [Kévin Dunglas](https://dunglas.fr). Commercial support available at [Les-Tilleuls.coop](https://les-tilleuls.coop).
