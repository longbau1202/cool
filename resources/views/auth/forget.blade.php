@extends('auth.login')
@section('form')
<div class="col-md-6 bg-white p-5">
    <h3 class="pb-3">Forgot password</h3>
    <div class="form-style">
        <div class="card-text">
            <form action="{{route('forget')}}" method="post" class="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group pb-3">
                    <input type="email" placeholder="Email" class="form-control" name="email">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group pb-3">
                    <input type="password" placeholder="new password" name="password" class="form-control">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group pb-3">
                    <input type="password" placeholder="Password confirm" name="comfirm_password" class="form-control">
                    @error('comfirm_password')
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
