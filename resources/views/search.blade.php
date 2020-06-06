@extends('layouts.main')

@section('content')



<div class="container" style="background-color: #eeeeee">
    <button type="button" class="btn active">back</button>
    <form class="form-group">
        <div class="row">
            <p class="col-3 text-center">Modelis</p>
            <input class="col-9 form-control">
        </div>
        <div class="row">
            <p class="col-3 text-center">Lidosta</p>
            <input class="col-9 form-control">
        </div>
        <div class="row">
            <p class="col-3 text-center">Aviokompānija</p>
            <input class="col-9 form-control">
        </div>
        <div class="h-200">
            <button class="col-12 btn-lg" type="submit">Search</button>
        </div>
        
    </form>
</div>

@endsection
