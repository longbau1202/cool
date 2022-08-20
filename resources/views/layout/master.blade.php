<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>{{ $title ?? 'Page Title' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/app-creative.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('/assets/css/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
    <link href="{{asset('css-custom/notify.css')}}" rel="stylesheet">
    @yield('css')

</head>
<body class="loading"
      data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<div class="wrapper">
    @include('layout.sidebar.left-sidebar')
    <div class="content-page">
        <div class="content">
            @include('layout.blocks.header')
            <div class="container-fluid">
                @yield('content')
            </div>
            @include('layout.blocks.footer')
        </div>
        @include('layout.sidebar.right-sidebar')

        <script src="{{ asset('/assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('/assets/js/app.min.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        @yield('js')
        <!-- third party js ends -->
</body>
</html>
