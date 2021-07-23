### CSE 446 : Web Technologies

# Volunteer Management


## Motivation

In Sust, there are many different type of organization for example cultural, career oriented, debate etc. These organizations arranged many events throughout the calender year. They need many students as volunteer for organizing the event. 


Our website can make the job easier for the organizations. They can create event in the website and recruit students as volunteer. 




## Features


- Volunteer registration and login
- Organization registration and login

- Volunteer can create and edit their profile. They can include their information for example their photo,registration no, department, phone no, email, bio, address etc.

- Organization can also create and edit their own profile which will include their organization details, cover photo, logo, moto, description , contact details etc. There is a beautiful interface to view the organization profile.


- Organization can create event with event details.
 

- Volunteers can request to perticipate in different events. 

- Organizers will approve volunteer's request after judging their profile.

- Organizer can edit or delete a event. They can view the events separately which only they have created.

-There is a home feed to show all the events.

-There is section in the home page where some of the featured organization are displayed.

-Anyone can search for event using title or event category.


## Requriments

SUST CSE RESOURCS ARCIEVE is a web application, built in Laravel. So, we need following requirements to run our project.

- PHP  >= 7.2.34

We need the followings to run the project:
- Composer
- Xampp
- MySQL
- Laravel
- VueJS
- Source Code Editor: Visual Studio Code

## PHP Version Check
To check if PHP is already install in the system or to check the version we can run the simple command:

```sh
php --version
```

To install PHP we can simply follow the instructions of this site:
https://www.sitepoint.com/how-to-install-php-on-windows/

## XAMPP Istallation
To install XAMPP, we need to visit the following link:
https://www.apachefriends.org/index.html

From there, we have to download appropriate XAMPP version.

## Composer Istallation

To manually download composer, we need to visit the following link and download exe file:
https://getcomposer.org/download/


## LARAVEL Istallation
First, download the Laravel installer using Composer:
```sh
composer global require laravel/installer
```

To create new project , we can run the following command:
```sh
composer create-project --prefer-dist laravel/laravel:^7.0 volunteer_management
```

To run project, we can run the following command:

```sh
php artisan serve
```

To know more about laravel, we can follow the instructions of this link:
https://laravel.com/docs/7.x

## Clone and run project from Github:
We can follow this tutorial, to clone and run project from github:
https://www.youtube.com/watch?v=D5MZaCmpxvM
