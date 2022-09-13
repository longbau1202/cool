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

            <section class="row container-fluid">
                <div class="col-sm-5 col-md-6 col-lg-7 m-5 card">
                    <article class="show-content-main">
                        <h2>Ưu điểm của máy lạnh di động Casper PC-09TL33</h2>
                        <p><a title="Máy lạnh di động chính hãng" href="/may-lanh-di-dong-may-lanh-mini-c3210">Máy lạnh di
                                động</a> <strong>Casper PC-09TL33</strong> được sản xuất trên dây chuyền công nghệ hiện đại
                            của <a title="Sản phẩm thương hiệu Casper" href="/casper.html">Casper</a>, Thái Lan. </p>
                        <ul>
                            <li><a title="Máy lạnh 1 cục khác gì máy lạnh 2 cục? Nên mua loại nào tốt hơn?"
                                    href="/huong-dan/tu-van/may-lanh-1-cuc-may-lanh-2-cuc-4028">Máy lạnh 1 cục</a> sở hữu
                                kiểu dáng đơn giản, dạng hình hộp chữ nhật đứng, đồng thời trang bị hệ thống bánh xe giúp
                                việc di chuyển trở nên linh hoạt hơn. </li>
                            <li>Vỏ máy sáng bóng, chắc chắn giúp bảo vệ tốt các linh kiện bên trong khỏi bụi bẩn, nước,...
                                nâng cao tuổi thọ cho sản phẩm.</li>
                            <li><a title="Máy lạnh di động Casper chính hãng"
                                    href="/may-lanh-di-dong-may-lanh-mini-c3210?brands=1957">Máy lạnh di động Casper</a> sử
                                dụng dàn tản nhiệt đồng mạ vàng siêu bền bỉ cho hiệu suất làm lạnh cao và tăng khả năng
                                chống mài mòn, hoạt động tốt trong nhiều điều kiện thời tiết khác nhau.</li>
                        </ul>
                        <p><strong>>> Tham khảo</strong>: <a title="Review máy lạnh di động Casper PC-09TL33 có tốt không?"
                                href="/huong-dan/tu-van/review-may-lanh-di-dong-casper-pc-09tl33-co-tot-khong-9744">Review
                                máy lạnh di động Casper PC-09TL33 có tốt không?</a></p>
                        <p class="_ilcss0_"><img title="Hình ảnh máy lạnh di động Casper PC-09TL33"
                                src="https://s.meta.com.vn/Data/image/2021/06/19/may-lanh-di-dong-casper-pc-09tl33-3.jpg"
                                alt="áy lạnh di động Casper PC-09TL33" width="60%" height="300"
                                data-xsrc="/Data/image/2021/06/19/may-lanh-di-dong-casper-pc-09tl33-3.jpg"></p>
                        <p class="_ilcss0_">Hình ảnh máy lạnh di động Casper PC-09TL33</p>
                        <ul>
                            <li>Máy nén có hiệu năng cao. </li>
                            <li><a title="Điều hòa cây mini là gì? Có nên sử dụng trong gia đình không?"
                                    href="/huong-dan/tu-van/dieu-hoa-cay-mini-la-gi-co-nen-su-dung-trong-gia-dinh-khong-3460">Điều
                                    hòa cây mini</a> có trang bị bộ lọc khí thô giúp lọc sạch không khí, mang lại không gian
                                trong lành cho người dùng. </li>
                            <li>Máy sở hữu nhiều tính năng nổi bật như chế độ ngủ Sleep hoạt động êm ái và tiết kiệm điện
                                năng hiệu quả. </li>
                            <li>Máy vận hành bằng điều khiển từ xa tiện lợi, thông minh. </li>
                            <li><a title="Điều hòa" href="/dieu-hoa-c1018">Điều hòa</a> sử dụng môi chất làm lạnh R410A có
                                hiệu suất làm lạnh tốt và thân thiện với môi trường. </li>
                            <li>Khả năng làm lạnh là 8800 BTU/h giúp làm mát nhanh chóng kết hợp lưu lượng gió là 310 m3/h
                                mang hơi mát đến khắp không gian lắp đặt. </li>
                            <li>Sản phẩm thường được sử dụng tại gia đình, văn phòng,...</li>
                        </ul>
                    </article>

                </div>
                <div class="col-sm-5 col-md-4 col-lg-4 card h-50 parameter m-3 mt-5">
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    <h3>Thông số kỹ thuật</h3>
                                </th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <h4>Loại máy điều hòa</h4>
                                        </li>
                                        <li>
                                            <h4>Loại máy điều hòa</h4>
                                        </li>
                                        <li>
                                            <h4>Model/Mẫu</h4>
                                        </li>
                                        <li>
                                            <h4>Nguồn điện áp</h4>
                                        </li>
                                        <li>
                                            <h4>Bảo hành</h4>
                                        </li>
                                        <li>
                                            <h4>Sản xuất tại</h4>
                                        </li>
                                        <li>
                                            <h4>Thương hiệu</h4>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li>
                                            <h4>2 chiều</h4>
                                        </li>
                                        <li>
                                            <h4>Có</h4>
                                        </li>
                                        <li>
                                            <h4>2022</h4>
                                        </li>
                                        <li>
                                            <h4>220V/50Hz</h4>
                                        </li>
                                        <li>
                                            <h4>36 tháng, Máy nén (5 năm)</h4>
                                        </li>
                                        <li>
                                            <h4>Thái Lan</h4>
                                        </li>
                                        <li>
                                            <h4>Thái Lan</h4>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table>
                        <thead>
                            <tr>
                                <th>
                                    <h3>Thông số dàn lạnh</h3>
                                </th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <h4>Kích thước dàn lạnh</h4>
                                        </li>
                                        <li>
                                            <h4>Khối lượng dàn lạnh</h4>
                                        </li>
                                        <li>
                                            <h4>Điện năng tiêu thụ dàn lạnh</h4>
                                        </li>
                                        <li>
                                            <h4>Công suất làm lạnh</h4>
                                        </li>
                                        <li>
                                            <h4>Công suất sưởi ấm</h4>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li>
                                            <h4>R x C x S (764mm x 203mm x 291mm)</h4>
                                        </li>
                                        <li>
                                            <h4>8,5kg</h4>
                                        </li>
                                        <li>
                                            <h4>Làm lạnh (1.300W), Làm nóng (1.100W)</h4>
                                        </li>
                                        <li>
                                            <h4>3.75Kw (12.800 BTU)</h4>
                                        </li>
                                        <li>
                                            <h4>3.80KW (12.900 BTU)</h4>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    <h3> Thông số dàn nóng</h3>
                                </th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <h4>Kích thước dàn nóng</h4>
                                        </li>
                                        <li>
                                            <h4>Khối lượng dàn nóng</h4>
                                        </li>
                                        <li>
                                            <h4>Gas sử dụng</h4>
                                        </li>
                                        <li>
                                            <h4>Lưu lượng gió dàn nóng</h4>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li>
                                            <h4>R x S x C (705mm x 279mm x 530mm)</h4>
                                        </li>
                                        <li>
                                            <h4>22.5kg</h4>
                                        </li>
                                        <li>
                                            <h4>R32</h4>
                                        </li>
                                        <li>
                                            <h4>600 m3/h</h4>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
@endsection
