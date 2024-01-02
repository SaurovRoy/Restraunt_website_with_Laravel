@extends('admin.adminhome')
@section('title', 'Food Menu')

@section('body')
    <div class="Container " style="position:relative; top:100px; left:50px">
        <form action="{{ route('uploadfood') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                <label>Title</label>
                <input type="text" style="color:black" name="title" placeholder="Write a title "required>
            </div>
            <div class="mt-3">
                <label>Price</label>
                <input type="num" style="color:black" name="price" placeholder="Write Price "required>
            </div>
            <div class="mt-3">
                <label>image</label>
                <input type="file" style="color:black" name="image" placeholder="image "required>
            </div>
            <div class="mt-3">
                <label>Description</label>
                <input type="text" style="color:black" name="description" placeholder="Write a description "required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Add </button>
        </form>


        {{-- Food Menu --}}
        <div class="container" style="width:100%">
            <div class="card">
                <div class="card-header">

                    <h1 class="text-center">Your Food Information</h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped bg-success">
                        <tr>
                            <th>Id</th>
                            <th> Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->description }}</td>
                                <td>{{ $data->price }} TK</td>
                                <td>{{ $data->image }}</td>
                                <td>
                                    <button type="btn-warning"></button>
                                    <a href={{ url('/updatefood', $data->id) }} class="btn btn-primary">Edit</a>

                                    <a href={{ url('/deletefood', $data->id) }} class="btn btn-danger">Delete</a>

                                    {{-- <a href="{{url('/deletefood',$data->id)}}">delete</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>

        </div>


    </div>
    </div>



@endsection
