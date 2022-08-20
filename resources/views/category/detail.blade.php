@extends('layout.master')
@section('content')
<div class="row justify-content-center align-items-center pt-3">
    <div class="col-12">
        <div class="row mb-2">
            <div class="col-sm-8">
                <a href="{{url()->previous()}}" class="btn btn-light col-mb-2 mb-2"><i class="mdi mdi-reply mr-1"></i> Back</a>
            </div>
            <div class="col-sm-4 d-flex justify-content-end">
                <a href="{{route('category.editCategory',['id'=>$category->id])}}" class="btn btn-warning col-mb-2 mb-2"><i class="mdi mdi-square-edit-outline"></i> Edit</a>
                <form class="col-mb-2" action="{{route('category.deleteCategory',['id'=>$category->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger col-mb-2 mb-2 ml-1" onclick="return confirm('Will you delete this category ? Are you sure ?')" type="submit">
                        <i class="mdi mdi-delete mr-1"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center align-items-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="d-flex flex-column bd-highlight mb-3">
                        <div class="col">
                            <label for="" class="form-label">Code : {{$category->code}}</label>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Name : {{$category->name}}</label>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">User Created : {{($category->user_created)?$category->user_created->name:""}}</label>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">User Updated : {{($category->user_updated)?$category->user_updated->name:""}}</label>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Created At : {{$category->created_at}}</label>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Updated At : {{$category->updated_at}}</label>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">
                                &nbsp;
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection