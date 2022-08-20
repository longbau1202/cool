@extends('layout.master')
@section('css')
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ $title }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="">
                <a href="{{ route('maker.create') }}" class="btn btn-success mb-2"><i
                        class="mdi mdi-plus-circle mr-2"></i>Add Makers</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped dt-responsive nowrap w-100" id="maker-table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Code</th>
                        <th>Maker</th>
                        <th>Country</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.checkboxes.min.js') }}"></script>
    <script>
        $(function () {
            $('#maker-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('maker.api') !!}',
                columnDefs: [
                    {orderable: false, targets: 0}
                ],
                order: [],
                columns: [
                    {data: 'image', name: 'image', searchalbe: false, orderable: false},
                    {data: 'code', name: 'code'},
                    {data: 'name', name: 'name'},
                    {data: 'country', name: 'country'},
                ],
                drawCallback: function () {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                },
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    },
                    processing: "Processing... <img width='120' src='{{asset('img-processing/LGEn.gif')}}'>",
                    lengthMenu: 'Display <select class=\'custom-select custom-select-sm ml-1 mr-1\'> @foreach(Config::get("common.PAGE_LENGTH") as $value) <option value="{{$value}}">{{$value}}</option> @endforeach <option value="-1">All</option> </select> maker'
                },
                pageLength: {{\Config::get('common.PAGE_LENGTH')[0]}},
                dom: "<'row' <'col-sm-12 col-md-6'l> <'col-sm-12 col-md-6'f>> <'row mb-3' <'col-sm-12 col-md-5'i> <'col-sm-12 col-md-7'p>> <'row' <'col-sm-12't>> <'row' <'col-sm-12 col-md-5'i> <'col-sm-12 col-md-7'p>>",

            });

        });
    </script>
@endsection
