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
            <a href="{{ route('slide') }}" class="btn btn-primary"><i class="mdi mdi-reply mr-1"></i>Back</a>
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
            <form id="editform" name="editform" action="{{ route('slide.update', ['id' => $slide->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="slideTitle"><strong>Title</strong></label>
                                    <input type="text" id="slideTitle" name="slideTitle"
                                        class="form-control @error('slideTitle') is-invalid @enderror"
                                        placeholder="Enter Title" value="{{ old('slideTitle', $slide->slideTitle) }}">
                                </div>
                                @error('slideTitle')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="slideContent"><strong>Content</strong></label>
                                    <input type="text" id="slideContent" name="slideContent"
                                        class="form-control @error('slideContent') is-invalid @enderror"
                                        placeholder="Enter slide content"
                                        value="{{ old('slideContent', $slide->slideContent) }}">
                                </div>
                                @error('slideContent')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-6">
                                <div class="fallback">
                                    <label for="slideImage" class="btn btn-success mb-2">Select Image</label>
                                    <input name="slideImage" type="file" id="slideImage" style="display: none" />
                                </div>

                                <div class="mt-4">
                                    <img src="{{ asset("storage/uploads/slides/$slide->slideImage") }}" alt="contact-img"
                                        title="contact-img" id="img-show" class="rounded mr-3" height="250" />
                                </div>
                                @error('slideImage')
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
            let inputFile = document.querySelector('#slideImage')
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
