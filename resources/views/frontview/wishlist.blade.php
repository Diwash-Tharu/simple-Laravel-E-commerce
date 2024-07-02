@extends('layouts.front')

@section('title')
My Wishlist
@endsection

@section('content')



<div class="container my-5">
    <div class="card shadow">
        <div class="card-header bg-blue-50 text-black">
            <h2 class="text-2xl font-bold text-center mb-4">My Wishlist</h2>
        </div>
        <div class="card-body">
            @if($wishlist->count()>0)
            @foreach($wishlist as $item)
            <div class="flex items-center space-x-4 border-b py-4 product_data">
                <div class="w-16 h-16">
                    <img src="{{asset('assests/uploads/products/'.$item->products->image)}}" alt="Image"
                        class="w-full h-full object-cover">
                </div>
                <div class="flex-1">
                    <h5 class="text-lg font-semibold">{{$item->products->name}}</h5>
                </div>
                <div>
                    <h5 class="text-lg font-semibold">{{$item->products->selling_price}}</h5>
                </div>
                <div class="flex-1">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    @if($item->products->quantity >= $item->prod_qty)
                    <label for="Quantity" class="block">Quantity</label>
                    <div class="flex items-center mb-3" style="width:130px;">
                        <button class="px-3 py-1 bg-gray-200 text-gray-700 decrement-btn">-</button>
                        <input type="text" name="quantity"
                            class="w-16 h-10 text-center border border-gray-300 qty-input" value="1">
                        <button class="px-3 py-1 bg-gray-200 text-gray-700 increment-btn">+</button>
                    </div>
                    <div class="flex-1">
                        <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                        <h6 class="text-green-500 mt-1">In stock</h6>
                    </div>
                    @else
                    <div class="flex-1">
                        <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                        <h6 class="text-red-500 mt-1">Out of Stock</h6>
                    </div>
                    @endif
                </div>
                <div>
                    <button class="btn btn-success addToCartBtn">Add to Cart</button>
                </div>
                <div>
                    <button class="btn btn-danger remove-wishlist-item">Remove</button>
                </div>
            </div>
            @endforeach
        </div>

        @else
        <h4 class="text-center text-gray-500 my-4">No Products in your wishlist</h4>
        <div class="row">
            <div class="flex justify-center mt-2">
                <a href="{{ url('category') }}" class="btn bg-teal-600 text-white">Continue Shopping</a>
            </div>
        </div>

        @endif

    </div>
</div>



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


        $('.delete-cart-item').click(function (e) {
            e.preventDefault();

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "delete-cart-item",
                data: {
                    'prod_id': prod_id,
                },
                success: function (response) {
                    swal("", response.status, "success");
                }

            });
        });

        $('.remove-wishlist-item').click(function (e) {
            e.preventDefault();

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "remove-wishlist-item",
                data: {
                    'prod_id': prod_id,
                },
                success: function (response) {
                    swal("", response.status, "success");
                }

            });
        });


        $('.changeQuantity').click(function (e) {
            e.preventDefault();

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            var qty = $(this).closest('.product_data').find('.qty-input').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "update-cart",
                data: {
                    'prod_id': prod_id,
                    'prod_qty': qty,
                },
                success: function (response) {
                    window.location.reload();
                }

            });

        });
    });
</script>
@endsection