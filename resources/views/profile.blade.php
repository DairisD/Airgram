@extends('layouts.main')

@section('content')
<div class="row mt-3 pl-3 pr-3">
    <div class="col-2">
        <a href="{{{ URL::route('home') }}}" type="button" class="btn btn-outline-secondary">Back</a>
    </div>
    <div class="col-10"></div>
</div>
<div class="container-fluid">
        <div class="row d-flex" style="margin: 50px 0px">
            <div class="col-6">
                <div class="container bg-light">
                    <div class="row">
                        <img src="/img/sunset.jpg" class="w-100">
                    </div>
                    <div class="row p-2" style="background-color: #ebebeb">
                        <div class="col d-flex align-items-center">
                            <button style=" border: none; background-color: #ebebeb">
                                <svg class="bi bi-arrow-up d-flex align-content-centre" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/>
                                    <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/>
                                </svg>
                            </button>
                            <div class="d-flex align-items-center p-2" style="margin-bottom: 0px; font-size: 20px;">4.2k</div>
                            <button style="border: none; background-color: #ebebeb">
                                <svg class="bi bi-arrow-down" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.646 9.646a.5.5 0 0 1 .708 0L8 12.293l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z"/>
                                    <path fill-rule="evenodd" d="M8 2.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V3a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="col-3">
                            <div class="p-2" style="font-size: 20px;">@riga_aviospot</div>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <button class="d-flex align-items-center p-2" style="border: none; background-color: #ebebeb;">
                                <svg class="bi bi-chat-square-dots mr-2" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2.5a2 2 0 0 1 1.6.8L8 14.333 9.9 11.8a2 2 0 0 1 1.6-.8H14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                </svg>
                                <div style="font-size: 20px;">Comment<div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-4" style="background-color: #eeeeee">
                <div class="row d-flex align-items-center justify-content-md-center" style="height: 150px; text-align:center">
                        <img src="/img/default_profile.jpg" class="rounded-circle h-75">
                </div>
                <div class="row d-flex align-items-center">
                    <div class="ml-3 mt-3 w-100">
                        <h2>Dairis Dombrovskis</h2>
                    </div>
                    <div class="ml-3 w-100">
                        <p style="font-size: 20px;">@riga_aviospot</p>
                    </div>
                </div>
                <div class="row ml-2" style="font-size: 20px; font-weight: bold">
                    <div class="col">
                        <div class="row">2.4k</div>
                        <div class="row">Followers</div>
                    </div>
                    <div class="col">
                        <div class="row">953</div>
                        <div class="row">Following</div>
                    </div>
                </div>
                <div class="row w-100 d-flex justify-content-center mt-2">
                    <button class="w-75 d-flex justify-content-center align-items-center p-1" style="border: 2px solid #adadad; border-radius: 10px;">
                        <svg class="bi bi-person-plus-fill mr-2" width="2em" height="2em" viewBox="0 0 16 16" fill="#e8a600" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M13 7.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
                          </svg>   
                        <p style="font-size: 20px; margin:0px;">Follow</p>
                    </button>
                </div>
                <div class="row w-100 d-flex justify-content-center mt-2">
                    <button class="w-75 d-flex justify-content-center align-items-center p-1" style="border: 2px solid #adadad; border-radius: 10px; background-color: #ffdada">
                        <svg class="bi bi-x-circle-fill mr-2" width="2em" height="2em" viewBox="0 0 16 16" fill="#bd0000" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                        </svg>    
                        <p style="font-size: 20px; margin:0px;">Block User</p>
                    </button>
                </div>
                <div class="row w-100 d-flex justify-content-center mt-2 mb-3">
                    <button class="w-75 d-flex justify-content-center align-items-center p-1" style="border: 2px solid #adadad; border-radius: 10px; background-color: #ffdada">
                        <svg class="bi bi-x-octagon-fill mr-2" width="2em" height="2em" viewBox="0 0 16 16" fill="#bd0000" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm.394 4.708a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                          </svg>   
                        <p style="font-size: 20px; margin:0px;">Ban User</p>
                    </button>
                </div>
            </div>
        </div>
</div>
@endsection