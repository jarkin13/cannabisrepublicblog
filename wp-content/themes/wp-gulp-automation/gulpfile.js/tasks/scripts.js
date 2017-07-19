// ==== SCRIPTS ==== //

var gulp        = require('gulp'),
    plugins     = require('gulp-load-plugins')({ camelize: true }),
    merge       = require('merge-stream'),
    config      = require('../../gulpconfig').scripts;

gulp.task('scripts-lint', function() {
  return gulp.src(config.lint.src)
    .pipe(plugins.jshint())
    .pipe(plugins.jshint.reporter('default'));
});

gulp.task('scripts-bundle', ['scripts-lint'], function() {
  var bundles = [];

  for(var bundle in config.bundles) {
    if(config.bundles.hasOwnProperty(bundle)) {
      var chunks = [];

      config.bundles[bundle].forEach(function(chunk) {
        chunks = chunks.concat(config.chunks[chunk]);
      });

      bundles.push([bundle, chunks]);
    }
  }

  var tasks = bundles.map(function(bundle) {
    return gulp.src(bundle[1]) // bundle[1]: the list of source files
      .pipe(plugins.concat(bundle[0].replace(/_/g, '-') + config.namespace + '.js')) // bundle[0]: the nice name of the script; underscores are replaced with hyphens
      .pipe(gulp.dest(config.dest));
  });

  // Cross the streams ;)
  return merge(tasks);
});

gulp.task('scripts-minify', ['scripts-bundle'], function() {
  return gulp.src(config.minify.src)
    .pipe(plugins.sourcemaps.init())
    .pipe(plugins.uglify(config.minify.uglify))
    .pipe(plugins.sourcemaps.write('./'))
    .pipe(gulp.dest(config.minify.dest));
});

gulp.task('scripts', ['scripts-minify']);