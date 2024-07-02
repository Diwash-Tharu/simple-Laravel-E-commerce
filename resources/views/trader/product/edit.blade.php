@extends('layouts.trader')

@section('title')
Edit Product
@endsection

@section('content')

<div class="card">
    <div class="cardheader text-center  text-teal-500 text-3xl font-semibold p-4">
        Edit Product
    </div>
    <div class="card-body rounded-lg bg-white border p-6">
        <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="col-md-12 mb-3">
                    <select class="form-select">
                        <option value="">{{ $products->category->name }}</option>

                    </select>
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" value="{{ $products->name }}"
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                </div>

                <div class="mb-4">
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="text" id="slug" name="slug" value="{{ $products->slug }}"
                        class="form-input mt-2 border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                </div>
                <div class="mb-4 col-span-2">
                    <label for="small_description" class="block text-sm font-medium text-gray-700">Small
                        Description</label>
                    <textarea id="small_description" name="small_description" rows="3"
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                        {{ $products->small_description }}
                    </textarea>
                </div>
                <div class="mb-4 col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="3"
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                        {{ $products->description }}
                    </textarea>
                </div>
                <div class="mb-4">
                    <label for="original_price" class="block text-sm font-medium text-gray-700">Original Price</label>
                    <input type="number" id="original_price" name="original_price"
                        value="{{ $products->original_price }}"
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                </div>
                <div class="mb-4">
                    <label for="selling_price" class="block text-sm font-medium text-gray-700">Selling Price</label>
                    <input type="number" id="selling_price" name="selling_price" value="{{ $products->selling_price }}"
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" id="quantity" name="quantity" value="{{ $products->quantity }}"
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                </div>
                <div class="mb-4">
                    <label for="taxes" class="block text-sm font-medium text-gray-700">Taxes</label>
                    <input type="number" id="taxes" name="taxes" value="{{ $products->taxes }}"
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                </div>
                <div class="mb-4">
                    <label for="status" class="flex items-center">
                        <input type="checkbox" {{ $products->status == "1" ? 'checked' : '' }} id="status" name="status"
                        class="form-checkbox">
                        <span class="ml-2 text-sm text-gray-700">Status</span>
                    </label>
                </div>
                <div class="mb-4">
                    <label for="trending" class="flex items-center">
                        <input type="checkbox" {{ $products->trending == "1" ? 'checked' : '' }} id="trending"
                        name="trending" class="form-checkbox">
                        <span class="ml-2 text-sm text-gray-700">Trending</span>
                    </label>
                </div>
                <div class="mb-4 col-span-2">
                    <label for="metaTitle" class="block text-sm font-medium text-gray-700">Meta Title</label>
                    <textarea id="metaTitle" name="meta_title" rows="3"
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                        {{ $products->meta_title }}</textarea>
                </div>
                <div class="mb-4 col-span-2">
                    <label for="metaKeywords" class="block text-sm font-medium text-gray-700">Meta Keywords</label>
                    <textarea id="metaKeywords" name="meta_keywords" rows="3"
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                        {{ $products->meta_keywords }}</textarea>
                </div>
                <div class="mb-4 col-span-2">
                    <label for="metaDescription" class="block text-sm font-medium text-gray-700">Meta
                        Description</label>
                    <textarea id="metaDescription" name="meta_description" rows="3"
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                        {{ $products->meta_description }}</textarea>
                </div>
                @if($products->image)
                <img src="{{ asset('assests/uploads/products/'.$products->image) }}" alt="">
                @endif
                <div class="mb-4 col-span-2">
                    <input type="file" id="image" name="image"
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                </div>

                <div class="col-span-2">
                    <button type="submit"
                        class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection