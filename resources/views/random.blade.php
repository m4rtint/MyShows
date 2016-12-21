@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">{{$title}}</div>
                <div class="panel-body">
                    <div class="row">
                        <div class='col-md-5'>
                            <a href="{{$video}}" target="_blank">
                                <img src="{{$image}}" class="img-responsive" alt="Responsive image">
                            </a>
                        </div>
                        <div class="col-md-5">
                            <p>{{$description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
