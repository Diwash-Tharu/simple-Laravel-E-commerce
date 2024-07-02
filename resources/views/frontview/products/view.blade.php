@extends('layouts.front')

@section('title', $products->name)

@section('content')


<section class="overflow-hidden bg-white py-11 font-poppins dark:bg-gray-800">
    <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6 product_data">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4 md:w-full ">
                <div class="bg-white p-8 rounded-lg shadow-md lg:flex">
                    <div class="lg:w-1/2 lg:pr-8 mb-6 lg:mb-0">
                        <img src="{{ asset('assests/uploads/products/'.$products->image) }}" alt=""
                            class="object-cover w-full h-full rounded-md shadow-md">
                    </div>
                    <div class="lg:w-1/2">
                        <h2 class="mb-6 text-2xl font-bold dark:text-gray-400 md:text-4xl">{{$products->name}}</h2>
                        <p class="mb-8 text-gray-700 dark:text-gray-400">{{$products->small_description}}</p>
                        <p class="mb-8 text-gray-700 dark:text-gray-400">{{$products->description}}</p>
                        <p class="mb-8 text-4xl font-bold text-gray-700 dark:text-gray-400">
                            <span><s>{{$products->original_price}}</s></span>
                            <span
                                class="text-base font-normal text-gray-500  dark:text-gray-400">{{$products->selling_price}}</span>
                        </p>
                        <div class="mb-4">
                            <span class="font-bold text-gray-700 dark:text-gray-300">Select Size:</span>
                            <div class="flex items-center mt-2">
                                <button
                                    class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">S</button>
                                <button
                                    class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">M</button>
                                <button
                                    class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">L</button>
                                <button
                                    class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">XL</button>
                                <button
                                    class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">XXL</button>
                            </div>
                        </div>
                        @if($products->quantity > 0)
                        <label class="badge bg-success">In stock</label>
                        @else
                        <label class="badge bg-danger">Out of Stock</label>
                        @endif
                        <div class="w-32 mb-8 ">
                            <input type="hidden" value="{{ $products->id }}" class="prod_id">
                            <label for=""
                                class="w-full text-xl font-semibold text-gray-700 dark:text-gray-400">Quantity</label>
                            <div class="relative flex flex-row w-full h-10 mt-4 bg-transparent rounded-lg">
                                <button
                                    class="w-20 h-full text-gray-600 bg-gray-300 rounded-l outline-none cursor-pointer dark:hover:bg-gray-700 dark:text-gray-400 hover:text-gray-700 dark:bg-gray-900 hover:bg-gray-400">
                                    <span class="m-auto text-2xl font-thin decrement-btn">-</span>
                                </button>
                                <input type="number" name="quantity"
                                    class="flex items-center w-full font-semibold text-center text-gray-700 placeholder-gray-700 bg-gray-300 outline-none dark:text-gray-400 dark:placeholder-gray-400 dark:bg-gray-900 focus:outline-none text-md hover:text-black qty-input"
                                    value="1">
                                <button
                                    class="w-20 h-full text-gray-600 bg-gray-300 rounded-r outline-none cursor-pointer dark:hover:bg-gray-700 dark:text-gray-400 hover:text-gray-700 hover:bg-gray-400">
                                    <span class="m-auto text-2xl font-thin increment-btn">+</span>
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-center -mx-4">
                            @if($products->quantity > 0)
                            <div class="w-full px-4 mb-4 lg:w-1/2 lg:mb-0">
                                <button
                                    class="flex items-center addToCartBtn justify-center w-full p-4 text-teal-500 border border-teal-500 rounded-md dark:text-gray-200 dark:border-teal-600 hover:bg-teal-600 hover:border-teal-600 hover:text-gray-100 dark:bg-teal-600 dark:hover:bg-teal-700 dark:hover:border-teal-700 dark:hover:text-white">
                                    Add to Cart

                                </button>
                            </div>
                            @endif

                            <div class="w-full px-4 mb-4 lg:mb-0 lg:w-1/2">
                                <button
                                    class="flex items-center addToWishlist justify-center w-full p-4 text-teal-500 border border-teal-500 rounded-md dark:text-gray-200 dark:border-teal-600 hover:bg-teal-600 hover:border-teal-600 hover:text-gray-100 dark:bg-teal-600 dark:hover:bg-teal-700 dark:hover:border-teal-700 dark:hover:text-white">
                                    Add to Wishlist

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.addToCartBtn').click(function (e) {
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty-input').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "/add-to-cart",
                data: {
                    'product_id': product_id,
                    'product_qty': product_qty,
                },
                success: function (response) {
                    swal(response.status);
                }
            })
        });

        $('.addToWishlist').click(function (e) {
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.prod_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "/add-to-wishlist",
                data: {
                    'product_id': product_id,
                },
                success: function (response) {
                    swal(response.status);
                }
            })
        });


        $('.increment-btn').click(function (e) {
            e.preventDefault();

            var inc_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                $(this).closest('.product_data').find('.qty-input').val(value);

            }
        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();

            var dec_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });
    });
</script>
@endsection