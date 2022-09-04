@extends('member.home')
@section('member')
    <div class="col-sm-10 col-md-10 col-lg-10">
        <div class="Product card h-30 ">
            <div style="margin-top: 50px">
                <div class="container">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-3">
                                <div class="image">
                                    <img class="rounded img-product img-fluid "
                                        src="{{ asset("storage/uploads/products/$product->productImage") }}"
                                        alt="Samsung Inverter">
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
                <div class="row paginate">
                    <div class="style-paginate">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
