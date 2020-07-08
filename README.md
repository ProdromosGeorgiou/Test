<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Summary of Admin Panel 
The task was implemented on Laravel framework.  I have used homestead  - virtual box and MySQL workbench tool. First of all I had to setup the 
project on hosts file and homestead.yaml.  Afterwards I connected the database of project with MySQL workbench.  

The first interface of the website is the input form. The user has to fill the four input fields. If the user insert wrong input, error messages are going
to be displayed on the screen. Instead, if correct data are given the user is redirected to the show.blade.php and success message is displayed. In the view 
show.blade.php all the details of the given company symbol, email and dates are appeared.  The historical quotes are retrieved from the API based on the company 
symbol, start date and end date.  All the details of each historical quote are displayed on the screen.

The last view is the index.blade.php. All the records which are stored in the database are displayed on the screen.  Every time five
records are displayed and the user has the option to paginate to next page or previous page to view any record.

On the top of the page, the options Insert Data and View All Records are available.  
By selecting "Insert Data" option the user is redirected to the create form.
By Selecting "View All Records" option the user is redirected to the page which all records are appeared on the screen.

### Steps to run the program

- Download project
- Edit homestead.yaml file to create the project.
- In homestead.yaml file under sites Enter:  map: assignment.test and  to: /path_of_projects/Assignment/public
- In homestead.yaml file under databases Enter: - homestead5
- Open notepad (administrator mode) and open hosts file to save the project. Insert: 
  {Your ip Address  assignment.test}
- Open command line and execute command: 1) vagrant up, 2) vagrant provision , 3) vagrant ssh.
- Create Database with name homestead5
- Run in command line the command: php artisan migrate, to initialise the tables.
- Link of website: assignment.test



