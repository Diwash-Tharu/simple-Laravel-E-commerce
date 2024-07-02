<?php

namespace App\Http\Controllers\Trader;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class categoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('trader.category.index', compact('category'));
    }

    public function add()
    {
        return view('trader.category.add');
    }


    public function insert(Request $request)
    {
        $category = new Category();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assests/uploads/category', $filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->trending = $request->input('trending') == TRUE ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descp = $request->input('meta_description');
        $category->save();
        return redirect('/dashboard')->with('status', "Category added sucessfully.");
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('trader.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if ($request->hasFile('image')) {
            $path = 'assests/uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);

            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assests/uploads/category', $filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->trending = $request->input('trending') == TRUE ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descp = $request->input('meta_description');
        $category->update();
        return redirect('dashboard')->with('status', "Category updated sucessfully.");
    }

    public function deletee($id)
    {
        $category = Category::find($id);
        if ($category->image) {
            $path = 'assests/uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('categories')->with('status', "Category deleted sucessfully");
    }

}
