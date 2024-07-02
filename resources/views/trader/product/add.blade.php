@extends('layouts.trader')

@section('title')
Add Product
@endsection

@section('content')
<div class="card">
    <div class="cardheader text-center  text-teal-500 text-3xl font-semibold p-4">
        Add Product
    </div>
    <div class="card-body rounded-lg bg-white border p-6">
        <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4 col-span-2">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="category" name="catg_id"
                        class="form-select border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full required">
                        <option value="">Select a Category</option>
                        @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" required
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                </div>
                <div class="mb-4">
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="text" id="slug" name="slug" required
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                </div>
                <div class="mb-4 col-span-2">
                    <label for="small_description" class="block text-sm font-medium text-gray-700">Small
                        Description</label>
                    <textarea id="small_description" name="small_description" rows="3" required
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full"></textarea>
                </div>
                <div class="mb-4 col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="3" required
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full"></textarea>
                </div>
                <div class="mb-4">
                    <label for="original_price" class="block text-sm font-medium text-gray-700">Original Price</label>
                    <input type="number" id="original_price" name="original_price" required
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                </div>
                <div class="mb-4">
                    <label for="selling_price" class="block text-sm font-medium text-gray-700">Selling Price</label>
                    <input type="number" id="selling_price" name="selling_price" required
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" id="quantity" name="quantity" required
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                </div>
                <div class="mb-4">
                    <label for="taxes" class="block text-sm font-medium text-gray-700">Taxes</label>
                    <input type="number" id="taxes" name="taxes" required
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                </div>
                <div class="mb-4">
                    <label for="status" class="flex items-center">
                        <input type="checkbox" id="status" name="status" class="form-checkbox">
                        <span class="ml-2 text-sm text-gray-700">Status</span>
                    </label>
                </div>
                <div class="mb-4">
                    <label for="trending" class="flex items-center">
                        <input type="checkbox" id="trending" name="trending" class="form-checkbox">
                        <span class="ml-2 text-sm text-gray-700">Trending</span>
                    </label>
                </div>
                <div class="mb-4 col-span-2">
                    <label for="metaTitle" class="block text-sm font-medium text-gray-700">Meta Title</label>
                    <textarea id="metaTitle" name="meta_title" rows="3" required
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full"></textarea>
                </div>
                <div class="mb-4 col-span-2">
                    <label for="metaKeywords" class="block text-sm font-medium text-gray-700">Meta Keywords</label>
                    <textarea id="metaKeywords" name="meta_keywords" rows="3" required
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full"></textarea>
                </div>
                <div class="mb-4 col-span-2">
                    <label for="metaDescription" class="block text-sm font-medium text-gray-700">Meta
                        Description</label>
                    <textarea id="metaDescription" name="meta_description" rows="3" required
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full"></textarea>
                </div>
                <div class="mb-4 col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" id="image" name="image" required
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                </div>
                <div class="col-span-2">
                    <button type="submit"
                        class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection