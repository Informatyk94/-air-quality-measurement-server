@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Home</div>

                    <div class="card-body">
                        You have
                        @if(auth()->user()->is_admin == 1)
                            full access.
{{--                            <a href="{{url('admin/routes')}}">Admin</a>--}}
                        @else
                            limited access.
{{--                            <div class=”panel-heading”>Normal User</div>--}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
