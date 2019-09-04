<?php
use  think\Route;

Route::post('addBlog','admin/index/addBlog');
Route::get('detail/:id','index/Article/index');
Route::get('edit/:id','admin/Index/index');
Route::post('deleteBlog','admin/Index/deleteBlog');
Route::get('category/:cate_code','index/Article/category');

return [
    '/' => 'index',
    '/admin' =>'admin/index/index',
    '/edit-blog' =>'admin/index/editBlog',
    '/login' => 'admin/login/index',
    '/category' => 'index/Article/category'
];