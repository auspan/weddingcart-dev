<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('home', 'HomeController@index');
    
    Route::get('wedding','WeddingController@wedding');
    Route::get('createwedding','WeddingController@create');
	Route::post('wedding','WeddingController@save');
    Route::get('createWeddingEvent','WeddingController@createWeddingEvent');
    Route::post('addevents','WeddingController@addMasterEvents');
    Route::post('updateevents','WeddingController@updateEvents');
    Route::get('wedding/{id}/edit','WeddingController@edit');
    Route::post('wedding/update/{id}','WeddingController@update');
    

    Route::get('/showWishlist','WishlistController@showWishlist');
    Route::post('/ajaxwishlist','WishlistController@addproduct');
    Route::post('/editwishlist','WishlistController@editproduct');
    Route::post('/updatewishlist','WishlistController@updateproduct');
    Route::post('/deletewishlist','WishlistController@removeproduct');
    Route::post('/cancelwishlist','WishlistController@cancelproduct');

    Route::get('social/auth/redirect/{provider}', 'Auth\AuthController@redirectToProvider');
    Route::get('social/auth/{provider}', 'Auth\AuthController@handleProviderCallback');
    Route::get('googlecontacts', 'ContactsController@importGoogleContacts');
    Route::post('savecontact','ContactsController@savecontacts');
    Route::post('addContact','ContactsController@store');
    Route::post('addMultipleGoogleContacts','ContactsController@addMultipleContacts');
    Route::post('deleteMultipleGoogleContacts','ContactsController@deleteMultipleContacts');
    Route::get('contacts','ContactsController@index');
    Route::get('getcontacts','ContactsController@getContacts');
    Route::post('updateContact','ContactsController@update');
    Route::post('deleteContact','ContactsController@destroy');

    Route::get('showinvite', 'InvitesController@showInvitesPage');
    Route::post('sendinvite', 'InvitesController@sendInvite');
//    Route::get('showinvite', 'ContactsController@showInvitesPage');

    Route::get('invitation/{token}', 'GuestsController@getWeddingForToken');
    Route::get('wishlistproducts/{id}','GuestsController@showWishlistToGuest');
    Route::get('wishlistItem/{id}','GuestsController@getWishlistItem');
    Route::post('contribution/{id}','InvitesController@contribution');
    Route::get('invites','InvitesController@invites');
    Route::post('productdetails','InvitesController@productDetails');

    Route::get('showAddPhotoPage', 'PhotosController@showAddPhotoPage');
    Route::post('uploadBrideImage', 'PhotosController@uploadBrideImage');
    Route::post('cropImage', 'PhotosController@cropImage');
    Route::post('uploadGroomImage', 'PhotosController@uploadGroomImage');

    Route::get('showWishlistSection', function(){
       return redirect()->to('/home'.'#section-list');
    });

    Route::get('showCouple', function(){
        return redirect()->to('/home'.'#section-couple');
    });

    Route::get('showGuests', function(){
        return redirect()->to('/home'.'#section-guests');
    });

    Route::get('showEvents', function(){
        return redirect()->to('/home'.'#section-events');
    });

});
