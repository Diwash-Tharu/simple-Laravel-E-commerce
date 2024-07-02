@extends('layouts.front')

@section('title')
My Cart
@endsection

@section('content')


<div class="container my-5">
    <div class="card shadow">
        <div class="card-header">
            <h3 class="text-2xl text-center font-bold text-teal-400">My Cart</h3>
        </div>
        @if($cartitems->count() > 0)
        <div class="card-body">
            @php
            $total = 0;
            @endphp

            @foreach($cartitems as $item)
            <div class="flex items-center border-b mb-3 pb-3 product_data">
                <div class="w-1/6">
                    <img src="{{ asset('assests/uploads/products/'.$item->products->image) }}"
                        class="w-16 h-16 object-cover rounded" alt="Product Image">
                </div>
                <div class="w-1/4">
                    <h5>{{ $item->products->name }}</h5>
                </div>
                <div class="w-1/6">
                    <h5>${{ $item->products->selling_price }}</h5>
                </div>
                <div class="w-1/6">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    @if($item->products->quantity >= $item->prod_qty)
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width:130px;">
                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                        <input type="text" name="quantity" class="form-control qty-input text-center"
                            value="{{$item->prod_qty}}">
                        <button class="input-group-text changeQuantity increment-btn">+</button>
                    </div>

                    @php $total += $item->products->selling_price * $item->prod_qty;@endphp
                    @else
                    <h6>Out of Stock</h6>
                    @endif
                </div>
                <div class="w-1/6">
                    <button class="btn btn-danger delete-cart-item">Remove</button>
                </div>
            </div>

            @endforeach

        </div>
        <div class="card-footer">
            <div class="flex justify-between items-center">
                <h4><b>Subtotal: {{ $total }} </b></h4>
                <a href="{{ url('checkout') }}" class="btn btn-outline-success">Proceed Checkout</a>
            </div>
        </div>
        @else
        <div class="card-body text-center">
            <h3 class="text-3xl font-bold mb-4">Your Cart is empty</h3>
            <p class="text-gray-600">Explore our products and find something you like!</p>
            <a href="{{url('category')}}" class="btn bg-teal-600 text-white mt-4">Continue Shopping</a>
        </div>
        <!-- <div class="card-body text-center">
            <h3>Your Cart is empty</h3>
            <a href="{{ url('category') }}" class="btn bg-teal-600 text-white float-end">Continue
                Shopping</a>
        </div> -->
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

        $('.changeQuantity').click(function (e) {
            e.preventDefault();

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            var qty = $(this).closest('.product_data').find('.qty-input').val();

            data = {
                'prod_id': prod_id,
                "prod_qty": qty,
            }


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "update-cart",
                data: data,
                success: function (response) {
                    window.location.reload();
                }

            });

        });
    });
</script>
@endsection