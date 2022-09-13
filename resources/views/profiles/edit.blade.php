@extends('layout.master')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>
    <div class="d-flex mb-2 justify-content-between">
        <div>
            <a href="{{ route('profile') }}" class="btn btn-primary"><i class="mdi mdi-reply mr-1"></i>Back</a>
        </div>
        <div class="d-flex justify-content-end">
            <button type="reset" form="editform" class="btn btn-secondary mr-2"><i class="uil-refresh mr-1"></i>Clear
            </button>
            <button type="submit" form="editform" class="btn btn-warning"><i class="mdi mdi-square-edit-outline mr-1"></i>Update
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form id="editform" name="editform" action="{{ route('profile.update') }}" method="post"
            enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="role"><strong style="color:rgb(252, 74, 74);">Role</strong></label>
                                    <input type="text" id="role" name="role"
                                           class="form-control"
                                           placeholder="Enter Fullname" value="{{ $profile->role == 1 ? 'Admin' : 'member' }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="email"><strong style="color:rgb(252, 74, 74);">Email</strong></label>
                                    <input type="text" id="email" name="email" class="form-control"
                                           placeholder="Enter Fullname" value="{{ $profile->email }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="fullName"><strong>Fullname</strong></label>
                                    <input type="text" id="fullName" name="fullName"
                                           class="form-control @error('fullName') is-invalid @enderror"
                                           placeholder="Enter Fullname" value="{{ old('fullName', $profile->fullName) }}">
                                </div>
                                @error('fullName')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="address"><strong>Address</strong></label>
                                    <input type="text" id="address" name="address"
                                           class="form-control @error('address') is-invalid @enderror"
                                           placeholder="Enter Address" value="{{ old('address', $profile->address) }}">
                                </div>
                                @error('address')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="age"><strong>Age</strong></label>
                                    <input type="text" id="age" name="age"
                                           class="form-control @error('age') is-invalid @enderror"
                                           placeholder="Enter Age" value="{{ old('age', $profile->age) }}">
                                </div>
                                @error('age')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="phoneNumber"><strong>Phone Number</strong></label>
                                    <input type="text" id="phoneNumber" name="phoneNumber"
                                           class="form-control @error('phoneNumber') is-invalid @enderror"
                                           placeholder="Enter Phone Number" value="{{ old('phoneNumber', $profile->phoneNumber) }}">
                                </div>
                                @error('phoneNumber')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="gender"><strong>Gender</strong></label>
                                    <select   class="form-control" name="gender" id="gender">
                                        <option value="1" {{ $profile->gender == 1 ? "selected" : "" }}>Male</option>
                                        <option value="2" {{ $profile->gender == 2 ? "selected" : "" }}>Female</option>
                                    </select>
                                </div>
                                @error('gender')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-xl-6">
                                <div class="fallback">
                                    <label for="avatar" class="btn btn-success mb-2">Select Avatar</label>
                                    <input name="avatar" type="file" id="avatar" style="display: none"/>
                                </div>

                                <div class="mt-4">
                                    <img src="{{ asset("storage/uploads/profiles/$profile->avatar") }}" alt="contact-img"
                                        title="contact-img" id="img-show" class="rounded mr-3" height="250" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script>
        function readFile(file, callback) {
            const FR = new FileReader()
            FR.onloadend = (e) => {
                callback(e.target.result)
            }
            FR.readAsDataURL(file)
        }
        document.addEventListener('DOMContentLoaded', () => {
            let inputFile = document.querySelector('#avatar')
            let image = document.getElementById("img-show")

            inputFile.addEventListener('change', (e) => {
                let files = inputFile.files
                if (files.length === 0) return;
                readFile(files[0], (base64) => {
                    image.setAttribute('src', base64)
                })
            })

        })
    </script>
@endsection
