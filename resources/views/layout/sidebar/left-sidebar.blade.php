<div class="left-side-menu">
    <a href="{{ route('home') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img class="w-12" src="{{ asset('assets/images/logomark.min.svg') }}" alt="Laravel" width="50" height="52">
            <img class="ml-2 sm:block" src="{{ asset('assets/images/logotype.min.svg') }}" alt="Laravel" width="114"
                 height="29">
        </span>
        <span class="logo-sm">
            <img class="w-12" src="{{ asset('assets/images/logomark.min.svg') }}" alt="Laravel" width="30" height="32">
        </span>
    </a>

    <div class="h-100" id="left-side-menu-container" data-simplebar>
        <ul class="metismenu side-nav">
            <li class="side-nav-title side-nav-item">Apps</li>
            <li class="side-nav-item">
                <a href="{{ route('home') }}" class="side-nav-link">
                    <i class="dripicons-home"></i>
                    <span> Home </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('product') }}" class="side-nav-link">
                    <i class="uil-box"></i>
                    <span> Products </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('maker') }}" class="side-nav-link">
                    <i class="dripicons-user-id"></i>
                    <span> Makers </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('slide') }}" class="side-nav-link">
                    <i class="dripicons-user-id"></i>
                    <span> Slides </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('profile') }}" class="side-nav-link">
                    <i class="mdi mdi-account-circle mr-1"></i>
                    <span> profile </span>
                </a>
            </li>
        </ul>
    </div>
</div>
