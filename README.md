
<div align=center>

|    NRP     |      Name      |
| :--------: | :------------: |
| 5025221318 | Tabina Callistadya |

# Framework-based Programming: Laravel 11 Framework

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

Based on previous video, the author of the post is still manually generated and is not connected to User table. In this video, the author will be assigned as a foreign key in table users. To do this, we need to find the relation. Beforehand, make sure that the author of each post is strictly one author. One author can have many posts. To join 2 tables, an index, foreign key is needed. Set the `author_id` references `id` in User tables where it will resulting a constraints.

<img width="598" alt="Screenshot 2024-10-01 at 19 44 05" src="https://github.com/user-attachments/assets/3c382e05-e0b7-4321-8984-1176aa4605e3">

Remigrate our database while we change the table structure.

<img width="1028" alt="Screenshot 2024-10-01 at 19 46 20" src="https://github.com/user-attachments/assets/fa5df540-5434-4e58-aaee-2395d30017cb">

Reconnect the TablePlus, it can be seen in the `Posts` table that `author_id` has a foreign key named `id`.

<img width="580" alt="Screenshot 2024-10-01 at 19 47 06" src="https://github.com/user-attachments/assets/21fe1f05-7052-47ea-ae4b-35cb050f8c32">

If you also want to create an index, do it using constrains.

<img width="508" alt="Screenshot 2024-10-01 at 19 50 30" src="https://github.com/user-attachments/assets/22e26bc5-0eb6-410a-bc23-3468e260e492">

Dont forget to remigrate the database and reconnect it because theres a change in the table structure.

<img width="1028" alt="Screenshot 2024-10-01 at 19 52 45" src="https://github.com/user-attachments/assets/69b9baea-65ff-448a-930b-57616980960c">

<img width="601" alt="Screenshot 2024-10-01 at 19 53 31" src="https://github.com/user-attachments/assets/36a53e8b-8365-4ab1-aed1-7e6f70b84a5a">

Make 10 data post using factory, but beforehand we need to modify it from the previous video. Firstly is to change `author` to `author_id` in PostFactory.php and connect it to the User factory. So we can generate id while making a new factory

<img width="450" alt="Screenshot 2024-10-01 at 19 55 55" src="https://github.com/user-attachments/assets/52b91eb6-bea1-4bef-8ec6-f46d5dee10fa">

run `php artisan tinker` and create 10. 

<img width="1017" alt="Screenshot 2024-10-01 at 19 58 10" src="https://github.com/user-attachments/assets/f574cd0d-3bc6-4a64-8c3d-b45fad86bf4f">

It can be seen that theres 10 posts in posts table in TablePlus and at the same time, it also generates 10 data in user table.

<img width="828" alt="Screenshot 2024-10-01 at 19 59 46" src="https://github.com/user-attachments/assets/990e1e84-4661-4b54-ab04-55bd96dd1063">

<img width="756" alt="Screenshot 2024-10-01 at 19 59 59" src="https://github.com/user-attachments/assets/7ae8a126-ce0f-4350-8a70-dae444956093">

Now lets try to randomize it using `recycle`. By running `App\Models\Post::factory(100)->recycle(User::factory(5)->create())->create();`, it means that we are creating 100 posts with 5 users only and randomize it using `recycle`.
As can be seen in the Users table that there are only 5 users

<img width="789" alt="Screenshot 2024-10-01 at 20 51 27" src="https://github.com/user-attachments/assets/e60681d4-8d95-45c6-af5f-ea50deacc7de">

while there are 100 posts in posts table and writen by only 5 users (one user for each post):

<img width="790" alt="Screenshot 2024-10-01 at 20 56 28" src="https://github.com/user-attachments/assets/7826dbb3-fc7a-46bc-ba7d-25bafbe44a34">

But the author is not displayed in our web UI.
<img width="1470" alt="Screenshot 2024-10-01 at 20 59 32" src="https://github.com/user-attachments/assets/20649ec4-7deb-463e-872f-7a4f313d57a2">

