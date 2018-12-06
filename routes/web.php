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

//网站首页
Route::get('/','HomeController@index')->name('home');
// 前台登录
Route::group(['prefix'=>'article','namespace'=>'Article','as'=>'article.'],function(){
    Route::resource('article','ArticleController');

});
// 视频管理
Route::resource('video','video\VideoController');

// 留言
Route::resource('comment','Home\CommmentsController');
// 点赞
Route::get('zan/make','Home\ZanController@make')->name('zan/make');
//收藏
Route::get('conllection','Home\CollectionController@collection')->name('conllection');
//动态
Route::get('dynamic','Home\DynamicController@index')->name('dynamic');
// 搜索
Route::get('search','HomeController@search')->name('search');


// 注册中心
Route::group(['prefix'=>'member','namespace'=>'Member','as'=>'member.'],function(){
    Route::resource('user','UserController');
    Route::get('attention/{user}','UserController@attention')->name('attention');
    Route::get('fans/{user}','UserController@fans')->name('fans');
    Route::get('follow/{user}','UserController@follow')->name('follow');
    // 我的收藏
    Route::get('collection/{user}','UserController@collection')->name('collection');
    // 我的点赞
    Route::get('my_zan/{user}','UserController@my_zan')->name('my_zan');
    // 显示通知消息
    Route::get('notify/{user}','NotifyContryller@index')->name('notify');
    // 跳转信息
    Route::get('notify/show/{notify}','NotifyContryller@show')->name('notify.show');

});
// 注册登录
Route::get('/user/register','User\UserController@resighter')->name('user.register');
Route::get('/user/login','User\UserController@login')->name('userog.login');
Route::post('/user/store','User\UserController@store')->name('user.store');
Route::post('user/login','User\UserController@login_form')->name('user.login');

// 工具类
Route::any('code/send','Util\CodeController@send')->name('code.send');

Route::group(['prefix'=>'util','namespace'=>'Util','as'=>'util.'],function(){
    Route::any('/uploader','UploadController@uploader')->name('uploader');
    Route::any('/filesLists','UploadController@filesLists')->name('filesLists');


});

    // 退出
    Route::get('user/logout','User\UserController@logouts')->name('user.logouts');
    // 重置密码

    Route::get('user/rest','User\UserController@rest')->name('user.set');
    Route::post('user/rest','User\UserController@rest_from')->name('user.set');
    //后台登录目标
    Route::group(['middleware' => ['admin.auth'],'prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function(){
    Route::get('/','IndexController@index')->name('admin');
    //文章栏目
    Route::resource('category','CategoryController');
    //视频栏目
    Route::resource('column','VideoColumnController');

});
    // 配置选项
    Route::get('config/edit/{name}','Config\ConfitController@edit')->name('config.edit');
    Route::post('config/upload/{name}','Config\ConfitController@upload')->name('config.upload');
    // 路由测试
    Route::group(['prefix'=>'wechat','namespace'=>'Wechat','as'=>'wechat.'],function(){
    //菜单管理
    Route::resource('button','ButtonController');
    Route::get('button/push/{button}','ButtonController@push')->name('button.push');
    //微信通信地址
    Route::any('api/handler','ApiController@handler')->name('api.handler');
});
    // 微信通知
    Route::group(['prefix'=>'wechat','namespace'=>'Wechat' ,'as' =>'wechat.'],function(){
   // 微信控制器
    Route::resource('button','ButtonController');
    // 微信通信
    Route::get('api/wechat','ApiController@handler')->name('api.wechat');
    //微信推送菜单
    Route::get('wechaht/push{$button}','ButtonController@push')->name('wechat.push');
    //微信文本回复
    Route::resource('response_text','ResponseTextController');
    //微信图文回复
    Route::resource('response_news','ResponseNewsController');
    //微信基本回复
     Route::resource('response_base','ResponseBaseController');

});
    // 轮播图
    Route::resource('slide','Slide\SlideController');
   // 权限管理
Route::group(['prefix'=>'role','namespace'=>'Role' ,'as' =>'role.'],function(){

    //权限列表
    Route::get('permission/index','PermissionController@index')->name('permission.index');
    //清除缓存
    Route::get('forgetPermissionCache','PermissionController@forgetPermissionCache')->name('forgetPermissionCache');
    //角色添加
    Route::resource('role','RoleController');
    //角色权限
    Route::post('role.set_role_permission/{role}','RoleController@setRolePermission')->name('role.set_role_permission');
    //用户展示
    Route::get('user_role','UserController@index')->name('user_sole');
    //用户角色栏目添加
    Route::get('user_create/{user}','UserController@create')->name('user_create');
    Route::post('user_set_role_store/{user}','UserController@userSetRoleStore')->name('user_set_role_store');

});

