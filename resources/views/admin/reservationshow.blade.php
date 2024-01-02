@extends('admin.adminhome')

@section('title','reservation show')

@section('body')
<div class="container mt-5" style="width: 100%">
   
            <div class="card">
                <div class="card-header">
                   
                    <h1 class="text-center">Reservation Information</h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped bg-success">
                        <tr >
                            <th>Id</th>
                            <th> Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Guest</th>
                            <th>Date</th>
                            <th>time</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email}}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->guest}}</td>
                                <td>{{ $data->date }}</td>
                                <td>{{ $data->time}}</td>
                                <td>{{$data->message}}</td>
                                <td>
                                    <button type="btn-warning"></button>
                                    <a href="#"
                                        class="btn btn-primary">Edit</a>
                                   
                                        <a class="btn btn-danger" >Not Allow</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="card-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
      
</div>
@endsection