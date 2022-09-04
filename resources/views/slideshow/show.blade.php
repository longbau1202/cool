@extends('layout.master')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-xl-12" style="display: flex; justify-content: space-between;">
            <div class="col-sm-4">
                <a href="{{ Route('slide') }}" class="btn btn-primary mb-2"><i
                        class="mdi mdi-reply mr-1"></i> Back</a>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <a href="{{ route('slide.edit', ['id'=> $slide->id]) }}" class="btn btn-warning mr-2 mb-2"><i
                        class="mdi mdi-square-edit-outline mr-1"></i> Edit</a>
                <form class="col" action="{{ route('slide.destroy', ['id' => $slide->id]) }}"
                    method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger"
                        onclick="return confirm('Will you delete this category ? Are you sure ?')" type="submit">
                        <i class="mdi mdi-delete"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">

                        <div class="form-group">
                            <h5 class="text-success" for="Code">Title</h5>
                            <p class="">{{ $slide->slideTitle }}</p>

                        </div>

                        <div class="form-group">
                            <h5 class="text-success" for="Name">Content</h5>
                            <p class="">{{ $slide->slideContent }}</p>

                        </div>
                    </div> <!-- end col-->

                    <div class="col-xl-6">

                        <div>
                            <h5 class="text-success" for="image">Slide Image</h5>
                            <img src="{{ asset("storage/uploads/slides/$slide->slideImage") }}" alt="contact-img"
                                title="contact-img" id="img-show" class="rounded mr-3" height="250" />
                        </div>
                    </div> <!-- end col-->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