To fix this, add a relation in `Post.php`. 

<img width="491" alt="Screenshot 2024-10-01 at 21 04 36" src="https://github.com/user-attachments/assets/6c703b3d-4c39-49b7-b88d-ae0e75e0ead0">

Next, make the relation in `User.php`. We need to tell laravel that the foreign key is `author_id`.

<img width="519" alt="Screenshot 2024-10-01 at 21 09 04" src="https://github.com/user-attachments/assets/566ff460-afd2-4c8a-96f8-7a1fef00a3f9">

After joining the tables, we can know how many posts did the author write. 
<img width="583" alt="Screenshot 2024-10-01 at 21 10 52" src="https://github.com/user-attachments/assets/11c234c3-0c37-4b2d-a791-4773c1135041">

Now we can collect from `post` table and call the relation method which is `author`, and call the `name`.

<img width="974" alt="Screenshot 2024-10-01 at 21 13 32" src="https://github.com/user-attachments/assets/06f9a93a-bbf9-4b1f-86a6-9e4445ee

And the web UI is finally fixed. This is called `lazy loading`, but we need to be careful because it might affect our performance in the future.

<img width="1470" alt="Screenshot 2024-10-01 at 21 14 12" src="https://github.com/user-attachments/assets/74189a7d-d856-4d3f-bbbb-a7958bc382fe">
9532">

Lastly in this video, we will make a new feature where whenever we click the author, it will display all the posts that has been writen by the selected author. Add hover underline effect too in each author.

<img width="973" alt="Screenshot 2024-10-01 at 21 18 59" src="https://github.com/user-attachments/assets/ab6777fc-fc3c-4c50-9f8d-cedcbe23cc0b">

Make the route to `/authors` in `web.php` where we will also taking advantages of relation that we have created beforehand. 

<img width="819" alt="Screenshot 2024-10-01 at 21 24 31" src="https://github.com/user-attachments/assets/609063a7-bcaf-45f6-8e9e-f1c26aff08b3">

And there we go, it displays all articles that are writen by the selected author

<img width="1470" alt="Screenshot 2024-10-01 at 21 25 22" src="https://github.com/user-attachments/assets/3946084f-1ec3-449c-8ece-604f7003ba60">

Lastly, we need to update the link route in the `post.blade.php`.

<img width="1037" alt="Screenshot 2024-10-01 at 21 28 50" src="https://github.com/user-attachments/assets/5e4ef38a-5527-4063-b176-5c3ceabd1038">

### Post Category _(Video 12)_

Add a new variable `username` and dont forget to set it `unique` so there cant be 2 exact same username.

<img width="654" alt="Screenshot 2024-10-02 at 11 54 36" src="https://github.com/user-attachments/assets/5ada7d86-746c-45e5-b340-883a922bd3b6">

And dont forget to add it too in the factory.

<img width="726" alt="Screenshot 2024-10-02 at 11 54 27" src="https://github.com/user-attachments/assets/9d7520b2-b271-45f0-88d6-cc54a4581285">

remigrate our database and generate 100 posts using factory and recycle the user model. There will be only 5 users.

<img width="1027" alt="Screenshot 2024-10-02 at 12 10 14" src="https://github.com/user-attachments/assets/d76176df-784a-429e-a45c-8f98eabd0217">

<img width="1036" alt="Screenshot 2024-10-02 at 12 11 06" src="https://github.com/user-attachments/assets/51f2504a-6198-45ef-b74a-84b3ec16e07a">

It can be seen in our web UI
<img width="227" alt="Screenshot 2024-10-02 at 12 12 47" src="https://github.com/user-attachments/assets/806fba11-a2c8-45a4-93c9-7d216e78f49b">

Next is to differ the clickable text by modifying it inside the div container inside `posts.blade.php`
<img width="933" alt="Screenshot 2024-10-02 at 12 19 04" src="https://github.com/user-attachments/assets/d32f75e7-7ed1-4fb6-a01b-196bcd2a6260">


