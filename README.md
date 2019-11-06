# Castle Trust Code Challenge

## Instructions

The coding challenge consists of several tasks that are meant to be done in order. 

The **first task** is to get the Laravel app in this repo up and running.

You will find the remaining tasks in the app itself on the homepage.

The existing code is here to get you started - feel free to edit and add to the codebase as needed. There isn't one right way of completng the tasks we are mainly intereseted in how you approach the problem.

### Submission

Once you've completed the tasks please either provide access to a git repository with your code or send back a zip of the files (including .git folder, excluding laradock, webapp/vendor and webapp/node_modules folders to keep the size down). You will likely be asked to walk us through your code during a face to face meeting.

## Getting Started

### Requirements

* [Git](https://git-scm.com/downloads)
* [Docker](https://www.docker.com/products/docker/) >= 17.12

### Setup

**Files**

Depending on how you obtained the files the initial repository setup is slightly different. Please use the relevant commands below.

---
*If you've downloaded a **zip file**:*

After you've unpacked the files into a folder start a new git repo.

```bash
# start a new repository
git init
# make sure you don't have an empty submodule folder
rm -rf laradock
# add submodule
git submodule add https://github.com/Laradock/laradock.git
```

Be sure to use **git** to track your progress - at least one commit per task please.

---
*If you've cloned the test task repository:*

```bash
git submodule update --init
```

---

**Laravel**

Setup project config:

```bash

cp webapp/.env.example webapp/.env
```

**Laradock**

> **Tip:** The laravel app can be run without docker/laradock however using the provided setup ensures a more consistent environment and minimizes the need for additional dependencies. 
>
> So if you run into issues or feel more comfortable with an alternative app server setup, feel free to that, as using docker is not part of the requirements.

Setup config:

```bash
cp laradock/env-example laradock/.env
```

Edit laradock\.env and update the following variables

```
APP_CODE_PATH_HOST=../webapp/
APACHE_DOCUMENT_ROOT=/var/www/public
```

Build and run the container.

```bash
cd laradock
docker-compose up -d apache2
```

> **Tip** If you run into a networking issue ("Error when pulling image: connection refused") at this stage you might need to restart your docker service and try again.

**App setup**

Tools like node, yarn, composer, etc. come pre-installed inside the workspace, so you don't need to set them up separately on your machine.

Run **composer** and **yarn** install for our laravel build:

```bash
cd laradock
docker-compose exec workspace bash

# Once inside the container

composer install
yarn install
```

**App access**

To preview the app go to http://127.0.0.1

## Development

To compile assets once:

```bash
cd laradock
docker-compose exec workspace bash

# Once inside the container

yarn run dev
```

You can also watch for changes and re-compile automatically:

```bash
cd laradock
docker-compose exec workspace bash

# Once inside the container

yarn run watch
```

## Resources

Documentation:

[Laravel](https://laravel.com/docs/6.x)

[Laradock](https://laradock.io/getting-started/)