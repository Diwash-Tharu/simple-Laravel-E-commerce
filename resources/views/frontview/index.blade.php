@extends('layouts.front')

@section('title')
Welcome to Belle Chic
@endsection

@section('content')

<!-- @include('layouts.incFront.slider') -->
@include('layouts.incFront.herosection')

<style>
    .card {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

    }

    .card img {
        object-fit: cover;
        height: 250px;
        width: 100%;
    }

    .card-body {
        padding: 15px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    h1 {
        text-align: center;
        font-weight: bold;
        margin-bottom: 20px;
        font-size: 25px;
    }
</style>


<div class="py-5 bg-teal-50">
    <div class="container">
        <div class="row">
            <h1 class="text-3xl font-bold mb-6">Trending Categories</h1>
            <div class="flex justify-center space-x-6">
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($popular_category as $category)
                    <div class="flex flex-col items-center">
                        <a href="{{ url('view-category/'.$category->slug) }}">
                            <div
                                class="w-32 h-32 rounded-full flex items-center justify-center mb-2 border border-teal-500 hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                                <img src="{{ asset('assests/uploads/category/'.$category->image)}}"
                                    alt="Category image">
                            </div>
                            <p class="text-xl text-center font-semibold text-gray-700">{{ $category->name }}</p>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



<div class="py-5">
    <div class="container">
        <div class="row">
            <h1>Featured Products</h1>
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach($featured_products as $prod)
                <div class="item">
                    <a href="{{ url('view-product/'.$prod->slug) }}">
                        <div class="card transform hover:scale-95 hover:shadow-lg transition-all duration-300">
                            <img src="{{ asset('assests/uploads/products/'.$prod->image)}}" alt="Product image">
                            <div class="card-body p-4 flex-grow">
                                <h2 class="mb-2 text-lg font-medium dark:text-white text-gray-900">{{ $prod->name }}
                                </h2>
                                <span class="float-start text-xl font-semibold">{{ $prod->selling_price }}</span>
                                <span class="float-end"><s>{{ $prod->original_price }}</s></span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>




<!-- <div class="py-5">
    <div class="container">
        <div class="row">
            <h1>Trending Categories</h1>
            <div class="owl-carousel featured-carousel owl-theme">

                @foreach($popular_category as $catg)
                <div class="item">
                    <a href="{{ url('view-category/'.$catg->slug) }}">
                        <div class="card">
                            <img src="{{ asset('assests/uploads/category/'.$catg->image)}}" alt="Category image">
                            <div class="card-body p-4 flex-grow">
                                <h2 class="mb-2 text-lg font-medium dark:text-white text-gray-900">{{ $catg->name }}
                                </h2>
                                <p class="mb-2 text-base dark:text-gray-300 text-gray-700">
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
</div> -->


@include('layouts.incFront.banner')


<div class="py-5">
    <div class="container">
        <div class="row">
            <h1>All Products</h1>

            <div class="flex flex-wrap -mx-4">
                @foreach($products as $allprod)
                <div class="w-1/4 px-2 mb-4">
                    <a href="{{ url('view-product/'.$allprod->slug) }}">
                        <div
                            class="flex flex-col h-full transform overflow-hidden rounded-lg bg-white dark:bg-slate-800 shadow-md duration-300 hover:scale-105 hover:shadow-lg">
                            <img class="h-48 w-full object-cover object-center"
                                src="{{ asset('assests/uploads/products/'.$allprod->image)}}" alt="Product image">
                            <div class="card-body p-4 flex-grow">
                                <h2 class="mb-2 text-lg font-medium dark:text-white text-gray-900">{{
                                    $allprod->name }}
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
</div>

<div class="mt-1">
    <div class="container">
        <div class="row">
            <div class="text-center">
                <a href="{{ url('all-product') }}"
                    class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-md inline-flex items-center space-x-2">
                    <span>More Products</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

<script>

    $(document).ready(function () {
        $('.featured-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });


    });
</script>


@endsection