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
//     return view('h');
// });



Route::get('/','HomeController@index');
Route::get('/category-products/{id}','HomeController@categoryProducts');
Route::get('/product-details/{id}','HomeController@productDetails');


Route::get('/admin','AdminController@index');
Route::post('/admin-login','AdminController@adminLogin');
Route::get('/dashboard','SuperAdminController@index');
Route::get('/logout','SuperAdminController@logout');


Route::get('/add-category','SuperAdminController@addCategory');
Route::post('/save-category','SuperAdminController@saveCategory');
Route::get('/manage-category','SuperAdminController@manageCategory');
Route::get('/published-category/{id}','SuperAdminController@publishedCategory');
Route::get('/unpublished-category/{id}','SuperAdminController@unpublishedCategory');
Route::get('/edit-category/{id}','SuperAdminController@editCategory');
Route::post('/update-category','SuperAdminController@updateCategory');
Route::get('/delete-category/{id}','SuperAdminController@deleteCategory');

Route::get('/add-brand','SuperAdminController@addBrand');
Route::post('/save-brand','SuperAdminController@saveBrand');
Route::get('/manage-brand','SuperAdminController@manageBrand');
Route::get('/published-brand/{id}','SuperAdminController@publishedBrand');
Route::get('/unpublished-brand/{id}','SuperAdminController@unpublishedBrand');
Route::get('/edit-brand/{id}','SuperAdminController@editBrand');
Route::post('/update-brand','SuperAdminController@updateBrand');
Route::get('/delete-brand/{id}','SuperAdminController@deleteBrand');


Route::get('/add-product','SuperAdminController@addProduct');
Route::post('/save-product','SuperAdminController@saveProduct');
Route::get('/manage-product','SuperAdminController@manageProduct');
Route::get('/published-product/{id}','SuperAdminController@publishedProduct');
Route::get('/unpublished-product/{id}','SuperAdminController@unpublishedProduct');
Route::get('/edit-product/{id}','SuperAdminController@editProduct');
Route::post('/update-product','SuperAdminController@updateProduct');


/*cart strat*/

Route::get('/add-to-cart/{id}','CartController@addToCart');
Route::get('/show-cart','CartController@showCart');
Route::get('/delete-to-cart/{id}','CartController@deleteToCart');
Route::post('/update-cart','CartController@updateCart');

Route::get('/checkout','CheckoutController@registration');
Route::post('/save-data','CheckoutController@saveData');
Route::get('/login','CheckoutController@index');
Route::post('/login-check','CheckoutController@logIn');

Route::get('/billing-address','CheckoutController@billingAddress');
Route::post('/save-billing','CheckoutController@saveBilling');
Route::get('/shipping','CheckoutController@shipping');
Route::post('/save-shipping','CheckoutController@saveShipping');
Route::get('/payment','CheckoutController@payment');
Route::post('/save-order','CheckoutController@saveOrder');

Route::get('/user-logout','CheckoutController@logout');

