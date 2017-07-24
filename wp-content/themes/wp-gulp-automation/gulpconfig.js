var json       = require('json-file');
    theme      = themeName = json.read('./package.json').get('themeName');
    src        = './src/',              // All custom theme files such as scss, js, images, etc
    build      = './build/',            // Where to build all theme files that you will upload
    dist       = '../' + theme,
    assets     = './assets/',           // A staging area for assets that require processing before landing in the source folder (example: icons before being added to a sprite sheet)
    bower      = './bower_components/', // Bower packages
    modules    = './node_modules/';       // npm packages    

module.exports = {
  browsersync: {
    files: [build+'/**', '!'+build+'/**.map'], // Exclude map files
    notify: false, // In-line notifications (the blocks of text saying whether you are connected to the BrowserSync server or not)
    open: true, // Set to false if you don't like the browser window opening automatically
    port: 3000, // Port number for the live version of the site; default: 3000
    proxy: 'localhost:8888', // We need to use a proxy instead of the built-in server because WordPress has to do some server-side rendering for the theme to work
    watchOptions: {
      debounceDelay: 2000 // This introduces a small delay when watching for file change events to avoid triggering too many reloads
    }
  },

  livereload: {
    port: 35729 // This is a standard port number that should be recognized by your LiveReload helper; there's probably no need to change it
  },

  images: {
    build: { // Copies images from `src` to `build`; does not optimize
      src: src+'**/*(*.png|*.jpg|*.jpeg|*.gif|*.svg)',
      dest: build
    },
    dist: {
      src: [build+'**/*(*.png|*.jpg|*.jpeg|*.gif|*.svg)', '!'+dist+'screenshot.png'], // The source is actually `dist` since we are minifying images in place
      imagemin: {
        optimizationLevel: 7,
        progressive: true,
        interlaced: true
      },
      dest: dist
    }
  },

  scripts: {
    bundles: { // Bundles are defined by a name and an array of chunks (below) to concatenate; warning: this method offers no dependency management!
      footer: ['footer'],
      header: ['header'],
      pageloader: ['pageloader', 'footer']
    },
    chunks: { // Chunks are arrays of paths or globs matching a set of source files; this way you can organize a bunch of scripts that go together into pieces that can then be bundled (above)
      // The core footer chunk is loaded no matter what; put essential scripts that you want loaded by your theme in here
      footer: [
        modules+'timeago/jquery.timeago.js', // The modules directory contains packages downloaded via npm
        src+'js/responsive-menu.js',
        src+'js/footer.js'
      ],
      header: [
        modules+'select2/dist/js/select2.full.js',
        src+'js/libs/map/*',
        src+'js/header.js'      ],
      // The pageloader chunk provides an example of how you would add a user-configurable feature to your theme; you can delete this if you wish
      // Have a look at the `src/inc/assets.php` to see how script bundles could be conditionally loaded by a theme
      pageloader: [
        modules+'html5-history-api/history.js',
        modules+'spin.js/spin.js',
        modules+'spin.js/jquery.spin.js',
        modules+'wp-ajax-page-loader/wp-ajax-page-loader.js',
        src+'js/page-loader.js'
      ]
    },
    dest: build+'js/', // Where the scripts end up in your theme
    lint: {
      src: [src+'js/**/*.js'] // Linting checks the quality of the code; we only lint custom scripts, not those under the various modules, so we're relying on the original authors to ship quality code
    },
    minify: {
      src: build+'js/**/*.js',
      uglify: {}, // Default options
      dest: build+'js/'
    },
    namespace: '.min' // Script filenames will be prefaced with this (optional; leave blank if you have no need for it but be sure to change the corresponding value in `src/inc/assets.php` if you use it)
  },
  
  styles: {
    build: {
      src: src+'scss/**/*.scss',
      dest: build
    },
    compiler: 'libsass',
    cssnano: {
      autoprefixer: {
        add: true,
        browsers: ['> 3%', 'last 2 versions', 'ie 9', 'ios 6', 'android 4']
      }
    },
    libsass: {
      includePaths: [ // Adds Bower and npm directories to the load path so you can @import directly
        './src/scss',
        modules+'select2/dist/css/scss',
        modules+'normalize.css',
        modules+'scut/dist',
        modules+'bootstrap-sass/assets/stylesheets',
        modules,
        bower,
      ],
      precision: 6,
      onError: function(err) {
        return console.log(err);
      }
    }
  },

  theme: {
    lang: {
      src: src+'languages/**/*', // Glob pattern matching any language files you'd like to copy over; we've broken this out in case you want to automate language-related functions
      dest: build+'languages/'
    },
    php: {
      src: src+'**/*.php', // This simply copies PHP files over; both this and the previous task could be combined if you like
      dest: build
    },
    fonts: {
      src: src+'fonts/**/*',
      dest: build+'fonts/'
    }
  },

  utils: {
    clean: [build+'**/.DS_Store'], // A glob pattern matching junk files to clean out of `build`; feel free to add to this array
    wipe: [dist], // Clean this out before creating a new distribution copy
    dist: {
      src: [build+'**/*', '!'+build+'**/*.map'],
      dest: dist
    },
  },

  watch: { // What to watch before triggering each specified task; if files matching the patterns below change it will trigger BrowserSync or Livereload
    src: {
      styles: src+'scss/**/*.scss',
      scripts:      src+'js/**/*.js', // You might also want to watch certain dependency trees but that's up to you
      images:       src+'**/*(*.png|*.jpg|*.jpeg|*.gif|*.svg)',
      theme:        src+'**/*.php',
      livereload:   build+'**/*'
    },
    watcher: 'livereload' // Modify this value to easily switch between BrowserSync ('browsersync') and Livereload ('livereload')
  }
}
