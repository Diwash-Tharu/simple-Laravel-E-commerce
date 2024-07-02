@extends('layouts.admin')

@section('title')
All Users
@endsection

@section('content')

<div class="card shadow-lg">
    <div class="card-header text-teal-500">
        <h3 class="text-3xl font-semibold text-center">Registered Users</h3>
    </div>
    <div class="card-body mt-2">
        <table class="table w-full border border-gray-300 bg-teal-50">
            <thead class="bg-teal-500 text-white">
                <tr>
                    <th class="py-3 px-6 border-b">ID</th>
                    <th class="py-3 px-6 border-b">Name</th>
                    <th class="py-3 px-6 border-b">Email</th>
                    <th class="py-3 px-6 border-b">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $item)
                <tr>
                    <td class="py-3 px-6 border-b">{{ $item->id }}</td>
                    <td class="py-3 px-6 border-b">{{ $item->name }}</td>
                    <td class="py-3 px-6 border-b">{{ $item->email }}</td>
                    <td class="py-3 px-6 border-b">
                        <a href="{{ url('view-user/'.$item->id) }}"
                            class="btn bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-md inline-block">
                            View
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="flex justify-end mt-4">
        {{ $users->links() }}
    </div>
</div>


@endsection