<?php

Route::group([
    'namespace' => 'WTG\Base\Controllers',
    'middleware' => ['web']
], function () {
    Route::get('/', 'HomeController@view')->name('home');
    Route::get('about', 'AboutController@view')->name('about');
    Route::get('contact', 'ContactController@view')->name('contact');
    Route::get('downloads', 'DownloadsController@view')->name('downloads');
});
