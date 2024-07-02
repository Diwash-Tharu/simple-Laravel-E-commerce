<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function insert(Request $request)
    {
        $products = new Product();
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assests/uploads/products', $filename);
            $products->image = $filename;
        }
        $products->catg_id = $request->input('catg_id');
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->taxes = $request->input('taxes');
        $products->quantity = $request->input('quantity');
        $products->status = $request->input('status') == TRUE ? '1' : '0';
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';
        $products->meta_title = $request->input('meta_title');
        $products->meta_keywords = $request->input('meta_keywords');
        $products->meta_description = $request->input('meta_description');
        $products->save();
        return redirect('products')->with('status', "Product added sucessfully.");
    }

    public function activate($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 0;
        $product->save();

        return redirect()->back()->with('status', 'Product activated successfully.');
    }

    public function deactivate($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 1;
        $product->save();

        return redirect()->back()->with('status', 'Product deactivated successfully.');
    }



}
