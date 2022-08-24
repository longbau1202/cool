@extends('layout.master')
@section('css')
    <link href="{{ asset('assets/css/product.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
<div class="content">

    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Slideshow</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <a href="{{ route('slide.create') }}" class="btn btn-success mb-2"><i
                                    class="mdi mdi-plus-circle mr-2"></i>Add Slides</a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped dt-responsive nowrap w-100" id="slide-table">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/vendor/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('/assets/js/vendor/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/assets/js/vendor/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/js/vendor/dataTables.checkboxes.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#slide-table').DataTable({
                responsive: true,
                processing: true,
                lengthChange: true,
                autoWidth: false,
                pageLength: 5,
                columnDefs: [{
                    "orderable": false,
                    "targets": 0,
                }],
                "order": [],
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    },
                    processing: "Processing... <img width='120' src='{{asset('img-processing/LGEn.gif')}}'>",
                    lengthMenu: 'Display <select class=\'custom-select custom-select-sm ml-1 mr-1\'><option value="5">5</option><option value="10">10</option><option value="20">20</option><option value="-1">All</option></select> products'
                },
                dom: "<'row' <'col-sm-12 col-md-6'l> <'col-sm-12 col-md-6'f>> <'row mb-3' <'col-sm-12 col-md-5'i> <'col-sm-12 col-md-7'p>> <'row' <'col-sm-12't>> <'row' <'col-sm-12 col-md-5'i> <'col-sm-12 col-md-7'p>>",
                serverSide: true,
                ajax: {
                    url: "{{ route('getSlides') }}",
                },
                columns: [
                    {
                        data: 'slideImage',
                        name: 'slideImage',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'slideTitle',
                        name: 'slideTitle',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'slideContent',
                        name: 'slideContent',
                        orderable: true,
                        searchable: true
                    }
                ],
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            });
        });
    </script>
@endsection
