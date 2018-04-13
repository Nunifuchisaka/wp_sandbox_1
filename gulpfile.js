var gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer');


/*
## StyleSheet
*/

gulp.task("scss", function(){
  return gulp.src('src/scss/**/*.scss')
    .pipe(sass({
      outputStyle: 'compressed'
    }).on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: ['last 2 version', 'iOS >= 8.1', 'Android >= 4.4'],
      cascade: false
    }))
    .pipe(gulp.dest('www/htdocs/wp/wp-content/themes/wp_sandbox_1/assets/css'))
    .pipe(browserSync.stream());
});



/*
## watch
*/

gulp.task("default", function(){
  
  gulp.watch('src/scss/**/*.scss', ['scss']);
  
});
