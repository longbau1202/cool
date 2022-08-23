@extends('layout.master')
@section('css')
    <link href="{{ asset('assets/css/product.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
@endsection
@section('content')
    <div class="card-body">
        @if (!empty($product))
            <div class="row">
                <div class="col-xl-12 flex-button">
                    <div class="col-sm-4">
                        <a href="{{ Route('product') }}" class="btn btn-primary mb-2"><i
                                class="mdi mdi-reply mr-1"></i> Back</a>
                    </div>
                    <div class="flex-button">
                        <a href="{{ Route('edit', ['id' => $product->id]) }}" class="btn btn-warning mr-2 mb-2"><i
                                class="mdi mdi-square-edit-outline mr-1"></i> Edit</a>
                        <form class="col" action="{{ Route('destroy', ['id' => $product->id]) }}"
                            method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger"
                                onclick="return confirm('Will you delete this category ? Are you sure ?')" type="submit">
                                <i class="mdi mdi-delete"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">

                                <div class="form-group">
                                    <h5 class="text-success" for="productCode">Code</h5>
                                    <p class="">{{ $product->productCode }}</p>

                                </div>



                                <div class="form-group">
                                    <h5 class="text-success" for="productName">Product Name</h5>
                                    <p class="">{{ $product->productName }}</p>

                                </div>

                                <div class="form-group">
                                    <h5 class="text-success">Maker</h5>
                                    <p class="">{{$maker['makers']->makerName }}</p>
                                </div>

                                <div class="form-group">
                                    <h5 class="text-success" for="price">Price</h5>
                                    <p class="">{{ number_format($product->productPrice, 2) }}$</p>

                                </div>

                                <div class="form-group">
                                    <h5 class="text-success" for="quantity">Quantity</h5>
                                    <p class="">{{ number_format($product->productQuantity) }}</p>

                                </div>

                            </div> <!-- end col-->

                            <div class="col-xl-6">

                                <div class="form-group">
                                    <h5 class="text-success" for="description">Description</h5>
                                    <div class="">{!! nl2br(e($product->productDetail)) !!}</div>

                                </div>

                                <div class="mt-4">
                                    <h5 class="text-success" for="image">Image</h5>
                                    <img src="{{ asset("storage/uploads/products/$product->productImage") }}" alt="contact-img"
                                        title="contact-img" id="img-show" class="rounded mr-3" height="250" />
                                </div>
                            </div> <!-- end col-->
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div> <!-- end card-body-->
@endsection
