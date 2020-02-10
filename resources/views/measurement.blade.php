@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{$sensor->title }}</div>
                    <div class="card-body">
                        {{$sensor->description}}
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">All</div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">
                                    Data
                                </th>
                                <th scope="col">
                                    Measurement
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($measurment as $mens)
                                    <tr>
                                        @foreach($mens as $item)
                                            <th>
                                                {{$item}}
                                            </th>
                                        @endforeach
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
