@extends('member.home')
@section('member')
    <div class="col-sm-10 col-md-10 col-lg-10">
        <div class="Product card h-30 ">
            <div class="row main container-fluid">
                <div class="anh col-sm-5 col-md-4 col-lg-4 m-5 ">
                    <img style="width: 100%;" class="rounded infoanh" src="{{ asset("storage/uploads/products/$products->productImage") }}" alt="">
                </div>
                <div class="col-sm-5 col-md-4 col-lg-4 ml-3 mt-5 info">
                    <h2>{{$products->productName}}</h2>
                    <h3>Máy lạnh thông minh</h3>
                    <h4>Thương hiệu: {{$maker['makers']->makerName }}</h4>
                    <h3 style="color: red;">{{number_format($products->productPrice)}} VND</h3>
                    <form action="{{ Route('member.cart',['id'=>$products->id]) }}" method="POST" class="row">
                        @csrf
                        <p>Trạng thái: {{$products->productQuantity > 0 ? 'Còn hàng' : 'Hết hàng'}}</p>
                        <p>Chọn số lượng: <input type="number" name="qty" value="1"> </p>
                        <div class="datmua">
                            <button type="submit" class="add-cart">
                                <h2>Đặt mua</h2>
                                <p>Giao hàng tận nơi trên toàn quốc</p>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="infogood col-sm-0 col-md-3 col-lg-3 ml-3 mt-5">
                    <a href="#">
                        <p>Trung tâm bảo hành</p>
                    </a>
                    <a href="#">
                        <p>Thông tin vận chuyển</p>
                    </a>
                    <a href="#">
                        <p>Hướng dẫn thanh toán</p>
                    </a>
                </div>

            </div>
        </div>
        <div class="Product card h-30 ">
            <section class="row container-fluid">
                <div class="col-sm-5 col-md-6 col-lg-7 m-5 card">
                    {!! nl2br(e($products->productDetail)) !!}
                </div>
                <div class="col-sm-5 col-md-4 col-lg-4 card h-50 parameter m-3 mt-5">
                    <div class="">{!! nl2br(e($products->specifications)) !!}</div>
                </div>
            </section>
        </div>
    </div>
@endsection
