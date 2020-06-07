@extends('layouts.main')

@section('content')
<div class="row mt-3 pl-3 pr-3">
    <div class="col-2">
        <button type="button" class="btn btn-outline-secondary">
            Back
        </button>
    </div>
    <div class="col-8 d-flex justify-content-center al">
        <h2 class="mb-0 pb-0">Followers</h2>
    </div>
    <div class="col-2"></div>
</div>
<div class="container mt-3 d-flex pt-2 pb-2">
    <div class="col-2 d-flex align-items-center" style="border-right: 1px solid #333333">
        <p class="pb-0 mb-0">Followers: 920</p>
    </div>
    <div class="col-10">
        <form class="d-flex align-items-center justify-content-center">
            <div class="form-group d-flex flex-wrap w-100 mb-0">
                <div class="col-8 d-flex justify-content-center">
                    <input type="text" class="w-100">
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-secondary w-100">
                        Search Followers
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="container mt-3 w-50" style="background-color: #eeeeee">
    <div class="row pt-2 pb-2">
        <div class="col-4 d-flex justify-content-center align-items-center flex-wrap" style="border-right: 1px solid #969696">
            <img src="/img/default_profile.jpg" style="border-radius: 100%; max-height:50px;">
            <h5 class="ml-2 mb-0">@username</h5>
        </div>
        <div class="col-8 d-flex flex-wrap align-items-center justify-content-center">
            <button type="button" class="btn btn-outline-dark w-75 mr-1">View Profile</button>
        </div>
    </div>
</div>
<div class="container mt-3 w-50" style="background-color: #eeeeee">
    <div class="row pt-2 pb-2">
        <div class="col-4 d-flex justify-content-center align-items-center flex-wrap" style="border-right: 1px solid #969696">
            <img src="/img/default_profile.jpg" style="border-radius: 100%; max-height:50px;">
            <h5 class="ml-2 mb-0">@username</h5>
        </div>
        <div class="col-8 d-flex flex-wrap align-items-center justify-content-center">
            <button type="button" class="btn btn-outline-dark w-75 mr-1">View Profile</button>
        </div>
    </div>
</div>
<div class="container mt-3 w-50" style="background-color: #eeeeee">
    <div class="row pt-2 pb-2">
        <div class="col-4 d-flex justify-content-center align-items-center flex-wrap" style="border-right: 1px solid #969696">
            <img src="/img/default_profile.jpg" style="border-radius: 100%; max-height:50px;">
            <h5 class="ml-2 mb-0">@username</h5>
        </div>
        <div class="col-8 d-flex flex-wrap align-items-center justify-content-center">
            <button type="button" class="btn btn-outline-dark w-75 mr-1">View Profile</button>
        </div>
    </div>
</div>
@endsection