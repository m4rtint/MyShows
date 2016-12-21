@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add A New Video</div>

                <div class="panel-body">
                    <form action='editShow' method='POST'>
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label>Title</label>
                        <input name="title" class="form-control" readonly value="{{$title}}">
                    </div>
                      <div class="form-group">
                        <label>Description</label>
                            <textarea name="description" class="form-control" rows="3" >{{$description}}</textarea>
                        </div>
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{$image}}" class="img-responsive img-rounded" alt="Responsive image">
                        </div>
                        <div class="col-md-7">
                          <div class="form-group">
                            <label>Image</label>
                            <input name="image" class="form-control" value={{$image}}>
                          </div>
                          <div class="form-group">
                            <label>Video Link</label>
                            <input name="video" class="form-control" value={{$video}}>
                          </div>
                        </div>
                    </div>
                    <br>
                    <div class="pull-right ">
                      <button type="submit" class="btn btn-default">Submit</button>
                  </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
