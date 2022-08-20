@extends('layout.master')
@section('css')
    <link href="{{ asset('assets/css/product.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
@endsection
@section('content')

    <div class="card-body">
        <div class="row">
            <div class="col-xl-12 flex-button">
                <div>
                    <a href="{{ Route('show',['id'=>$product->id]) }}" class="btn btn-primary mb-2"><i class="mdi mdi-reply mr-1"></i>
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
            <form action="{{ Route('update', ['id' => $product->id]) }}" method="POST"
                enctype="multipart/form-data" class="dropzone" id="updateForm" data-plugin="dropzone"
                data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                @csrf
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="productCode">Code</label>
                            <input type="text" id="productCode" name="productCode"
                                class="form-control @error('productCode') is-invalid @enderror" placeholder="Enter product name"
                                value="{{ $product->productCode }}">
                            @error('productCode')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="productName">Product Name</label>
                            <input type="text" id="productName" name="productName"
                                class="form-control @error('productName') is-invalid @enderror"
                                placeholder="Enter product name" value="{{ $product->productName }}">
                            @error('productName')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label>Makers</label>
                            <select name="productBrand" id="" class="form-control @error('maker') is-invalid @enderror">
                                <option value=""></option>
                                @foreach ($makers as $maker)
                                    <option {{ old('maker') == $maker->id ? "selected" : "" }} @if ($maker->id == $model->maker) selected @endif value="{{ $maker->id }}">{{ $maker->name }}</option>
                                @endforeach
                                <option value=""></option>
                            </select>

                            @error('maker')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" id="price" name="productPrice"
                                class="validate number form-control @error('productPrice') is-invalid @enderror" placeholder="Enter product name"
                                value="{{ $product->productPrice }}">
                            @error('productPrice')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="text" id="quantity" name="productQuantity"
                                class="validate number form-control @error('productQuantity') is-invalid @enderror" placeholder="quantity"
                                value="{{ $product->productQuantity }}">
                            @error('productQuantity')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                    </div> <!-- end col-->

                    <div class="col-xl-6">

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('productDetail') is-invalid @enderror" name="productDetail" id="description" rows="5"
                                placeholder="description">{{ $product->productDetail }}</textarea>
                            @error('productDetail')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="fallback">
                            <label for="product_img" class="btn btn-success mb-2">Select Image</label>
                            <input name="productImage" type="file" id="product_img" style="display: none"/>
                        </div>

                        <div class="mt-4">
                            <img src="{{ asset("storage/uploads/products/$product->productImage") }}" alt="contact-img"
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
