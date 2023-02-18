@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card p-3">
                <div class="search-orders mb-4">
                    <form action="{{ url('/search') }}" method="GET">
                        @csrf
                        <input type="text" name="search" class="text-black">
                        <button class="btn btn-primary">Search</button>
                    </form>
                </div>

                <h4 class="card-title">Customer Orders</h4>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Food name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->user_name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->food_name }}</td>
                            <td>{{ $order->price }}$</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->price * $order->quantity }}$</td>
                            {{-- <td>
                                <a href="{{ url('/editchef', $chef->id) }}" class="badge badge-info">Update</a>
                                <a href="{{ url('/deletechef', $chef->id) }}" class="badge badge-danger">Delete</a>
                            </td> --}}
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

