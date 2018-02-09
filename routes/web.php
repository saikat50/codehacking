<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/logout', 'Auth\LoginController@logout');


Route::group(['middleware'=>'admin'], function (){

    Route::get('/admin', function (){

        return view('admin.index');

    });


    Route::resource('/admin/users', 'AdminUsersController', ['names'=>[

        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit'
        //'show'=>'admin.users.show',
        //'update'=>'admin.users.update'


    ]]);

    Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);

    Route::resource('/admin/posts', 'AdminPostsController', ['names'=>[

        'index'=>'admin.posts.index',
        'create'=>'admin.posts.create',
        'store'=>'admin.posts.store',
        'edit'=>'admin.posts.edit'
        //'show'=>'admin.users.show',
        //'update'=>'admin.users.update'


    ]]);

    Route::resource('/admin/categories', 'AdminCategoriesController', ['names'=>[

        'index'=>'admin.categories.index',
        'create'=>'admin.categories.create',
        'store'=>'admin.categories.store',
        'edit'=>'admin.categories.edit'
        //'show'=>'admin.categories.show',
        //'update'=>'admin.categories.update'



    ]]);

    Route::resource('/admin/media', 'AdminMediasController', ['names'=>[


        'index'=>'admin.media.index',
        'create'=>'admin.media.create',
        'store'=>'admin.media.store',
        'edit'=>'admin.media.edit'
        //'show'=>'admin.media.show',
        //'update'=>'admin.media.update'


    ]]);

    Route::resource('/admin/comments', 'PostCommentsController', ['names'=>[


        'index'=>'admin.comments.index',
        'create'=>'admin.comments.create',
        'store'=>'admin.comments.store',
        'edit'=>'admin.comments.edit',
        'show'=>'admin.comments.show',
        //'update'=>'admin.media.update'



    ]]);

    Route::resource('/admin/comments/replies', 'CommentRepliesController', ['names'=>[


        'index'=>'admin.comments.replies.index',
        'create'=>'admin.comments.replies.create',
        'store'=>'admin.comments.replies.store',
        'edit'=>'admin.comments.replies.edit',
        'show'=>'admin.comments.replies.show',
        //'update'=>'admin.media.update'



    ]]);

});

Route::group(['middleware'=>'auth'], function (){


    Route::post('/comments/replies', 'CommentRepliesController@commentReply');

});
