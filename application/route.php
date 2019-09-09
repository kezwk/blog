<?php

use  think\Route;

//index
Route::get('article', 'index/index/article');
Route::get('category/:cate_code', 'index/index/category');
Route::get('/:category_code', 'index');

//admin
Route::get('admin/index/edit/:id', 'admin/index/index');

Route::post('addBlog', 'admin/index/addBlog');
Route::post('deleteBlog', 'admin/Index/deleteBlog');


return [
//index
    '/' => 'index',
    '/category' => 'index/index/category',

//admin
    '/admin' => 'admin/index/editBlog',
    '/admin/index/add-blog' => 'admin/index/index',
    '/admin/index/edit-blog' => 'admin/index/editBlog',
    '/login' => 'admin/login/index',
];