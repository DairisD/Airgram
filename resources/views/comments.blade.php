@extends('layouts.main')

@section('content')
<div class="row mt-3 pl-3 pr-3">
    <div class="col-2">
        <button type="button" class="btn btn-outline-secondary">
            Back
        </button>
    </div>
    <div class="col-8 d-flex justify-content-center al">
        <h2 class="mb-0 pb-0">Comments</h2>
    </div>
    <div class="col-2"></div>
</div>
<div class="container mt-3">
    <form>
        <div class="form-group d-flex flex-wrap">
            <div class="col-8 d-flex justify-content-center">
                <input type="text" class="w-100">
            </div>
            <div class="col-4 d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-secondary w-100">
                    Add Coment
                </button>
            </div>
        </div>
    </form>
</div>
<div class="container mt-3" style="background-color: #eeeeee">
    <div class="row">
        <div class="col-4 d-flex justify-content-center align-items-center flex-wrap" style="border-right: 1px solid #969696">
            <img src="/img/default_profile.jpg" style="border-radius: 100%; max-height:50px;">
            <h5 class="ml-2 mb-0">@username</h5>
        </div>
        <div class="col-8 d-flex align-items-center">
            <p class="mb-2 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus at condimentum nisl. Duis vel metus leo. Sed turpis quam, convallis nec iaculis vitae, bibendum.</p>
        </div>
    </div>
</div>

<div class="container mt-3" style="background-color: #eeeeee">
    <div class="row">
        <div class="col-4 d-flex justify-content-center align-items-center flex-wrap" style="border-right: 1px solid #969696">
            <img src="/img/default_profile.jpg" style="border-radius: 100%; max-height:50px;">
            <h5 class="ml-2 mb-0">@username</h5>
        </div>
        <div class="col-8 d-flex align-items-center">
            <p class="mb-2 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus at condimentum nisl. Duis vel metus leo. Sed turpis quam, convallis nec iaculis vitae, bibendum.</p>
        </div>
    </div>
</div>

<div class="container mt-3" style="background-color: #eeeeee">
    <div class="row">
        <div class="col-4 d-flex justify-content-center align-items-center flex-wrap" style="border-right: 1px solid #969696">
            <img src="/img/default_profile.jpg" style="border-radius: 100%; max-height:50px;">
            <h5 class="ml-2 mb-0">@username</h5>
        </div>
        <div class="col-8 d-flex align-items-center">
            <p class="mb-2 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus at condimentum nisl. Duis vel metus leo. Sed turpis quam, convallis nec iaculis vitae, bibendum.</p>
        </div>
    </div>
</div>
@endsection