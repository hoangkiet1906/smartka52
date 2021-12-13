<?php

use App\Http\Controllers\UserCtr;
use Illuminate\Support\Facades\Route;
    Route::get('/','App\Http\Controllers\UserCtr@index')->name('home');
    Route::get('/login','App\Http\Controllers\UserCtr@login')->name('login');
    Route::post('/authlogin','App\Http\Controllers\UserCtr@authlogin')->name('authlogin');
    Route::post('/authres','App\Http\Controllers\UserCtr@authres')->name('authres');
    Route::get('/myaccount','App\Http\Controllers\UserCtr@myaccount')->name('myaccount');
    Route::get('/upInfo','App\Http\Controllers\UserCtr@upInfo')->name('upInfo');
    
    //Cua mam
    Route::get('/blog','App\Http\Controllers\UserCtr@blog')->name('blog');
    Route::get('/blogDe/{id}','App\Http\Controllers\UserCtr@blogDe')->name('blogDe');
    Route::post('/loadcmtblog','App\Http\Controllers\UserCtr@loadCmtBlog')->name('loadcmtBlog');
    Route::post('/sendcmtblog','App\Http\Controllers\UserCtr@sendCmtBlog')->name('sendCmtBlog');

    Route::post('/loadCmtPro','App\Http\Controllers\UserCtr@loadCmtPro')->name('loadCmtPro');
    Route::post('/sendCmtPro','App\Http\Controllers\UserCtr@sendCmtPro')->name('sendCmtPro');
    Route::get('/contactUs','App\Http\Controllers\UserCtr@contactUs')->name('contactUs');
    Route::get('/aboutUs','App\Http\Controllers\UserCtr@aboutUs')->name('aboutUs');
    //End mam

    Route::get('/shop','App\Http\Controllers\UserCtr@shop')->name('shop');
    Route::get('/product','App\Http\Controllers\UserCtr@product')->name('product');

    Route::get('/ajaxSearch',[UserCtr::class,'ajaxSearch'])->name('ajaxSearch');
    
    Route::get('/shop/{tag}','App\Http\Controllers\UserCtr@shoptag')->name('shoptag');
    Route::get('/cart','App\Http\Controllers\UserCtr@cart')->name('cart');
    Route::post('/addCartAjax','App\Http\Controllers\UserCtr@addCartAjax');
    Route::post('/delCartAjax','App\Http\Controllers\UserCtr@delCartAjax');
    Route::post('/support','App\Http\Controllers\UserCtr@support');
    

    Route::post('/checkout','App\Http\Controllers\UserCtr@checkout')->name('checkout');
    Route::post('/addCheckoutAjax','App\Http\Controllers\UserCtr@addCheckoutAjax');

    Route::post('/changeAvt','App\Http\Controllers\UserCtr@changeAvt');

    Route::get('/Admin/index','App\Http\Controllers\AdminCtr@index')->name('Adhome');
    Route::get('/Admin/indexx','App\Http\Controllers\AdminCtr@index2')->name('Adhome2');
    Route::get('/Admin/blog','App\Http\Controllers\AdminCtr@blog')->name('Adblog');
    Route::get('/Admin/product','App\Http\Controllers\AdminCtr@product')->name('Adproduct');
    Route::get('/Admin/staff','App\Http\Controllers\AdminCtr@staff')->name('Adstaff');

    Route::get('/Staff/index','App\Http\Controllers\StaffCtr@index')->name('Sthome');
    Route::get('/Staff/done','App\Http\Controllers\StaffCtr@done')->name('Stdone');
    Route::post('/delAjax','App\Http\Controllers\StaffCtr@delAjax');

     //chiniu
     Route::get('/Admin/deleteBlog','App\Http\Controllers\AdminCtr@deleteBlog')->name('deleteBlog');
     Route::post('/Admin/insertBlog','App\Http\Controllers\AdminCtr@insertBlog')->name('insertBlog');
     Route::post('/Admin/updateBlog/{id}','App\Http\Controllers\AdminCtr@updateBlog')->name('updateBlog');
     Route::post('/Admin/changeStatus/{id}','App\Http\Controllers\AdminCtr@changeStatus')->name('changeStatus');

     Route::post('/Admin/insertProduct','App\Http\Controllers\AdminCtr@insertProduct')->name('insertProduct');
     Route::post('/Admin/updateProduct/{id}','App\Http\Controllers\AdminCtr@updateProduct')->name('updateProduct');
     Route::get('/Admin/deleteProduct','App\Http\Controllers\AdminCtr@deleteProduct')->name('deleteProduct');
?>