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
Route::get('test', function() {
    return view('frontend.post');
});
Route::get('admin', function () {
    return view('backend.index');
})->name('admin')->middleware(App\Http\Middleware\checkUser::class);
Route::get('/', 'HomeController@home')->name('home');
Route::get('bai-viet/{id}/{tenpost}', 'HomeController@get_view_post')->name('posts');
Route::get('cates/{id}' , 'HomeController@cates')->name('cates');
Auth::routes();
// đăng nhập , đăng xuất , đăng ký
Route::get ('dang-ky'	,['as'=>'get_dang_ky'	,'uses'=>'HomeController@register'	]);
Route::get ('dang-nhap'	,['as'=>'get_dang_nhap'	,'uses'=>'HomeController@dangnhap'	]);
Route::post('dang-nhap'	,['as'=>'post_dang_nhap','uses'=>'HomeController@p_dangnhap']);
Route::post('dang-ky'	,['as'=>'post_dang_ky' 	,'uses'=>'HomeController@confirmRegister']);
Route::get ('dang-xuat'	,['as'=>'get_dang_xuat'	,'uses'=>'HomeController@dangxuat'	]);
Route::get('posts-cate/{cate_id}' , 'PostController@post_of_cates')->name('posts_of_cate');
//quản lý
Route::group(['prefix'=>'admin','middleware'=>'checkuser'] , function (){
	Route::group(['prefix'=>'categories'],function(){
		Route::get ('list',['as'=>'cate_list','uses'=>'CategoriesController@cate_get_list'	]);
		Route::get ('add/{name}/{parent_id}','CategoriesController@cate_post_add')->name('cate_post_add');
		Route::get ('delete/{id}',['as'=>'cate_delete','uses'=>'CategoriesController@cate_get_delete'	]);
		Route::post('edit/{id}',['as'=>'cate_edit','uses'=>'CategoriesController@cate_post_edit'	]);
	});
	Route::group(['prefix'=>'posts'],function(){
		Route::get ('get-list'			,['as'=>'post_get_list'		,'uses'=>'PostController@post_get_list'		]);
		Route::get ('get-add'			,['as'=>'post_get_add'		,'uses'=>'PostController@post_get_add'		]);
		Route::post('post-add'			,['as'=>'post_post_add'		,'uses'=>'PostController@post_post_add'		]);
		Route::get ('get-delete/{id}'	,['as'=>'post_get_delete'	,'uses'=>'PostController@post_get_delete'	]);
		Route::get ('get-edit/{id}'		,['as'=>'post_get_edit'		,'uses'=>'PostController@post_get_edit'		]);
		Route::post('post-edit/{id}'	,['as'=>'post_post_edit'	,'uses'=>'PostController@post_post_edit'	]);
		Route::get ('get-cate/{id}'		,['as'=>'post_get_cate'		,'uses'=>'PostController@get_cate'			]);
		Route::post ('get-post'			,['as'=>'get_post'			,'uses'=>'PostController@search@search'		]);
	});
	Route::group(['prefix'=>'tags'],function(){
		Route::get('add/{name}','TagController@tag_add')->name('tag_add');
		Route::get('list','TagController@tag_list')->name('tag_list');
		Route::get('edit','TagController@tag_edit')->name('tag_edit');
		Route::get('delete/{id}','TagController@tag_delete')->name('tag_delete');
	});
});
