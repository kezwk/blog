<?php

use  think\Route;

//index
Route::get('article', 'index/index/article');
//Route::get('category/:cate_code', 'index/index/category');
Route::get('category/:category_code', 'index');
//admin
Route::post('admin/addBlog', 'admin/index/addBlog');
Route::post('edit/addBlog', 'admin/index/addBlog');
Route::post('admin/add-category', 'admin/Category/addCategory');
Route::post('admin/deleteBlog', 'admin/Index/deleteBlog');
Route::post('admin/deleteCategory', 'admin/category/deleteCategory');

return [
//index
    '/' => 'index',
    '/category' => 'index/index/category',
//admin
    '/admin' => 'admin/index/editBlog',
    '/admin/add-blog' => 'admin/index/index',
    '/admin/edit' => 'admin/index/editBlog',
    '/edit/:id' => 'admin/index/index',
    '/edit-category/:id' => 'admin/category/index',
    '/admin/add-category' => 'admin/category/index',
    '/admin/edit-category' => 'admin/category/editCategory',
];