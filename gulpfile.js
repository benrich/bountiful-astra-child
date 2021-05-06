const gulp = require('gulp')
const sourcemaps = require('gulp-sourcemaps')
const sass = require('gulp-sass')
const autoprefixer = require('gulp-autoprefixer')
const concat = require('gulp-concat')

const styles = () => {
	return gulp
		.src(['./assets/scss/**/*.scss'])
		.pipe(sourcemaps.init())
		.pipe(sass().on('error', sass.logError))
		.pipe(autoprefixer({ cascade: false }))
		.pipe(concat('style.css'))
		.pipe(sourcemaps.write('../map'))
		.pipe(gulp.dest('./assets/compiled'))
}

const scripts = () => {
	return gulp
		.src(['assets/js/**/*.js', 'inc/**/*.js'])
		.pipe(sourcemaps.init())
		.pipe(concat('index.js'))
		.pipe(sourcemaps.write('../map'))
		.pipe(gulp.dest('./assets/compiled'))
}

const watch = () => {
	gulp.watch(['assets/{scss,js}/**/*.{scss,js}'], gulp.parallel(styles, scripts))
}

exports.watch = watch
exports.styles = styles
exports.scripts = scripts
exports.default = gulp.parallel(styles, scripts)
