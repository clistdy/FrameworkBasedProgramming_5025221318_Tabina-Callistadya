
<div align=center>

|    NRP     |      Name      |
| :--------: | :------------: |
| 5025221318 | Tabina Callistadya |

# Framework-based Programming

</div>

## Assignment Progress 

- [Assignment Week 2](#assignment-week-2)
- [Assignment Week 3](#assignment-week-3)
- [Assignment Week 4](#assignment-week-4)
- [Assignment Week 5](#assignment-week-5)
- [Assignment Week 6](#assignment-week-6)

## Assignment Week 2
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

## Assignment Week 3

### View Data

### Model

## Assignment Week 4

### Database and Migration _(Video 8)_

In this week, the changes arent seen in our UI website, instead we learn how does to collect data from database works using either mysql or SQLite for our website and how migration works.

**Database**

To select which database shall we use, modify it through `.env` and scroll down until you found `DB_CONNECTION`. By default, it is already set to use SQLite where i will also use SQLite for my project. 

<img width="540" alt="Screenshot 2024-09-24 at 19 39 37" src="https://github.com/user-attachments/assets/b9d08ea1-a9bf-4369-9724-e06c5d3d4b37">

To see the contents of our database, use a database client app namely TablePlus. First thing to do is to connect it to our database by clicking the "+" button to add a new connection and select SQLite. Select the path to where our database is located (inside the database folder, named `database.sqlite`. Test the connection and make sure it is marked as "OK" (which means it has been connected) and then save it.

**Migration**
Migration is our way to generate tables in our database so we dont have to make it manually (version control of database). By default, we have 3 migration inside our database folder. Every migration file has a method that contains a database table schema (table layout, containing attributes inside the table). 

<img width="256" alt="Screenshot 2024-09-21 at 16 34 25" src="https://github.com/user-attachments/assets/e870954d-c8a4-40ef-b7e0-00358c03f039">


To run the three of the default migration, use:
`php artisan migrate`

<img width="1002" alt="Screenshot 2024-09-21 at 17 54 22" src="https://github.com/user-attachments/assets/ca146321-0534-495a-a59e-9161a5e76be8">

Back in TablePLus, refresh it and it will display the tables and the structure (including the datatype of each variable).

<img width="988" alt="Screenshot 2024-09-21 at 21 07 11" src="https://github.com/user-attachments/assets/dabc40e7-4ec2-48ca-9681-c99eaff62419">

If the `database.sql` is not exist yet and we tried to migrate, the laravel will ask whether we want to create a new database.

<img width="1030" alt="Screenshot 2024-09-21 at 17 56 46" src="https://github.com/user-attachments/assets/3f68583b-4195-48fa-94ec-d7a57e82b7ec">

To know more about what migration can do, simply type:
`php artisan`
in terminal to display all the artisan command for migration.

<img width="519" alt="Screenshot 2024-09-24 at 20 04 05" src="https://github.com/user-attachments/assets/a43e6858-5e71-48f0-82e8-3240557f80aa">

If you wish to delete or insert an attribute to your schema table and wants to re-migrate, use:
`php artisan migrate:fresh`

Where it will drop all the tables and run the migration all over again from the start. Re-connect (not refresh) the TablePlus to see the changes.

**Generating Migration**

To make a migration, use this artisan command and insert the table name you wish to generate:
`php artisan make:migration (table name)`

In this project, we want to create a migration for our posts table using:
`php artisan make:migration create_posts_table`

<img width="778" alt="Screenshot 2024-09-21 at 21 09 52" src="https://github.com/user-attachments/assets/473128b4-e8a4-486e-a4a1-11ee4abffb96">

<img width="259" alt="Screenshot 2024-09-21 at 21 10 02" src="https://github.com/user-attachments/assets/8528efd0-64ae-4628-a465-a9a450975146">


The laravel will create a new file for our new migration. Open the file and adjust the schema to the model we have created before.

<img width="480" alt="Screenshot 2024-09-21 at 22 28 19" src="https://github.com/user-attachments/assets/1fe3cfbf-97ba-44b2-a697-4872f29ea198">

Run the migration:

<img width="1020" alt="Screenshot 2024-09-21 at 22 28 28" src="https://github.com/user-attachments/assets/a1e9cb2a-c987-4027-9263-1b3853fdd338">

And it will finally displayed in the TablePlus:

<img width="988" alt="Screenshot 2024-09-21 at 22 28 57" src="https://github.com/user-attachments/assets/6a750591-7d52-4b82-9277-a34a04056621">

Lastly, insert our data manually from `post.php` to TablePlus and save it. 

<img width="990" alt="Screenshot 2024-09-21 at 22 33 42" src="https://github.com/user-attachments/assets/f8fb1585-5664-4a7b-8276-8beaf1f34699">

### Eloquent ORM & Post Model _(Video 9)_



## Assignment Week 5

### Model Factories _(Video 10)_
In this video, I learn how the usage of model factories where it will benefits us in inserting data automatically. To write a factory, the file is located inside `database` folder. Defaultly, the `factories` folder consist of `UserFactory.php`. To run factory, use `php artisan tinker` in terminal. And now lets try to input one new data user that have a password that has been hashing before.

<img width="617" alt="Screenshot 2024-09-30 at 16 41 09" src="https://github.com/user-attachments/assets/2d633d54-c524-4d05-aaa2-5fa1322b43a8">

It can also be seen in TablePlus as below:

<img width="799" alt="Screenshot 2024-09-30 at 16 41 38" src="https://github.com/user-attachments/assets/026c04fc-c3e6-4d9c-bf90-1c6d5c365756">

This is an example if we want to generate 10 new user:

<img width="647" alt="Screenshot 2024-09-30 at 16 42 54" src="https://github.com/user-attachments/assets/cfd76135-3eb9-4b8a-a0fd-da30de341717">

<img width="762" alt="Screenshot 2024-09-30 at 16 42 59" src="https://github.com/user-attachments/assets/dad59b59-19f5-4a6a-9e4a-fa99f93ad688">

Trying to add a new column named `is_admin` where defaultly it will be marked as false.

<img width="725" alt="Screenshot 2024-09-30 at 16 46 50" src="https://github.com/user-attachments/assets/a48fe018-8084-48f6-bc83-4b3b36549215">

And add a new method simillar to `unverified` method namely `admin` and set the value to true.

<img width="489" alt="Screenshot 2024-09-30 at 16 47 54" src="https://github.com/user-attachments/assets/6eae97ca-f226-4eb3-bffa-93acd07ca176">

Remigrate our database

<img width="1046" alt="Screenshot 2024-09-30 at 16 48 34" src="https://github.com/user-attachments/assets/af19feec-757e-4f36-82e3-0d744dfa73cd">

<img width="785" alt="Screenshot 2024-09-30 at 16 49 24" src="https://github.com/user-attachments/assets/762c9ed4-d703-47d1-b322-d415a3540767">

With `is_admin` added, create 10 new user using factory:

<img width="354" alt="Screenshot 2024-09-30 at 16 50 07" src="https://github.com/user-attachments/assets/4b184713-7f17-40fb-be49-644e376025c8">

<img width="616" alt="Screenshot 2024-09-30 at 16 50 14" src="https://github.com/user-attachments/assets/1c76eba5-3e94-4155-b103-4350135342c5">

Add 5 user whom their email is marked unverified:

<img width="625" alt="Screenshot 2024-09-30 at 16 51 27" src="https://github.com/user-attachments/assets/501edf90-6a9d-4f37-8974-18ff135eac30">

<img width="570" alt="Screenshot 2024-09-30 at 16 51 43" src="https://github.com/user-attachments/assets/a3fe4957-eee4-4a27-889a-74c1c3a62e74">

Add 1 user and mark it as admin:

<img width="634" alt="Screenshot 2024-09-30 at 16 52 13" src="https://github.com/user-attachments/assets/e0fe4cf1-4577-4c0e-9cfc-89c7dfb55728">

<img width="584" alt="Screenshot 2024-09-30 at 16 52 24" src="https://github.com/user-attachments/assets/689fa58e-c7ff-469d-9dc6-ef93057c1cbf">

Next, try to change the faker language to another language so the result will adjust to the selected country:

<img width="363" alt="Screenshot 2024-09-30 at 17 03 09" src="https://github.com/user-attachments/assets/d85b86df-554c-442d-ad95-0f1bd447e34d">

And generate 100 new user data:

<img width="832" alt="Screenshot 2024-09-30 at 17 08 06" src="https://github.com/user-attachments/assets/7fc5aa05-e4d3-42af-9627-e0f238ff4f99">

Next, make our own factory class for Post model so name it `PostFactory`

<img width="610" alt="Screenshot 2024-09-30 at 17 08 51" src="https://github.com/user-attachments/assets/2a391209-9277-4eb6-9438-ccc16003a6d8">

Modify and fill each field for our post model which are title, author, slug, and body. We will use helper faker to fill each field.

<img width="410" alt="Screenshot 2024-09-30 at 17 13 39" src="https://github.com/user-attachments/assets/aae921d9-41d8-47b7-90d3-112a6470fd99">

Generate 200 new posts using our PostFactory:

<img width="1049" alt="Screenshot 2024-09-30 at 17 14 14" src="https://github.com/user-attachments/assets/44886c25-469a-40b5-91e7-32a2423eae0c">

<img width="827" alt="Screenshot 2024-09-30 at 17 14 35" src="https://github.com/user-attachments/assets/d8733354-ae6b-40bc-ad48-fabebd7c7f84">

And it has successfully been made:

<img width="1470" alt="Screenshot 2024-09-30 at 17 15 15" src="https://github.com/user-attachments/assets/deb10579-f33b-47d1-99a9-f6a8217dd2d5">

**Additional**
There are 3 logical operator that i learned from this video:

-Ternary Operator
`$a = $a ? $a : $b;`
-Elvis Operator
`$a = $a ?: $b;`
-Null Coalescing Operator
`$a ??= $b;`

### Eloquent Relationship _(Video 11)_

### Post Category _(Video 12)_

### Database Seeder _(Video 13)_

## Assignment Week 6




