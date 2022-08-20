@extends('layout.master')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ $title }}</h4>
            </div>
        </div>
    </div>
    <div class="d-flex mb-2 justify-content-between">
        <div>
            <a href="{{ route('maker.index') }}" class="btn btn-primary"><i class="mdi mdi-reply mr-1"></i>Back</a>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" form="editform" class="btn btn-warning"><i class="mdi mdi-square-edit-outline mr-1"></i>Update
            </button>
            <button type="reset" form="editform" class="btn btn-secondary ml-2"><i class="uil-refresh mr-1"></i>Clear
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
                                    <label for="code"><strong>Code<span style="color: red">*</span></strong></label>
                                    <input type="text" id="code" name="code"
                                           class="form-control @error('code') is-invalid @enderror"
                                           placeholder="Enter Code" value="{{ old('code', $maker->code) }}">
                                </div>
                                @error('code')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="name"><strong>Name<span style="color: red">*</span></strong></label>
                                    <input type="text" id="name" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Enter Maker name" value="{{ old('name', $maker->name) }}">
                                </div>
                                @error('name')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="">Country</label>
                                    <select class="form-control select2" data-toggle="select2" name="country">
                                        @foreach(Config::get("common.COUNTRY") as $key => $value)
                                            <option value="{{ $value }}" {{ old('country', $maker->country) == $value ? 'selected': false }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="code">Establishment</label>
                                    <input type="date" id="establishment" name="establishment"
                                           class="form-control @error('establishment') is-invalid @enderror"
                                           value="{{ old('establishment', $maker->establishment) }}">
                                </div>
                                @error('establishment')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="code">Link</label>
                                    <input type="text" id="link" name="link"
                                           class="form-control @error('link') is-invalid @enderror"
                                           placeholder="Enter Link page" value="{{ old('link', $maker->link) }}">
                                </div>
                                @error('link')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group mt-3 mt-xl-0">
                                    <label for="projectname" class="mb-0">Avatar</label>
                                    <p class="text-muted font-14">Recommended thumbnail size 800x400 (px).</p>
                                    <div class="dz-message needsclick dropzone text-center" id="document-dropzone">
                                        <i class="h3 text-muted dripicons-cloud-upload"></i>
                                        <h4>Drop files here or click to upload.</h4>
                                    </div>
                                    @error('image')
                                    <span style="color:red;">{{$message}}</span>
                                    @enderror
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
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('maker.store-image') }}',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="images[]"][value="' + name + '"]').remove()
            },
        }
    </script>
@endsection
