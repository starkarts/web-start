const gulp = require('gulp');
const browserSync = require('browser-sync').create();

gulp.task('hello', (done) => {
  console.log('Привет мир!');
  done();
});

// Static server
gulp.task('browser-sync', () => {
  browserSync.init({
      server: {
          baseDir: "./"
      }
  });
  gulp.watch("./*.html").on('change', browserSync.reload);
});