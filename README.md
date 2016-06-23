# Damco Seats
* Link to the Damco Web Application: [damco.dylanvens.com](http://damco.dylanvens.com)

## Introduction
Damco Seats is an application where the employees of Damco can book their desks and are able to book their days to determine if they are at the office or not. 

## Problem
Damco has an IT departement in The Hague with a limited o ce space available. The partement has two kind of desks:  rst serve basis called  ex desks and some people with a  xed desk. People that are travelling far from the o ce  nd out that there are no desks available because of the  rst come  rst serve basis. They asked me to build a tool/system that will solve this problem

## Before getting started
It's recommended to have some kind of knowledge of the following things:
* PHP 
* MySQL
* PDO

## Getting started
For this application I used to following software to run a MySQL database and an Apache server: [Xampp website](https://www.apachefriends.org/index.html)

* Step 1 - clone or download the repo [clone](https://github.com/dvens/flex-seats.git) & [download](https://github.com/dvens/flex-seats/archive/master.zip)

* Step 2 - Create database and import SQL file
First open Xampp or any other tool that runs an Apache server and create a database called 'Damco'. After you're finished download the [Damco SQL file](https://github.com/dvens/flex-seats/archive/) file. Next change the connection.php to your own database settings:

```php
<?php 

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'damco';
     
    //Connect to MySQL and instantiate our PDO object.
    $conn = new PDO("mysql:host=$host;dbname=$database", $user, $pass);

?>
```

* Step 3 - Set the xampp root to the build folder 
Before running the Apache server set the root of the Apache server to the root of your project build folder. 

* Step 4 - install dependencies

```
npm install
```

* Step 5 - change the proxy in browserync to your own (my apache runs on localhost:8000).
```javascript
gulp.task('browser-sync', function() {

    browserSync.init({
        proxy: 'localhost:8000'
    });

});
```

* Step 6 - running the gulp command

Run a gulp server it will automatically open a new window with [http://localhost:3000](http://localhost:3000). It will not show anything because the Apache Server is not running so run your MySQL Database and Apache server. 

```
gulp server
```

Gulp will make an /build folder with a compiled CSS and Javascript file. Gulp will auto refresh the page when you change something in your SASS files or Javascript files. Gulp will also move the PHP files.

### Gulp
- Run `gulp server` to build your templates to the `build/` folder with a local server with browsersync and watchers.
- Run `gulp build` to build and minify your project to the `build/` folder
- Run `gulp dist` to build and minify your project to the `dist/` folder for distribution to production server
- Run `gulp dist:server` to build and minify your project to the `dist/` folder for distribution to production server with a local server with browsersync and watchers

### Gulp Folders
- /src/ --> Working directory Non build html templates
- /build/ --> Folder where html will be build for development
- /dist/ --> Folder for distribution (minifying etc)

## Folder structure
```
/gulp 
    /tasks                          // Gulp tasks each in their own file
    config.js                       // Gulp config file
/src
    /app
        /_base                      // Base files such as footer, head and header
        /core                       // The core of the application view/module loader
        /modules                    // The main PHP modules
        /templates                  // The views for the pages being loaded with module loader
    /public
        /assets
            /images                 // Images folder
        /js
            /modules                // Folder with Javascript modules
            /helpers                // Folder with Javascript helpers
            main.js                 // File where all the main modules are initialized
        /sass                       // Folder where all the .scss files are stored.
            /core                   
            /elements               // Folder with element such as (links, buttons etc)
            /modules                // Folder with the main modules of the app (calendar, desk page etc)
            _config.sccs            // Config file (color variables, width variables etc)
            main.sccs               // File where all the .scss are imported
    config.php                      
    index.php                       // File were head/footer etc is being included                     

```

### Module loader
For the application I build a small module loader called Peach. The modules handle the following folder structure:
```
/modulename
    modulename.controller.php
    modulename.php
```

To call a module use the following function (second parameter is a $moduleType):
```php
    <?php $app->loadModule('modulename', null); ?>
```

The templates handle the following folder structure:
```
/templatename
    templatename.controller.php
    templatename.tpl.php
```

To call a template use the following function
```php
    <?php $app->loadView($app); ?>
```

## Feature branches
In this section I will tell you what you can find in each feature branch.

### Branch Calendar


## Speedtest
![first load](screenshots/first-load.png)
> Data

Throttle: Regular 2G (300ms, 250kbs, 50kbs).
first paint: 1.66s
Domcontentloaded: 1.75s
loadevent: 2.03s






## TODO's and Features
There are still somethings that can be improved or can be added to the application. Here is a list of things that I could add:

- [ ] Test

## Bug fixes
- [ ] Test