Notice the color difference between the clickable text and non clickable in our Web UI. But when we click it, it will display error since it still searching for the id.
<img width="488" alt="Screenshot 2024-10-02 at 12 17 12" src="https://github.com/user-attachments/assets/ade56683-08a7-4b83-b472-ff65995a475b">

To fix it, route it to username instead of id in `web.php`. And add a count feature to easily know how many articles have the writer wrote.

<img width="909" alt="Screenshot 2024-10-02 at 12 22 07" src="https://github.com/user-attachments/assets/f242c458-9fab-4030-9520-422dafcbb6b6">

In the web UI:

<img width="1470" alt="Screenshot 2024-10-02 at 12 23 22" src="https://github.com/user-attachments/assets/77277404-b691-4c2e-a923-6940d558f6e9">

And now we will modify the post category so it will work like how we modify the user. To achieve this, we will make a new model, migration, and factory in the terminal. `-mf` here means we will also be creating migration and factory as well with the model.

<img width="801" alt="Screenshot 2024-10-02 at 12 26 29" src="https://github.com/user-attachments/assets/7f2ab718-6002-458a-a2a4-3c2c1a964462">

The first thing to do is to modify the migration first. Add name for category name and also it slug.
<img width="529" alt="Screenshot 2024-10-02 at 12 27 41" src="https://github.com/user-attachments/assets/134f7d4b-07be-4e5a-9e41-0c198f730324">

Dont forget to modify the post migration because we will connect the id as the foreign key.

<img width="420" alt="Screenshot 2024-10-02 at 12 29 44" src="https://github.com/user-attachments/assets/405d74e1-cb8c-41ed-b596-65db5ad17e29">

Next we will make model relations. Firstly in `Category.php` model. This mean one category could have many posts.

<img width="479" alt="Screenshot 2024-10-02 at 12 31 48" src="https://github.com/user-attachments/assets/0521acd4-e8c4-45d3-8e46-c6c1e4616bd1">

Switch to `Post.php` model. And now both models are connected with each other.

<img width="372" alt="Screenshot 2024-10-02 at 12 34 02" src="https://github.com/user-attachments/assets/024cee54-37aa-493f-b05a-94d79409ba71">

Lastly is factory. and set the sentence to be randomized either its 1 word or 2 words.

<img width="515" alt="Screenshot 2024-10-02 at 13 30 01" src="https://github.com/user-attachments/assets/37987e61-b2d9-40b6-bfe1-0384109a7f60">

And in `PostFactory`, add the category_id

<img width="449" alt="Screenshot 2024-10-02 at 13 32 06" src="https://github.com/user-attachments/assets/c5020245-bfdd-4d74-a539-f3b97a17524a">

Remigrate our database, make sure that theres already foreign key to user table and foreign key to category table. 

<img width="613" alt="Screenshot 2024-10-02 at 13 34 05" src="https://github.com/user-attachments/assets/383cc3ad-0e5b-4651-b43b-de6d284d0383">

Before we start the factory, clean up the auto loading first using `composer dumpautoload` . Wait for the optimization process. And then run `php artisan optimize:clear`.

<img width="1015" alt="Screenshot 2024-10-02 at 13 36 54" src="https://github.com/user-attachments/assets/d49ce794-cbb5-4924-99f9-21db7fd88d72">

<img width="1017" alt="Screenshot 2024-10-02 at 13 37 19" src="https://github.com/user-attachments/assets/d9bcdb5a-82a5-4d10-bc3d-950e4eb9a2b7">

Next we will fill the data by running 3 factories in the same time, which are creating post, creating user, and creating category. User and category will be recycled. To achieve this, place the user and category factories that want to be recyled in an array.

<img width="834" alt="Screenshot 2024-10-02 at 13 40 14" src="https://github.com/user-attachments/assets/782864f7-b51b-4898-94e8-10da3b2bc6c5">

TablePlus Documentation:

<img width="592" alt="Screenshot 2024-10-02 at 13 41 26" src="https://github.com/user-attachments/assets/f5d3ddd3-96ae-4fd3-8cca-daa3185db873">

