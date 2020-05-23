# <a href="http://wpemerge.com"><img src="https://docs.wpemerge.com/_images/wpemerge-plugin-logo-bar.png" height="61" alt="WP Emerge Starter Plugin Logo" aria-label='WPEmerge.com' /></a>

[![Packagist](https://img.shields.io/packagist/vpre/htmlburger/wpemerge-plugin.svg?style=flat-square&colorB=0366d6)](https://packagist.org/packages/htmlburger/wpemerge-plugin) [![Travis branch](https://img.shields.io/travis/htmlburger/wpemerge-plugin/master.svg?style=flat-square)](https://travis-ci.org/htmlburger/wpemerge-plugin/builds) [![Gitter](https://img.shields.io/gitter/room/nwjs/nw.js.svg?style=flat-square&colorB=7d07d1)](https://gitter.im/wpemerge/Lobby)


A modern WordPress starter plugin which uses the [WP Emerge](https://github.com/htmlburger/wpemerge) framework.

_This is the WP Emerge Starter Plugin project - for the WP Emerge framework please check out https://github.com/htmlburger/wpemerge._

## Summary

- [Documentation](#documentation)
- [Development Team](#development-team)
- [Comparison Table](#comparison-table)
- [Features](#features)
- [Non-goals](#non-goals)
- [Requirements](#requirements)
- [Directory structure](#directory-structure)
- [Contributing](#contributing)

## Documentation

[http://docs.wpemerge.com/#/starter/plugin/overview](http://docs.wpemerge.com/#/starter/plugin/overview)

[http://docs.wpemerge.com/#/starter/plugin/quickstart](http://docs.wpemerge.com/#/starter/plugin/quickstart)

## Development Team

Brought to you by [Atanas Angelov](https://atanas.dev/) and the lovely folks at [htmlBurger](http://htmlburger.com).

## Comparison Table

|                                | WP Emerge Theme  | WPB           | WPT   |
|--------------------------------|------------------|----------------|----------|
| View Engine                    | PHP, Blade, Twig, any | PHP            | PHP      |
| Routing                        | ✔                | ✖              | ✖        |
| WP Admin Routing | ✔ | ✖ | ✖ |
| WP AJAX Routing | ✔ | ✖ | ✖ |
| MVC                            | ✖✔✔              | ✖✔✖            | ✖✔✖      |
| Middleware                     | ✔                | ✖              | ✖        |
| View Composers                 | ✔                | ✖              | ✖        |
| Service Container              | ✔                | ✖              | ✖        |
| Stylesheets                    | SASS + PostCSS   | CSS            | LESS     |
| JavaScript                     | ES6              | Vanilla         | Vanilla  |
| Hot reloading                  | ✔                | ✖               | ✖        |
| Frontend/Admin/Any Bundle      | ✔✔✔             | ✔✔✖¹           | ✔✔✖²    |
| Automatic Sprite Generation    | ✔                | ✖              | ✖        |
| Automatic Cache Busting        | ✔                | ✖              | ✖        |
| WPCS Linting                   | ✔                | ✖              | ✖        |
| [Advanced Error Reporting](https://docs.wpemerge.com/#/framework/routing/error-handling) | ✔ | ✖ | ✖ |
| WP Unit Tests for your classes | ✔                | ✖              | ✖        |

_¹ There are prepared JavaScript files but they are not processed or transpiled in any way._

_² The JavaScript files are only minified - no transpiling is done._

_Email any factual inaccuracies to [hi@atanas.dev](mailto:hi@atanas.dev) so they can be corrected._

## Features
- All features from [WP Emerge](https://docs.wpemerge.com/#/framework/overview):
  - Named routes with custom URLs and query filters
  - Controllers
  - Middleware
  - PSR-7 Responses
  - View Composers
  - Service Container
  - Service Providers
  - PHP view layouts (a.k.a. automatic wrapping)
  - Support for PHP, [Blade 5.4](https://laravel.com/docs/5.4/blade) and/or [Twig 2](https://twig.symfony.com/doc/2.x/api.html) for views
- [SASS](https://sass-lang.com/) + [PostCSS](https://github.com/postcss/postcss) for stylesheets. Separate bundles are created for **front-end** and **administration** and custom bundles can be added easily.
- ES6 for JavaScript. Separate bundles are created for **front-end** and **administration** and custom bundles can be added easily.
- Pure [Webpack](https://webpack.js.org/) to transpile and bundle assets, create sprites, optimize images etc.
- [Hot Module Replacement](https://webpack.js.org/concepts/hot-module-replacement/) for synchronized browser development.
- Autoloading for all classes in your `MyApp\` namespace.
- Automatic, fool-proof cache busting for all assets, including ones referenced in styles.
- WPCS, JavaScript and SASS linting and fixing using a single yarn command.
- Single-command optional CSS package installation:
    - Normalize.css
    - Boostrap 4
    - Bulma
    - Foundation
    - Tachyons
    - Tailwind CSS
    - Spectre.css
    - FontAwesome
- WP Unit Test scaffolding for your own classes.

## Non-goals

- Taking over the WordPress main query.

  WP Emerge does __not__ take over the main query - it actively works with it.
- Taking over WordPress routing.

  WP Emerge does __not__ take over WordPress' routing - it actively works with it. The only exception to this are hardcoded URLs explicitly added by a user.
- Reinventing WordPress APIs using object-oriented interfaces.

  WP Emerge does not provide alternative APIs for registering post types, taxonomies or the like for little added benefit. Instead, it provides logical and handy places for developers to use core APIs.
- Using a third party engine by default.

  WP Emerge uses PHP by default in the same way WordPress does but with added features. Using a third party engine is entirely optional and requires installing an extension.
- Include most of Laravel or another framework.

  WP Emerge is lean and tuned for WordPress. While inspired by Laravel, it does not come with any `illuminate/*` packages. There are only 2 third party production dependencies:
  - `pimple/pimple` - The single-file PHP service container.
  - `guzzlehttp/psr7` - A PSR-7 Request and ServerRequest implementation.

## Requirements

- [PHP](http://php.net/) >= 5.5
- [WordPress](https://wordpress.org/) >= 4.7
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/en/) >= 12
- [Yarn](https://yarnpkg.com/en/) or NPM

## Directory structure

```
wp-content/plugins/your-plugin
├── app/
│   ├── helpers/              # Helper files, add your own here as well.
│   ├── routes/               # Register your WP Emerge routes.
│   │   ├── admin.php
│   │   ├── ajax.php
│   │   └── web.php
│   ├── src/                  # PSR-4 autoloaded classes.
│   │   ├── Controllers/      # Controller classes for WP Emerge routes.
│   │   ├── Routing/          # Register your custom routing conditions etc.
│   │   ├── View/             # Register your view composers, globals etc.
│   │   ├── WordPress/        # Register post types, taxonomies, menus etc.
│   │   └── ...
│   ├── config.php            # WP Emerge configuration.
│   ├── helpers.php           # Require your helper files here.
│   ├── hooks.php             # Register your actions and filters here.
│   └── version.php           # WP Emerge version handling.
├── dist/                     # Bundles, optimized images etc.
├── languages/                # Language files.
├── resources/
│   ├── build/                # Build process configuration.
│   ├── fonts/
│   ├── images/
│   ├── scripts/
│   │   ├── admin/            # Administration scripts.
│   │   └── frontend/         # Front-end scripts.
│   ├── styles/
│   │   ├── admin/            # Administration styles.
│   │   ├── frontend/         # Front-end styles.
│   │   └── shared/           # Shared styles.
│   └── vendor/               # Any third-party, non-npm assets.
├── vendor/                   # Composer packages.
├── views/
│   ├── layouts/
│   └── partials/
├── screenshot-1.png          # Plugin screenshot.
├── wpemerge                  # WP Emerge CLI shortcut.
├── wpemerge.php              # Bootstrap plugin.
└── ...
```

### Notable directories

#### `app/helpers/`

Add PHP helper files here. Helper files should include __function definitions only__. See below for information on where to put actions, filters, classes etc.

#### `app/src/`

Add PHP class files here. All clases in the `MyApp\` namespace are autoloaded in accordance with [PSR-4](http://www.php-fig.org/psr/psr-4/).

#### `resources/images/`

Add images for styling here. Optimized copies will be placed in `dist/images/` when running the build process.

#### `resources/styles/frontend/`

Add .css and .scss files to add them to the front-end bundle. Don't forget to `@import` them in `index.scss`.

#### `resources/styles/admin/`

The admin styles directory which works identically to the `resources/styles/frontend/` directory.

#### `resources/scripts/frontend/`

Add JavaScript files here to add them to the frontend bundle. The entry point is `index.js`.

#### `resources/scripts/admin/`

The admin scripts directory which works identically to the `resources/scripts/frontend/` directory.

#### `views/`

1. `views/layouts/` - Layouts that other views extend.
2. `views/partials/` - Small snippets that are meant to be reused throughout other views.
3. `views/` - Full page views that may extend layouts and may include partials.

Avoid adding any PHP logic in any of these views, unless it pertains to layouting. Business logic should go into:
- Helper files (`app/helpers/*.php`)
- Service classes
- [WP Emerge Controllers](https://docs.wpemerge.com/#/framework/routing/controllers)

## Contributing

WP Emerge Starter Plugin is completely open source and we encourage everybody to participate by:

- Reviewing `.github/CONTRIBUTING.md`.
- ⭐ the project on GitHub \([https://github.com/htmlburger/wpemerge-plugin](https://github.com/htmlburger/wpemerge-plugin)\)
- Posting bug reports \([https://github.com/htmlburger/wpemerge-plugin/issues](https://github.com/htmlburger/wpemerge-plugin/issues)\)
- (Emailing security issues to [hi@atanas.dev](mailto:hi@atanas.dev) instead)
- Posting feature suggestions \([https://github.com/htmlburger/wpemerge-plugin/issues](https://github.com/htmlburger/wpemerge-plugin/issues)\)
- Posting and/or answering questions \([https://github.com/htmlburger/wpemerge-plugin/issues](https://github.com/htmlburger/wpemerge-plugin/issues)\)
- Submitting pull requests \([https://github.com/htmlburger/wpemerge-plugin/pulls](https://github.com/htmlburger/wpemerge-plugin/pulls)\)
- Sharing your excitement about WP Emerge with your community
