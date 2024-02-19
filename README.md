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

> This downloads the required images and starts the containers. The `-d` _(detached)_ flag runs the containers in the background. The Wordpress files are loaded into the `Florish` folder, delete it and restart the docker containers to reset the installation.

- Open your browser and navigate to `http://localhost` (port 80; `http://localhost:80`) to access the WordPress installation.

- To access PHPMyAdmin, navigate to `http://localhost:8080`.

-  MySQL database host: `db:3306`


## Development

The `wp-content` folder is mounted to the `Florish` folder. This allows you to edit the files locally and see the changes in real-time.

### Theme Development

The theme files are located in the `wp-content/themes/florish` folder. Run `npm i` to install the required packages:

```sh
# From the root directory
cd Florish/wp-content/themes/florish

# then...
npm install
```

### Styles

The `style.css` file is located in the `wp-content/themes/florish` folder. Styles are written in SCSS in the `assets/scss` folder and compiled to CSS.

Run the following commands to compile scss or watch the changes:

```sh
# From the theme directory...

# To compile the scss
npm run css # This runs css:compile and css:prefix

# To watch for changes
npm run watch
```

#### BEM Naming Convention

The [Block Element Modifier](http://getbem.com/naming/) (BEM) naming convention is used for the CSS classes.

```scss
.block {
  &__element {
	&--modifier {
	  // styles...
	}
  }
}
```
