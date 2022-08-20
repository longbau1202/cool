@extends('layout.master')
@section('css')
    <link href="{{ asset('assets/css/product.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
@endsection
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12 flex-button">
                <div>
                    <a href="{{ Route('products.index') }}" class="btn btn-primary mb-2"><i class="mdi mdi-reply mr-1"></i>
                        Back</a>
                </div>
                <div class="flex-button">
                    <button class="btn btn-secondary mb-2 mr-2" type="reset" form="addForm">
                        <i class="uil-refresh mr-1"></i> Clear
                    </button>
                    <button type="submit" class="btn btn-success mb-2" form="addForm"><i class="mdi mdi-plus-circle mr-1"></i>
                        Add</button>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">Input is incorrect, please re-enter</div>
        @endif
        <form action="{{ Route('products.create') }}" method="POST" enctype="multipart/form-data" class="dropzone"
            id="addForm" data-plugin="dropzone" data-previews-container="#file-previews"
            data-upload-preview-template="#uploadPreviewTemplate">
            @csrf
            <div class="row">
                <div class="col-xl-6">

                    <div class="form-group">
                        <label for="productCode">Code</label>
                        <input type="text" id="productCode" name="code"
                            class="validate uppercase form-control @error('code') is-invalid @enderror" placeholder="Enter product name"
                            value="{{ old('code') }}">
                        @error('code')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" id="productName" name="product_name"
                            class="form-control @error('product_name') is-invalid @enderror"
                            placeholder="Enter product name" value="{{ old('product_name') }}">
                        @error('product_name')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Categories</label>
                        <select name="product_cat[]" id="" class="form-control select2"
                            data-toggle="select2" multiple>
                            <option value=""></option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ in_array($cat->id, (array) old('product_cat')) ?? [] ? 'selected' : '' }}>
                                    {{ $cat->name }}</option>
                            @endforeach
                            <option value=""></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Makers</label>
                        <select name="maker" id="" class="form-control ">
                            <option value=""></option>
                            @foreach ($makers as $maker)
                                <option {{ old('maker') == $maker->id ? "selected" : "" }} value="{{ $maker->id }}">{{ $maker->name }}</option>
                            @endforeach
                            <option value=""></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input  type="text" id="price" name="price" class="validate number form-control"
                            placeholder="Enter product name" value="{{ old('price') }}">

                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" id="quantity" name="quantity"
                            class="validate number form-control" placeholder="quantity"
                            value="{{ old('quantity') }}">

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="length">Product length</label>
                            <input type="text" id="length" name="length"
                                class="validate number form-control"
                                placeholder="product length( CM )" value="{{ old('length') }}">

                        </div>

                        <div class="col-md-4">
                            <label for="width">Product width</label>
                            <input type="text" id="width" name="width"
                                class="validate number form-control" placeholder="product width( CM )"
                                value="{{ old('width') }}">

                        </div>

                        <div class="col-md-4">
                            <label for="height">Product height</label>
                            <input type="text" id="height" name="height"
                                class="validate number form-control "
                                placeholder="product height( CM )" value="{{ old('height') }}">

                        </div>
                    </div>


                </div> <!-- end col-->

                <div class="col-xl-6">
                    <div class="form-group">

                        <div>
                            <label for="color">Color</label>
                            <input type="color" id="color" name="color"
                                class="form-control col-2" placeholder="product color"
                                value="{{ old('color') }}">

                        </div>
                    </div>


                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control " name="description" id="description" rows="5"
                            placeholder="description" value="{{ old('description') }}"></textarea>

                    </div>

                    <div class="fallback">
                        <input name="product_img" type="file" id="product_img" multiple />

                    </div>

                    <div class="mt-4" style="text-align:center">
                        <img src="" alt="contact-img" title="contact-img" id="img-show" class="rounded mr-3"
                            height="250" />
                    </div>
                </div> <!-- end col-->



            </div>
        </form>
        <!-- end row -->
        <div class="dropzone-previews mt-3" id="file-previews"></div>

    </div> <!-- end card-body -->
@endsection
@section('js')
    <script>
        function readFile(file, callback) {
            const FR = new FileReader()
            FR.onloadend = (e) => {
                callback(e.target.result)
            }
            FR.readAsDataURL(file)
        }
        document.addEventListener('DOMContentLoaded', () => {
            let inputFile = document.querySelector('#product_img')
            let image = document.getElementById("img-show")

            inputFile.addEventListener('change', (e) => {
                let files = inputFile.files
                if (files.length === 0) return;
                readFile(files[0], (base64) => {
                    image.setAttribute('src', base64)
                })
            })

            // regex number
            Array.from(document.querySelectorAll('.validate.number')).map(el => {
                el.addEventListener('input', (e) => {
                    let value = e.target.value;

                    e.target.value = value.replace(/[^0-9]/, '')
                })
            })

            Array.from(document.querySelectorAll('.validate.uppercase')).map(el => {
                el.addEventListener('input', (e) => {
                    let value = e.target.value;

                    e.target.value = value.replace(/[^A-Z0-9]/, '')
                })
            })

        })
    </script>
@endsection
