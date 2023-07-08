Steven Jetton
===

* Based on underscores
* A custom header implementation in `inc/custom-header.php`. Just add the code snippet found in the comments of `inc/custom-header.php` to your `header.php` template.
* Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
* Some small tweaks in `inc/template-functions.php` that can improve your theming experience.
* A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
Note: `.no-sidebar` styles are automatically loaded.
* Full support for `WooCommerce plugin` integration with hooks in `inc/woocommerce.php`, styling override woocommerce.css with product gallery features (zoom, swipe, lightbox) enabled.
* Licensed under GPLv2 or later. :) Use it to make something cool.
* Style with Sass
* Build with Webpack

Installation
---------------

### Requirements

`Steven Jetton` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)
- Advanced Custom Fields Pro
- Gravity Forms

### Quick Start

Clone or download this repository, change its name to something else (like, say, `the-apartment`), and then you'll need to do a six-step find and replace on the name in all the templates.

**MAKE SURE YOUR FIND/REPLACE SETTINGS ARE SET TO MATCH CASE!!!!!**

1. Search for `'steven-jetton'` (inside single quotations) to capture the text domain and replace with: `'the-apartment'`.
2. Search for `steven_jetton_` to capture all the functions names and replace with: `the_apartment_`.
3. Search for `Text Domain: ` in `style.css` and replace with: `Text Domain: the-apartment`.
4. Search for `STEVEN_JETTON_` in all caps to capture constants and replace with: `THE_APARTMENT_`.
5. Search for `Steven_Jetton_` with first letter of each word capitalized to capture classes and replace with: `The_Apartment_`. 
6. Search for `steven-jetton-` to capture prefixed handles and replace with: `the-apartment-`.
7. Search for `Steven Jetton` and replace with: `The Apartment`

Then, update the stylesheet header in `style.css`. Next, update or delete this readme.

### Setup

To start using all the tools that come with `Steven Jetton`  you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

## Organization

### Front End

All front end development files are in src/.

- **JS:** `main-dev.js` is the entry point. Include any required JS files in here. Break up funcitonality into separate files to keep things tidy.
- **SCSS:** `main.scss` is the entry point. Include any required scss files in here. The theme comes with slick theme and MFP scss already included
- **Fonts:** save any required fonts in src/assets/fonts/. Webpack will copy them to the public/ folder when you build.
- **Images:** save any required theme images (like icons) in src/assets/images/. Webpack will copy them to the public/ folder when you build.
- **Third Party Code:** save any third party libraries to src/lib/.
  - third party JS will need to be imported into `main-dev.js`
  - third party CSS will need to be included in `main.scss`
  - Webpack will copy any third party fonts and images to public/

### Available CLI commands

`Steven Jetton` comes with the following CLI commands :

- `npm run build` : bundle all JS to public/js/main.min.js, compile sass to public/css/main.min.css, copy assets and lib images to public/
- `npm run watch` : watch files and bundle all JS to public/js, compile sass to public/css, copy assets to public/ 
- `npm run watch-sass` : watch sass files as they change and compile to public/css/main.min.css
- `npm run build-sass` : compile sass to public/css/main.min.css
- `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `composer lint:php` : checks all PHP files for syntax errors.
- `composer make-pot` : generates a .pot file in the `languages/` directory.
- `npm run compile:rtl` : generates an RTL stylesheet.

