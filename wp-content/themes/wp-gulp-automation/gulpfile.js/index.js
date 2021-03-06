// ==== MAIN ==== //

var gulp       = require('gulp'),
    requireDir = require('require-dir');

requireDir('./tasks');

// Default task chain: build -> (livereload or browsersync) -> watch
gulp.task('default', ['watch']);

// Build a working copy of the theme
gulp.task('build', ['images', 'scripts', 'styles', 'theme']);

// Dist task chain: wipe -> build -> clean -> copy -> compress images
// NOTE: this is a resource-intensive task!
gulp.task('dist', ['images-optimize']);

