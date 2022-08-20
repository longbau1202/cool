@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ $title }}</h4>
            </div>
        </div>
    </div>
    <form action="{{ route('maker.delete', ['id' => $maker->id]) }}" method="post">
        @csrf
        @method('delete')
        <div class="d-flex mb-2 justify-content-between">
            <div>
                <a href="{{ route('maker.index') }}" class="btn btn-primary"><i class="mdi mdi-reply mr-1"></i>Back</a>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{ route('maker.edit', ['id'=> $maker->id]) }}" class="btn btn-warning"><i
                        class="mdi mdi-square-edit-outline mr-1"></i>Edit
                </a>
                <button type="submit" class="btn btn-danger ml-2"
                        onclick="return confirm('Do you want to delete this user?')"><i
                        class="mdi mdi-delete mr-1"></i>Delete
                </button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-5 text-center">
                    @php
                        $image = json_decode($maker->image)
                    @endphp
                    <img src="{{ asset('storage/makers/'.$image[0]) }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="">
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i>Code: <span class="text-danger">{{ $maker->code }}</span></p>
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i>Name: {{ $maker->name }}</p>
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i>Date of Establishment: {{ $maker->establishment }}</p>
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i>Home Page: <a href="{{ $maker->link }}">Read more</a></p>
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i>Country: {{ $maker->country }}</p>
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i>Created by: {{ $maker->createdBy->name ?? ''}}</p>
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i>Updated by: {{ $maker->updatedBy->name ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
