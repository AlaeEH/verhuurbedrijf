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

Route::get('/', function () {
    return view('content.index');
});

Route::get('index', function(){

	return view('content.index');

});

Auth::routes();


// products and product detail page
Route::resource('/comment', 'CommentController');

Route::get('shop/products','ShopController@index')->name('shop.products');

Route::get('/shop/{id}/show', 'ShopController@show')->name('shop.show');

Route::get('content.index', 'HomeController@index')->name('index');
 
Route::get('/search','ProductController@search')->name('search');

Route::get('products/index','ProductController@index')->name('index');

Route::resource('products', 'ProductController');

// ShoppingCart
Route::get('cart/shoppingcart', 'ProductController@getCart')->name('shoppingcart');
 
Route::get('/add-to-cart/add/{id}', 'ProductController@addToCart')->name('addToCart');

Route::get('/add-to-cart/reduce/{id}', 'ProductController@getReduceByOne')->name('reduce');

Route::get('/add-to-cart/remove/{id}', 'ProductController@getRemoveItem')->name('remove');

Route::get('cart/checkout', [
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::post('cart/checkout', [
    'uses' => 'ProductController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);


// User Routes
Auth::routes();

Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/signup', [
            'uses' => 'UserController@getSignup',
            'as' => 'user.signup'
        ]);
        Route::post('/signup', [
            'uses' => 'UserController@postSignup',
            'as' => 'user.signup'
        ]);
        Route::get('/signin', [
            'uses' => 'UserController@getSignin',
            'as' => 'user.signin'
        ]);
        Route::post('/signin', [
            'uses' => 'UserController@postSignin',
            'as' => 'user.signin'
        ]);
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', [
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile'
        ]);
        Route::get('/logout', [
            'uses' => 'UserController@getLogout',
            'as' => 'user.logout'
        ]);
    });
});
