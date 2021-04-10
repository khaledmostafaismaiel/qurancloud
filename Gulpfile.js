var gulp = require('gulp');
var phpspec = require('gulp-phpspec');
var run = require('gulp-run');
var notify = require('gulp-notify');

gulp.task('test',function () {
    gulp.src('spec/**/*.php')
        .pipe(run('clear'))
        .pipe(phpspec('',{notify:true}))
        .on('error',notify.onError({
            title:'failure',
            message:'Your test have returned red.',
            // icon: __dirname +"/images/check.jpg",
            // sound:'Frog'
        }))
        .pipe(notify({
            title:'success',
            message:'All tests have returned green.',
            // icon: __dirname +"/images/cross.png",
            // sound:'Frog'

        }));
});

gulp.task('watch',function () {
    gulp.watch(['spec/**/*.php','src/**/*.php'] ,'test');
});

gulp.task('default',['test','watch']);
