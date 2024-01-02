@extends('admin.adminhome')

@section('title','Order information')

@section('body')
   <div class=" container m-5" >
    
    <div class="container m-3">
        <div class="card">
            <div class="card-header">
                <h1 style="text-align: center">Your Order Information</h1>
            </div>
            <div class="m-3">
                <form action="{{url('/search')}}" method="get">
                    <input type="text" name="search" style="color: blue;" placeholder="search">
                    <input type="submit" value="search" class="btn btn-success">
                </form>
            </div>
            <div class="card-body">
                <table class="table table-stripped bg-seccondary">
                    <tr>
                        <th>Id</th>
                        <th>Food Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Name</th>
                        <th>phone</th>
                        <th>address</th>
                        <th>Total Price</th>
                    </tr>
                    @foreach ($data as $data )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->foodname}}</td>
                        <td>{{$data->price}}</td>
                        <td>{{$data->quantity}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->address}}</td>
                        <td>{{$data->quantity * $data->price}}TK</td>
                        {{-- <td>
                                <img height="100px" width="100px" src="/chefimage/{{$data->image}}" alt=""  >
                            
                        </td>
                        <td>
                            <a href="{{url('updatechef',$data->id)}}" type="button" class="btn btn-success">Edit</a>
                            <a href="{{url('deletechef',$data->id)}}" type="button" class="btn btn-danger">Delete</a>
                        </td> --}}
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    </div>
    
    
@endsection