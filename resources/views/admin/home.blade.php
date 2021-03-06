@extends('layouts.app')
@section('css')

@stop
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                               You are logged in Admin !
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-8 ">
                                    <a href="{{route('add:techar')}}" class="btn btn-success">Add Techars</a>
                                </div>
                            </div>
                            <h4>All users</h4>
                            <div class="table-responsive ">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($user as $value)

                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>
                                                <a href="{{route('edit' , $value->id)}}" class="btn btn-info">Edit</a>
                                                <a href="{{route('destroy' , $value->id)}}"  onclick="onmessage" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                          </div>
                </div>
            </div>
         </div>
    </div>
@endsection
