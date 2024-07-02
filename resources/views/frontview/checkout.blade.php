@extends('layouts.front')

@section('title')
checkout
@endsection

@section('content')
<div class="h-screen grid grid-cols-3">
    <div class="lg:col-span-2 col-span-3 bg-indigo-50 space-y-8 px-12">
        <div class="mt-8 p-4 relative flex flex-col sm:flex-row sm:items-center bg-white shadow rounded-md">
            <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
                <div class="text-yellow-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 sm:w-5 h-6 sm:h-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="text-sm font-medium ml-3">Checkout</div>
            </div>
            <div class="text-sm tracking-wide text-gray-500 mt-4 sm:mt-0 sm:ml-4">Complete your shipping and payment
                details below.</div>
            <div
                class="absolute sm:relative sm:top-auto sm:right-auto ml-auto right-4 top-4 text-gray-400 hover:text-gray-800 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </div>
        </div>
        <div class="rounded-md">
            <form method="POST" action="{{url('place-order')}}">
                @csrf
                <section>
                    <h2 class="uppercase tracking-wide text-lg font-semibold text-gray-700 my-2">Shipping & Billing
                        Information</h2>
                    <fieldset class="mb-3 bg-white shadow-lg rounded text-gray-600">
                        <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                            <span class="text-right px-2">Name</span>
                            <input name="name" class="focus:outline-none px-3 name" placeholder="Try Odinsson"
                                value="{{Auth::user()->name}}" required="">
                            <span id="name_error" class="text-danger"></span>
                        </label>
                        <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                            <span class="text-right px-2">Email</span>
                            <input name="email" type="email" class="focus:outline-none px-3 email"
                                placeholder="try@example.com" value="{{Auth::user()->email}}" required="">
                            <span id="email_error" class="text-danger"></span>
                        </label>
                        <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                            <span class="text-right px-2">Address</span>
                            <input name="address" class="focus:outline-none px-3 address"
                                placeholder="10 Street XYZ 654 " value="{{Auth::user()->address}}">
                            <span id="address_error" class="text-danger"></span>
                        </label>
                        <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                            <span class="text-right px-2">City</span>
                            <input name="city" value="{{Auth::user()->city}}" class="focus:outline-none px-3 city"
                                placeholder="San Francisco">
                            <span id="city_error" class="text-danger"></span>
                        </label>
                        <label class="inline-flex w-2/4 border-gray-200 py-3">
                            <span class="text-right px-2">State</span>
                            <input name="state" value="{{Auth::user()->state}}" class="focus:outline-none px-3 state"
                                placeholder="CA">
                            <span id="state_error" class="text-danger"></span>
                        </label>
                        <label
                            class="xl:w-1/4 xl:inline-flex items-center flex xl:border-none border-t border-gray-200 py-3">
                            <span class="text-right px-2 xl:px-0 xl:text-none">ZIP</span>
                            <input name="zipcode" value="{{Auth::user()->zipcode}}"
                                class="focus:outline-none px-3 zipcode" placeholder="98603">
                            <span id="zipcode_error" class="text-danger"></span>
                        </label>
                        <label class="flex border-t border-gray-200 h-12 py-3 items-center select relative">
                            <span class="text-right px-2">Country</span>
                            <div id="country" value="{{Auth::user()->country}}"
                                class="focus:outline-none px-3 w-full flex items-center">
                                <select name="country"
                                    class="border-none bg-transparent flex-1 cursor-pointer appearance-none focus:outline-none country">
                                    <option value="AU">Australia</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BR">Brazil</option>
                                    <option value="CA">Canada</option>
                                    <option value="CN">China</option>
                                    <option value="DK">Denmark</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="DE">Germany</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IT">Italy</option>
                                    <option value="JP">Japan</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MX">Mexico</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="SG">Singapore</option>
                                    <option value="ES">Spain</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="GB">United Kingdom</option>
                                    <option value="US" selected="selected">United States</option>
                                </select>
                                <span id="country_error" class="text-danger"></span>
                            </div>
                        </label>
                    </fieldset>
                </section>
                <input type="hidden" name="payment_mode" value="Cash On Delivery">
                <button type="submit"
                    class="submit-button px-4 py-3 rounded-full bg-teal-600 text-white focus:ring focus:outline-none w-full text-xl font-semibold transition-colors">
                    Place Order
                </button>
            </form>
        </div>

    </div>
    <div class="col-span-1 bg-white lg:block hidden">
        <h1 class="py-6 border-b-2 text-xl text-gray-600 px-8">Order Summary</h1>

        @php $total = 0; @endphp
        @if($cartitems->count() > 0)
        @foreach($cartitems as $item)
        <ul class="py-6 border-b space-y-6 px-8">
            @php $total += ($item->products->selling_price * $item->prod_qty) @endphp
            <li class="grid grid-cols-6 gap-2 border-b-1">
                <div class="col-span-1 self-center">
                    <img src="{{asset('assests/uploads/products/'.$item->products->image)}}" alt="Product"
                        class="rounded w-full">
                </div>
                <div class="flex flex-col col-span-3 pt-2">
                    <span class="text-gray-600 text-md font-semi-bold"> {{$item->products->name}}</span>
                </div>
                <div class="col-span-2 pt-3">
                    <div class="flex items-center space-x-2 text-sm justify-between">
                        <span class="text-gray-400">{{$item->prod_qty}}</span>
                        <span class="text-teal-400 font-semibold inline-block">{{$item->products->selling_price}}</span>
                    </div>
                </div>
            </li>

        </ul>
        @endforeach
        <div class="px-8 border-b">
            <div class="flex justify-between py-4 text-gray-600">
                <span>Subtotal</span>
                <span class="font-semibold text-teal-500">{{$total}}</span>
            </div>
            <div class="flex justify-between py-4 text-gray-600">
                <span>Shipping</span>
                <span class="font-semibold text-teal-500">Free</span>
            </div>
        </div>
        <div class="font-semibold text-xl px-8 flex justify-between py-8 text-gray-600">
            <span>Total</span>
            <span>{{$total}}</span>
        </div>
        <div id="paypal-button-container" style="max-width:1000px;"></div>
        @else
        <h4 class="text-center">No products in cart</h4>
        @endif
    </div>
