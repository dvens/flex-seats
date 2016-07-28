# Damco Seats
* Link to the Damco Web Application: [damco.dylanvens.com](http://damco.dylanvens.com)
* To register an account use the validation code: #damco25

## Important!!
Since previous week I made a new iteration and changed the colors and the UI of my design. I choose new colors that are optimized for people with color blindness. You can find the new design and the old design below.

### Things I changed
* Changed the UI and colors
* Deleted functionalities that were unnecessary
* Changed HTML semantics (ul > ol)
* Added an message box for feed back to the users.

### Design decisions
* On the second design I deleted the amount of employees coming because it is only important to the user to know how many seats there are available. 
* Changed to homepage to a list view because the content was hidden behind a horizontal scrollbar and the user can see the data of multiple days now instead of just one. 
* On the calendar page the user can book multiple days a head instea of clicking each day individually. 

>New homepage

![first load](screenshots/home.jpg)
![first load](screenshots/normal-list.jpg)

>New messages boxes

![first load](screenshots/warning.jpg)
![first load](screenshots/nav.jpg)

>New calendar 

![first load](screenshots/calendar.jpg)

## Introduction
Damco Seats is an application where the employees of Damco can book their desks and are able to book their days to determine if they are at the office or not. 

## Problem
Damco has an IT departement in The Hague with a limited office space available. The partement has two kind of desks: first serve basis called flex desks and some people with a fixed desk. People that are travelling far from the office find out that there are no desks available because of the first come first serve basis. They asked me to build a tool/system that will solve this problem.

## Before getting started
It's recommended to have some kind of knowledge of the following things:
* PHP 
* MySQL
* PDO

## Getting started
For this application I used to following software to run a MySQL database and an Apache server: [Xampp website](https://www.apachefriends.org/index.html)

* Step 1 - clone or download the repo [clone](https://github.com/dvens/flex-seats.git) & [download](https://github.com/dvens/flex-seats/archive/master.zip)

* Step 2 - Create database and import SQL file
First open Xampp or any other tool that runs an Apache server and create a database called 'Damco'. After you're finished download the [Damco SQL file](https://github.com/dvens/flex-seats/blob/master/screenshots/damco.sql) file. Next change the connection.php to your own database settings:

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

# Old design
## Feature branches
In this section I will tell you what you can find in each feature branch.

### Branch: Development
Everytime you've completed a module or other feature you can push it to this branch to test the module on. If the module is completed you can merge the development to the master branch !but only for deployement.

### Branch: Calendar
This branch contains the main calendar on the homepage. The calendar lets the user update his status to 'working from home' or 'working at the office'. 
At this calendar the user can see if there are any seats available. 

> Mobile

![first load](screenshots/1.png)
![first load](screenshots/2.png)

> Desktop

![first load](screenshots/11.png)

### Branch: feature/login
This branch contains the login/register flow where the user can validate him/herself to register at Damco Seats.

> Desktop

![first load](screenshots/16.png)
![first load](screenshots/17.png)
![first load](screenshots/18.png)

### Branch: feature/admin
This branch contains the admin panel where the administrator can add/delete desks, users and rooms.

> Mobile

![first load](screenshots/7.png)
![first load](screenshots/8.png)
![first load](screenshots/9.png)

> Desktop

![first load](screenshots/14.png)

### Branch: feature/calendar-full
This branch contains the calendar where the user can book his vacation or other days.

> Mobile

![first load](screenshots/5.png)

> Desktop

![first load](screenshots/13.png)

### Branch: feature/account
This branch contains the account settings page where the user can update his account settings.

> Mobile

![first load](screenshots/6.png)

> Desktop

![first load](screenshots/15.png)

### Branch: feature/desks
This branch contains the booking of desk the user can select multiple desks to book them for him and his clients.

> Mobile

![first load](screenshots/4.png)

> Desktop

![first load](screenshots/12.png)

### Branch: feature/pageloader
I added a SPA page because the entire website is progressive enhanced, so I added some fancy page loading to the application. 
The Javascript is build with CommonJS pattern. 

* How to setup a CommonJS module
```javascript

function Calendar(element) {

    var _this = this;
    var _element = element;
    var _calendarDates = _element.querySelector('.calendar__dates ul');
    var _activeItem = _calendarDates.querySelector('.is--active');

    _this.init = function() {

        initEvents();
        setScrollPosition();

    }

    function initEvents (){

        window.addEventListener('resize', function(e){
            
            setScrollPosition();

        });

    }

    function setScrollPosition() {

        _calendarDates.scrollLeft = (_activeItem.offsetWidth - _calendarDates.offsetWidth) + _activeItem.offsetLeft + (_calendarDates.offsetWidth / 2 - _activeItem.offsetWidth / 2);

    }

    _this.init();

}

module.exports = Calendar;

```

### Branch: feature/webfontloader
* I used Web Font Loader from type kit and used the following article [Web Font Loader](https://css-tricks.com/loading-web-fonts-with-the-web-font-loader/)
* Web Font Loader loads Google fonts from the Google font library.
* I didn't implemented it in the master branch because it still has a couple of bugs.

#### How I implemented it 
* Npm installed Web Font Loader

> Used the following code 

```javascript
var webFont = require('webfontloader');

webFont.load({
  
  google: {
    families: ['Open Sans'] //Latin is the script type
  }

});

```

> Used the following code in SASS

```
.wf-active {
    font-family: $font-family-open-sans;
}

```

## Features from the courses of the minor Everything Web
In this secion I will explain the things that I've learned during the the minor Everything Web and how I'he implemented them into my app. 

### Web App From Scratch
* I used CommonJS to define multiple modules and used constructors to make classes. (these modules are now useable in other projects too). 
* I made a pageloader with vanilla Javascript it uses XHR and the new ES6 promise. The page loaders does a GET to get the page data and transitions the page without refreshing. 
* I used history.pushstate api to change the url when a page is being loaded. 

### CSS To The Rescue
* Used BEM to define different modules in CSS
* Used SASS to define the different HTML elements and modules.
* Used smart selectors like 'input + label and input ~ label'.
* Used CSS animations (with cubic-bezier) for the loading spinner and to transition different UI elements. 
* Used Mobile First Design approach added media queries only for desktop.
* Used semantic html.

### Browser Technology
* Used PHP to render the templates server side
* Build the Application PE in the following order HTML, CSS & Javascript. 
* Used MySQL to store and retrieve the data. 
* Made a module/view loader in PHP for server side rendering.
* Made the application accessible with only a keyboard. 
* Feature detection on ClassList and History Pushstate.
* The core functionality (calendar) works without Javascript. 
* Added enhancements for people with a newer browser (page loading, transitions, menu with javascript on mobile).

### Performance matters 
* Added web font loader to load in Google Fonts.
* Focussed server side rendering because of speed. 
* Used Gulp to transform SASS into CSS (minified).
* Used Gulp Browserify to load/compile different modules.
* Used Gulp imagemin to compile and minify different SVG's.
* Optimized HTML and CSS didn't use selectors longer than 3 deep.

## Speedtest
I did a speedtest on the homepage with a Regular 2G Throttle.
* Throttle: Regular 2G (300ms, 250kbs, 50kbs).
* First paint: 1.66s
* DomContentloaded: 1.75s
* loadEvent: 2.03s

![first load](screenshots/10.png)

## TODO's and Features
There are still somethings that can be improved or can be added to the application. Here is a list of things that I could add:
- [ ] Add a calendar to the desk page so the user can book for a long period of time.
- [ ] Add criticial CSS to each PHP file
- [ ] Remove desks when a room is being removed
- [ ] Add UI transition to the calendar (page transition when a new date is being loaded).
- [ ] Add a service worker to cache certain files (css and javascript file).
- [ ] If it is usefull make a Progressive WebApp out of Damco Seats (otherwise for learing purposes).

## Bug fixes
- [ ] Bug fix the webfontloader
- [ ] Test the calendar scrollTo (still a bit laggy)
