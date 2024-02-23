# WP Docker Setup

## Setup

- Install [Docker Engine](https://docs.docker.com/engine/install/) or Docker Desktop.

- Clone this repo and navigate (`cd`) to the root directory.

- Create a copy of the `.env.example` file and rename it to `.env`. This file contains the environment variables for the services.

```bash
MYSQL_ROOT_PASSWORD=rootwordpress
MYSQL_DATABASE=florish
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

#### Quick Start

```sh
# Install the required packages
npm install

# Start Docker, the development server, and watch for changes
npm run dev
```

### Workspaces

The theme lives as it's own package with it's own `package.json` and `node_modules` folder. To make development easier, we use [`npm workspaces`](https://docs.npmjs.com/cli/v10/using-npm/workspaces#running-commands-in-the-context-of-workspaces) to manage the theme and plugin dependencies from the repo root directory.

**NPM scripts in the theme directory can be run from the root directory using the `--workspace` flag:**

```sh
# These are equivalent...
cd Florish/wp-content/themes/florish && npm run css

# ...to
npm run css --workspace florish

# ...or, using prefixed commands
npm run x -- css
```


### Theme Development

The theme files are located in the `wp-content/themes/florish` folder. 

The easiest way to develop the theme is to use the `npm run dev` command. This starts the development server and watches for changes to the theme files.




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

See `_bootstrap-extend.scss` (`Florish/wp-content/themes/florish/assets/scss/core/_bootstrap-extend.scss`) for more details.

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

We use composer to manage PHP resources and custom theme functions/classes. Files are stored in `Florish/wp-content/themes/florish/components/helpers`. 

- Class filenames should correspond to the Class name.
- Files with individual functions must be added to `composer.json`

After changing files in the `components/helpers/` directory, run the following command (`composer dump-autoload`) to generate autoload files:

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
