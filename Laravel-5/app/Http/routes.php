<?php

use tiunlam\Profil;
use tiunlam\About;

$locale = Request::segment(1);

if (in_array($locale, Config::get('app.available_locales'))) {
    App::setLocale($locale);
} else {
    $locale = null;
}

if (Schema::hasTable('profil'))
{
    View::share('semua_profil', Profil::orderBy('created_at', 'desc')->get());
    View::share('all_about', About::orderBy('created_at', 'desc')->get());
}

Route::group(array('prefix' => $locale), function()
{
Route::get('/', array('as'=>'homepage', 'uses'=> 'HomeController@index'));
#Search
Route::get('search/{cari}', array('as'=>'searchresults', 'uses'=> 'HomeController@searchresults'));
Route::post('search', array('as'=>'search-home', 'uses'=> 'HomeController@search'));

#Profil - ID
Route::get('profil/{slug}', array('as'=>'profil', 'uses'=>'HomeController@show_profil'));
#Profil - EN
Route::get('about/{slug}', array('as'=>'profil_en', 'uses'=>'HomeController@show_profil_en'));
#pdf
Route::get('/pdf', function()
{
    $pdf = PDF::loadView('pdf');
    return $pdf->stream('laporan.pdf');
});
#Berita - ID
Route::get('berita', array('as'=>'berita.index', 'uses'=> 'BeritaController@index'));
Route::get('berita/{slug}', array('as'=>'berita.show', 'uses'=> 'BeritaController@show'));

#Berita - EN
Route::get('news', array('as'=>'berita.index_en', 'uses'=> 'BeritaController@index_en'));
Route::get('news/{slug}', array('as'=>'berita.show_en', 'uses'=> 'BeritaController@show_en'));

Route::get('admin/login', array('as'=>'login', 'uses'=>'AuthController@showlogin'));
Route::post('admin/login',  array('as'=>'cek_login', 'uses'=>'AuthController@login'));
Route::get('admin/logout', array('as'=>'logout', 'uses'=>'AuthController@logout'));

#Group Admin
Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function()
{
Route::get('home', array('as'=> 'admin-home', 'uses'=> 'AdminController@index'));
Route::get('dashboard', array('as'=> 'dashboard', 'uses'=> 'AdminController@dashboard'));
Route::get('register', array('as'=> 'register','uses'=> 'AuthController@register'));
Route::post('register', array('as'=> 'cek_register', 'uses'=> 'AuthController@simpan'));
#Search
Route::get('home/search/{cari}', array('as'=>'searchresults-admin', 'uses'=> 'AdminController@searchresults'));
Route::post('home/search', array('as'=>'search-admin', 'uses'=> 'AdminController@search'));
#Profil - ID
Route::get('home/profil/{slug}', array('as'=>'profil', 'uses'=>'AdminController@home_profil'));
#Profil - EN
Route::get('home/about/{slug}', array('as'=>'profil_en', 'uses'=>'AdminController@home_about'));
#Administrasi Profil
Route::get('profil', array('as'=>'daftar_profil', 'uses'=> 'AdminController@daftar_profil'));
Route::get('profil/tambah', array('as'=>'tambah_profil', 'uses'=> 'AdminController@tambah_profil'));
Route::get('profil/{slug}', array('as'=>'show_profil', 'uses'=> 'AdminController@show_profil'));
Route::post('profil', array('as'=>'store_profil', 'uses'=> 'AdminController@store_profil'));
Route::get('profil/{slug}/edit', array('as'=>'edit_profil', 'uses'=> 'AdminController@edit_profil'));
Route::patch('profil/{slug}', array('as'=>'update_profil', 'uses'=> 'AdminController@update_profil'));
Route::delete('profil/{slug}', array('as'=>'delete_profil', 'uses'=> 'AdminController@delete_profil'));
#English
Route::get('en/about', array('as'=>'daftar_profil_en', 'uses'=> 'AdminController@daftar_profil_en'));
Route::get('about/create', array('as'=>'tambah_profil_en', 'uses'=> 'AdminController@tambah_profil_en'));
Route::get('en/about/{slug}', array('as'=>'show_profil', 'uses'=> 'AdminController@show_profil_en'));
Route::post('en/about', array('as'=>'store_profil_en', 'uses'=> 'AdminController@store_profil_en'));
Route::get('en/about/{slug}/edit', array('as'=>'edit_profil_en', 'uses'=> 'AdminController@edit_profil_en'));
Route::patch('en/about/{slug}', array('as'=>'update_profil_en', 'uses'=> 'AdminController@update_profil_en'));
Route::delete('en/about/{slug}', array('as'=>'delete_profil_en', 'uses'=> 'AdminController@delete_profil_en'));
#Administrasi Berita
#Indonesia
Route::get('berita', array('as'=>'daftar_berita', 'uses'=> 'AdminController@daftar_berita'));
Route::get('berita/create', array('as'=>'tambah_berita', 'uses'=> 'AdminController@tambah_berita'));
Route::get('berita/{slug}', array('as'=>'show_berita', 'uses'=> 'AdminController@show_berita'));
Route::post('berita', array('as'=>'store_berita', 'uses'=> 'AdminController@store_berita'));
Route::get('berita/{slug}/edit', array('as'=>'edit_berita', 'uses'=> 'AdminController@edit_berita'));
Route::patch('berita/{slug}', array('as'=>'update_berita', 'uses'=> 'AdminController@update_berita'));
Route::delete('berita/{slug}', array('as'=>'delete_berita', 'uses'=> 'AdminController@delete_berita'));
#English
Route::get('en/news', array('as'=>'daftar_berita_en', 'uses'=> 'AdminController@daftar_berita_en'));
Route::get('en/news/create', array('as'=>'tambah_berita_en', 'uses'=> 'AdminController@tambah_berita_en'));
Route::get('en/news/{slug}', array('as'=>'show_berita', 'uses'=> 'AdminController@show_berita_en'));
Route::post('en/news', array('as'=>'store_berita_en', 'uses'=> 'AdminController@store_berita_en'));
Route::get('en/news/{slug}/edit', array('as'=>'edit_berita_en', 'uses'=> 'AdminController@edit_berita_en'));
Route::patch('en/news/{slug}', array('as'=>'update_berita_en', 'uses'=> 'AdminController@update_berita_en'));
Route::delete('en/news/{slug}', array('as'=>'delete_berita_en', 'uses'=> 'AdminController@delete_berita_en'));
});

});

