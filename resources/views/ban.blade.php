@extends('layouts.main')

@section('content')
<div class="row mt-3 pl-3 pr-3">
    <div class="col-2">
        <button type="button" class="btn btn-outline-secondary">
            Back to login screen
        </button>
    </div>
    <div class="col-10"></div>
</div>
<div class="container mt-3 h-100 d-flex flex-column align-items-center">
    <h1 class="display-1" style="color: #cc0000">This account is banned!</h1>
    <h3 style="color: #cc0000"> Contact administrators for more information!</h3>
</div>
@endsection