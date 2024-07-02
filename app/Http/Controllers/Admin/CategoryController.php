<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }


    public function insert(Request $request)
    {
        $category = new Category();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assests/uploads/category' . $filename);
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

    public function activate($id)
    {
        $category = Category::findOrFail($id);
        $category->status = 0;
        $category->save();

        return redirect()->back()->with('status', 'Category activated successfully.');
    }

    public function deactivate($id)
    {
        $category = Category::findOrFail($id);
        $category->status = 1;
        $category->save();

        return redirect()->back()->with('status', 'Category deactivated successfully.');
    }


}
