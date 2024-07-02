<?php

namespace App\Http\Controllers\Frontview;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class FrontviewController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(5)->get();
        $popular_category = Category::where('trending', '1')->get();
        $products = Product::where('status', '0')->take(12)->get();
        return view('frontview.index', compact('featured_products', 'popular_category', 'products'));
    }




    public function category()
    {
        $category = Category::where('status', '0')->get();
        return view('frontview.category', compact('category'));
    }

    public function allproduct(Request $request)
    {
        $search = $request->input('name', '');
        $sort = $request->input('sort', '');

        $query = Product::query();

        // Apply search filter
        if ($search != "") {
            $query->where('name', 'LIKE', "%$search%");
        }

        // Apply sorting
        if ($sort == 'asc') {
            $query->orderBy('selling_price', 'asc');
        } elseif ($sort == 'desc') {
            $query->orderBy('selling_price', 'desc');
        }

        // Get paginated results
        $all_products = $query->paginate(12);

        return view('frontview.products', compact('all_products', 'search'));
    }



    public function viewcategory($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('catg_id', $category->id)->where('status', '0')->get();
            return view('frontview.products.index', compact('category', 'products'));
        } else {
            return redirect('/')->with('status', 'Slug doesnot exists');
        }
    }

    public function viewproductdetail($slug)
    {
        if (Product::where('slug', $slug)->exists()) {
            $products = Product::where('slug', $slug)->first();
            return view('frontview.products.view', compact('products'));
        }

    }

    public function productview($catg_slug, $prod_slug)
    {
        if (Category::where('slug', $catg_slug)->exists()) {
            if (Product::where('slug', $prod_slug)->exists()) {
                $products = Product::where('slug', $prod_slug)->first();
                return view('frontview.products.view', compact('products'));

            } else {
                return redirect('/')->with('status', "No such product found.");
            }
        } else {
            return redirect('/')->with('status', "No such product found.");
        }
    }

    public function aboutus()
    {
        return view('frontview.about');
    }

}
