@extends('auth.login')
@section('form')
<div class="col-md-6 bg-white p-5">
    <h3 class="pb-3">Register</h3>
    <div class="form-style">
        @if(session('message'))
        <span class="text-success">{{session('message')}}</span>
        @endif
        @error('deleted_at')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <div class="card-text">
            <form action="{{route('register')}}" method="post" class="form" enctype="multipart/form-data">
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
                <div class="form-group pb-3">
                    <input type="password" placeholder="Password confirm" name="password_confirmation" class="form-control">
                    @error('password_confirmation')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group pb-3">
                    <input type="text" placeholder="Fullname" name="fullName" class="form-control">
                    @error('fullName')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group pb-3">
                    <input type="text" placeholder="Phone number" name="phoneNumber" class="form-control">
                    @error('phoneNumber')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group pb-3">
                    <input type="text" placeholder="Address" name="address" class="form-control">
                    @error('address')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="pb-2">
                    <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
