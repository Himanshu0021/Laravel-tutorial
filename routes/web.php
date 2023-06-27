<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
use App\Models\Customers;
use App\Http\Controllers\CustomersController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Methods in routes are: Get, Post, Put, Patch, Delete
 * All routes can be listed using artisan command: route::list also to get the route list with middleware defined with them use php artisan route::list -v
 */

//Route::get('/welcome', function () {
//    return view('welcome');
//});
///* Route with variable in url path (inside function we catch the variable)
//* We can use multiple parameters in route uri with optional parameter using "?"
// * php artisan route:list command is use to get the list of all routes with details
// */
//Route::get('/post/{id}/{name?}', function ($id, $name = '') {
//    return 'This the the blog post with id ' . $id . ' and name ' . $name;
//});

/*
* Naming Routes ( to make the route uri in shorter )
*
//*/
//Route::get('/about/post/example', array(
//    'as' => 'admin.post',
//    function () {
//    $url = route('admin.post'); // route() is a helper function to call/access routes
//        return "the url is: " . $url;
//
//}));

/* Post route doesn't work in url bar only get route works
* Post method can work in postman
*/
//Route::post('/test', function () {
//   return "Testing the route" ;
//});
//
//Route::get('/demo', function() {
//   return view('demo');
//});

/*
 * any - route can be used using get or post method
 */
//Route::any('new-route', function () {
//   echo "Any route can be used for get or post route";
//});

/* Compact is use to convert variable into an array within routes
* to get routes variable values into views blade templates use "with" keyword to send variables data
*/

//Route::get('/inventory/{name}/{id?}', function($name, $id = null) {
//    $data = compact('name', 'id');
//    return view('demo')->with($data);
//});
//

//Route::get('/{name?}', function($name = null) {
//    $entity_data = "<h2>Himanshu</h2>";
//    $data = compact('name', 'entity_data');
//    return view('index')->with($data);
//});

//Route::get('/intro', function() {
//   return view('intro');
//});
//
//
//Route::get('/about', function() {
//    return view('about');
//});

/**
 * Route redirect is used for redirection
 */
//Route::redirect('intro', 'about');

/**
 * Route::view is used to only return a view template
 * first argument is the uri
 * second argument is view name
 * third argument is optional as data need to pass into view

//Route::view('/new', 'about');
*/
/**
 * Route regular expression constraints
 * we can use "where" method on a route instance
 */
//Route::get('/user/{$id}/{$name}', function(string $id) {
//
//})->where([
//    'id' => '[0-9]+',
//    'name' => '[a-z]+'
//]);

/**
 * As like regular expressions constraints we can also define global constraints in boot() method of app/Providers/RouteServiceProvidr
 * So it can be apply on all routes parameters
 */
//Route::pattern('id', '[0-9]+');

/**
 * Named routes
 */
//Route::get('/user/{id}/profile', function (string $id) {
//
//})->name('profile');
/* to use named routes */
//$url = route('profile', ['id' => 2]);


/**
 * Group routes
 * - To assign same middleware in multiple routes we can use middleware group
 */

//Route::middleware(['first', 'second'])->group(function() {
//    Route::get('/', function() {
//
//    });
//    Route::post('/users', function() {
//
//    });
//});

/** - To assign same controller class in multiple routes use controller group */
//use App/Http/Controllers/OrderController
//Route::controller(OrderController::class)->group(function() {
//    Route::get('/orders/{id}', 'show');
//    Route::post('/orders', 'store');
//});

/** - To assign same prefix in multiple routes we use prefix with group */
//Route::prefix('admin')->group(function () {
//    Route::get('/users', function () {
//        // Matches The "/admin/users" URL
//    });
//});
//

/**========= Controller routes ====*/
Route::get('/', function() {
    return view('intro');
});
Route::get('/intro', [DemoController::class, 'index']);

Route::get('/about', '\App\Http\Controllers\DemoController@about');

/** Example of single action controller */
Route::get('/courses', SingleActionController::class);

/** Example of Resource controller */
Route::resource('photo', PhotoController::class);

Route::get('/register', [UserController::class, 'index']);
Route::post('/register', [UserController::class, 'register']);


/** Example of call models using controller */
//Route::get('/customers', function() {
//    $customers = Customers::all();
//    echo '<pre>';
//    print_r($customers->toArray()); // model returns data in object form
//    echo '</pre>';
//});
Route::prefix('')->group(function() {
    Route::get('/customers-create', [CustomersController::class, 'index'])->name('customers-create');
    Route::post('/customers', [CustomersController::class, 'store'])->name('customers');
    Route::get('/customers/view', [CustomersController::class, 'view'])->name('customers-view');
    Route::get('/customers/trash', [CustomersController::class, 'trash'])->name('customers-trash');
    Route::get('/customers/delete/{id}', [CustomersController::class, 'delete'])->name('customers-delete');
    Route::get('/customers/forcedelete/{id}', [CustomersController::class, 'forceDelete'])->name('customers-forcedelete');
    Route::get('/customers/edit/{id}', [CustomersController::class, 'edit'])->name('customers-edit');
    Route::get('/customers/restore/{id}', [CustomersController::class, 'restore'])->name('customers-restore');
    Route::post('/customers/update/{id}', [CustomersController::class, 'update'])->name('customers-update');
});

Route::get('/get-session', function(Request $request) {
    return precode($request->session()->all());
});

Route::get('/set-session', function(Request $request) {
    $request->session()->put('user_name', 'Himanshu Chaudhary');
    $request->session()->flash('status', 'This is flash session');
    return redirect('get-session');
});

Route::get('/destroy-session', function() {
    session()->forget('user_name');
    return redirect('get-session');
});
