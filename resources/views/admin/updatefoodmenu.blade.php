
@extends('admin.adminhome')
@section('title', 'Food Menu')

@section('body')
    <div class="Container-scroller " style="position:relative; top:50px; left:50px">
        <h4><span class="text-success">{{ Session::get('message') }}</span></h4>
        <form action="{{url('/updatefoodmenu',$data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                <label >Title</label>
                <input type="text" style="color:black" name="title" value="{{$data->title}}"required>
            </div>
            <div class="mt-3">
                <label >Price</label>
                <input type="num" style="color:black" name="price" value="{{$data->price}}"required>
            </div>
            <div class="mt-3">
                <label >Old image</label>
                <img height="200" width="200" src="/foodimage/{{$data->image}}" alt="">
            </div>
            <div class="mt-3">
                <label >New image</label>
                <input type="file" style="color:black" name="image" placeholder="image "required>
            </div>
            <div class="mt-3">
                <label >Description</label>
                <input type="text" style="color:black" name="description" value="{{$data->description}}" required>
            </div>
            <button type="submit" class="btn btn-primary ">Add </button>
        </form>
        
        </div>


    

@endsection 



