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
                    <br>
                    <br>
                    @foreach ($episodes as $ep)
                    <div class="row">
                        <div class="col-md-offset-1 col-md-5 col-sm-offset-1 col-sm-5 col-xs-offset-1 col-xs-5">
                            <a href={{$ep->url}}><h3>{{$ep->title}}</h3></a>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <h3>{{$ep->episode}}</h3>
                        </div>
                        <div class="col-md-1 col-sm-1 col-xs-1 ">
                            <form action="/deleteEpisode" method="post">
                                {{ csrf_field() }}
                                <input type=hidden name="title" value={{$ep->title}}>
                                <input type=hidden name="episode" value={{$ep->episode}}>
                                <button type="submit" class="btn btn-default">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
