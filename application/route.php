<?php
use  think\Route;

Route::post('addBlog','admin/index/addBlog');
Route::get('detail/:id','index/ArticleDetail/index');
Route::get('edit/:id','admin/Index/index');
Route::post('deleteBlog','admin/Index/deleteBlog');


return [
    '/' => 'index',
    '/admin' =>'admin/index/index',
    '/edit-blog' =>'admin/index/editBlog'
];