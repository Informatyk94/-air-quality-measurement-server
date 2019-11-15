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
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($listofsensors as $sensor)
                                    <tr>
                                        <th scope="row"> {{$sensor->id}}</th>
                                        <td>{{$sensor->title}}</td>
                                        <td>{{$sensor->description}}</td>
                                        <th>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="#" type="button" class="btn btn-info">Measurement</a>
                                                <a href="#" type="button" class="btn btn-success">Edit</a>
                                                <a href="#" type="button" class="btn btn-danger">Delete</a>
                                            </div>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
