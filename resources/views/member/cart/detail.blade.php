@extends('member.home')
@section('member')
    <div class="col-sm-0 col-md-1 col-lg-2"></div>
    <div class="col-sm-12 col-md-7 col-lg-5">
        <div class="Product card h-30 ">
            <section class="shopping-cart">
                <div class="container">
                    <div class="block-heading">

                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Shopping Cart</h2>
                            </div>

                                <?php
                                $contents = Cart::content();
                                ?>
                                <div class="items">
                                    @foreach ($contents as $content)
                                    @endforeach
                                </div>
                                <form method="POST" action="{{ route('member.cart.saveCheckout') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="rowId" value="{{$content->rowId}}">
                                    <div class="group-item">
                                        <div class="cart-detail-heading">
                                            <span>Thông tin liên lạc</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Số điện thoại <span class="text-red">:</span></label>
                                            @if($auth)
                                            <input type="text" name="phoneNumber" placeholder="Số điện thoại" value="{{$auth->phoneNumber}}">
                                            @else
                                            <input type="text" name="phoneNumber" placeholder="Số điện thoại" value="{{old('phoneNumber')}}">
                                            @endif
                                            @error('phoneNumber')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Địa chỉ email <span class="text-red">:</span></label>
                                            @if($auth)
                                            <input type="text" name="email" placeholder="Email" value="{{$auth->email}}">
                                            @else
                                            <input type="text" name="email" placeholder="Email" value="{{old('email')}}">
                                            @endif
                                            @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="cart-detail-heading">
                                            <span>Địa chỉ giao hàng</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Họ tên <span class="text-red">:</span></label>
                                            @if($auth)
                                            <input type="text" placeholder="Họ & Tên" name="fullName" value="{{$auth->fullName}}">
                                            @else
                                            <input type="text" placeholder="Họ & Tên" name="fullName" value="{{old('fullName')}}">
                                            @endif
                                        </div>
                                        @error('fullName')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div class="form-group">
                                            <label for="">Địa chỉ <span class="text-red">:</span></label>
                                            @if($auth)
                                            <input type="text" placeholder="Họ & Tên" name="address" value="{{$auth->address}}">
                                            @else
                                            <input type="text" placeholder="Họ & Tên" name="address" value="{{old('address')}}">
                                            @endif
                                        </div>
                                        @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div class="cart-detail-heading">
                                            <span>Ghi chú khi giao hàng</span>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="note" id="" cols="30" rows="10" placeholder="Ghi chú"></textarea>
                                        </div>
                                    </div>
                                    <div class="group-item">
                                        <div class="pay-second">
                                            <div class="cart-detail-heading">
                                                <span>Đơn hàng của bạn</span>
                                            </div>
                                            <div class="pay-second-container">
                                                <div class="item">
                                                    <span class="both1">Sản phẩm</span>
                                                    <span> : </span>
                                                    <!-- (S) vòng lặp sp -->
                                                @foreach($contents as $value)

                                                    <span>{{$value->name}}</span>

                                                </div>
                                                <div class="item">
                                                    <span class="both1">Số lượng</span>
                                                    <span> : </span>
                                                    <span>
                                                        <?php
                                                        $subtotal = $value->qty;
                                                        echo number_format($subtotal, 0, ',', '.');
                                                        ?>
                                                    </span>
                                                </div>
                                                @endforeach
                                                <!-- (E) vòng lặp sp -->
                                                <div class="item">
                                                    <span class="both1">Tổng tiền</span>
                                                    <span> : </span>
                                                    <span class="both total">
                                                        {{Cart::total(0,',','.')}}đ
                                                    </span>
                                                    <input type="hidden" value="{{Cart::total(0,',','')}}" name="grand_total">
                                                </div>
                                            </div>
                                            <div class="item-last">
                                                <button class="btn-pay" type="submit" id="cart-next"><span>Thanh toán</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <style>
            .Product{
                background-color: rgb(235, 231, 231);
                padding: 5px;
            }
            h2 {
                text-align: center;
                font-weight:bolder ;
            }
            .item{
                margin-top: 5px;
            }
            .both1 {
                width: 20%;
                display: inline-flex;
                font-weight: bold;
            }
            .form-group textarea{
                width: 90%;
                margin: 3%;
            }
            .form-group input[type=text] {
                width: 60%;
            }
            .form-group label {
                width: 35%;
                font-weight: inherit;
            }
            .text-red {
                text-align: center;
            }
            .item-last{
                margin-left: 40%;
            }
            .btn-pay {
                background-color: rgb(182, 219, 249);
            }
            .btn-pay span{
                color: #000;
            }
            .btn-pay:hover{
                background-color: red;
            }
            .cart-detail-heading span{
                font-size:larger ;
                font-weight: bolder;
            }
        </style>

    </div>
@endsection
