@extends('member.home')
@section('member')
    <div class="col-sm-10 col-md-10 col-lg-10">
        <div class="Product card h-30 ">
            <section class="shopping-cart">
                <div class="container">
                    <div class="block-heading">

                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-1">
                                <h2>Shopping Cart</h2>
                                <p>text</p>
                            </div>

                                <?php
                                $contents = Cart::content();
                                ?>
                                <div class="items">
                                    @foreach ($contents as $content)
                                        <?php
                                        $images = $content->options->image;
                                        ?>

                                        <div class="product">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img class="img-fluid"
                                                        src="{{ asset("storage/uploads/products/$images") }}"
                                                        style="height: 50px">
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="info">
                                                        <div class="row">
                                                            <div class="col-md-2 product-name">
                                                                <div class="product-name">
                                                                    <a href="#">{{ $content->name }}</a>
                                                                    <div class="product-info">
                                                                        <div><label for="">Hãng: </label><span
                                                                                class="value">
                                                                                {{ $content->options->maker }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 quantity">
                                                                <form
                                                                    action="{{ route('member.cart.update', ['id' => $content->rowId]) }}">
                                                                    <div class="col-md-6">
                                                                        <label for="quantity">số lượng:</label>
                                                                        <input id="quantity" type="number" name="quantity"
                                                                            value="{{ $content->qty }}"
                                                                            class="form-control quantity-input">
                                                                    </div>
                                                                    <button>Cập nhật</button>
                                                                </form>
                                                            </div>
                                                            <div class="col-md-3 price">
                                                                <label for="">Đơn giá: </label>
                                                                <span>{{ $content->price }} VND</span>
                                                            </div>
                                                            <div class="col-md-4 price">
                                                                <label for="">Tổng sản phẩm: </label>
                                                                <span>{{ $content->price * $content->qty }} VND</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <a style="display: block; width: 100%; text-align: center;"
                                                        href="{{ Route('member.cart.delete', ['id' => $content->rowId]) }}"><i
                                                            class="fa fa-times">X</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="items">
                                    <div><label for="">Tổng: {{ Cart::total() }} VND</label></div>
                                </div>
                                <div class="items">
                                    <a href="{{ Route('member.cart.pay') }}">Thanh Toán</a>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
@endsection
