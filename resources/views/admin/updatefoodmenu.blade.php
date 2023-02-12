@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Food Menu Form</h4>
                    <form action="{{ url('/updatefoodmenu', $food->id) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" name="foodname" value="{{ $food->food_name }}" id="exampleInputName1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Price</label>
                            <input type="text" class="form-control" name="price" value="{{ $food->price }}" id="exampleInputName1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label class="d-block mb-2">File upload</label>
                            <img src="/foodimage/{{ $food->image }}" alt="" height="100" width="100">
                            <input type="file" name="image" class="mt-2">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Textarea</label>
                            <textarea class="form-control" name="description" id="exampleTextarea1" rows="4">{{ $food->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Update Menu</button>
                        <button type="reset" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

