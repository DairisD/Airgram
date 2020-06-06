@extends('layouts.main')

@section('content')
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>-->

<div class="container-fluid">
        <div class="row d-flex" style="margin: 50px 0px">
            <div class="col-6">
                <div class="container bg-light">
                    <img src="/img/sunset.jpg" class="w-100">
                </div>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-4" style="background-color: #eeeeee">
                <div class="row d-flex align-content-center justify-content-md-center" style="height: 150px; text-align:center">
                        <img src="/img/default_profile.jpg" class="rounded-circle h-75">
                </div>
                <div class="row d-flex align-content-center">
                    <div class="ml-3 mt-3 w-100">
                        <h2>Dairis Dombrovskis</h2>
                    </div>
                    <div class="ml-3 w-100">
                        <p style="font-size: 20px;">@riga_aviospot</p>
                    </div>
                </div>
                <div class="row ml-2" style="font-size: 20px; font-weight: bold">
                    <div class="col ">
                        <div class="row">2.4k</div>
                        <div class="row">Followers</div>
                    </div>
                    <div class="col ">
                        <div class="row">953</div>
                        <div class="row">Following</div>
                    </div>
                </div>
                <div class="row w-100 d-flex justify-content-center mt-5 ">
                    <button class="w-75" style="border: 2px">
                        <svg class="bi bi-plus-square mr-2" width="2em" height="2em" viewBox="0 0 16 16" fill="#e8a600" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                            <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                          </svg>    
                        New Post
                    </button>
                </div>
            </div>
        </div>
</div>
@endsection
