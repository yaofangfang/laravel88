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

// 闭包路由   返回视图
Route::get('/', function () {
    return view('welcome');
});
// 闭包路由   返回值
Route::get('/hello', function () {
    return 'hello aaa';
});
Route::get('/form', function () {
    return '<form action="/foo" method="post"> '.csrf_field().'<input type="text" name="aaa"/> <button>提交</button>';
});
Route::post('/foo', function () {
    return 'hello aaa';
});
//重定向
Route::redirect('/aaa','/',301);
//路由视图
Route::get('/he', function () {
   return view('test');
});
Route::view('/he','test',['name'=>'zhangsan']);
// 闭包函数传参   必填
Route::get('/he/{id}', function ($id) {
   return "id is:".$id;
});

Route::get('/he/{id}','UserController@index');
// // 考试二--------
// Route::get('/goods/goodslist','GoodsController@goodslist');
// Route::get('/goods/goodsdetail','GoodsController@goodsdetail');
// Route::get('/goods/delete/{goods_id}','GoodsController@delete')->name('deletegoods');
// Route::get('/goods/edit/{goods_id}','GoodsController@edit')->name('editgoods');
// Route::post('/goods/update/{goods_id}','GoodsController@update')->name('updategoods');


// 练习--------------
/*Route::prefix('user')->group(function(){
    Route::get('add','UserController@add');
    Route::post('adddo','UserController@store');
    Route::any('show','UserController@show');
    Route::get('delete','UserController@delete');
    Route::get('edit/{id}','UserController@edit')->name('edituser');
    Route::post('update/{id}','UserController@update');
    Route::get('uploads','UserController@uploads');
    Route::post('checkname','UserController@checkname');
});*/
// 跳到登录视图
/*Route::get('islogin', function () {
    return view('user/login');
});
Route::post('logindo','UserController@logindo');
Route::get('user/quit','UserController@quit');*/


// 考试   网站路由---------------
/*Route::prefix('friendlink')->middleware('islogin')->group(function(){
    Route::get('add','FriendController@add');
    Route::get('uploads','FriendController@uploads');
    Route::post('adddo','FriendController@adddo');
    Route::get('list','FriendController@list');
    Route::post('checkname','FriendController@checkname');
    Route::get('delete','FriendController@delete')->name('deletefriend');
    Route::get('edit/{id}','FriendController@edit')->name('editfriend');
    Route::post('update/{id}','FriendController@update');
});
// 防非法登录
Route::get('islogin', function () {
    return view('friendlink/login');
});
Route::post('logindo','FriendController@logindo');
// 退出
Route::get('friendlink/quit','FriendController@quit');*/


// 项目 ------------------
Route::any('index','IndexController@index');
// 注册
Route::get('/reg','LoginController@reg');
Route::post('login/regdo','LoginController@regdo');
Route::post('login/sendSms','LoginController@sendSms');
Route::post('login/send','LoginController@send');
// 登录
Route::get('/login','LoginController@login');
Route::post('/logindo','LoginController@logindo');
// 列表
Route::get('/prolist','GoodsController@prolist');
Route::post('/goods/getGoodsInfo','GoodsController@getGoodsInfo');
Route::get('/proinfo','GoodsController@proinfo');
Route::get('/user','UserController@user');
Route::get('user/quit','UserController@quit');
Route::get('/cart','CartController@cart');
Route::get('/add_address','CartController@add_address');
Route::get('/address','CartController@address');
Route::get('/order','CartController@order');
Route::get('/pay','CartController@pay');
Route::get('user/quan','UserController@quan');
Route::get('user/shou','UserController@shou');
Route::get('user/tixian','UserController@tixian');


Route::get('/alipay','AlipayController@alipay');

// 展示练习
// Route::get('/show/{id}','IndexController@show');
// Route::get('index/shows','IndexController@shows');


// Route::post('login/checkEmail','LoginController@checkEmail');
// 发送邮件
// Route::post('/send','MailController@send');
//发送短信
// Route::get('/sendSms','MailController@sendSms');
// 自带登录认证
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');




