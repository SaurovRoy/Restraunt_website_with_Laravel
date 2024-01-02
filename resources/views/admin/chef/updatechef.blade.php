@extends('admin.adminhome')

@section('title','Update chef')

@section('body')
<div class="container mt-5">
    
    <h1 style="background-color: black" class="mt-3"><span class="text-secondary">{{Session::get('message')}}</span></h1>
    <form action="{{url('updatechefinfo',$data->id)}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="mt-3">
            <label for="">Old Image</label>
            <img src="/chefimage/{{$data->image}}" height="300px" width="200px" alt="">
        </div>
        <div class="mt-3">
            <label for="image">New Image</label>
            <input type="file" name="image" placeholder="seleect your image" style="color:black;">
        </div>
        <div class="mt-3">
            <label for="name">Name</label>
            <input type="text" value="{{$data->name}}" name='name' style="color:black">
        </div>
        <div class="mt-3">
            <label for="experience"> Speciality</label>
            <input type="text" name="experience"  value="{{$data->experience}}" style="color:black">
        </div>
        <button type="submit" class="btn btn-primary"> update</button>
    </form>
    
</div>


@endsection