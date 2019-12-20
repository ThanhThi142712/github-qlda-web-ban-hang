<?php

namespace App\Http\Controllers;

use App\Slide; //khai bao thu vien chua slide
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use Hash;
use App\User;
use required;
use Auth;
use App\Bill;
use App\BillDetail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function getIndex(){
      
      $slide = Slide::all(); //tao bien lay het dl tu csdl
      $new_product = Product::where('new',1)->paginate(4);
      $sanpham_khuyenmai=Product::where('promotion_price','<>',0)->paginate(4);
      //dd($new_product);
     return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));// chuyen bien

    }
    /* tang giam theo giá
      public function getgiatang(){
      $sp_tang =Product::where('promotion_price','<>',0)->orderBy('promotion_price', 'asc')
                ->get();
      $sp_tang =Product::where('unit_price','<>',1)->orderBy('unit_price', 'asc')
                ->get();
      return view('page.tangtheogia',compact('sp_tang'));
      }

        public function getgiagiam(){
      $sp_giam =Product::where('promotion_price','<>',0)->orderBy('promotion_price', 'desc')
                ->get();
      $sp_giam =Product::where('unit_price','<>',1)->orderBy('unit_price', 'desc')
                ->get();
      return view('page.giamtheogia',compact('sp_giam'));
      }
      */
    ////////////////////////////////////////////////////////////////////////// 
    public function getLoaiSp($type){
       $sp_theoloai = Product::where('id_type','<>',$type)->paginate(3);
       $sp_khac= Product::where('id_type',$type)->paginate(3);
       $loai =ProductType::all();
       $loai_sp =ProductType::where('id',$type)->first();
       
      return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }
    ////////////////////////////////////////////////////////////////

    public function getChitiet( Request $req){
      $sanpham = Product::where('id',$req->id)->first();
      $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(3);
      return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu'));
    }
    //////////////////////////////////////

    public function getLienHe(){
      return view('page.lienhe');
    } 
    ///////////////////////////////////////////
    public function getGioiThieu(){
      return view('page.gioithieu');
    } 
