@extends('layouts.main')

@section('content')



<div class="row d-flex justify-content-center pt-3 pl-3 pr-3">
    <div class="col-2">
        <a href="{{{ URL::route('home') }}}" type="button" class="btn btn-outline-secondary">Back</a>
    </div>
    <div class="col-8 d-flex justify-content-center">
        <h2 class="mb-0 mt-2">Search Posts</h2>
    </div>
    <div class="col-2"></div>
</div>
<div class="container mt-3 pt-3" style="background-color: #eeeeee">
    <form class="form-group" action="/search/posts" method="GET">
        @csrf
        <div class="row">
            <p class="col-3 text-center">Plane</p>
            <input id="plane" class="col-8 form-control" name="plane">
        </div>
        <div class="row">
            <p class="col-3 text-center">Airport</p>
            <input id="airport" class="col-8 form-control" name="airport">
        </div>
        <div class="row">
            <p class="col-3 text-center">Airline</p>
            <input id="airline" class="col-8 form-control" name="airline">
        </div>
        <div class="mt-3">
            <button class="col-12 btn-lg mb-3" type="submit">Search Posts</button>
        </div>
    </form>
</div>
<div class="row d-flex justify-content-center">
    <h2 class="mb-0 mt-5">Search User</h2>
</div>
<div class="container mt-3 pt-3" style="background-color: #eeeeee">
    <form class="form-group" action='{{ url('/search/users') }}' method="GET">
        @csrf
        <div class="row">
            <p class="col-3 text-center">Username</p>
            <input id="username" class="col-8 form-control" name="username">
        </div>
        <div class="mt-3">
            <button class="col-12 btn-lg mb-3" type="submit">Search User</button>
        </div>
    </form>
</div>
@if(Request::is('search/posts'))
@if($results)
    @foreach ($results as $result)
    <div class="container bg-light">
        <div class="row">
                <img src="{{ $result->image }}" class="w-100">
        </div>
        <div class="row p-2" style="background-color: #ebebeb">
            <div class="col d-flex align-content-center">
                <button style=" border: none; background-color: #ebebeb">
                    <svg class="bi bi-arrow-up d-flex align-content-centre" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/>
                        <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/>
                    </svg>
                </button>
                <div class="d-flex align-content-center p-2" style="margin-bottom: 0px; font-size: 20px;">{{ $result->summa }}</div>
                <button style="border: none; background-color: #ebebeb">
                    <svg class="bi bi-arrow-down" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.646 9.646a.5.5 0 0 1 .708 0L8 12.293l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z"/>
                        <path fill-rule="evenodd" d="M8 2.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V3a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                </button>
            </div>
            <div class="col-3">
                <div class="p-2" style="font-size: 20px;">{{ $result->username }}</div>
            </div>
            <div class="col d-flex justify-content-center">
                <button class="d-flex align-content-center p-2" style="border: none; background-color: #ebebeb;">
                    <svg class="bi bi-chat-square-dots mr-2" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2.5a2 2 0 0 1 1.6.8L8 14.333 9.9 11.8a2 2 0 0 1 1.6-.8H14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                    <div style="font-size: 20px;">Comment<div>
                </button>
            </div>
        </div>
        <div class="row p-2" style="background-color: #ebebeb">
            <div class="col-4 d-flex justify-content-center align-items-center">
                <p class="mb-0" style="font-size: 20px;">Model:</p>
            </div>
            <div class="col-4 d-flex justify-content-center align-items-center">
                <p class="mb-0" style="font-size: 20px;">Airport:</p>
            </div>
            <div class="col-4 d-flex justify-content-center align-items-center">
                <p class="mb-0" style="font-size: 20px;">Airline:</p>
            </div>
        </div>
        <div class="row p-2" style="background-color: #ebebeb">
            <div class="col-4 d-flex justify-content-center align-items-center">
                <p class="mb-0" style="font-size: 20px;">{{ $result->plane_name }}</p>
            </div>
            <div class="col-4 d-flex justify-content-center align-items-center">
                <p class="mb-0" style="font-size: 20px;">{{ $result->airport_name }}</p>
            </div>
            <div class="col-4 d-flex justify-content-center align-items-center">
                <p class="mb-0" style="font-size: 20px;">{{ $result->airline_name }}</p>
            </div>
        </div>
        @if($user->role == '1')
        <div class="row">    
            <button type="button" class="btn btn-danger d-flex align-items-center justify-content-center p-2 col-12 w-100" style="font-size: 20px">Remove Post</button>
        </div>
        @endif
    </div>
    @endforeach
@endif
@endif
@if(Request::is('search/users'))
    @if($users)
    <div class="container mt-3 w-50" style="background-color: #eeeeee">
        <div class="row pt-2 pb-2">
            <div class="col-4 d-flex justify-content-center align-items-center flex-wrap" style="border-right: 1px solid #969696">
                <img src={{ $users[0]->profile_picture }} style="border-radius: 100%; max-height:50px;">
                <h5 class="ml-2 mb-0">{{ $users[0]->username }}</h5>
            </div>
            <div class="col-8 d-flex flex-wrap align-items-center justify-content-center">
                <button type="button" class="btn btn-outline-dark w-40 mr-1">View Profile</button>
                <button type="button" class="btn btn-outline-danger w-40 ml-1">Block</button>
            </div>
        </div>
    </div>
    @endif
@endif
@endsection
