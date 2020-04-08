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





/**************************************/
Route::get('/', function () {
    return view('crafts.home');
});

Route::prefix('/crafts')->group(function()
{


         Route::get('/register','crafts@register');
         Route::get('/login','crafts@login');


  Route::prefix('/afterlogin')->middleware('auth')->group(function(){

         Route::get('/','crafts@index');
         Route::get('/user_profile','crafts@profile');
         Route::post('/user_profile/{user_id}','crafts@storeimage')->name('storeimage');
         Route::get('/groups','crafts@show_groups');
         Route::get('/group/{group_id}/crafts','crafts@show_crafts')->name('crafts');
         Route::post('/add_post','postcontroller@add_post')->name('add_post');
         Route::get('{post}/edit','postcontroller@edit_post');
         Route::put('{post}/update','postcontroller@update_post');
         Route::delete( '/{post}/destroy', 'postcontroller@destroy' );
         Route::get( '/{comment}/editcomment', 'postcontroller@editcomment' );
         Route::put( '/{comment}/updatecomment', 'postcontroller@updatecomment' );
         Route::delete( '{comment}/destroycomment', 'postcontroller@destroycomment' );
         Route::get( 'notification/{notf}/asread', 'postcontroller@asread' )->name('asread');


         Route::get('/add_like/{post_id}','postcontroller@add_like')->name('add_like');
         Route::post('/add_comment/{post_id}','postcontroller@add_comment')->name('add_comment');
         Route::get('/{owner_id}/profile','postcontroller@profile')->name('profile');
  Route::prefix("/chat")->group(function(){
         Route::get('/','chatcontroller@allchat');
         Route::get('{user}/showchat','chatcontroller@showchat');
         Route::post('{user}/storemessage','chatcontroller@storemessage');
         Route::delete( '{user}/destroychat', 'chatcontroller@destroychat' );
         Route::get( '{notfchat}/asreadchat', 'chatcontroller@asreadchat' )->name('asreadchat');



});

  Route::prefix('/craftsman')->group(function()
{
	     Route::get('/','craftsman@index');
	     Route::post('/add_group','craftsman@add_group')->name('add_group');
         Route::post('/group/{group_id}/crafts/add','craftsman@add_craft')->name('add_craft');
         Route::get('/craft/{craft}/craftedit','craftsman@craftedit');
         Route::put('/craft/{craft}/updatecraft','craftsman@craftupdate');
         Route::delete('/craft/{craft}/craftdestroy','craftsman@craftdestroy');
         

     });

  Route::prefix('/customer')->group(function()
{
         Route::get('/','craftsman@index');
         
         

     });

   Route::prefix('/admin')->group(function(){

        Route::get( '/', 'admincontroller@index' );
        Route::get( 'users', 'admincontroller@users' );
        Route::get( 'crafts', 'admincontroller@crafts' );
        Route::get( 'posts', 'admincontroller@posts' );
        Route::delete( '/{user}/userdestroy', 'admincontroller@userdestroy' );
        Route::delete( '/{craft}/craftdestroy', 'admincontroller@craftdestroy' );
        Route::delete( '/{post}/postdestroy', 'admincontroller@postdestroy' );
        Route::get( '/{notf}/asread', 'admincontroller@asread' );
        Route::get('/user/{user_id}/chat','admincontroller@chat')->name('chat');


     });
  });
});

	
Auth::routes();