<img width="798" alt="Screenshot 2024-10-02 at 13 41 45" src="https://github.com/user-attachments/assets/fa9bf3df-6e96-4885-b681-d8a0c58bc307">

It can be seen that category hasnt worked yet in the Web UI. To fix this, go to `posts.blade.php` (Post view), for the category, collect the data from table category from post model. And fix the link route to categories. But we havent created the route.

<img width="979" alt="Screenshot 2024-10-02 at 13 45 18" src="https://github.com/user-attachments/assets/fd991707-49c3-4dab-b80b-28fcc7eedcf4">

Fix the route in `web.php`:

<img width="763" alt="Screenshot 2024-10-02 at 13 50 44" src="https://github.com/user-attachments/assets/450acbd4-c166-445f-9819-5696b4ecaf2e">

<img width="1470" alt="Screenshot 2024-10-02 at 13 50 22" src="https://github.com/user-attachments/assets/c961c064-657e-43e2-9b79-d12133628c11">


### Database Seeder _(Video 13)_

Beforehand, we have implemented factory to fill in the data randomly. Theres a simpler way by using seeder/seeding, so we like plant a data. It can also be combined with factory.

Open DatabaseSeeder.php inside the Database folder

First of all, refresh the migration so the database is cleared and then do `php artisan db:seed`.

<img width="507" alt="Screenshot 2024-10-10 at 15 15 52" src="https://github.com/user-attachments/assets/8122500d-8d6c-410a-a774-8baa5205f208">

It can be seen in TablePlus that all tables have no data except in User data, it generates 1 data from DatabaseSeeder.php

```php
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }

```

<img width="1470" alt="Screenshot 2024-10-10 at 15 15 10" src="https://github.com/user-attachments/assets/c5bda791-06ab-466b-8ccb-66ff2faa68c9">

Next, we try to create 10 new data in user table by running this:
```php
    public function run(): void
    {
        User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */
    }
```

<img width="1469" alt="Screenshot 2024-10-10 at 15 24 05" src="https://github.com/user-attachments/assets/89e2dfd6-9344-4469-b836-9836d98c07e2">

If we want to insert the data manually, we can do:
```php
public function run(): void
    {
       // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        User::create([
            'name' => 'Tabina Callistadya',
            'username' => 'callistadya',
            'email' => 'callistadya@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);
    }
```

And when we refresh it, it can be seen that a new data is inserted.

<img width="1340" alt="Screenshot 2024-10-10 at 15 31 33" src="https://github.com/user-attachments/assets/b3f52986-5053-4d5d-9121-c6ab5faee067">

```php
public function run(): void
    {
        Post::factory(100)->recycle([
            Category::factory(3)->create(),
            User::factory(5)->create()
        ])->create();
    }
}
```

`php artisan migrate:fresh --seed` is to do migration and seeder class at the same time.

If we want to create a custom data and want to recycle it with the other generated data, we can insert the custom data into a variable and then insert the variable to be recycled with the others.
```php
public function run(): void
    {
       // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        $callista = User::create([
            'name' => 'Tabina Callistadya',
            'username' => 'callistadya',
            'email' => 'callistadya@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]); 

        Post::factory(100)->recycle([
            Category::factory(3)->create(),
            $callista,
            User::factory(5)->create()
        ])->create();
    }
```

<img width="427" alt="Screenshot 2024-10-10 at 15 51 07" src="https://github.com/user-attachments/assets/ce5da342-b63c-4e1e-b095-3e93e8b9e553">

<img width="1469" alt="Screenshot 2024-10-10 at 15 51 29" src="https://github.com/user-attachments/assets/bde3d962-b22f-4ede-b315-b42bcade5786">

Lastly, if we want to seperate each seeder to each seeder class, firsly we need to create a new seeder class by using `php artisan make:seeder`

<img width="611" alt="Screenshot 2024-10-10 at 15 54 05" src="https://github.com/user-attachments/assets/9254a851-2634-41d6-be9e-e6f8bfa7780a">

