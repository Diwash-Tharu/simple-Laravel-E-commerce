@extends('layouts.admin')

@section('title')
View User Details
@endsection

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-teal-500 text-white p-4 mb-4">
                    <h3 class="text-2xl font-semibold mb-0">User Details
                        <a href="{{ url('users') }}" class="bg-teal-400 text-white px-4 rounded-md float-right">Back</a>
                    </h3>
                </div>
                <div class="bg-white p-6 shadow-md rounded-md">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="font-bold">Role</label>
                            <div class="p-4 border bg-gray-100 text-indigo-700 rounded-md">
                                @if($users->role == 2)
                                Trader
                                @elseif($users->role == 1)
                                Admin
                                @elseif($users->role == 0)
                                User
                                @endif
                            </div>
                        </div>
                        <div>
                            <label class="font-bold">Name</label>
                            <div class="p-4 border bg-gray-100 rounded-md">{{$users->name}}</div>
                        </div>
                        <div>
                            <label class="font-bold">Email</label>
                            <div class="p-4 border bg-gray-100 rounded-md">{{$users->email}}</div>
                        </div>
                        <div>
                            <label class="font-bold">Address</label>
                            <div class="p-4 border bg-gray-100 rounded-md">{{$users->address}}</div>
                        </div>
                        <div>
                            <label class="font-bold">City</label>
                            <div class="p-4 border bg-gray-100 rounded-md">{{$users->city}}</div>
                        </div>
                        <div>
                            <label class="font-bold">State</label>
                            <div class="p-4 border bg-gray-100 rounded-md">{{$users->state}}</div>
                        </div>
                        <div>
                            <label class="font-bold">Country</label>
                            <div class="p-4 border bg-gray-100 rounded-md">{{$users->country}}</div>
                        </div>
                        <div>
                            <label class="font-bold">Zip Code</label>
                            <div class="p-4 border bg-gray-100 rounded-md">{{$users->zipcode}}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection