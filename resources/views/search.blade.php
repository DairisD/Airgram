@extends('layouts.main')

@section('content')



<div class="row d-flex justify-content-center">
    <h2 class="mb-0 mt-2">Search Posts</h2>
</div>
<div class="container mt-3" style="background-color: #eeeeee">
    <a href="{{{ URL::route('home') }}}" type="button" class="btn active border-dark mt-2 mb-2">Back</a>
    <form class="form-group">
        <div class="row">
            <p class="col-3 text-center">Model</p>
            <input class="col-8 form-control">
        </div>
        <div class="row">
            <p class="col-3 text-center">Airport</p>
            <input class="col-8 form-control">
        </div>
        <div class="row">
            <p class="col-3 text-center">Airline</p>
            <input class="col-8 form-control">
        </div>
        <div class="mt-3">
            <button class="col-12 btn-lg" type="submit">Search Posts</button>
        </div>
    </form>
</div>
<div class="row d-flex justify-content-center">
    <h2 class="mb-0 mt-5">Search Users</h2>
</div>
<div class="container mt-3 pt-3" style="background-color: #eeeeee">
    <form class="form-group">
        <div class="row">
            <p class="col-3 text-center">Username</p>
            <input class="col-8 form-control">
        </div>
        <div class="mt-3">
            <button class="col-12 btn-lg" type="submit">Search Users</button>
        </div>
    </form>
</div>

@endsection
