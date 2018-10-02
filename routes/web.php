<?php

//$http_origin = request()->getHost();
//
//if (
//    $http_origin == "directevents.test" ||
//    $http_origin == "hippiemarktamsterdamxl.test")
//{
//    header("Access-Control-Allow-Origin: http://hippiemarktamsterdamxl.test:3000");
//}

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

//use \App\User;
//use \App\Role;
//
//Route::get('/isadmin', function()
//{
//    $user = User::first();
//
//    if ($user->hasRole('administrator')) {
//        return 'You are an administrator';
//    } else {
//        return 'You don\'t have administrator rights';
//    }
//});
//Route::get('/', function()
//{
//    // Created user and roles
////    $user = \App\User::create([
////        'firstname' => 'Graham',
////        'lastname' => 'neal',
////        'email' => 'grahamneal1991@gmail.com',
////        'password' => Hash::make('changeme')
////    ]);
////    $user = \App\User::create([
////        'firstname' => 'standhouder',
////        'lastname' => 'test',
////        'email' => 'standhouder@directevents.nl',
////        'password' => Hash::make('changeme')
////    ]);
////
////    $administrator = \App\Role::create(['name' => 'administrator']);
////    $standhouder = \App\Role::create(['name' => 'standhouder']);
//    // END of Created user and roles
//
//    // Attach role to first user
////    $user = User::first();
////    $user->roles()->attach(2);
//
//    $user = User::with('roles')->where('id', '3')->first();
////    dd($user);
//    session(['user' => $user]);
//
//    return $user;
//    // END of Attach role to first user
//
//
////    $user = User::first();
////    $role = Role::whereName('administrator')->first();
////    $user->assignRole($role);
//    // $user->removeRole(3);
////    return $user->roles;
//    // if ($user->hasRole('owner')) return 'you are the owner';
//});
Route::post('/setCookie', function(\Illuminate\Http\Request $request){
    Session::setId($request->input('sessionId'));
    Session::start();

    return 'Cookie created';

});

Auth::routes();

//Route::get('login', 'LoginController@getLogin');
//Route::post('login', 'LoginController@getLogin');
Route::get('logout', 'LoginController@logout');
//Route::get('logout', function(){
//    auth()->logout();
//    return 'logged out';
//});
//
//Route::get('/home', 'HomeController@index')->name('home');

// Route group for the main domain
Route::domain('directevents.{tld}')->group(function(){

    // Route group for admin users
    Route::group(['prefix' => 'admin', 'middleware' => 'App\Http\Middleware\isAdmin'], function() {
        Route::get('/', 'AdminController@renderAdmin');
        Route::get('/evenementen/all', 'EventController@showAll');
        Route::get('/evenementen/{$event_id}/plattegrond', 'EventController@plattegrond');
        Route::resource('/evenementen', 'EventController');
    });
    // Route group for standhouder users
    Route::group(['middleware' => 'App\Http\Middleware\isStandhouder'], function() {
        Route::get('/dashboard', 'DashboardController@renderDashboard');
    });

//    Route::post('/login', 'LoginController@loginMainDomain');
//    Route::get('/login', 'LoginController@renderLoginMainDomain');
    Route::get('/', function () {
        return view('directevents.index');
    });
});
Route::domain('{domain}.{tld}')->group(function(){
    // Renders login page
//    Route::get('/login', 'loginController@renderLogin');
    // To catch the login post
//    Route::post('/login', 'loginController@login');
    // Renders the signup page
    Route::get('/registreren', 'loginController@register');
    // Catch the sign-up post
    Route::post('/registreren', 'loginController@register');

    // Route that checks if the domain exists in the json and then renders the corresponding template
    Route::get('/', 'EventPageController@renderEvent');

    Route::post('/loginEvent', 'EventPageController@login');

    Route::post('/registerEvent', 'EventPageController@registerEvent');

    // Route that catches a form post
//    Route::get('/', 'loginController@register');
});
