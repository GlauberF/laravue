# Laravue

This is a Laravel template I use for my own projects.

## How is it different from a clean Laravel installation ?

I'm a Frontend developer and I'm always trying to upgrade my current development workflows and building processes. I've been recently working with vue.js and they got this great tool to scaffold projects called [vue-cli](https://github.com/vuejs/vue-cli). So I basically merged Laravel with their [Webpack template](https://github.com/vuejs-templates/webpack) in order to make use of tools like Hot Reloading, ES6, SCSS, Unit Testing with Karma, Mocha and Chai and linting rules that follow [Airbnb Javascript Style Guide](https://github.com/airbnb/javascript).

So that's it, it's opinionated but that's fine since it's for my personal use, but you are free to fork it and configure it to your likings, or maybe just give it a try!

## How can I start a project using this ?

It's really easy to get up and running. Just follow these steps:

1. Clone the project with `git clone https://github.com/GianlucaCandiotti/laravue.git your-project`.
2. Go into your project directory and run `composer install` and `npm install` to install all project dependencies.
3. After that you need to create an .env file. To do that just copy the .env.example file which is already configured with `cp .env.example .env`.
4. Laravel needs us to set an application key to secure all encrypted data. Run the command `php artisan key:generate` to do so.
5. In you .env file there is a line that reads `APP_URL=http://localhost`. Change that variable to whatever your application url is. This is important for development as you'll see later on. For example for the homestead default url it would look like `APP_URL=http://homestead.app`.
6. Now you may run `npm run build` to do a bunch stuff like compiling all your assets, splitting your codebase into "chunks", generating maps for these assets, generating the master template your views will extend from with references to these assets and a lot more.

Now open your browser, hit your project's url and you should see the Laravue's welcome page. It's the same as Laravel's with subtle changes. At this point you may want to create a repository and change your remotes.

## How can I start coding with everything you have mentioned ?

These are the tasks included in the template. I'll just copy most of the descriptions from the [Vuejs Webpack template](https://github.com/vuejs-templates/webpack) since this is the template I merged with Laravel. If you want to know anything else about the tasks, about the folder structure or how to change or extend anything refer to their [docs](http://vuejs-templates.github.io/webpack/).

- `npm run dev`: First-in-class development experience.
  - Start developing by going into your browser and hitting `APP_URL:8080/dev`.
  - Webpack + `vue-loader` for single file Vue components.
  - State preserving hot-reload
  - State preserving compilation error overlay
  - Lint-on-save with ESLint
  - Source maps

- `npm run build`: Production ready build.
  - JavaScript minified with [UglifyJS](https://github.com/mishoo/UglifyJS2).
  - HTML minified with [html-minifier](https://github.com/kangax/html-minifier).
  - CSS across all components extracted into a single file and minified with [cssnano](https://github.com/ben-eb/cssnano).
  - All static assets compiled with version hashes for efficient long-term caching, and a production `index.html` is auto-generated with proper URLs to these generated assets.

- `npm run unit`: Unit tests run in PhantomJS with [Karma](http://karma-runner.github.io/0.13/index.html) + [Mocha](http://mochajs.org/) + [karma-webpack](https://github.com/webpack/karma-webpack).
  - Supports ES2015 in test files.
  - Supports all webpack loaders.
  - Easy mock injection.

## So, inside Laravel everything remains the same ?

In order to make everything work I had to create two routing helpers that are almost identical in functionality to the `route()` and `url()` Laravel helpers. They are named `routeHelper()` and `urlHelper()` respectively. You must use them in place of the Laravel ones and may pass them the same arguments and expect the same results. The only difference is that during development they'll generate urls that take into consideration the port webpack is running on and the proxy context. In detects the environment set in your .env file.

Apart from that, in order for Webpack to generate assets with hashes, maps and splitting the code into different bundles, we have to pass an HTML template as an input. For development it works a little different but it also makes use of a template for code injection and other stuff. These templates can be found under **'resources/assets/'** and there is one for development and one for production. When running the tasks for development or when building the project, these files will end up being processed and outputted into **'resources/views/layouts/base.blade.php'**. All your views should extend from that master template, and if you want to modify it you may do so changing `index.dev.html` and `index.html`.

## What's going on behind the scenes ?

Well I'll just explain how I made the hot reloading work which may be confusing.

Basically Webpack has some tools that can only work within its development environment. We have an Express server running on port 8080 (the default port, although you may change it in your .env file). It loads our webpack configuration through webpack-dev-middleware and it allows us to make use of HMR and a bunch of other stuff.

So now we can start up the dev server and we would have to open our project in a browser using port 8080, the thing is this is running through Webpack so it can't handle our blade templates, our routes, etc. So inside the configuration I've set a up a proxy that handles every request to `/dev` and passes it to our `APP_URL` defined in the .env file. With this set up we let Webpack take care of all of our assets in a very awesome way and still let Laravel handle the requests as intended.

And that's it, now the only thing to worry about is redirection since all redirects should be pointing to **'APP_URL:8080/dev'** as the base url. That's why you must make use of the helpers: `routeHelper()` and `urlHelper()` as stated earlier. They'll handle that for you during development and work exactly like their counterparts `route()` and `url()` while in production.

## So, anything else ?

Not really. I'd just want to thank you for giving it a try or at least reading through. If you have any feedback it'd be greatly appreciated. I bet a lot of things could be improved and I'm open to discussion, so open an issue, send a pull request or message me to gianluca.prwlr@gmail.com.
