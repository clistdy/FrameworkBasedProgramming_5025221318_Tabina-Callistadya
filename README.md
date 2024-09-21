
<div align=center>

|    NRP     |      Name      |
| :--------: | :------------: |
| 5025221318 | Tabina Callistadya |

# Framework-based Programming

</div>

### Assignment Progress 

- [Assignment Week 2](/assignment-week-2/)

#### Assignment Week 2
**Assignment Description**

In week 2, the progress is up to the fifth video from *_Web Programming UNPAS_* YT channel where I learn to install and set up all tools needed for the Laravel 11 Project, Deepen my knowledge regarding the folder structure of Laravel, and Blade Templating Engine.

**Laravel Installation**

For the project, i used XAMPP to create the laravel project since i had trouble on using laravel herd (MacOS Air M2)

**Navigation**

There are 4 navigation links located in the Navigation Bar (which is located in the heading of the website)

**Routes**

All routes to each sub-pages are located in the `routes/web.php`.

```php
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'HomePage']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Tabina Callistadya', 'title' => 'About']);
});

Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog']);
});
Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

```
It stores the data of each page and used to be called in layout later on (for the title) and also store the name to be put in `about` page later on using `$name`

**SubPages**

For each sub-page, the code is shorten to become more effective.

For an example, in `home.blade.php`:

```php
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <h3 class="text-xl">This is homepage</h3>
</x-layout>

```

It calls the layout using x-layout. And it applies to the other aswell.

**Layout**
```php
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>Ini Home</title>
</head>
<body class="h-full">
    
    <div class="min-h-full">
        <x-navbar></x-navbar>
      
        <x-header>{{ $title }}</x-header>

        <main>
          <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <!-- Your content -->
            {{ $slot }}
          </div>
        </main>
      </div>

</body>
</html>
```
This are the layout of each pages in the project where it can be called using `x-layout` like above.

**NavLink**

It is used to make the attributes of the navbar active when it is clicked by the user and non-active when it is not.

```php
<a {{ $attributes }}class="{{ $active ? ' bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}
    rounded-md px-3 py-2 text-sm font-medium" 
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>

```


**Output for the assignment look**

<img width="1470" alt="Screenshot 2024-09-11 at 10 31 59" src="https://github.com/user-attachments/assets/adca6014-81a1-4b40-a2a6-340be5aa6a69">

