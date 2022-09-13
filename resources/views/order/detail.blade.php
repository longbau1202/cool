@extends('layout.master')
@section('css')
    <link href="{{ asset('assets/css/product.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
@endsection
@section('content')
    <div class="card-body">
            <div class="row">
                <div class="col-xl-12 flex-button">
                    <div class="col-sm-4">
                        <a href="{{ Route('order') }}" class="btn btn-primary mb-2"><i
                                class="mdi mdi-reply mr-1"></i> Back</a>
                    </div>
                    <div class="flex-button">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="form-group">
                                    <h5 class="text-primary">Customer information</h5>
                                </div>

                                <div class="form-group">
                                    <h5 class="text-success" for="productCode">Code</h5>
                                    <p class="">{{ $order->code }}</p>

                                </div>



                                <div class="form-group">
                                    <h5 class="text-success" for="productName">Order Name</h5>
                                    <p class="">{{ $order->order_name }}</p>

                                </div>

                                <div class="form-group">
                                    <h5 class="text-success" for="price">Total Price</h5>
                                    <p class="">{{ number_format($order->grand_total) }} VND</p>

                                </div>

                                <div class="form-group">
                                    <h5 class="text-success" for="quantity">Address</h5>
                                    <p class="">{{$order->shipping_address}}</p>
                                </div>

                                <div class="form-group">
                                    <h5 class="text-success" for="quantity">Create at</h5>
                                    <p class="">{{$order->created_at}}</p>
                                </div>


                            </div> <!-- end col-->

                            <div class="col-xl-9">
                                <div class="form-group">
                                    <h5 class="text-primary">Order information</h5>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" class="text-center">Product Image</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Saleprice</th>
                                            <th scope="col">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orderDetail as $key => $value)
                                        <tr>
                                            <th scope="row">{{++$key}}</th>
                                            <td class="text-center"><img src="{{ asset("storage/uploads/products/".$value->product->productImage) }}" alt="" width="70"></td>
                                            <td>{{$value->product->productName}}</td>
                                            <td>{{$value->quantity}}</td>
                                            <td>
                                                <?php
                                                    $tinh = $value->priceTotal/$value->quantity;
                                                    echo number_format($tinh,0,',','.') . 'VND';
                                                ?> / sản phẩm
                                            </td>
                                            <td>{{number_format($value->priceTotal,0,',','.')}} VND</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div> <!-- end col-->
                        </div>
                    </div>
                </div>
            </div>

    </div> <!-- end card-body-->
@endsection