And then fill the seeder class with the seeder, for example here for User seeder:

<img width="611" alt="Screenshot 2024-10-10 at 15 55 07" src="https://github.com/user-attachments/assets/e1c115d2-6694-4163-88ff-3ef2dc3a77f4">

for Category seeder:

<img width="312" alt="Screenshot 2024-10-10 at 16 39 28" src="https://github.com/user-attachments/assets/1c2a7ff4-9d3e-4689-b791-a5642158f6d5">


Call the seeder class in the DatabaseSeeder.php and do migration and seeding again by using `php artisan make:seeder`
```php
    public function run(): void
    {
        $this->call([CategorySeeder::class, UserSeeder::class]); //call the seeder class 
        Post::factory(100)->recycle([
            Category::all(),
            User::all()
        ])->create();
    }
```

<img width="1470" alt="Screenshot 2024-10-10 at 16 45 27" src="https://github.com/user-attachments/assets/20d14c1b-b31d-4a00-b090-0090d9bb487f">


## Assignment Week 6

### N+1 Problem _(Video 14)_
N+1 occurs when there is too many query because of looping. One looping adds one query. There should be only 2 queries, to post and user table. So there are a lot of unnecessary query in a page. To know if our query is ineffective, we need to investigate how many queries are executed in one page by using DebugBar. To download DebugBar, type `composer require barryvdh/laravel-debugbar --dev` in terminal(Source: https://github.com/barryvdh/laravel-debugbar). Use DebugBar while in development mode and do not on public. DebugBar will be shown in the bottom of the page. 

As we can see that there are 201 queries executed in blog page (4 of them are used by laravel session). Because we have 2 features, lazyloading occurs. Lazy loading is beneficial so we dont have to mind about query, but it is also the reason N+1 problem occurs. To overcome this situation, Eager loading (the opposite of lazy loading). Eager Loading loads everything in the beginning by using `$with` method when we call a data.

```php
Route::get('/posts', function () {
   $posts = Post::with(['author', 'category'])->latest()->get();
    return view('posts', ['title' => 'Blog', 'posts'=> $posts ]);
});
```
This reduces the query in blog page down to 6. This is also happens on author page, use Lazy Eager Loading. Because the parent has been retrieved. 

```php
Route::get('/authors/{user:username}', function(User $user){
    $posts = $user->posts->load('category', 'author');
    return view('posts', ['title' => count($posts) .'Articles by '. $user->name, 'posts' => $user->posts]);
});
```
So the queries down to 7, and now do the same to the category:
```php
Route::get('/categories/{category:slug}', function(Category $category){
    $posts = $category->posts->load('category', 'author');
    return view('posts', ['title' => 'Articles in: '. $category->name, 'posts' => $posts]);
});
```
and down to 7.

Now, we can do this automatically from the model with Eagle Loading by Default by adding `$with` property inside the model. Go to model post (post.php) and add `protected $with = ['author', 'category'];`.

Blog query:
<img width="1469" alt="Screenshot 2024-10-10 at 20 56 15" src="https://github.com/user-attachments/assets/a9d30d55-b948-45bf-8323-f95fb71aab56">

Author query:
<img width="1470" alt="Screenshot 2024-10-10 at 20 59 45" src="https://github.com/user-attachments/assets/291ebeec-c9b8-471a-8dc7-0b37b99ac68a">

Category query:
<img width="1470" alt="Screenshot 2024-10-10 at 21 00 06" src="https://github.com/user-attachments/assets/d4dbb35f-9b3b-412a-81b7-ea0ea7a33f52">

If we work in teams and want to make sure that there is no programmer that use lazy loading, we can protect it by go to `App/Providers/AppServiceProvider.php` and insert at boot method. 
```php
    public function boot(): void
    {
        Model::preventLazyLoading();
    }
```

### Redesign UI _(Video 15)_

### Searching _(Video 16)_

### Pagination _(Video 17)_




