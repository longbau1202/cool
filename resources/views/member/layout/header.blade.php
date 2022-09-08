<header style="font-weight:bolder;">
    <nav class="navbar navbar-expand">
        <div class="container flex-box">
            <a class="logo" href="{{ route('member.home') }}"><img
                    src="{{ asset('/assets/images/picture/rheem.png') }}" class="rounded logo"
                    alt="Cinque Terre"></a>
            <div class="collapse navbar-collapse flex-box" id="navbarSupportedContent">
                <ul class="navbar-nav mb-lg-0 m-0 menu">
                    <li class="nav-item">
                        @if (isset($auth))
                            <a class="nav-link active" aria-current="page" href="{{ route('logout') }}">Đăng xuất</a>
                        @else
                            <a class="nav-link active" aria-current="page" href="{{ route('loginform') }}">Đăng Nhập</a>
                        @endif

                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('member.cart.show') }}">Giỏ Hàng</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('member.product') }}" class="nav-link  active">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Hỗ Trợ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"
                            style="{{ !empty($auth) && $auth->role == 1 ? '' : 'display: none' }}"
                            href="{{ route('home') }}">Admin</a>
                    </li>
                </ul>
                <form class="d-flex search" action="{{ route('member.search')}}" role="search" method="GET">
                    <input class="form-control" type="search" placeholder="Tìm Kiếm" name="search" aria-label="Search">
                    <button class="btn btn-outline-success bi bi-search" type="submit"></button>
                </form>
            </div>
        </div>
    </nav>
</header>
