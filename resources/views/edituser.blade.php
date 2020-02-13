@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit user</div>
                    <form class="p-2" action="/edituseraction/{{$user->id}}" method="get">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="{{$user->name}}" value="{{$user->name}}">
{{--                            <small id="textHelp" class="form-text text-muted">Add title sensor</small>--}}
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="{{$user->email}}" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="id_admin">Admin</label>
                            <div>
                                <input id="is_admin" type="checkbox" @if($user->is_admin === 1) checked @endif  name="is_admin" style="position: relative; top: 0px; margin-bottom: 20px; margin-left: 15px">
                            </div>
                        </div>
                        <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                        <a href="/management" type="button" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
