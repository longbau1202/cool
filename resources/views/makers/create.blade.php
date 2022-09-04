@extends('layout.master')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet"/>
@endsection
@section('content')
<div class="card-body">
    <div class="d-flex mb-2 justify-content-between">
        <div>
            <a href="{{ route('maker') }}" class="btn btn-primary"><i class="mdi mdi-reply mr-1"></i>Back</a>
        </div>
        <div class="d-flex justify-content-end">
            <button type="reset" form="addform" class="btn btn-secondary ml-2  mr-2"><i class="uil-refresh mr-1"></i>Clear
            </button>
            <button type="submit" form="addform" class="btn btn-success"><i class="mdi mdi-plus-circle mr-1"></i>Add
            </button>
        </div>
    </div>
    <div class="card">
        <div class="row">
            <div class="col-12">
                <form style="border: 2px dashed #dee2e6; background: #fff; border-radius: 6px; cursor: pointer; min-height: 150px; padding: 20px;" id="addform" name="addform"
                action="{{ route('maker.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="makerCode"><strong>Code<span style="color: red">*</span></strong></label>
                                    <input type="text" id="makerCode" name="makerCode"
                                        class="form-control {{ $errors->has }}"
                                        placeholder="Enter Code" value="{{ old('makerCode') }}">
                                </div>
                                @error('code')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="makerName"><strong>Name<span style="color: red">*</span></strong></label>
                                    <input type="text" id="makerName" name="makerName"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter Maker name" value="{{ old('makerName') }}">
                                </div>
                                @error('name')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="makerCode">Country</label>
                                    <input type="text" id="makerCode" name="makerCountry" placeholder="Country"
                                        class="form-control @error('makerCountry') is-invalid @enderror"
                                        value="{{ old('makerCountry') }}">
                                </div>
                                @error('makerCountry')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-xl-6">
                                <div class="fallback">
                                    <label for="makerImage" class="btn btn-success mb-2">Select Image</label>
                                    <input name="makerImage" type="file" id="makerImage" style="display: none"/>
                                </div>

                                <div class="mt-4">
                                    <img src="" alt="contact-img" title="contact-img" id="img-show" class="rounded mr-3"
                                        height="250" />
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
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
            let inputFile = document.querySelector('#makerImage')
            let image = document.getElementById("img-show")
            image.setAttribute('src', 'https://cdn.stocksnap.io/img-thumbs/960w/nature-path_4LVC9Y8JMW.jpg');
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
