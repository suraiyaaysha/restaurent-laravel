@extends('admin.layouts.app')

@section('content')
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card p-3">
                <h4 class="card-title">Reservation List</h4>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Guest</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        @foreach ($data as $reservation)
                        <tr>
                            <td>{{ $reservation->name }}</td>
                            <td>${{ $reservation->email }}</td>
                            <td>${{ $reservation->phone }}</td>
                            <td>${{ $reservation->guest }}</td>
                            <td>${{ $reservation->date }}</td>
                            <td>${{ $reservation->time }}</td>
                            <td>{{ $reservation->message }}</td>
                            <td>
                                {{-- <a href="{{ url('/deletefoodmenu', $food->id) }}" class="badge badge-danger">Delete</a>
                                <a href="{{ url('/editfoodmenu', $food->id) }}" class="badge badge-info">Update</a> --}}
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

