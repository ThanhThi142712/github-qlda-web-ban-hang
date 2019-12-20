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

Route::get('/', function () {
    return view('welcome');
});
Route::get('index',
	['as'=>'trang-chu',
	'uses'=>'PageController@getIndex' 
]);
Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);
Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);
Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienHe'
]);
Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioiThieu'
]);
Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAlltoCart'
]);
Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);

Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);
Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);
Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

Route::get('dang-ky',[
	'as'=>'signin',
	'uses'=>'PageController@getSignin'
]);
Route::post('dang-ky',[
	'as'=>'signin',
	'uses'=>'PageController@postSignin'
]);
Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);
Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@postLogout'
]);
/////////////////////////////////////////////////////////
////////////////backend////////////////////////////////

Route::get('layout',[
	'as'=>'layout',
	'uses'=>'AdminController@getquantri'
]);
Route::get('Admin',[
	'as'=>'Admin',
	'uses'=>'AdminController@getadmin'
]);
/////////////////////////////////////////////////////////////////////////////////////////////////////////
///////Danh Sach Sản Phẩm///////////////////////////////////////////////////////////////////////////////
////them san pham///////
///////////////////////

Route::get('themSP',[
	'as'=>'themSP',
	'uses'=>'DanhMucSanPham@them_sp'
]);

////danh muc san pham/////
////////////////////////

Route::get('danhmuc',[
	'as'=>'danhmuc',
	'uses'=>'DanhMucSanPham@danhmuc_sp'
]);
///////Xóa///////

Route::get('delete/{id}','DanhMucSanPham@delete')->name('delete');


Route::post('themsanpham',[
	'as'=>'themsanpham',
	'uses'=>'DanhMucSanPham@postthem_sanpham'
]);
 
 Route::get('suasanpham/{id}',[
	'as'=>'suasanpham',
	'uses'=>'DanhMucSanPham@getsua_sp'
]);
 Route::post('suasanpham/{id}',[
	'as'=>'suasanpham',
	'uses'=>'DanhMucSanPham@postsua_sp'
]);


///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////

/////danh Sách loai san pham////////
///////////////////////////////////
Route::get('danhmucloai',[
	'as'=>'danhmucloai',
	'uses'=>'ControllerLoaiSP@danhmuc_loai'
]);
/////////xóa loại/////////////
Route::get('delete1/{id}','ControllerLoaiSP@deleteloai')->name('delete1');

///////////////////////////////////////////////////
//////////thêm loại///////////////////
Route::get('themLoai',[
	'as'=>'themLoai',
	'uses'=>'ControllerLoaiSP@them_loai'
]);
Route::post('themLoai',[
	'as'=>'themLoai',
	'uses'=>'ControllerLoaiSP@postthem_loai'
]);
////////////////////////////////////////////////
///////////sửa loại sp/////////////////////////
Route::get('suaLoai/{id}',[
	'as'=>'suaLoai',
	'uses'=>'ControllerLoaiSP@getsua_loai'
]);
Route::post('suaLoai/{id}',[
	'as'=>'suaLoai',
	'uses'=>'ControllerLoaiSP@postsua_loai'
]);
///////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////
///////////don hang/////////////////
Route::get('donhang',[
	'as'=>'donhang',
	'uses'=>'ControllerDonHang@getdon_dathang'
]);

Route::get('chitietdonhang',[
	'as'=>'chitietdonhang',
	'uses'=>'ControllerDonHang@getchitiet_donhang'
]);
////////////////////////////////////////////////////////////
Route::get('khachhang',[
	'as'=>'khachhang',
	'uses'=>'ControllerKhachHang@getkhach_hang'
]);

Route::get('delete2/{id}','ControllerKhachHang@deletekh')->name('delete2');


///////////////////////////////////////////////////////////
/////////////////tăng giam theo giá///////////////////////
Route::get('giatang',[
	'as'=>'giatang',
	'uses'=>'PageController@getgiatang'
]);

Route::get('giagiam',[
	'as'=>'giagiam',
	'uses'=>'PageController@getgiagiam'
]);
/////////////////////////////////////////////////////
