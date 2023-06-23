@extends('layouts.main')
@push('title')
    <title>About</title>
@endpush
@section('main-section')
    <div class="container">
        <form method="post" action="{{url('/')}}/register">
            @csrf
            <h1>Registration</h1>
                <x-input label="Name" type="text" name="name" placeholder="Enter your name"/>
                <x-input label="Email" type="email" name="email" placeholder="Enter your email"/>
                <x-input label="Password" type="password" name="password" placeholder="Enter Password"/>
                <x-input label="Confirm Password" type="password" name="password_confirmation" placeholder="Confirm Password"/>
{{--            <div class="form-group">--}}
{{--                <label>Email</label>--}}
{{--                <input type="text" name="email" class="form-control" id="" placeholder="Email" value="{{old('email')}}">--}}
{{--                <span class="text-danger">@error('email') {{$message}} @enderror</span>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label>Password</label>--}}
{{--                <input type="password" name="password" class="form-control" id="" placeholder="Password">--}}
{{--                <span class="text-danger">@error('password') {{$message}} @enderror</span>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label>Confirm Password</label>--}}
{{--                <input type="password" name="password_confirmation" class="form-control" id="" placeholder="Confirm Password">--}}
{{--            </div>--}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
