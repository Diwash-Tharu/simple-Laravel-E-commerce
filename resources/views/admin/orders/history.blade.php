@extends('layouts.admin')

@section('title')
Orders
@endsection

@section('content')

<div class="container mx-auto mt-8">
    <div class="max-w-2xl mx-auto">
        <div class="card bg-light-blue shadow-md rounded-lg overflow-hidden w-full">
            <div class="card-header bg-teal-500 py-4 text-white flex justify-between items-center">
                <h4 class="text-2xl font-semibold">Order History</h4>
                <a href="{{'orders'}}"
                    class="btn bg-yellow-400 hover:bg-yellow-500 text-teal-800 font-bold py-2 px-6 rounded">
                    New Orders
                </a>
            </div>
            <div class="card-body">
                <table class="table w-full border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4">Order Date</th>
                            <th class="py-2 px-4">Tracking Number</th>
                            <th class="py-2 px-4">Total Price</th>
                            <th class="py-2 px-4">Status</th>
                            <th class="py-2 px-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $item)
                        <tr>
                            <td class="py-2 px-4">{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                            <td class="py-2 px-4">{{ $item->tracking_no }}</td>
                            <td class="py-2 px-4">{{ $item->total_price }}</td>
                            <td class="py-2 px-4">{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ url('admin/view-order/'.$item->id) }}"
                                    class="btn bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-6 rounded">
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
</div>

@endsection