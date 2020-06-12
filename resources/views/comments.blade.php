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
        <h2 class="mb-0 pb-0">Comments</h2>
    </div>
    <div class="col-2"></div>
</div>
<div class="container mt-3">
    <form action="/comments/{{ $id }}" method="POST" autocomplete="off">
        @csrf
        <div class="form-group d-flex flex-wrap">
            <div class="col-8 d-flex justify-content-center">
                <input type="text" id="message" name="message" class="w-100">
            </div>
            <div class="col-4 d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-secondary w-100">
                    Add Coment
                </button>
            </div>
        </div>
    </form>
</div>
@if($results)
@foreach($results as $result)
<div class="container mt-3" style="background-color: #eeeeee">
    <div class="row d-flex">
        <div class="col-4 pt-2 pb-2 d-flex justify-content-center align-items-center flex-wrap" style="border-right: 1px solid #969696">
            <div class="col-4 d-flex justify-content-center">
                <img src="{{ $result->profile_picture }}" style="border-radius: 100%; max-height:50px;">
            </div>
            <div class="col-8 d-flex">
                <h5 class="ml-2 mb-0">&#64;{{ $result->username }}</h5>
            </div>
        </div>
        @if($user->role == 1 || $user->id == $result->user_id)
        <div class="col-6 d-flex align-items-center">
            <p class="mb-2 mt-2" style="font-size: 15px;">{{ $result->comment }}</p>
        </div>
        <div class="col-2 d-flex align-items-center justify-content-center">
            <form action="/comments/delete/{{ $result->image_id }}/{{$result->id}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger w-40 ml-1">Delete</button>
            </form>
        </div>
        @else
        <div class="col-8 d-flex align-items-center">
            <p class="mb-2 mt-2" style="font-size: 15px;">{{ $result->comment }}</p>
        </div>
        @endif
    </div>
</div>
@endforeach
@endif
@endsection