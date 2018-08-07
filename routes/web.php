<?php

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

// Route::get('/', function () {
// 	$user = \App\User::find(1);
// 	dd($user->phone);
//     return view('welcome');
// });

use Illuminate\Http\Request;


Route::get('',function(){
	return view('welcome1');
});
Route::post('upload', function(Request $request){
    $path = $request->image;
    dd( $path);
});

// Trường hợp nhiều ảnh lưu ảnh vào mảng
// Route::post('upload', function(Request $request){
//     foreach ($request->images as $key => $image) {
//        $image->store('images');
//     }
    
// });


//xoa 
// Route::get('',function(){
//     $user = App\User::find(5)->delete();
//     dd($user);
// });

//khôi phục cách 1
// Route::get('',function(){
//     $user = App\User::withTrashed()->find(3)->restore();
//     dd($user);
// });

//khôi phục cách 2
// Route::get('',function(){
//     $user = App\User::onlyTrashed()->find(3)->restore();
//     dd($user);
// });

//lay ban ghi trong thùng rác
// Route::get('',function(){
//     $user = App\User::onlyTrashed()->where('email','destany.oberbrunner@harris.org')->first();
//     dd($user);
// });


Route::get('about',function(){
	return view('posts.about');
});

// Route::get('detail',function(){
// 	return view('posts.detail');
// });




// Route::get('category/{id}', function () {
// 	$category = \App\Category::get();
	
//     // return view('welcome');
// });

// Route::get('category/{id}','CategoryController@index');



// Route::get('post/{id}','PostController@show');
// Route::get('login','Login1Controller@getLogin');
// Route::post('login','Login1Controller@postLogin');

// Route::get('category/{id}','CategoryController@index');

// Route::get('admin','AdminController@index');







// Route::get('/', function () {
// 	$category = \App\Category::get();
// 	dd($category);
//     // return view('welcome');
// });
// Route::get('/', function () {
// 	$category = \App\Category::get();
// 	dd($category);
//     // return view('welcome');
// });
//Auth::routes();

// Route::get('','Home1Controller@index');


Route::prefix('admin')->group(function(){

 		Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');


         Route::middleware('auth')->group(function(){

            Route::get('/dashboard', 'HomeController@list')->name('home');
                 
         	Route::get('posts/list', 'PostController@getList')->name('posts.list');
            Route::resource('posts','PostController');
             
            Route::get('users/list', 'UserController@getList');
            Route::resource('users','UserController');

            Route::get('categories/list', 'CategoryController@getList');
            Route::resource('categories','CategoryController');


            




 		});
 	

});




Route::get('blank',function(){
    return view('blank');
});


