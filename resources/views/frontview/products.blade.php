@extends('layouts.front')

@section('title')
Products
@endsection

@section('content')



<form action="" class="mt-3">
    <div class="flex items-center justify-center">
        <input type="search" name="name" placeholder="Search" class="border rounded-md px-3 py-1 mr-2 w-96 "
            value="{{$search}}">
        <button type=" submit" class="bg-gray-300 hover:bg-gray-500 text-gray-800 font-bold py-1 px-2 rounded">
            Search
        </button>
    </div>
</form>



<div class="py-4">
    <div class="container">
        <div class="flex justify-end mb-3">
            <span class="mr-2">Sort by:</span>
            <select onchange="window.location.href=this.value">
                <option value="{{url()->current()}}">All Products</option>
                <option value="{{ url()->current() . '?sort=asc' }}" {{ request('sort')=='asc' ? 'selected' : '' }}>
                    Price Low to High</option>
                <option value="{{ url()->current() . '?sort=desc' }}" {{ request('sort')=='desc' ? 'selected' : '' }}>
                    Price High to Low</option>
            </select>
        </div>

        <div class="row">
            <h1 class="text-center font-bold text-2xl font-serif">All Products</h1>
            <div class="flex flex-wrap -mx-4 mt-4">
                @foreach($all_products as $allprod)
                <div class="w-1/4 px-2 mb-4">
                    <a href="{{ url('view-product/'.$allprod->slug) }}">
                        <div
                            class="flex flex-col h-full transform overflow-hidden rounded-lg bg-white dark:bg-slate-800 shadow-md duration-300 hover:scale-105 hover:shadow-lg">
                            <img class="h-48 w-full object-cover object-center"
                                src="{{ asset('assests/uploads/products/'.$allprod->image)}}" alt="Product image">
                            <div class="card-body p-4 flex-grow">
                                <h2 class="mb-2 text-lg font-medium dark:text-white text-gray-900">{{ $allprod->name }}
                                </h2>
                                <p class="mb-2 text-base dark:text-gray-300 text-gray-700">{{
                                    $allprod->small_description }}</p>
                                <div class="flex items-center">
                                    <p class="mr-2 text-2xl font-semibold text-gray-900 dark:text-white">${{
                                        $allprod->selling_price }}</p>
                                    <p class="text-lg font-medium text-gray-500 line-through dark:text-gray-300 ">
                                        ${{
                                        $allprod->original_price }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="flex justify-center mt-4">
            {{ $all_products->links() }}
        </div>
    </div> -->

    <div class="flex justify-center gap-4">
        @if ($all_products->previousPageUrl())
        <a href="{{ $all_products->previousPageUrl() }}"
            class="flex items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-full select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none @if ($all_products->onFirstPage()) pointer-events-none opacity-50 @endif"
            type="button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
            </svg>
            Previous
        </a>
        @endif

        <div class="flex items-center gap-2">
            @foreach ($all_products->getUrlRange(1, $all_products->lastPage()) as $page => $url)
            <a href="{{ $url }}"
                class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-full text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none @if ($all_products->currentPage() == $page) bg-gray-900 text-white @endif"
                type="button">
                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    {{ $page }}
                </span>
            </a>
            @endforeach
        </div>

        @if ($all_products->nextPageUrl())
        <a href="{{ $all_products->nextPageUrl() }}"
            class="flex items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-full select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none @if ($all_products->hasMorePages() == false) pointer-events-none opacity-50 @endif"
            type="button">
            Next
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
            </svg>
        </a>
        @endif
    </div>



</div>


@endsection