@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 col-md-8 grid-margin stretch-card">
            <div class="card p-3">
                <div class="card-body">
                    <h4 class="card-title">Chef Form</h4>
                    <form action="{{ url('/uploadchef') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName2">Speciality</label>
                            <input type="text" class="form-control" name="speciality" id="exampleInputName2" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label class="d-block mb-2">Image upload</label>
                            <input type="file" name="image" class="">
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button type="reset" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card p-3">
                <h4 class="card-title">Chefs</h4>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Speciality</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        @foreach ($chefs as $chef)
                        <tr>
                            <td>{{ $chef->name }}</td>
                            <td>{{ $chef->speciality }}</td>
                            <td><img src="/chefimage/{{ $chef->image }}" alt=""></td>
                            <td>
                                <a href="{{ url('/editchef', $chef->id) }}" class="badge badge-info">Update</a>
                                <a href="{{ url('/deletechef', $chef->id) }}" class="badge badge-danger">Delete</a>
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

