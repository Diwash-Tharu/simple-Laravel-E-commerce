@extends('layouts.admin')

@section('title')
Orders
@endsection

@section('content')

<div class="max-w-2xl mx-auto">
    <div class="card bg-light-blue shadow-md rounded-lg overflow-hidden w-full p-4">
        <div class="card-header bg-teal-500 py-4 text-white">
            <div class="flex justify-between items-center">
                <h4 class="text-2xl font-semibold">New Orders</h4>
                <a href="{{ url('order-history') }}"
                    class="btn bg-yellow-400 hover:bg-yellow-500 text-teal-800 font-bold py-2 px-6 rounded">
                    Order History
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table w-full border border-gray-300">
                <thead class="bg-teal-500 text-white">
                    <tr>
                        <th class="w-1/6 py-2 px-4 border-b">Order Date</th>
                        <th class="w-1/6 py-2 px-4 border-b">Tracking Number</th>
                        <th class="w-1/6 py-2 px-4 border-b">Total Price</th>
                        <th class="w-1/6 py-2 px-4 border-b">Status</th>
                        <th class="w-1/6 py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $item)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->tracking_no }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->total_price }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ url('admin/view-order/'.$item->id) }}"
                                class="btn bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-full">
                                View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection