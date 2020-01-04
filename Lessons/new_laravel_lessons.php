<?php
-----To cover on 17th June-----
- Migrations
- Routing
- Controllers
- Models

 // we have 2 options , --create and --table when creating migrations in laravel
php artisan make:migration create_users_table --create=users
php artisan make:migration add_column_to_users_table --table=users


// rollback the latest migration
php artisan migrate:rollback
php artisan migrate:rollback --step=2 // the last 2 migrations

// rollback all the migrations
php artisan migrate:reset

// rollback all migrations and re-run them
php artisan migrate:refresh  // --seed, --step=2

// drop all tables and migrate them again
php artisan migrate:fresh  // --step

// Understanding Routing, Middleware and guards
route optional parameters
// you put a ? at the param and give it a default in the closure
Route::get('user/{name?}', function($name = null){
	
})

// can also constrain a route according to the route parameter value
Route::prefix('routes')->group(function(){
    Route::get('constraints/{name}', 'UserController@index')->where('name', 'vin');
});

// List of methods on the Route Class, they can be chained
- get, post, delete, group, middleware, prefix

Accessing the current route

Route::current();
Route::currentRouteName();
Route::currentRouteAction();


The fillable attribute on a model serves as a whitelist for attributes on a model that are mass assignable especially when u use the create() method to persist a model, the guarded attribute does the exact opposite

firstOrCreate()  // first checks if the record exists and if it doesnot, it inserts it, otherwise it updates, it takes two parameters, and it returns a model instance
firstOrCreate(['name' => 'john'], $data);


Soft deleting in laravel means inserting an extra column of deleted_at in a table, if its value is not null then that row is not returned during querying 

to determine if a given model has been soft deleted, use the trashed() method on the model instance

to delete a softdeleted model by force, use the method forceDelete() on the model

Eloquent mutators

Serialization

You can hide and show attribute values from the results returned from the model using the protected attributes of $hidden and $visible on the model, u can also use the methods makeHidden('') and makeVisible('') on the model again

There is also appending values to a returned json but this value has no corresponding column in the db, use the $appends attribute on the model and define an accessor for it, you may also use the append method in the controller


Eloquent resources


Errors

The debug option in the config/app.php file should be set to false in prod but to true in dev so as not to show sensitive info to users in prod



Storage

You may store your files anywhere using laravel, there are a few configurations

The config/filesystems.php file has these configs where u may define diff disks on the local or other drivers
the 'public' disk stores files at storage/app/public and you need to create a sym link to it in the public/ folder using the command
php artisan storage:link
The line below says that in the public disk (storage/app/public) create a folder called images and in it save the given $file, the whole line returns the new name of the file relative to the root directory

$newname = Storage::disk('public')->put('images', $file);
$newname = images/jfhyh83inj.png

Storage::disk('public')->get('js.jpg'); 











?>