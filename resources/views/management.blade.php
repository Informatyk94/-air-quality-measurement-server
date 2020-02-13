@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">List of sensors</div>
                    <div class="card-body">
                       <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Admin</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row"> {{$user[0]}}</th>
                                        <td>{{$user[1]}}</td>
                                        <td>{{$user[2]}}</td>
                                        <td>{{$user[3]}}</td>
                                        <th>
                                            <a href="/edituser/{{$user[0]}}" type="button" class="btn btn-success">Edit</a>
                                            <a href="/deleteuser/{{$user[0]}}" type="button" class="btn btn-danger">Delete</a>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                            <div>
                                <a href="{{url('register')}}" type="button" class="btn btn-success">Add new user</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