/////////////////////////////////////////////
    public function getAlltoCart(Request $req,$id){
      $product =Product::find($id);
      $oldCart= Session('cart')?Session::get('cart'):null;
      $cart =new Cart($oldCart);
      $cart->add($product,$id);
      $req->Session()->put('cart',$cart);
      return redirect()->back();
    }
    //////////////////////////////////////////////////

     public function getDelItemCart($id){
      $oldCart= Session::has('cart')?Session::get('cart'):null;
      $cart =new Cart($oldCart);
      $cart->removeItem($id);
      if(count($cart->items)>0){
         Session()->put('cart',$cart);
      }
      else{
         Session::forget('cart');
      }
     
      return redirect()->back();



    }
    ////////////////////////////////////////////////
    public function getCheckout (){
      if(Session::has('cart'))
      {
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
      }
      return view('page.dat_hang',['product_cart'=>$cart->items,
                'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
    }
    ///////////////////////////////////////////////////
    public function getLogin(){
      return view('page.dangnhap');
    }
     ///////////////////////////////////////////////
 /*   public function postLogin( Request $req){
       $this->validate($req,
        [
          'email'=>'required|email',
          'password'=>'required|min:6|max:20',
     
          
        ],
        [
          'email.required'=>'Vui lòng nhập email',
          'email.email'=>'Không đúng định dạng email',
          'password.required'=>'Vui lòng nhập mật khẩu',
          'password.min'=>'Mật khẩu ít nhất 6 ký tự',
          'password.max'=>'Mật khẩu không quá 20 ký tự'
        ]);
      /* $credentials=array('email'=>$req->email,'password'=>$req->password);
          $chuoi='nhanam945@gmail.com';
       if($req->email==$chuoi)
       {
        $admin=array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($admin))
            {
              return redirect()->route('layout');
            }
       }else
       {
       if(Auth::attempt($credentials)){
        return redirect()->route('trang-chu')->with(['flag'=>'success','message'=>'Đăng Nhập Thành công']);
       }
    
       else{
        return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng Nhập Thất bại']);

       }
     

       if(Auth::attempt(['email'=>$req->email,'password'=>$req->password]))
       {
           return redirect()->route('trang-chu')->with(['thongbao','Đăng Nhập Thành công']);
       }
       else{
            return redirect()->route('dang-nhap')->with(['thongbao','Đăng Nhập Thất bại ']);
       }

    }

*/
    //////////////////////////////////////////////////
     public function getSignin(){
      return view('page.dangky');
    }
    ///////////////////////////////////////////
    public function postSignin(Request $req){
      $this->validate($req,
        [
          'email'=>'required|email|unique:users,email',
          'password'=>'required|min:6|max:20',
          'fullname'=>'required',
          're_password'=>'required|same:password'
        ],
        [
          'email.required'=>'Vui lòng nhập email',
          'email.required'=>'Không đúng định dạng email',
          'email.unique'=>'Email đã tồn tại',
          'password.required'=>'Vui lòng nhập mật khẩu  ',
          're_password.same'=>'Mật khẩu không khớp',
          'password.min'=>'Mật khẩu ít nhất 6 ký tự'
        ]);
      $user =new User();
      $user->full_name=$req->fullname;
      $user->email=$req->email;
      $user->password=Hash::make($req->password);
      $user->phone=$req->phone;
      $user->address=$req->address;
      $user->save();
      return redirect()->route('login')->with(['flag'=>'success','message'=>'Tạo tài khoản thành công']);


    }
    public function getSearch(Request $req){
      $product=Product::where('name','like','%'.$req->key.'%')
                        ->orWhere('unit_price',$req->key)
                        ->get();
      return view('page.search',compact('product'));

    }
    ////////////////////////////dang xuat///////////////////
    public function postLogout(){
      Auth::logout();
      return redirect()->route('trang-chu');
    }
///////////////đơn hàng/////////////////////////////
    public function postCheckout(Request $req){
      $cart =Session::get('cart');

      $customer = new Customer;
      $customer->name=$req->name;
      $customer->gender =$req->gender;
      $customer->email=$req->email;
      $customer->address=$req->addres;
      $customer->phone_number=$req->phone;
      $customer->note=$req->notes;
      $customer->save();

      $bill=new Bill;
      $bill->id_customer = $customer->id;
      $bill->date_order = date('Y-m-d');
      $bill->total = $cart->totalPrice;
      $bill->payment =$req->payment_method;
      $bill->note = $req->notes;
      $bill->save();

      foreach ($cart->items as $key => $value) {
        $bill_detail = new BillDetail;
        $bill_detail->id_bill = $bill->id;
        $bill_detail->id_product =$key;
        $bill_detail->quantity =$value['qty'];
        $bill_detail->unit_price = ($value['price']/ $value['qty']);
        $bill_detail->save();


      }
      if($bill_detail->save() && $customer->save() && $bill->save())
        $req->Session()->forget('cart');
        return redirect()->route('trang-chu');
           
      }


//////////////////////////////////////////////////////////////////////
      public function postLogin(Request $request) {

       $credentials=array('email'=>$request->email,'password'=>$request->password);
          $chuoi='nhanam945@gmail.com';
       if($request->email==$chuoi)
       {
        $admin=array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt($admin))
            {
              return redirect()->route('layout');
            }
       }

  // Kiểm tra dữ liệu nhập vào
  $rules = [
    'email' =>'required|email',
    'password' => 'required|min:6'
  ];
  $messages = [
    'email.required' => 'Email là trường bắt buộc',
    'email.email' => 'Email không đúng định dạng',
    'password.required' => 'Mật khẩu là trường bắt buộc',
    'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
  ];
  $validator = Validator::make($request->all(), $rules, $messages);
  
  
  if ($validator->fails()) {
    // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
    return redirect('dang-nhap')->withErrors($validator)->withInput();
  } else {
    // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
    $email = $request->input('email');
    $password = $request->input('password');
 
    if( Auth::attempt(['email' => $email, 'password' =>$password])) {
      // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
      return redirect('index');
    } else {
      // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
      Session::flash('error', 'Email hoặc mật khẩu không đúng!');
      return redirect('dang-nhap');
    }
  }
}






}
