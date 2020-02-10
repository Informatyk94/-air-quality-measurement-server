@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add new sensor</div>
                    <form class="p-2" action="/addsensoraction" method="get">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
{{--                            <small id="textHelp" class="form-text text-muted">Add title sensor</small>--}}
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Description">
                        </div>
                        <div class="form-group">
                            <label for="id_sensor">ID Sensor</label>
                            <input type="text" name="id" class="form-control" id="id_sensor" placeholder="ID Sensor">
                        </div>
                        <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
