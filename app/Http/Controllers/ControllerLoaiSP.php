<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType; 
class ControllerLoaiSP extends Controller
{
    public function danhmuc_loai(){
    	$list=ProductType::all();
    	return view('backend.danhmucloaisp',compact('list'));
    }
/////////////////Hàm xóa SP////////////
    public function deleteloai($id)
    {
        $row=ProductType::find($id);
        if($row!=null)
        {
            $row->delete();
            return redirect()->route('danhmucloai');
        }
        else{
            return redirect()->route('danhmucloai');
        }
    }

     public function them_loai(){
        return view('backend.themloai');
    }


     public function postthem_loai(Request $req){
       
       $loaisp= new ProductType;
       $loaisp->name = $req->themSp;
       $loaisp->save();
       if($loaisp->save())
         return redirect()->route('danhmucloai');

    }

    //////////////////////////sửa loại///////////////
    public function getsua_loai($id){
        $loaisp = ProductType::find($id);
        return view('backend.suatheloai',compact('loaisp'));


    }


    public function postsua_loai(){
        $loaisp= new ProductType;
     
    }



}

