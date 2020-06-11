@extends('layouts.main')

@section('content')
<div class="row mt-3 pl-3 pr-3">
    <div class="col-2">
        <a href="/home">
            <button type="button" class="btn btn-outline-secondary">
                Back
            </button>
        </a>
    </div>
    <div class="col-8 d-flex justify-content-center al">
        <h2 class="mb-0 pb-0">Followers</h2>
    </div>
    <div class="col-2"></div>
</div>
<div class="container mt-3 d-flex pt-2 pb-2">
    <div class="col-12 pb-5 d-flex align-items-center justify-content-center" style="border-bottom: 1px solid #333333">
        <p class="pb-0 mb-0" style="font-size: 20px;">Followers: {{ $count[0]->ct }}</p>
    </div>
</div>
@if($followers)
@foreach($followers as $follower)
<div class="container mt-3 w-50" style="background-color: #eeeeee">
    <div class="row pt-2 pb-2">
        <div class="col-4 d-flex justify-content-center align-items-center flex-wrap" style="border-right: 1px solid #969696">
            <div class="col-2 d-flex justify-content-center">
                <img src="{{ $follower->profile_picture }}" style="border-radius: 100%; max-height:50px;">
            </div>
            <div class="col-10 d-flex justify-content-center">
                <h5 class="ml-2 mb-0">&#64;{{ $follower->username }}</h5>
            </div>
        </div>
        <div class="col-8 d-flex flex-wrap align-items-center justify-content-center">
            <a href="/profile/{{ $follower->follower_id }}" class="d-flex w-75">
                <button type="button" class="btn btn-outline-dark w-100">View Profile</button>
            </a>
        </div>
    </div>
</div>
@endforeach
@endif
@endsection