<?php

namespace App\Http\Controllers;

use App\Models\cheif;

use App\Models\Food;
use App\Models\reservation;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function adminusers(){
        return view('admin.users');
    }
    public function users(){
        $data=user::all();
        return view('admin.users',compact("data"));
    }
    public function deleteuser($id){
        $data=user::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function reservation(Request $request){
        $data=new reservation();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->guest=$request->guest;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->message=$request->message;
        $data->save();
        return redirect()->back();
    }
    public function reservationshow(){
        $data=reservation::all();
        if($data!=null){
            return view('admin.reservationshow', compact('data'));
        }
    }


    


    // things about cheif

    public function chefshow(){
        $data=cheif::all();
       if(Auth::id()){
          if($data!=null){
            return view('admin.chef.chefshow',compact('data'));
        }
       }
       else{
        return redirect('login');
       }
      
      
    }
    public function chefhomeshow(){
        $data=cheif::all();
        if($data!=null){
            return view('admin.chef.chefhome',compact('data'));
        }
      
    }
    public function uploadchef(Request $request){
        $data=new cheif();
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage',$imagename);
        $data->image=$imagename;
        $data->name=$request->name;
        $data->experience=$request->experience;
        $data->save();
        return redirect()->back();
    }
    public function deletechef($id){
        $data=cheif::find($id);
       if($data!=null){
        $data->delete();
        return redirect()->back();
    }
    }
    public function updatechef($id){
        $data=cheif::find($id);
        return view('admin.chef.updatechef',compact("data"));
    }
    public function updatechefinfo(Request $request,$id){
        $data=cheif::find($id);
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage',$imagename);
        $data->image=$imagename;
        $data->name=$request->name;
        $data->experience=$request->experience;
        $data->save();
        return redirect()->back()->with('message','Chef Information has been updated successfully');   
    }

    public function order(){
        $data=Order::all();

        return view('admin.orders.order',compact('data'));
    }

    public function search(Request $request){
        $search=$request->search;
        $data=order::where('name','Like','%'.$search.'%')->orWhere('foodname','Like','%'.$search.'%')->get();
        return view('admin.orders.order',compact('data'));
    }
}