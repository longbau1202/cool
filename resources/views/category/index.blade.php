@extends('layout.master')
@section('css')
<link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@notifyCss
@endsection
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">Categories</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<x:notify-messages />
<div class="row">
    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Import File</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('category.importCategory')}}" accept-charset="utf-8" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col mb-2">
                            <input type="file" name="importFile" class="form-control">
                            @error('importFile')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col mb-2">
                            <button type="submit" class="btn btn-success">Import</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <a href="{{route('category.createCategory')}}" class="btn btn-success mb-2"><i class="mdi mdi-plus-circle mr-2"></i> Add Categories</a>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-right">
                            <button type="button" class="btn btn-success mb-2 mr-1"><i class="mdi mdi-settings"></i></button>
                            <button type="button" class="btn btn-light mb-2 mr-1" data-toggle="modal" data-target="#bs-example-modal-lg">Import</button>
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-centered w-100 dt-responsive nowrap" id="categories-datatable">
                        <thead class="thead-light">
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
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
@endsection
@section('js')
<script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.checkboxes.min.js') }}"></script>
<script>
    $(document).ready(function() {
        var table = $('#categories-datatable').DataTable({
            responsive: true,
            processing: true,
            lengthChange: true,
            autoWidth: false,
            pageLength: "{{\Config::get('common.PAGE_LENGTH')[0]}}",
            dom: "<'row' <'col-sm-12 col-md-6'l> <'col-sm-12 col-md-6'f>> <'row mb-3' <'col-sm-12 col-md-5'i> <'col-sm-12 col-md-7'p>> <'row' <'col-sm-12't>> <'row' <'col-sm-12 col-md-5'i> <'col-sm-12 col-md-7'p>>",
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
                lengthMenu: 'Display <select class=\'custom-select custom-select-sm ml-1 mr-1\'> @foreach(\Config::get("common.PAGE_LENGTH") as $value) <option value="{{$value}}">{{$value}}</option> @endforeach <option value="-1">All</option> </select> categories'
            },
            serverSide: true,
            ajax: {
                url: "{{ route('category.getCategory') }}",
                data: function(d) {
                    d.search = $('input[type="search"]').val();
                }
            },
            columns: [{
                data: 'code',
                name: 'code',
                orderable: true,
                searchable: true
            }, {
                data: 'name',
                name: 'name',
                orderable: true,
                searchable: true
            }],
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
            }
        });
    });
</script>
@endsection
