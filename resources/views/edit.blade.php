@extends('layouts.main')

@section('content')


<div class="row d-flex justify-content-center pt-3 pl-3 pr-3">
    <div class="col-2">
        <a href="{{{ URL::route('home') }}}" type="button" class="btn btn-outline-secondary">Back</a>
    </div>
    <div class="col-8 d-flex justify-content-center">
        <h2 class="mb-0 mt-2">Edit Profile</h2>
    </div>
    <div class="col-2"></div>
</div>
<div class="container">
    <form class="form-group">
        <div class="row offset-1">
            <label for="Name" class="col-md-4 col-form-label">Profile Name</label>
            <input id="Name" type="text" value="" class="col-11 form-control">
        </div>
        <div class="row offset-1">
            <label for="image" class="col-md-4 col-form-label">Profile Image</label>
            <input id="image" name="image" type="file" class="col-3 form-control">
        </div>
        <div class="mt-3">
            <button class="col-12 btn-lg mb-3" type="submit">Save profile</button>
        </div>
    </form>
</div>
@endsection