@extends('layouts.trader')

@section('content')

<div class="container mx-auto mt-6">

    <div class="mt-2 text-center text-3xl text-teal-600 font-semibold">
        <h5>Welcome to Trader Dashboard!</h5>
    </div>

    <div class="mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ">

            <a href="{{url('categories')}}">
                <div class="p-2 rounded-md shadow-lg flex items-center justify-center transform hover:scale-105">
                    <div class="flex flex-col items-center">
                        <img src="images/menu_2633648.png" class="w-24 h-24 mb-4" alt="Categories Image">
                        <h1 class="text-3xl font-semibold text-gray-800">Categories</h1>
                    </div>
                </div>
            </a>


            <a href="{{url('products')}}">
                <div class="p-2 rounded-md shadow-lg flex items-center justify-center hover:scale-105">
                    <div class="flex flex-col items-center">
                        <img src="images/women_12327712.png" class="w-24 h-24 mb-4" alt="Categories Image">
                        <h1 class="text-3xl font-semibold text-gray-800">Products</h1>
                    </div>
                </div>
            </a>





            <a href="{{url('orders')}}">
                <div class="p-2 rounded-md shadow-lg flex items-center justify-center hover:scale-105">
                    <div class="flex flex-col items-center">
                        <img src="images/smartphone_7566166.png" class="w-24 h-24 mb-4" alt="Categories Image">
                        <h1 class="text-3xl font-semibold text-gray-800">Orders</h1>
                    </div>
                </div>
            </a>



        </div>
    </div>
</div>

@endsection