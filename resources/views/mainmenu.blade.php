@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($data as $d)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href='/show?title={{$d->title}}'>{{$d->title}}</a></div>
                <div class="panel-body">
                    <div class="row">
                        <div class='col-md-5'>
                            <a href="{{$d->video_link}}" target="_blank">
                                <img src="{{$d->image_link}}" class="img-responsive" alt="Responsive image">
                            </a>
                        </div>
                        <div class="col-md-5">
                            @if ($d->uncensored)
                                <span class="label label-default">uncensored</span>
                            @endif
                            <p>{{$d->description}}</p>
                        </div>
                    </div>
                </div>
                 <div class="panel-footer">
                    <form action="/delete" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="name" value="{{$d->title}}">
                        <a href="/edit?title={{$d->title}}" class="btn btn-default">Edit</a>
                        <button type="submit" class="btn btn-default">Delete</button>
                    </form>
                 </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
