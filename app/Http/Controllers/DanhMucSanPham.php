<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; 
use App\ProductType;
class DanhMucSanPham extends Controller
{
    public function them_sp(){
        $listcat=ProductType::all();
       
    	return view('backend.themsp',compact('listcat'));
    } 
    public function danhmuc_sp(){
    	$list=Product::all();
          
       
    	return view('backend.danhmucsp',compact('list'));
    }
     public function delete($id)
    {
        $row=Product::find($id);
        if($row!=null)
        {
            $row->delete();
            return redirect()->route('danhmuc')->with("thongbao","san pham da xoa");
        }
        else{
            return redirect()->route('danhmuc');
        }
    }


   

    ////////////////////ham Thêm sản phẩm//////////
     public function postthem_sanpham(Request $req){ 
        $sp= new Product;
       $sp->name = $req->name;
       $sp->id_type = $req->loai;
       $sp->description = $req->mota;
       $sp->unit_price = $req->giaban;
       $sp->promotion_price= $req->giagiam;
       $sp->image = $req->hinhanh;
       $sp->new = $req->new;
       $sp->save();
       if($sp->save())
         return redirect()->route('danhmuc');
       
     }
     public function getsua_sp($id){
      $idsp =Product::find($id);

       $listcat=ProductType::all();
      return view('backend.suasanpham',compact('idsp'));

     }

}
