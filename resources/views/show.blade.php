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
                    @foreach ($episodes as $ep)
                    <div class="btn-group btn-group-justified" role="group">
                      <div class="btn-group" role="group">
                        <a href={{$ep->url}} target="_blank" class="btn btn-default">{{$ep->title}} - Episode {{$ep->episode}}</a>
                      </div>
                      <div class="btn-group" role="group">
                          <form action="/deleteEpisode" method="post">
                              {{ csrf_field() }}
                              <input type=hidden name="title" value="{{$ep->title}}">
                              <input type=hidden name="episode" value={{$ep->episode}}>
                              <button type="submit" class="btn btn-default">Delete</button>
                          </form>
                      </div>
                    </div>
                    @endforeach
                    <br>
                    <div class='row'>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form action="addEpisode" method="post" class="form-inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="title" value="{{$title}}">
                                <input class="form-control" name="episode" placeholder="episode">
                                <input class="form-control" name='video' placeholder="URL">
                                <button type="submit" class="btn btn-default">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
