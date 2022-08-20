<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css-custom/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="row m-5 no-gutters shadow-lg">
            <div class="col-md-6 d-none d-md-block">
                <img src="https://images.unsplash.com/photo-1566888596782-c7f41cc184c5?ixlib=rb-1.2.1&auto=format&fit=crop&w=2134&q=80" class="img-fluid" style="height:500px;" />
            </div>
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
                        <form action="{{route('admin.login')}}" method="post" class="form" enctype="multipart/form-data">
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
                            <div class="pb-2">
                                <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2">Submit</button>
                            </div>
                        </form>
                        <div class="sideline">OR</div>
                        <div>
                            {{-- <a href="{{route('auth.google')}}" class="btn btn-primary w-100 font-weight-bold mt-2">
                                <i class="fa-brands fa-google" aria-hidden="true"></i> Login With Google
                            </a> --}}
                        </div>
                        <div class="pt-4 text-center">
                            Get Members Benefit. <a href="#">Sign Up</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script src="https://use.fontawesome.com/f59bcd8580.js"></script>
</body>

</html>
