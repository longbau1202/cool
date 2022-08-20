@extends('layout.master')
@section('css')
    <link href="{{ asset('assets/css/product.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
@endsection
@section('content')

    <div class="card-body">
        <div class="row">
            <div class="col-xl-12 flex-button">
                <div>
                    <a href="{{ Route('products.show',['id'=>$product->id]) }}" class="btn btn-primary mb-2"><i class="mdi mdi-reply mr-1"></i>
                        Back</a>
                </div>
                <div class="flex-button">
                    <button class="btn btn-secondary mb-2 mr-2" type="reset" form="updateForm">
                        <i class="uil-refresh mr-1"></i> Clear
                    </button>
                    <button type="submit" class="btn btn-warning mb-2" form="updateForm"><i
                            class="mdi mdi-square-edit-outline"></i>
                        Update</button>
                </div>

            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">Input is incorrect, please re-enter</div>
        @endif
        @if (!empty($product))
            <form action="{{ Route('products.update', ['id' => $product->id]) }}" method="POST"
                enctype="multipart/form-data" class="dropzone" id="updateForm" data-plugin="dropzone"
                data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                @csrf
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="productCode">Code</label>
                            <input type="text" id="productCode" name="code"
                                class="form-control @error('code') is-invalid @enderror" placeholder="Enter product name"
                                value="{{ $product->code }}">
                            @error('code')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="productName">Product Name</label>
                            <input type="text" id="productName" name="product_name"
                                class="form-control @error('product_name') is-invalid @enderror"
                                placeholder="Enter product name" value="{{ $product->product_name }}">
                            @error('product_name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Categories</label>
                            <select class="form-control select2" multiple name="category_id[]" data-toggle="select2">
                                @foreach ($categories as $category)
                                    <option
                                        @foreach ($model->categories as $value)  @if ($value->id == $category->id) selected @endif @endforeach
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Makers</label>
                            <select name="maker" id="" class="form-control @error('maker') is-invalid @enderror">
                                <option value=""></option>
                                @foreach ($makers as $maker)
                                    <option {{ old('maker') == $maker->id ? "selected" : "" }} @if ($maker->id == $model->maker) selected @endif value="{{ $maker->id }}">{{ $maker->name }}</option>
                                @endforeach
                                <option value=""></option>
                            </select>

                            @error('maker')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" id="price" name="price"
                                class="validate number form-control @error('price') is-invalid @enderror" placeholder="Enter product name"
                                value="{{ $product->price }}">
                            @error('price')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="text" id="quantity" name="quantity"
                                class="validate number form-control @error('quantity') is-invalid @enderror" placeholder="quantity"
                                value="{{ $product->quantity }}">
                            @error('price')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="length">Product length</label>
                                <input type="text" id="length" name="length"
                                    class="validate number form-control @error('length') is-invalid @enderror"
                                    placeholder="product length( CM )" value="{{ $product->length }}">
                                @error('length')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="width">Product width</label>
                                <input type="text" id="width" name="width"
                                    class="validate number form-control @error('width') is-invalid @enderror"
                                    placeholder="product width( CM )" value="{{ $product->width }}">
                                @error('width')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="width">Product height</label>
                                <input type="text" id="height" name="height"
                                    class=" validate number form-control @error('height') is-invalid @enderror"
                                    placeholder="product height( CM )" value="{{ $product->height }}">
                                @error('height')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                    </div> <!-- end col-->

                    <div class="col-xl-6">

                        <div class="form-group">

                            <div class="">
                                <label for="color">Color</label>
                                <input type="color" id="color" name="color"
                                    class="col-2 form-control @error('color') is-invalid @enderror"
                                    placeholder="product color" value="{{ $product->color }}">
                                @error('color')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5"
                                placeholder="description">{{ $product->description }}</textarea>
                            @error('description')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="fallback">
                            <input type="file" name="product_img" id="product_img">
                        </div>

                        <div class="mt-4" style="text-align:center">
                            <img src="{{ asset('images/' . $product->product_img . '') }}" alt="contact-img"
                                title="contact-img" id="img-show" class="rounded mr-3" height="250" />
                        </div>
                    </div> <!-- end col-->

                </div>
            </form>
        @endif
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

        })
    </script>
@endsection
