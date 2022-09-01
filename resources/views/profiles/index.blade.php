@extends('layout.master')
@section('css')
    <link href="{{ asset('assets/css/product.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
@endsection
@section('content')
    <div class="card-body">
        @if (!empty($profile))
            <div class="row">
                <div class="col-xl-12 flex-button">
                    <div class="col-sm-4">
                        <a href="{{ Route('profile') }}" class="btn btn-primary mb-2"><i
                                class="mdi mdi-reply mr-1"></i> Back</a>
                    </div>
                    <div class="flex-button">
                        <a href="{{ Route('profile.edit') }}" class="btn btn-warning mr-2 mb-2"><i
                                class="mdi mdi-square-edit-outline mr-1"></i> Edit</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <h5 class="text-success">Email</h5>
                                    <input disabled class="input-css" value="{{ $profile->email }}">
                                </div>

                                <div class="form-group">
                                    <h5 class="text-success">Fullname</h5>
                                    <input disabled class="input-css" value="{{ $profile->fullName }}">

                                </div>

                                <div class="form-group">
                                    <h5 class="text-success">Address</h5>
                                    <input disabled class="input-css" value="{{ $profile->address }}">

                                </div>
                                <div class="form-group">
                                    <h5 class="text-success">Age</h5>
                                    <input disabled class="input-css" value="{{ $profile->age }}">

                                </div>
                                <div class="form-group">
                                    <h5 class="text-success">Gender</h5>
                                    <input disabled class="input-css" value="{{ $profile->gender }}">

                                </div>

                                <div class="form-group">
                                    <h5 class="text-success">Phone Number</h5>
                                    <input disabled class="input-css" value="{{ $profile->phoneNumber }}">

                                </div>

                            </div> <!-- end col-->

                            <div class="col-xl-6">

                                <div class="form-group">
                                    <h5 class="text-success" for="image">Avatar</h5>
                                    <img src="{{ asset("storage/uploads/profiles/$profile->avatar") }}" alt="contact-img"
                                        title="contact-img" id="img-show" class="rounded mr-3" height="250" />
                                </div>
                            </div> <!-- end col-->
                        </div>
                    </div>
                </div>
            </div>
        @endif
    <style>
        .input-css{
            border: none;
            color: rgb(180, 179, 179)
        }
    </style>
    </div> <!-- end card-body-->
@endsection
