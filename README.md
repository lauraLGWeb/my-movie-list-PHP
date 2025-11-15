Mini-Netflix – Streaming Platform Project

This project is a small streaming platform made for a training exercise
The goal is to create a website where users can see a list of movies, check movie details, create an account, log in, and add new movies from an admin area.

🚀 Website Features
- Home Page -
  
Shows a welcome message and a main visual.

Displays the 5 most recent movies

Movies appear from oldest to newest.

Each movie shows a title (in uppercase) and a photo with the description. 

- “All Movies” Page -

Shows the full list of all movies.

Each movie has its title, image, and a button to open the details page.

“View this movie” button redirects to the movie details page.

- Movie Details Page -

Shows full information: title, description, photo.

Displays a YouTube video using an iframe stored in the database.

The video can be played directly on the website.

- Registration Page -

Allows users to create an account with a login and password.

The information is saved in the database.

After submitting, the user is redirected to the login page.

- Login Page -

Users can enter their login and password.

The system checks the database for correct information.

If correct → user is redirected to the admin page.

If wrong → message “Incorrect login or password” appears.

- Admin Page (only for logged users) -

Allows adding a new movie into the database.

The form includes: title, description, photo, video.

A new movie appears instantly on the Home page and the All Movies page.

- Database Structure -
  
Database : tp_netflixx_nom_prenom

Table "movies" : 
id (primary key, auto increment)
title (varchar 255)
description (varchar 255)
urlphoto (varchar 255)
urlvideo (text)

Table "user" : 

id (primary key, auto increment)
login (varchar 255)
password (varchar 255)

- Navigation Menu -

The navigation bar is present on all pages using include().

And contains:
* Home
* All Movies
* Registration
* Login
* Admin (only accessible when logged in)
* Logout (appears only when logged in)


-- CSS Style --

The project uses a soft and colorful theme inspired by a light fantasy / Disney style.

Main visual choices:

Rounded cards with shadows

Gradient background

Clean form design

Custom placeholders

Highlight effects on focus

Custom style for file input button

Responsive layout for movie cards

-- Technologies Used --

* PHP
* MySQL (PDO)
* HTML5
* CSS3

-- Setup Instructions --

Clone the GitHub repository.

Import the SQL file into MySQL.

Update the database connection information in the PHP config file.

Run the project on a local server (MAMP, WAMP, Laragon, or PHP server).

Open the project in your browser using your local URL.

-- Access to Admin Area --

To access the admin page:

Create an account on the Registration page.

Log in on the Login page.

You will then see the admin link.

-- Possible Improvements --

* Password hashing
* Dark mode
* Search bar
* Pagination
* Favorite movies system
