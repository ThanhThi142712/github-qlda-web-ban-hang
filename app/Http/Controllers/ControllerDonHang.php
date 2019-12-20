<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Bill;
use\App\BillDetail;
use\App\Customer;
use\App\Product;
class ControllerDonHang extends Controller
{
     public function getdon_dathang(){/*{dd($user);*/

      		$list=Bill::all();
      		foreach ($list as $key) {
      		
      			$user=Customer::find($key->id_customer);
      			

      		}
      		return view('backend.danhmucdonhang',compact('list','user'));
      }

       public function getchitiet_donhang(){
       	$ds = BillDetail::all();
       	foreach ($ds as $key ) {
       		# code...

       		$bill=Bill::find($key->id_bill);
       		$sp= Product::find($key->id_product);
       	}

       return view('backend.chitietdondathang',compact('ds','bill','sp'));
       }
}
