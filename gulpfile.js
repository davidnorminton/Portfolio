var gulp = require('gulp');
var sass = require('gulp-sass');

// compile sass file
gulp.task('sass', function(){
   return gulp.src('css/style.scss')
     .pipe(sass())
     .pipe(gulp.dest('css/'))
});

// gulp watch for changes
gulp.task('watch', function() {
    gulp.watch('css/*.scss', ['sass']);
});
