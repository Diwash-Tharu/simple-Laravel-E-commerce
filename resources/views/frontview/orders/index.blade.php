@extends('layouts.front')

@section('title')
My Orders
@endsection

@section('content')

<<div class="container py-5">
    <div class="flex justify-center">
        <div class="w-full md:w-3/4 lg:w-2/3">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="card-header bg-blue-50 text-black py-3 px-6">
                    <h4 class="text-xl font-bold text-center">My Orders</h4>
                </div>
                <div class="p-6">
                    <table class="w-full border">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2 px-4">Order Date</th>
                                <th class="py-2 px-4">Tracking Number</th>
                                <th class="py-2 px-4">Total Price</th>
                                <th class="py-2 px-4">Status</th>
                                <th class="py-2 px-4">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($orders as $item)
                            <tr class="border-b">
                                <td class="py-2 px-4">{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                <td class="py-2 px-4">{{$item->tracking_no}}</td>
                                <td class="py-2 px-4">{{$item->total_price}}</td>
                                <td class="py-2 px-4">
                                    <span
                                        class="inline-block px-2 py-1 font-semibold text-{{$item->status == '0' ? 'orange' : 'green'}}-600 bg-{{$item->status == '0' ? 'orange' : 'green'}}-200 rounded">
                                        {{$item->status == '0' ? 'Pending' : 'Completed'}}
                                    </span>
                                </td>
                                <td class="py-2 px-4">
                                    <a href="{{url('view-order/'.$item->id)}}"
                                        class="px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-700">View</a>
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