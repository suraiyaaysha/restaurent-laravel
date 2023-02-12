@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Food Menu Form</h4>
                    <form action="{{ url('/uploadfood') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" name="foodname" id="exampleInputName1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Price</label>
                            <input type="text" class="form-control" name="price" id="exampleInputName1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label class="d-block mb-2">File upload</label>
                            <input type="file" name="image" class="">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Textarea</label>
                            <textarea class="form-control" name="description" id="exampleTextarea1" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button type="reset" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <h4 class="card-title">Food Menu List</h4>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        @foreach ($foods as $food)
                        <tr>
                            <td>{{ $food->food_name }}</td>
                            <td>${{ $food->price }}</td>
                            <td>{{ $food->description }}</td>
                            <td><img src="/foodimage/{{ $food->image }}" alt=""></td>
                            <td>
                                <a href="{{ url('/deletefoodmenu', $food->id) }}" class="badge badge-danger">Delete</a>
                                <a href="{{ url('/editfoodmenu', $food->id) }}" class="badge badge-info">Update</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

