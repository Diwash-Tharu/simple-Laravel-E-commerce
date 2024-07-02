<?php

namespace App\Http\Controllers\Trader;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        //$products = Product::all();
        return view('trader.product.index', compact('products'));
    }

    public function add()
    {
        $category = Category::all();
        return view('trader.product.add', compact('category'));
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

    public function edit($id)
    {
        $products = Product::find($id);
        return view('trader.product.edit', compact('products'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        if ($request->hasFile('image')) {

            $path = 'assests/uploads/products/' . $products->image;
            if (File::exists($path)) {
                File::delete($path);

            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assests/uploads/products', $filename);
            $products->image = $filename;
        }

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
        $products->update();
        return redirect('products')->with('status', "Product updated sucessfully.");
    }

    public function deletee($id)
    {
        $products = Product::find($id);
        $path = 'assests/uploads/products/' . $products->image;
        if (File::exists($path)) {
            File::delete($path);

        }
        $products->delete();
        return redirect('products')->with('status', "Product deleted sucessfully.");
    }

}
