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
                        <a href="{{ Route('products.index') }}" class="btn btn-primary mb-2"><i
                                class="mdi mdi-reply mr-1"></i> Back</a>
                    </div>
                    <div class="flex-button">
                        <a href="{{ Route('products.edit', ['id' => $product->id]) }}" class="btn btn-warning mr-2 mb-2"><i
                                class="mdi mdi-square-edit-outline mr-1"></i> Edit</a>
                        <form class="col" action="{{ Route('products.destroy', ['id' => $product->id]) }}"
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
                        {{-- <div class="row">

                                <div class="col-lg-5">
                                    <!-- Product image -->
                                    <a href="javascript: void(0);" class="text-center d-block mb-4">
                                        <img src="{{ asset('images/' . $product->product_img . '') }}" class="img-fluid"
                                            style="max-width: 450px; max-height: 450px" alt="Product-img" />
                                    </a>
                                </div> <!-- end col -->
                                <div class="col-lg-7">
                                        <!-- Product title -->
                                        <h3 class="mt-0"> {{ $product->product_name }}
                                        </h3>
                                        <p class="mb-1">Added Date: {{$product->created_at}}</p>


                                        <!-- Product description -->
                                        <div class="mt-4">
                                            <h6 class="font-14">Retail Price</h6>
                                            <h3> {{ number_format(($product->price),2) }}$</h3>
                                        </div>

                                        <!-- Quantity -->
                                        <div class="mt-4">
                                            <h6 class="font-14">Quantity</h6>
                                            <div class="d-flex">
                                                <h3>{{ $product->quantity }}</h3>
                                            </div>
                                        </div>

                                        <!-- Product description -->
                                        <div class="mt-4">
                                            <h6 class="font-14">Description</h6>
                                            <p>{{ $product->description }}</p>
                                        </div>

                                        <!-- Product information -->
                                        <div class="mt-4">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6 class="font-14">Infomation: Length, width, color</h6>
                                                    <p class="text-sm lh-150">{{$product->length}}cm,  {{$product->width}}cm , {{$product->color}}</p>
                                                </div>
                                            </div>
                                        </div>

                                </div> <!-- end col -->

                            </div> <!-- end row--> --}}


                        <div class="row">
                            <div class="col-xl-6">

                                <div class="form-group">
                                    <h5 class="text-success" for="productCode">Code</h5>
                                    <p class="">{{ $product->code }}</p>

                                </div>



                                <div class="form-group">
                                    <h5 class="text-success" for="productName">Product Name</h5>
                                    <p class="">{{ $product->product_name }}</p>

                                </div>

                                <div class="form-group">
                                    <h5 class="text-success">Categories</h5>
                                    <select name="product_cat[]" id="" class=" select2" data-toggle="select2"
                                        multiple disabled>
                                        @foreach ($categories as $category)
                                            <option
                                                @foreach ($model->categories as $value) @if ($value->id == $category->id) selected @endif @endforeach
                                                value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <h5 class="text-success">Maker</h5>
                                    <p class="">{{$maker->makers->name }}</p>

                                </div>

                                <div class="form-group">
                                    <h5 class="text-success" for="price">Price</h5>
                                    <p class="">{{ number_format($product->price, 2) }}$</p>

                                </div>

                                <div class="form-group">
                                    <h5 class="text-success" for="quantity">Quantity</h5>
                                    <p class="">{{ number_format($product->quantity) }}</p>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 class="text-success" for="length">Product length</h5>
                                        <p class="">{{ number_format($product->length) }} CM</p>

                                    </div>

                                    <div class="col-md-4">
                                        <h5 class="text-success" for="width">Product width</h5>
                                        <p class="">{{ number_format($product->width) }} CM</p>

                                    </div>

                                    <div class="col-md-4">
                                        <h5 class="text-success" for="width">Product height</h5>
                                        <p class="">{{ number_format($product->height) }} CM</p>

                                    </div>
                                </div>

                            </div> <!-- end col-->

                            <div class="col-xl-6">


                                <div class="form-group">

                                    <div>
                                        <h5 class="text-success" for="color">Color</h5>
                                        <input type="color" id="color" name="color" class=" col-2"
                                        placeholder="product color" value="{{ $product->color }}" disabled>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <h5 class="text-success" for="description">Description</h5>
                                    <div class="">{!! nl2br(e($product->description)) !!}</div>

                                </div>
                                <div class="form-group">
                                    <h5 class="text-success" for="width">Create by</h5>
                                    <p class="">{{ $product->create_by }}</p>
                                </div>

                                <div class="form-group">
                                    <h5 class="text-success" for="width">Update by</h5>

                                    @if (!$product->update_by)
                                        <p class="">This product never been edit.</p>
                                    @else
                                        <p class="">{{ $product->update_by }}</p>
                                    @endif


                                </div>

                                <div class="mt-4">
                                    <img src="{{ asset('images/' . $product->product_img . '') }}" alt="contact-img"
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
