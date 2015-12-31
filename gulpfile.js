var gulp = require('gulp');
var sass = require('gulp-ruby-sass');
var sourcemaps = require('gulp-sourcemaps');
var notify = require("gulp-notify");

gulp.task('sass', function() {
	return sass('./assets/sass/**/*.scss')
		.on('error', sass.logError)
		.pipe(sourcemaps.init())
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('./assets/css'))
		.pipe(notify("Sass is done!"));
});

gulp.task('watch:sass', function () {
	gulp.watch('./assets/sass/**/*.scss', ['sass']);
});