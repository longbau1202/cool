@extends('layout.master')
@section('css')
    <link href="{{ asset('assets/css/product.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" type="text/css" />
@endsection
@section('content')
    <div class="wrapper">

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content">

            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Orders</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered w-100 dt-responsive nowrap" id="order-datatable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Grand Total</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


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
        var table = $('#order-datatable').DataTable({
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
                url: "{{ route('getOrders') }}",
            },
            columns: [
                {
                    data: 'code',
                    name: 'code',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'order_name',
                    name: 'order_name',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'grand_total',
                    name: 'grand_total',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'email',
                    name: 'email',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'phone_number',
                    name: 'phone_number',
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
