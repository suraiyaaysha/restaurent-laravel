@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">FChef update Form</h4>
                    <form action="{{ url('/updatechef', $chef->id) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $chef->name }}" id="exampleInputName1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Speciality</label>
                            <input type="text" class="form-control" name="speciality" value="{{ $chef->speciality }}" id="exampleInputName1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label class="d-block mb-2">File upload</label>
                            <img src="/chefimage/{{ $chef->image }}" alt="" height="100" width="100">
                            <input type="file" name="image" class="mt-2">
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Update Menu</button>
                        <button type="reset" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

