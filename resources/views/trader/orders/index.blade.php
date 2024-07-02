@extends('layouts.trader')

@section('title')
Orders
@endsection

@section('content')

<div class="container mx-auto my-8">
    <div class="bg-white p-8 rounded shadow-md">
        <h2 class="text-3xl text-center font-semibold mb-6 text-teal-500">New Orders</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border border-teal-500">
                <thead>
                    <tr class="bg-teal-500 text-white">
                        <th class="py-2 px-4 border-b">Order Date</th>
                        <th class="py-2 px-4 border-b">Tracking Number</th>
                        <th class="py-2 px-4 border-b">Total Price</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Action</th>
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
                            <a href="{{ url('trader/view-order/'.$item->id) }}"
                                class="inline-block bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded">
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