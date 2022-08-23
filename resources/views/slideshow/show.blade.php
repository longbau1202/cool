@extends('layout.master')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-xl-12" style="display: flex; justify-content: space-between;">
            <div class="col-sm-4">
                <a href="{{ Route('maker') }}" class="btn btn-primary mb-2"><i
                        class="mdi mdi-reply mr-1"></i> Back</a>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <a href="{{ route('maker.edit', ['id'=> $maker->id]) }}" class="btn btn-warning mr-2 mb-2"><i
                        class="mdi mdi-square-edit-outline mr-1"></i> Edit</a>
                <form class="col" action="{{ route('maker.destroy', ['id' => $maker->id]) }}"
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
                            <h5 class="text-success" for="Code">Code</h5>
                            <p class="">{{ $maker->makerCode }}</p>

                        </div>

                        <div class="form-group">
                            <h5 class="text-success" for="Name">Maker Name</h5>
                            <p class="">{{ $maker->makerName }}</p>

                        </div>

                        <div class="form-group">
                            <h5 class="text-success" for="country">Country</h5>
                            <p class="">{{ $maker->makerCountry }}</p>

                        </div>

                    </div> <!-- end col-->

                    <div class="col-xl-6">

                        <div>
                            <h5 class="text-success" for="image">Image</h5>
                            <img src="{{ asset("storage/uploads/makers/$maker->makerImage") }}" alt="contact-img"
                                title="contact-img" id="img-show" class="rounded mr-3" height="250" />
                        </div>
                    </div> <!-- end col-->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
