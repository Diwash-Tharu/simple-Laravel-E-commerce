<?php

namespace App\Http\Controllers\Frontview;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartitems as $item) {
            if (!Product::where('id', $item->prod_id)->where('quantity', '>=', $item->prod_qty)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();

        return view('frontview.checkout', compact('cartitems'));
    }

    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->zipcode = $request->input('zipcode');

        $order->payment_mode = $request->input('payment_mode');
        $order->payment_id = $request->input('payment_id');

        //calculate total price
        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems_total as $prod) {
            $total += $prod->products->selling_price;
        }

        $order->total_price = $total;

        $order->tracking_no = 'perroo' . rand(1111, 9999);
        $order->save();

        $order->id;

        $cartitems = Cart::where('user_id', Auth::id())->get();

        foreach ($cartitems as $item) {
            Item::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->selling_price,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->quantity = $prod->quantity - $item->prod_qty;
            $prod->update();
        }


        if (Auth::user()->address == NULL) {
            $user = User::where('id', Auth::id())->first();

            $user->name = $request->input('name');
            $user->address = $request->input('address');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->zipcode = $request->input('zipcode');
            $user->update();

        }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);
        if ($request->input('payment_mode') == "Payment through PayPal") {
            return response()->json(['status' => 'Order Placed Sucessfully.']);
        }

        return redirect('/')->with('status', "order Placed Sucessfully.");

    }
}
