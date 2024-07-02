@extends('layouts.front')

@section('title')
My Orders
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header bg-teal-500 text-white">
                    <h4 class="mb-0 text-2xl">
                        Orders View
                        <a href="{{ url('orders') }}" class="btn bg-teal-800 text-white float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-teal-600 text-white">
                                    <h4 class="mb-0">Shipping Details</h4>
                                </div>
                                <div class="card-body">
                                    <label for="" class="form-label">Name</label>
                                    <div class="border p-2">{{ $orders->name }}</div>
                                    <label for="" class="form-label">Email</label>
                                    <div class="border p-2">{{ $orders->email }}</div>
                                    <label for="" class="form-label">Shipping Address</label>
                                    <div class="border p-2">
                                        {{ $orders->address }},<br>
                                        {{ $orders->city }},<br>
                                        {{ $orders->state }},
                                        {{ $orders->country }}
                                    </div>
                                    <label for="" class="form-label">Zip Code</label>
                                    <div class="border p-2">{{ $orders->zipcode }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-teal-600 text-white">
                                    <h4 class="mb-0">Order Details</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders->orderitems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>
                                                    <img src="{{ asset('assests/uploads/products/' . $item->products->image) }}"
                                                        width="50px" alt="Product image">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <h4 class="px-2">
                                        SubTotal: <span class="float-end">{{ $orders->total_price }}</span>
                                    </h4>

                                    <div class="mt-5 px-2">
                                        <label for="">Order Status</label>
                                        <form action="{{url('update-order/'.$orders->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select class="form-select" name="order_status">
                                                <option {{$orders->status == '0' ? 'selected':''}} value="0">Pending
                                                </option>
                                                <option {{$orders->status == '1' ? 'selected':''}} value="1">Completed
                                                </option>
                                            </select>

                                            <button type="submit" class="btn bg-teal-600 float-end mt-3">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection