# PHP reusable classes and functions

Allows for the creation of reusable classes and functions that can be used throughout the theme.

### PHP and Composer

We use composer to manage PHP resources and custom theme functions/classes. Files are stored in `Florish/wp-content/themes/florish/components/helpers`.

- Class filenames should correspond to the Class name.
- Files with individual functions must be added to `composer.json`

After changing files in the `components/helpers/` directory, run the following command to generate autoload files:

`composer dump-autoload`
