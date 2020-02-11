@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">List of sensors</div>
                    <div class="card-body">
                       <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID Sensor</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($listofsensors as $sensor)
                                    <tr>
                                        <th scope="row"> {{$sensor->id_sensor}}</th>
                                        <td>{{$sensor->title}}</td>
                                        <td>{{$sensor->description}}</td>
                                        <th>
                                            <a href="/listofmeasurement/{{$sensor->id_sensor}}" type="button" class="btn btn-info">Findings</a>
                                            @if(auth()->user()->is_admin == 1)
                                                <a href="/edit/{{$sensor->id}}" type="button" class="btn btn-success">Edit</a>
                                                <a href="/delete/{{$sensor->id}}" type="button" class="btn btn-danger">Delete</a>
                                            @endif
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            <a href="/addsensor" type="button" class="btn btn-success">Add sensor</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
