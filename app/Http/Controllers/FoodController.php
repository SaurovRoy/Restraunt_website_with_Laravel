<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class FoodController extends Controller
{
    public function foodmenu(){
        $data=Food::all();
        $dat=user::all()->first();
        if($data!=null && $dat!=null){
            return view('admin.foodmenu',compact("data"),compact("dat"));
        }
        else{
            return redirect()->back();
        }
       
    }

    public function deletefood($id){
        $data=food::find($id);
        if($data!=null){
            $data->delete();
        return redirect()->back();
        }
        else{
            return redirect()->back();
        }

    }

    public function uploadfood(Request $request){
        $data=new Food();
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();
        return redirect()->back();
    }
    
    public function updatefood($id){
        $data=Food::find($id);
        if($data!=null){
            
        return view('admin.updatefoodmenu')->with(compact("data"));
        }
        
    }
    public function updatefoodmenu(Request $request,$id){
        $data=Food::find($id);
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();
        return redirect()->back()->with('message' , 'Food Item has been updated successfully');
       

    }
}
