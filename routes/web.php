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

/*Route::get('/', function () {
    return view('welcome');
});
Route::get('logout', 'LoginController@logout');


Auth::routes();

Route::get('allsuras', 'HomeController@fetchAllRecord')->name('allsuras');


Route::get('/tfq_admin', 'HomeController@index')->name('tfq_admin');
Route::get('editor', 'HomeController@editorCreate')->name('editor');
Route::post('register_editors', 'HomeController@create')->name('register_editors');*/


/*Route::get('/', function () {
    return view('welcome');
});*/


//----------------------FRONT_END-----------------------

Route::get('/', 'FrontendController@index');
Route::get('/categorical_book_view/{name}', 'FrontendController@categorical_book_view');
Route::get('/search', 'FrontendController@search');
Route::get('/book_by_author/{name}', 'FrontendController@book_by_author');
Route::post('/comments', 'FrontendController@comments');
Route::get('/comment_list', 'CommentController@index')->name('comment_list');
Route::get('/destroy_msg/{id}', 'CommentController@destroy')->name('destroy');

Route::get('surah_info/{id}','FrontendController@surah_info');

Route::get('bookmark_list/{sura}/{ayah}','FrontendController@bookmark_list');

Route::get('book_view/{id}','FrontendController@book_preview');


//------------------------------Authentication-------------------------

Route::get('logout', 'LoginController@logout');

Route::get('user_login/', 'HomeController@user_login');

Auth::routes();

//----------------------------BACK_END_SURAH---------------------------------

Route::get('allsuras', 'HomeController@fetchAllRecord')->name('allsuras');

Route::get('single_sura/{id}', 'HomeController@fetchSIngleSuraRecord')->name('single_sura');

Route::get('updateSura/', 'HomeController@updateSura')->name('updateSura');

Route::get('del_ayah/{id}', 'HomeController@del_ayah')->name('del_ayah');

Route::get('export_surah/{id}', 'HomeController@export_surah')->name('export_surah');

Route::post('editSurah', 'HomeController@editSurah')->name('editSurah');

Route::post('editSurahsItro', 'HomeController@editSurahsItro')->name('editSurahsItro');

Route::get('add_ayah', 'HomeController@add_ayah')->name('add_ayah');

Route::post('save_ayah', 'HomeController@save_ayah')->name('save_ayah');

Route::get('add_tafsir_image', 'TafsirImageController@create')->name('add_tafsir_image');

Route::post('save_image', 'TafsirImageController@save_image')->name('save_image');
Route::post('update_img', 'TafsirImageController@update');

Route::get('show_Image', 'TafsirImageController@index')->name('show_Image');
Route::get('del_img/{id}', 'TafsirImageController@destroy');
Route::get('image_info/{id}', 'TafsirImageController@edit');

Route::get('/getExAyahNo/','HomeController@getExAyahNo');

Route::post('delete_ayah_trans','HomeController@delete');

//Route::post('editSurah',function ()
//{
//   return 'hi' ;
//});


//---------------------Admin/Editor/-------------
Route::get('/tfq_admin', 'HomeController@index')->name('tfq_admin');
Route::get('editor', 'HomeController@editorCreate')->name('editor');
Route::get('editor_list', 'HomeController@editor_list')->name('editor_list');
Route::get('editor_info/{id}', 'HomeController@editor_info')->name('editor_info');
Route::post('update_role', 'HomeController@update_role')->name('update_role');
Route::post('register_editors', 'HomeController@create')->name('register_editors');
Route::post('update_editors', 'HomeController@update_editors')->name('update_editors');
Route::get('delete_editor/{id}', 'HomeController@delete_editor')->name('delete_editor');

//-----------------------Book-----------------------
Route::get('add_new_book','BookController@show')->name('add_new_book');
Route::get('book_list','BookController@index')->name('book_list');
Route::post('add_book','BookController@store')->name('add_book');
Route::post('update_book_info','BookController@update')->name('update_book_info');
Route::get('get_single_book/{id}','BookController@get_single_book')->name('get_single_book');
Route::get('delete_book/{id}','BookController@destroy')->name('delete_book');
Route::post('publish/','BookController@publish')->name('publish');
Route::get('unpublish/{id}','BookController@unpublish')->name('unpublish');


//Route::get('unpublish/{id)','BookController@unpublish')->name('unpublish');

//----------------------Author----------------------
Route::get('add_new_author','AuthorController@index')->name('add_new_author');
Route::get('author_list','AuthorController@show')->name('author_list');
Route::post('add_author','AuthorController@create')->name('add_author');
Route::get('author_info/{id}', 'AuthorController@author_info')->name('author_info');
Route::post('update_author','AuthorController@update')->name('update_author');
Route::get('delete_author/{id}', 'AuthorController@destroy')->name('delete_author');

//----------------------Category----------------------

Route::get('add_new_category','CategoryController@index')->name('add_new_category');
Route::get('category_list','CategoryController@show')->name('category_list');
Route::post('add_category','CategoryController@create')->name('add_category');
Route::get('category_info/{id}', 'CategoryController@category_info')->name('category_info');
Route::post('update_category','CategoryController@update')->name('update_category');
Route::get('delete_category/{id}', 'CategoryController@destroy')->name('delete_category');

//----------------------Publisher----------------------
Route::get('add_new_publisher','PublisherController@index')->name('add_new_publisher');
Route::get('publisher_list','PublisherController@show')->name('publisher_list');
Route::post('add_publisher','PublisherController@create')->name('add_publisher');
Route::get('publisher_info/{id}', 'PublisherController@publisher_info')->name('publisher_info');
Route::post('update_publisher','PublisherController@update')->name('update_publisher');
Route::get('delete_publisher/{id}', 'PublisherController@destroy')->name('delete_publisher');

//--------------------  BOOK DETAILS------------------------------
Route::get('meta_information/{id}','BookDetailsController@show')->name('meta_information');
Route::get('getChapterDetails/','BookDetailsController@getChapterDetails')->name('getChapterDetails');
Route::get('getSubChapter/','BookDetailsController@getSubChapter')->name('getSubChapter');

Route::post('meta_info/','BookDetailsController@store')->name('meta_info');
Route::post('update_meta_info/','BookDetailsController@update')->name('update_meta_info');


Route::get('preview_book/{id}','BookDetailsController@book_preview');




Route::get('exportto/{id}','BookDetailsController@exportto');

//---------------------------BOOK TYPE-------------------------

Route::get('add_new_book_type','BooktypeController@show')->name('add_new_book_type');
Route::get('book_type_list','BooktypeController@index')->name('book_type_list');
Route::post('add_book_type','BooktypeController@store')->name('add_book_type');

Route::get('book_type_info/{id}', 'BooktypeController@book_type_info')->name('book_type_info');
Route::post('update_book_type','BooktypeController@update')->name('update_book_type');
Route::get('delete_book_type/{id}', 'BooktypeController@destroy')->name('delete_book_type');


//----------------------------Slider Module ---------------------

Route::get('slider','SliderControllerController@index')->name('slider');
Route::get('slider_list','SliderControllerController@show')->name('slider_list');
Route::get('del_slider/{id}','SliderControllerController@destroy')->name('del_slider');
Route::post('save_slider_image','SliderControllerController@create');

//----------------------------ABOUT MODULE------------------------

Route::get('about','AboutControllerController@index')->name('about');
Route::get('info_list','AboutControllerController@show')->name('info_list');
Route::get('del_info/{id}','AboutControllerController@destroy')->name('del_info');
Route::post('add_about_info','AboutControllerController@create')->name('add_about_info');
