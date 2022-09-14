@extends('member.home')
@section('member')
    <div class="col-sm-10 col-md-10 col-lg-10">
        <div class="Product card h-30 ">
            <div class="slide img">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="{{ asset('/assets/images/picture/slide5.jpg') }}" style="width:100%;height: 500px;"
                                alt="2">
                            <div class="carousel-caption">

                            </div>
                        </div>

                        @foreach ($slides as $slide)
                            <div class="item">
                                <img src="{{ asset("storage/uploads/slides/$slide->slideImage") }}"
                                    style="width:100%;height: 500px;" alt="1">
                                <div class="carousel-caption">

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div style="margin-top: 50px">
                <div class="container">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-3">
                                <div class="image">
                                    <a href="{{ route('member.detail', ['id' => $product->id]) }}">
                                        <img class="rounded img-product img-fluid "
                                            src="{{ asset("storage/uploads/products/$product->productImage") }}"
                                            alt="Samsung Inverter">
                                    </a>
                                </div>
                                <div class="text">
                                    <a href="{{ route('member.detail', ['id' => $product->id]) }}">
                                        <p>{{ $product['productName'] }}</p>
                                    </a>
                                    <p>{{ number_format($product['productPrice']) }} VND</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
