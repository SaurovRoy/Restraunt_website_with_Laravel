<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\cheif;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        if(Auth::id()){
            return redirect('redirects');
        }
        else

        $data=Food::all();
        $data1=cheif::all();
        $count=Cart::where('user_id')->count();
        if($data!==null && $data1!==null){
            return view('home',compact("data"),compact('data1'),compact('count'));
        }
        else{
            return redirect()->back();
        }
    }
    public function redirects(){
        $data=Food::all();
        $data1=cheif::all();
        $usertype=Auth::user()->usertype;
        if($usertype==1 && $usertype!=null && $data!=null){
            return view('admin.adminhome');
        }
        else{
            $userid=Auth::id();
            $count=cart::where('user_id',$userid)->count();
            return view('home',compact("data","data1","count"));
        }
    }

    public function addcart(Request $request,$id){
        $userid=Auth::id();
        if($userid){
            $foodid=$id;
            $quantity=$request->quantity;
            $cart=new Cart;
            $cart->user_id=$userid;
            $cart->food_id=$foodid;
            $cart->quantity=$quantity;
            $cart->save();
            return redirect()->back();
        }
        else{
            return redirect('/login');
        }
        
    }

    Public function showcart($id){
        
        $count=cart::where('user_id',$id)->count();

        if(Auth::id()==$id){
              $data1=cart::select('*')->where('user_id','=',$id)->get();
        $data=cart::where('user_id',$id)->join('food' , 'carts.food_id', '=' , 'food.id')->get();
        return view('Carts.showcart',compact('count','data','data1'));
        }
        else{
            return redirect()->back();
        }

      
    }
    public function remove($id){
        $data=cart::find($id);
        $data->delete();
            return redirect()->back();
        
    }

    public function orderconfirm(Request $request){

            foreach($request->foodname as $key => $foodname){
                $data=new Order();

                $data->foodname=$foodname;
                $data->price=$request->price[$key];
                $data->quantity=$request->quantity[$key];
                $data->name=$request->name;
                $data->phone=$request->phone;
                $data->address=$request->address;
                $data->save();
            }
            
            return redirect()->back();
        
    }
}
