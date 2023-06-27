@extends('layouts.main')
@push('title')
    <title>Customer Trash</title>
@endpush
@section('main-section')
    <div class="text-right mb-2"><a href="{{route('customers-create')}}"><button class="btn btn-primary">Add</button> </a></div>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Address</th>
            <th>State</th>
            <th>Country</th>
            <th>DOB</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->gender}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->state}}</td>
                <td>{{$customer->country}}</td>
                <td>{{$customer->dob}}</td>
                <td>
                    @if($customer->status == '1')
                        <a href=""><span class="badge badge-success">Active</span></a>
                    @else
                        <a href=""><span class="badge badge-danger">Inactive</span></a>
                    @endif
                </td>
                <td>
                    <a href="{{route('customers-forcedelete', ['id' => $customer->customer_id])}}"><button class="btn btn-danger">Delete</button></a>
                    <a href="{{route('customers-restore', ['id' => $customer->customer_id])}}"><button class="btn btn-primary">Restore</button></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
