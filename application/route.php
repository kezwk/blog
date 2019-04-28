<?php
use  think\Route;

Route::post('addBlog','admin/index/addBlog');
Route::get('detail/:id','index/ArticleDetail/index');
Route::post('new/:id','News/update');
Route::put('new/:id','News/update');
Route::delete('new/:id','News/delete');
Route::any('new/:id','News/read');

return [
    '/' => 'index',
    '/admin' =>'admin/index/index'
];