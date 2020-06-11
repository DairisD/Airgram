@extends('layouts.main')

@section('content')

<div class="row d-flex justify-content-center pt-3 pl-3 pr-3">
    <div class="col-2">
        <a href="{{{ URL::route('home') }}}" type="button" class="btn btn-outline-secondary">Back</a>
    </div>
    <div class="col-8 d-flex justify-content-center">
        <h2 class="mb-0 mt-2">New post</h2>
    </div>
    <div class="col-2"></div>
</div>
<div class="container">
    <form class="form-group" action="{{ url('/post') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row offset-1">
            <label for="plane" class="col-md-4 col-form-label">Plane</label>
            <input id="plane" type="text" name="plane" class="col-11 form-control" autocomplete="off">
        </div>
        <div class="row offset-1">
            <label for="airport" class="col-md-4 col-form-label">Airport</label>
            <input id="airport" type="text" name="airport" class="col-11 form-control" autocomplete="off">
        </div>
        <div class="row offset-1">
            <label for="airline" class="col-md-4 col-form-label">Airline</label>
            <input id="airline" type="text" name="airline" class="col-11 form-control" autocomplete="off">
        </div>
        <div class="row offset-1">
            <label for="image" class="col-md-4 col-form-label">Post Image</label>
            <input id="image" name="image" type="file" class="col-3 form-control">
        </div>
        @if($errors->has('image'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
        <div class="mt-3">
            <button class="col-12 btn-lg mb-3" type="submit">Post</button>
        </div>
    </form>
</div>


@endsection
