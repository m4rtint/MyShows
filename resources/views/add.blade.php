@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add A New Video</div>

                <div class="panel-body">
                    <form action='add' method='POST'>
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label>Title</label>
                        <input name="title" class="form-control">
                    </div>
                      <div class="form-group">
                        <label>Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                      <div class="form-group">
                         <label>Episode</label>
                         <input name="episode" class="form-control" >
                      </div>
                      <div class="form-group">
                        <label>Image</label>
                        <input name="image" class="form-control" >
                      </div>
                      <div class="form-group">
                        <label>Video Link</label>
                        <input name="video" class="form-control">
                      </div>
                      <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
