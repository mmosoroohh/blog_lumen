# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/lumen)](https://packagist.org/packages/laravel/lumen-framework)

- Blug Lumen is a simple blog project for TopMama backend engineer assessment test.
- This is documentation is made on how to use the REST API endpoints created using `AN API of Ice and Fire` "https://anapioficeandfire.com" and how to consume the different resources on their platform.

### Prerequisities
 In order to install and run this project locally, you would need to have the following installed on your local machine
  - **PHP 7+**
  - **Composer**
  - **MySQL**

### Installation
* Clone this repository

* Navigate to the project directory `cd blog_lumen`

* Run to install dependencies `composer install`
  
* Edit the `env` file for the database credentials to your database instance

* Create a MySQL database

* Run the command `php artisan migrate` to create and sync the MySQl database

* Run the command `php -S localhost:8000 -t public` to run the development server

## Testing REST API endpoints

<table>
<tr><th>Test</th>
<th>API-endpoint</th>
<th>HTTP-Verbs</th>
</tr>
<tr>
<td>GET ALL BOOKS</td>
<td>/api/books</td>
<td>GET</td>
</tr>
<tr>
<td>GET A SINGLE BOOK</td>
<td>/api/books/{id}</td>
<td>GET</td>
</tr>
<tr>
<td>GET ALL CHARACTERS</td>
<td>/api/characters</td>
<td>GET</td>
</tr>
<tr>
<td>GET A SINGLE CHARACTERS</td>
<td>/api/characters/{id}</td>
<td>GET</td>
</tr>
<tr>
<td>GET SORTED CHARACTERS BY NAME</td>
<td>/api/characters/</td>
<td>GET</td>
</tr>
<tr>
<td>GET SORTED CHARACTERS BY GENDER</td>
<td>/api/characters</td>
<td>GET</td>
</tr>
<tr>
<td>GET SORTED CHARACTERS BY AGE</td>
<td>/api/characters</td>
<td>GET</td>
</tr>
<tr>
<td>ADD COMMENT ON A BOOK</td>
<td>/api/comments</td>
<td>POST</td>
</tr>
</table>


