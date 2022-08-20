@extends('layout.master')
@section('content')
<div class="row justify-content-center align-items-center mt-3">
    <div class="col-12">
        <div class="row mb-2">
            <div class="col-sm-9">
                <a href="{{url()->previous()}}" class="btn btn-light col-mb-2 mb-2"><i class="mdi mdi-reply mr-1"></i> Back</a>
            </div>
            <div class="col-sm-3 d-flex">
                <a href="" class="col"></a>
                <button class="btn btn-success col-mb-2 mb-2 ml-1" type="submit" form="create-category">
                    <i class="mdi mdi-plus-circle mr-1"></i> Add
                </button>
                <button class="btn btn-secondary col-mb-2 mb-2 ml-1" type="reset" form="create-category">
                    <i class="uil-refresh mr-1"></i> Clear
                </button>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center align-items-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title text-center">Create Category</h4>
                <div class="tab-content">
                    <div class="tab-pane show active" id="custom-styles-preview">
                        <form action="{{route('category.storeCategory')}}" method="POST" id="create-category" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Name <span style="color: red">*</span></label>
                                <input type="text" class="form-control @if ($errors->has('name'))is-invalid @elseif(!$errors->has('name') && count($errors) > 0) is-valid @endif" placeholder="Name Categories" value="{{old('name')}}" name="name">
                                @if (!empty($errors))
                                <div class="invalid-feedback">
                                    {{$errors->first('name')}}
                                </div>
                                @endif
                                @if(!$errors->has('name') && count($errors) > 0)
                                <div class="valid-feedback">
                                    Look Good !
                                </div>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Code <span style="color: red">*</span></label>
                                <input type="text" style="text-transform: uppercase;" class="form-control @if ($errors->has('code'))is-invalid @elseif(!$errors->has('code') && count($errors) > 0) is-valid @endif" placeholder="Code Categories" value="{{old('code')}}" name="code">
                                @if (!empty($errors))
                                <div class="invalid-feedback">
                                    {{$errors->first('code')}}
                                </div>
                                @endif
                                @if(!$errors->has('code') && count($errors) > 0)
                                <div class="valid-feedback">
                                    Look Good !
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection