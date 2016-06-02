'use strict';

var gulp            = require('gulp');
var $               = require('gulp-load-plugins')();

var config = {

    build: './build/',
    dist: './dist/',
    base: './build/',
    taskPath: './gulp/tasks/',
    
    html: {
        watch: ['src/html/**/*.html'],
        src: ['./src/html/**/*.html', '!./src/html/includes/**']
    },

    php: {
        watch: ['src/**/*.php'],
        src: ['./src/**/*.php']
    },
    
    css: {
        watch: ['src/public/sass/**/*.scss'],
        src: ['./src/public/sass/main.scss'],
        folder: 'css/',
        destFile: 'styles.min.css'
    },
    
    js: {
        watch: ['src/public/js/**/*.js'],
        src: ['./src/public/js/**/*.js'],
        folder: 'js/',
        destFile: 'scripts.min.js'
    },
    
    images: {
        watch: ['src/public/assets/images/**'],
        src: ['./src/public/assets/images/**'],
        folder: '/images/'
    },

    fonts: {
        watch: ['src/public/assets/fonts/**'],
        src: ['./src/public/assets/fonts/**'],
        folder: '/fonts/'
    },
    
    misc: {
        src: [
            '*.ico'
        ]
    },

    error: function(error) {
        $.util.beep();
        $.notify.onError({
            title: 'Gulp',
            message: 'Error: <%= error.message %>'
        })(error);
        this.emit('end');
    }

};

module.exports = config;


