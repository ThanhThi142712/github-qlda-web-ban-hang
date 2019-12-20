<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\User;
class ControllerKhachHang extends Controller
{
   public function getkhach_hang(){
    	$list=User::all();
       
    	return view('backend.danhmuckhachhang',compact('list'));
    }

    //////////////////xóa///////////
     public function deletekh($id)
    {
        $row=User::find($id);
        if($row!=null)
        {
            $row->delete();
            return redirect()->route('khachhang')->with("message",["type"=>"danger","msg"=>"san pham da xoa"]);
        }
        else{
            return redirect()->route('khachhang');
        }
    }
}