</div>
@endsection


@section('scripts')
<script
    src="https://www.paypal.com/sdk/js?client-id=AVy24udO-Nr8sKLSI-f8JR3U0CBPZLD3PzNUXTXVQOTbUYN4E1HXyVqy4WWyZ60nL4z7V9eDLfURO6tA">

    </script>

<script>
    paypal.Buttons({
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '{{$total}}'
                    }
                }]
            });
        },
        onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
                alert('Transaction completed by ' + details.payer.name.given_name);
                var name = $('.name').val();
                var email = $('.email').val();
                var address = $('.address').val();
                var city = $('.city').val();
                var state = $('.state').val();
                var country = $('.country').val();
                var zipcode = $('.zipcode').val();

                if (!name) {
                    name_error = "Name is required";
                    $('#name_error').html('');
                    $('#name_error').html(name_error);
                }
                else {
                    name_error = "";
                    $('#name_error').html('');
                }

                if (!email) {
                    email_error = "email is required";
                    $('#email_error').html('');
                    $('#email_error').html(email_error);
                }
                else {
                    email_error = "";
                    $('#email_error').html('');
                }
                if (!address) {
                    address_error = "address is required";
                    $('#address_error').html('');
                    $('#address_error').html(address_error);
                }
                else {
                    address_error = "";
                    $('#address_error').html('');
                }
                if (!city) {
                    city_error = "city is required";
                    $('#city_error').html('');
                    $('#city_error').html(city_error);
                }
                else {
                    city_error = "";
                    $('#city_error').html('');
                }
                if (!state) {
                    state_error = "state is required";
                    $('#state_error').html('');
                    $('#state_error').html(state_error);
                }
                else {
                    state_error = "";
                    $('#state_error').html('');
                }
                if (!country) {
                    country_error = "country is required";
                    $('#country_error').html('');
                    $('#country_error').html(country_error);
                }
                else {
                    country_error = "";
                    $('#country_error').html('');
                }
                if (!zipcode) {
                    zipcode_error = "zipcode is required";
                    $('#zipcode_error').html('');
                    $('#zipcode_error').html(zipcode_error);
                }
                else {
                    zipcode_error = "";
                    $('#zipcode_error').html('');
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "/place-order",
                    data: {
                        'name': name,
                        'email': email,
                        'address': address,
                        'city': city,
                        'state': state,
                        'country': country,
                        'zipcode': zipcode,
                        'payment_mode': "Payment through PayPal",
                        "payment_id": details.id,
                    },
                    success: function (response) {
                        swal(response.status);
                        window.location.href = "/my-orders";
                    }
                })
            });
        }
    }).render('#paypal-button-container');


</script>


@endsection