@extends('layout.master')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Maker</h4>
            </div>
        </div>
    </div>
    <div class="d-flex mb-2 justify-content-between">
        <div>
            <a href="{{ route('maker') }}" class="btn btn-primary"><i class="mdi mdi-reply mr-1"></i>Back</a>
        </div>
        <div class="d-flex justify-content-end">
            <button type="reset" form="editform" class="btn btn-secondary mr-2"><i class="uil-refresh mr-1"></i>Clear
            </button>
            <button type="submit" form="editform" class="btn btn-warning"><i
                    class="mdi mdi-square-edit-outline mr-1"></i>Update
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form id="editform" name="editform" action="{{ route('maker.update', ['id' => $maker->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="makerCode"><strong>Code<span style="color: red">*</span></strong></label>
                                    <input type="text" id="makerCode" name="makerCode"
                                        class="form-control @error('makerCode') is-invalid @enderror"
                                        placeholder="Enter Code" value="{{ old('makerCode', $maker->makerCode) }}">
                                </div>
                                @error('makerCode')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="makerName"><strong>Name<span style="color: red">*</span></strong></label>
                                    <input type="text" id="makerName" name="makerName"
                                        class="form-control @error('makerName') is-invalid @enderror"
                                        placeholder="Enter Maker name" value="{{ old('makerName', $maker->makerName) }}">
                                </div>
                                @error('makerName')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="makerCountry"><strong>Country</strong></label>
                                    <input type="text" id="makerCountry" name="makerCountry"
                                        class="form-control @error('makerCountry') is-invalid @enderror"
                                        placeholder="Enter Maker name"
                                        value="{{ old('makerCountry', $maker->makerCountry) }}">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="fallback">
                                    <label for="makerImage" class="btn btn-success mb-2">Select Image</label>
                                    <input name="makerImage" type="file" id="makerImage" style="display: none" />
                                </div>

                                <div class="mt-4">
                                    <img src="{{ asset("storage/uploads/makers/$maker->makerImage") }}" alt="contact-img"
                                        title="contact-img" id="img-show" class="rounded mr-3" height="250" />
                                </div>
                                @error('makerImage')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
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
            let inputFile = document.querySelector('#makerImage')
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
