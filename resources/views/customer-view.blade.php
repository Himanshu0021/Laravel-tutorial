@extends('layouts.main')
@push('title')
    <title>Customer View</title>
@endpush
@section('main-section')
    <div class="text-right mb-2"><a href="{{route('customers-trash')}}"><button class="btn btn-warning">Go to Trash</button> </a></div>
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
                    <a href="{{route('customers-delete', ['id' => $customer->customer_id])}}"><button class="btn btn-danger">Trash</button></a>
                    <a href="{{route('customers-edit', ['id' => $customer->customer_id])}}"><button class="btn btn-primary">Edit</button></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
