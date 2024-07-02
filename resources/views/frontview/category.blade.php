@extends('layouts.front')

@section('title')
Category
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-3xl font-serif font-semibold text-center">All Categories</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                    @foreach($category as $catg)
                    <div class="mb-3 flex">
                        <a href="{{ url('view-category/'.$catg->slug) }}" class="flex w-full">
                            <div class="card flex flex-col w-full">
                                <img src="{{ asset('assests/uploads/category/'.$catg->image)}}" alt="Category image"
                                    class="object-cover h-48 w-full">
                                <div class="card-body p-4 flex-grow">
                                    <h2 class="mb-2 text-lg font-medium dark:text-white text-gray-900">{{ $catg->name }}
                                    </h2>
                                    <p class="mb-2 text-base dark:text-gray-300 text-gray-700 line-clamp-3">
                                        {{ $catg->description }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection