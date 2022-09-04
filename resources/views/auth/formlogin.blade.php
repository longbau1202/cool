@extends('auth.login')
@section('form')
<div class="col-md-6 bg-white p-5">
    <h3 class="pb-3">Login Form</h3>
    <div class="form-style">
        @if(session('message'))
        <span class="text-success">{{session('message')}}</span>
        @endif
        @error('deleted_at')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <div class="card-text">
            <form action="{{route('login')}}" method="post" class="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group pb-3">
                    <input type="email" placeholder="Email" class="form-control" name="email">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group pb-3">
                    <input type="password" placeholder="Password" name="password" class="form-control">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                    </div>
                    <div><a href="#">Forget Password?</a></div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                    </div>
                    <div><a href="{{route('register.form')}}">Register</a></div>
                </div>
                <div class="pb-2">
                    <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2">Submit</button>
                </div>
            </form>
            {{-- <div class="sideline">OR</div>
            <div>
                <a href="{{route('auth.google')}}" class="btn btn-primary w-100 font-weight-bold mt-2">
                    <i class="fa-brands fa-google" aria-hidden="true"></i> Login With Google
                </a>
            </div> --}}
            <div class="pt-4 text-center">
                Get Members Benefit. <a href="#">Sign Up</a>
            </div>
        </div>

    </div>
</div>
@endsection
