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
    <form href="{{ url('/home') }}" class="form-group" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row offset-1">
            <label for="name" class="col-md-4 col-form-label" autocomplete="off">Profile Name</label>
            <input id="name" name="name" type="text" value="{{$user->name}}" class="col-11 form-control">
        </div>
        <div class="row offset-1">
            <label for="image" class="col-md-4 col-form-label">Profile Image</label>
            <input id="image" name="profile_picture" type="file" value="{{$user->profile_picture}}" class="col-3 form-control">
            
        </div>
        @if($errors->has('profile_picture'))
            <span class="invlaid-feedback" role="alert">
                <strong>{{ $errors->first('profile_picture') }}</strong>
           </span>
       @endif
        
        <div class="mt-3">
            <button class="col-12 btn-lg mb-3" type="submit">Save profile</button>
        </div>
    </form>
    
</div>
@endsection