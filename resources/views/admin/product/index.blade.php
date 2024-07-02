@extends('layouts.admin')

@section('title')
Product
@endsection

@section('content')

<div class="card">
    <div class="card-header text-teal-500 text-center py-2">
        <h3 class="text-3xl font-semibold">Product Page</h3>
    </div>
    <div class="card-body mt-4">
        <table class="table w-full border border-gray-300 bg-teal-100 ">
            <thead class="bg-teal-500 text-white">
                <tr>
                    <th class="py-2 px-4 border-b">Id</th>
                    <th class="py-2 px-4 border-b">Category</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Selling Price</th>
                    <th class="py-2 px-4 border-b">Image</th>
                    <th class="py-2 px-4 border-b">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $item)
                <tr class="bg-teal-50">
                    <td class="py-2 px-4 border-b">{{ $item->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->category->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->selling_price }}</td>
                    <td class="py-2 px-4 border-b">
                        <img src="{{ asset('assests/uploads/products/'.$item->image) }}" alt="Image Name"
                            class="w-16 h-16 object-cover rounded-full">
                    </td>

                    <td class="py-2 px-4 border-b space-x-2">
                        <form action="{{ url('activate-product', ['id' => $item->id]) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded">Activate</button>
                        </form>

                        <form action="{{ url('deactivate-product', ['id' => $item->id]) }}" method="POST"
                            class="inline">
                            @csrf
                            @method('POST')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Deactivate</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="flex justify-end mt-4">
        {{ $products->links() }}
    </div>
</div>

@endsection