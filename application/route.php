<?php
use  think\Route;

Route::post('addBlog','admin/index/addBlog');
Route::get('article','index/index/article');
Route::get('edit/:id','admin/Index/index');
Route::post('deleteBlog','admin/Index/deleteBlog');
Route::get('category/:cate_code','index/index/category');
Route::get('/:category_code','index');

return [
    '/' => 'index',
    '/admin' =>'admin/index/index',
    '/edit-blog' =>'admin/index/editBlog',
    '/login' => 'admin/login/index',
    '/category' => 'index/index/category'
];