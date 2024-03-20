# WP Docker Setup

## Quick Start

1. Install [Docker Engine](https://docs.docker.com/engine/install/) or [Docker Desktop](https://www.docker.com/products/docker-desktop/). Make sure Docker is running.


2. Clone this repo and navigate to the root directory. (`cd WordPress`)


3. Create a copy of the `.env.example` file and rename it to `.env`. This file contains the environment variables for the services. You can view the allowable environment variables in the `docker-compose.yml` file.

```bash
MYSQL_DATABASE=florish
MYSQL_USER=wordpress
MYSQL_PASSWORD=wordpress
MYSQL_ROOT_PASSWORD=wordpress
```


4. **Run the following commands to start the containers and watch for changes to the theme files:**

```sh
# Install dependencies in the theme and root directory
npm install

# Start the docker container and sass compiler, then watch for changes
npm start # or `npm run dev` to run docker in the foreground

# To stop the docker container
npm run stop
```

**Hint: to end the process, use `Ctrl + C` to stop the development server.** The docker container will continue running in the background. Use `npm run stop` to stop the docker container.

> A window will open in your default browser with the BrowserSync proxy at http://localhost:3000. While developing, this URL will automatically update when changes are made to the theme files. **The first time you run the `npm start` command, the BrowserSync window may need to be refreshed after the docker container finishes building**

**At this point, you should have a fresh WordPress installation running on `http://localhost`.**


5. Import the db.sql file into the database. This file contains the WordPress database schema and data.

Login to the PHPMyAdmin at `http://localhost:8080` with the credentials MYSQL_USER and MYSQL_PASSWORD you set in the `.env` file.

In PHPMyAdmin, click on the `Import` tab. Click on the `Choose File` button and select the `db.sql` file. Click the `Import` button at the bottom to import the database.

**The WordPress installation is now complete.**

You can now start developing the theme. The theme files are located in the `wp-content/themes/florish` folder. The `npm start` command starts the development server and watches for changes to the theme files.

- Access the WordPress installation at `http://localhost`.
- Login to the WordPress admin dashboard at `http://localhost/wp-admin` with your WordPress credentials (not from the `.env` file).
- See the database schema and data in PHPMyAdmin at `http://localhost:8080`.
- While running `npm start` or `npm run dev`, the BrowserSync proxy is available at `http://localhost:3000`. This will immediately update when changes are made to the theme SCSS or PHP files.

> Note: Logging into the WordPress dashboard may not work on the BrowserSync proxy (`http://localhost:3000/wp-admin`). Use the `http://localhost/wp-admin` URL to login to the WordPress dashboard.


### Docker

The `docker-compose.yml` file contains the configuration for the services. The `wordpress` service uses the `wordpress:latest` image and the `db` service uses the `mysql:5.7` image.

```sh
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

The `wp-content` folder is mounted to the `web` folder. This allows you to edit the files locally and see the changes in real-time.

#### Quick Start

```sh
# Install the required packages
npm install

# Start Docker, the development server, and watch for changes
npm run dev
```

### NPM

The theme lives as it's own package with it's own `package.json` and `node_modules` folder. 
Some scripts are provided in the root `package.json` to run commands in the theme directory.

#### `npm run` an NPM script in the theme directory

Use `npm run x -- <command>` from the root directory to run an NPM script in the theme directory. For example, to run the `css` script in the theme directory:

```sh
npm run x -- css
```

#### `npm install` a package in the theme directory

Use `npm run i -- <package>` from the root directory to install a package in the theme directory. For example, to install `bootstrap` in the theme directory:

```sh
npm run i -- --save-dev bootstrap
```


### Theme Development

The theme files are located in the `wp-content/themes/florish` folder. 

The easiest way to develop the theme is to use the `npm run dev` command. This starts the development server and watches for changes to the theme files.

### PHP

Use full PHP tags `<?php ?>` instead of short tags `<? ?>`.




#### Styles

The `style.css` file is located in the `wp-content/themes/florish` folder. Styles are written in SCSS in the `assets/scss` folder and compiled to CSS.

#### Compiling SCSS to CSS
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

// Example
// .navbar__link--active
.navbar {
  &__link {
	&--active {
	  // styles...
	}
  }
}
```

###### Note: Extending Bootstrap classes to WordPress

Certain Wordpress functions add classes to the HTML elements. For example, the `wp_nav_menu` function adds classes to the menu items, such as `menu-item` and `menu-item-has-children`. 

These classes can be used to style the menu items for variations like `hover` or marking the current page. Bootstrap uses different classes for the same purpose, so we extend the Bootstrap classes so that they apply to the WordPress classes.

See `_bootstrap-extend.scss` (`web/wp-content/themes/florish/assets/scss/core/_bootstrap-extend.scss`) for more details.

###### Note: Comment any funky SCSS tricks
```scss
.toggle-on-hover {
	// .toggle-on-hover .toggle-on-hover--on
	#{&}--on {
		display: none;
	}
}
```



##### Note: Careful extending Bootstrap classes

Bootstrap make liberal use of `!important` in their styles. This can cause issues when extending their classes, as the order of the classes in the compiled bootstrap CSS will determine which styles are applied. 

```scss
// This will not work as expected
.class {
	@extend .p-3;

	&__a {
		@extend .class;
		@extend .p-1; // This will not work
	}

    &__b {
		@extend .class;
    	@extend .p-5; // This works because p-5 is defined after p-3 in the bootstrap CSS
    }

}
```


### PHP and Composer

We use composer to manage PHP resources and custom theme functions/classes. Files are stored in `web/wp-content/themes/florish/components/helpers`. 

- Class filenames should correspond to the Class name.
- Files with individual functions must be added to `composer.json`

After changing files in the `inc/helpers/` directory, run the following command (`composer dump-autoload`) to generate autoload files:

`docker exec -w /var/www/html/wp-content/themes/florish florish-wordpress-1 composer dump-autoload`

```php
<?php Florish\MyClass::myFunction() ?>

// Or, for brevity, a shorter version by "use"-ing the Class first:

<?php use Florish\MyClass; MyClass\myFunction(); ?>
<?php use Florish\MyClass as CL; CL\myFunction(); ?>
```

And for functions:
```
<?php Florish\myFunction(); ?>

// Or, shortened:
<?php 

use function Florish\myFunction;
myFunction();

?>

```

#### To Refactor:

- Break PHP, JS, and SCSS into separate files and folders.
- `functions.php` is getting too large. Break it into smaller files.
- Spellcheck!

##### PHP

- Do not use `if():` and `endif;`, `while():` and `endwhile;`, etc. syntax. Use `{}` instead.
