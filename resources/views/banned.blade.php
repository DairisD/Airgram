@extends('layouts.main')

@section('content')
<div class="row mt-3 pl-3 pr-3">
    <div class="col-2">
        <a href="{{ url('/home') }}" type="button" class="btn btn-outline-secondary">
            Back
        </a>
    </div>
    <div class="col-8 d-flex justify-content-center al">
        <h2 class="mb-0 pb-0">Banned Users</h2>
    </div>
    <div class="col-2"></div>
</div>
<div class="container mt-3">
    <form method="post" enctype="multipart/form-data">
        <div class="form-group d-flex flex-wrap">
            @csrf
            @method('POST')
            <div class="col-8 d-flex justify-content-center">
                <input name='name' id='name' type="text" class="w-100">
            </div>
            <div class="col-4 d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-secondary w-100">
                    Search banned user
                </button>
            </div>
        </div>
    </form>
</div>
@foreach ($bannedusers as $user)
<div class="container mt-3 w-50" style="background-color: #eeeeee">
    <div class="row pt-2 pb-2">
        <div class="col-sm d-flex justify-content-center align-items-center flex-wrap" style="border-right: 1px solid #969696">
            <img src="{{$user->profile_picture}}" style="border-radius: 100%; max-height:50px;">
            <h5 class="ml-2 mb-0">{{$user->name}}</h5>
        </div>
        <div class="col-sm d-flex align-items-center justify-content-center">
            <form method="post" enctype="multipart/form-data" class="w-100 d-flex justify-content-center align-items-center p-1">
                @csrf
                @method('PATCH')
                <input name='id' id='id' value='{{$user->id}}' type='hidden'>
                <button type="submit" class="btn btn-outline-danger w-75">Unban User</button>
            </form>
        </div>
    </div>
</div
@endforeach
@endsection