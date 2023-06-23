<?php
/**
 * ==== Controller ====
 * Controller is a class based php file which is used to create logic for related request coming from routes
 * 3 types of controller are there:
 *   - Basic controller
 *   - Single Action controller
 *   - Resource controller (used for CRUD operations)
 * to create a controller use: php artisan make:controller ControllerName (which will create a new controller file in App/Http/Controller folder)
 * to call controller methods in route use Route with controller class like mentioned in routes/web.php
 *
 * * Single action controller is used to perform any single logic written in the invoke method of controller
 * to create a single action controller use "php artisan make:controller ControllerName --invokable (check web.php for more info how to use it )
 *
 * * Resource controller is used to perform CRUD operations using routes. We cannot change the method names in resource controller
 * To call resource controller in web.php file we use "Route::resource('photo', ControllerName::class);
 * We can also use multiple resource controllers in single route using array
 * Partial resource routes is used to get the specified methods of resource controller like:
 *     Route::resource('photos', PhotoController::class)->only([
        'index', 'show'
       ]);
 *
 * * API resource controller  - it is used for api routes and it doesn't have the "create" and "edit" methods in resource controller
 * api resource controller can be registered using "php artisan make:controller ControllerName --api
 * to call api controller using routes we use Route::apiResources('photos', PhotoController::class);
 *
 * * To use csrf token in forms use @csrf inside form tag
 * * @errors - is a super global variable which is use to get the form validation errors
 * to show the errors of each form field use @error('fieldname') {{$message}} @enderror
 * on submit form if you don't want to empty the fields on getting validation errors then use: value="{{old('keyname')}}" attribute in form input field
 *
 * $request->has('name') is used to check whether the value is set or not
 * $request->flash(); is used to keep the value in forms fields after validation errors and multistep forms
 *
 *==== Components ====
 * component is a class based file which is used for reusability of code
 * to register a component use 'php artisan make:component ComponentName. This will create a class in "app/view/components" folder and also add a new file into "resources/views/component"
 * To use component variable in blade files we need to register those vairables into it's class and assign value into constructor method
 * to use component blade file into another blade template we use "<x-ComponentName/>"
 * to pass a custom variable with value in component use ":variableName=''"
 *
 *
 * ==== Database migration ====
 * to connect database with mysql in laravel just setup the db variables in .env file and run "php artisan config:cache" to laod configuration settings
 *To reconfigure cache files like to update migration of databse with connection use: php artisan config:cache
 * Migration is used for perform action in database without going into phpmyadmin directly using code
 * To create new table we use "php artisan make:migration create_tablename_table"
 * TO insert table into database use "php artisan migrate"
 * To revert back migration table from database use "php artisan migrate:rollback"
 * To create relation between table and refresh them to work properly use "php artisan migrate:refresh"
 * To add new column in existing table use "php artisan make:migration add_column_to_tablename_table" this will create a new file of migration and in this file
 * you can add code for column details
 *
 *
 *
 * ======= Models ======
 * Models are class based php file to connect to the database
 * Model is related to table and it is used to interact with database using eloquent and ORM(object relational mapper)
 * php artisan make:model <Modelname> is used to create a model which will create a new file into app/models folder
 * each table has it's own model
 * "php artisan make:model <Modelname> --migration" command is used to create a model along with migration table for the given model name
 *
 */
