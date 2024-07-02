@extends('layouts.front')

@section('title')
{{ $category->name }}
@endsection

@section('content')






<div class="py-5">
    <div class="container">
        <div class="row">
            <h1 class="text-3xl font-serif font-semibold text-center">{{ $category->name }}</h1>

            <div class="flex flex-wrap -mx-4 mt-4">
                @foreach($products as $prod)
                <div class="w-1/4 px-2 mb-4">
                    <a href="{{ url('category/'.$category->slug.'/'.$prod->slug) }}">
                        <div
                            class="flex flex-col h-full transform overflow-hidden rounded-lg bg-white dark:bg-slate-800 shadow-md duration-300 hover:scale-105 hover:shadow-lg">
                            <img class="h-48 w-full object-cover object-center"
                                src="{{ asset('assests/uploads/products/'.$prod->image)}}" alt="Product image">
                            <div class="card-body p-4 flex-grow">
                                <h2 class="mb-2 text-lg font-medium dark:text-white text-gray-900">{{
                                    $prod->name }}
                                </h2>

                                <div class="flex items-center">
                                    <p class="mr-2 text-2xl font-semibold text-gray-900 dark:text-white">${{
                                        $prod->selling_price }}</p>
                                    <p class="text-lg font-medium text-gray-500 line-through dark:text-gray-300 ">
                                        ${{
                                        $prod->original_price }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

@endsection