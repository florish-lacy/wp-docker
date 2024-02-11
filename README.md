# WP Docker Setup

## Setup

- Install [Docker Engine](https://docs.docker.com/engine/install/) or Docker Desktop.

- Clone this repo and navigate (`cd`) to the root directory.

- Copy the `.env.example` file to `.env` and fill in the required environment variables.

```bash
MYSQL_ROOT_PASSWORD=rootwordpress
MYSQL_DATABASE=wordpress
MYSQL_USER=wordpress
MYSQL_PASSWORD=wordpress
```

- Make sure Docker is running and run the following command to start and stop the containers:

```bash
# Start the containers
docker-compose up -d

# Stop the containers
docker-compose down

# Stop and remove volumes
docker-compose down --volumes
```

> This downloads the required images and starts the containers. The `-d` _(detached)_ flag runs the containers in the background. The Wordpress files are loaded into the `wp-data` folder, delete it and restart the docker containers to reset the installation.

- Open your browser and navigate to `http://localhost` (port 80; `http://localhost:80`) to access the WordPress installation.

- To access PHPMyAdmin, navigate to `http://localhost:8080`.

-  MySQL database host: `db:3306`



