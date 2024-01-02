@extends('admin.adminhome')

@section('title','chef information')

@section('body')
   <div class=" container m-5" >
    <div class="card">
        <div class="card-header">
            <h1 style="text-align: center;">Upload Chef Information</h1>
        </div>
        <div class="card-body">
            <form action="{{url('uploadchef')}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div >
                    <label for="image" style='margin-right:48px'>Chef Image:</label>
                    <input type="file" name="image" placeholder="Select Chef Image">
                </div>
                <div>
                    <label for="name" style='margin-right:48px'>Chef Name      :</label>
                    <input type="text" name="name" style="color:black;" required>
                </div>
                <div>
                    <label for="experience"> Chef Experience :</label>
                    <input type="text" name="experience" placeholder="Experience of speachality" style="color:black;">
                </div>
                <div style="margin-right: 50px;"><button type="submit" class="btn btn-primary " >Upload</button></div>
                
                </form>
        </div>
    </div>
    <div class="container m-3">
        <div class="card">
            <div class="card-header">
                <h1 style="text-align: center">Chef Information</h1>
            </div>
            <div class="card-body">
                <table class="table table-stripped bg-seccondary">
                    <tr>
                        <th>Id</th>
                        <th>Chef Name</th>
                        <th>Chef Experience</th>
                        <th>Chef Image</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($data as $data )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->experience}}</td>
                        <td>
                                <img height="100px" width="100px" src="/chefimage/{{$data->image}}" alt=""  >
                            
                        </td>
                        <td>
                            <a href="{{url('updatechef',$data->id)}}" type="button" class="btn btn-success">Edit</a>
                            <a href="{{url('deletechef',$data->id)}}" type="button" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    </div>
    
    
@endsection