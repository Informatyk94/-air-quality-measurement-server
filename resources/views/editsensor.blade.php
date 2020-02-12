@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit sensor</div>
                    <form class="p-2" action="/editsensoraction/{{$sensor->id}}" method="get">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="{{$sensor->title}}" value="{{$sensor->title}}">
{{--                            <small id="textHelp" class="form-text text-muted">Add title sensor</small>--}}
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="{{$sensor->description}}" value="{{$sensor->description}}">
                        </div>
                        <div class="form-group">
                            <label for="id_sensor">ID Sensor</label>
                            <input type="text" name="id_sensor" class="form-control" id="id_sensor" placeholder="{{$sensor->id_sensor}}" value="{{$sensor->id_sensor}}">
                        </div>
                        <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                        <a href="/listofsensors" type="button" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
