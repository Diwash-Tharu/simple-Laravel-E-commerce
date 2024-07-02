@extends('layouts.trader')

@section('title')
Edit Category
@endsection

@section('content')
<div class="card">
    <div class="cardheader text-center text-teal-500 text-3xl">
        Update Category
    </div>
    <div class="card-body mt-3 rounded-lg bg-white border p-6">
        <form action="{{ url('update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" value="{{ $category->name }}"
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                </div>
                <div class="mb-4">
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="text" id="slug" name="slug" value="{{ $category->slug }}"
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                </div>
                <div class="mb-4 col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="3"
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                        {{ $category->description }}
                    </textarea>
                </div>
                <div class="mb-4">
                    <label for="status" class="flex items-center">
                        <input type="checkbox" id="status" name="status" {{ $category->status == "1" ? 'checked':''}}
                        class="form-checkbox">
                        <span class="ml-2 text-sm text-gray-700">Status</span>
                    </label>
                </div>
                <div class="mb-4">
                    <label for="trending" class="flex items-center">
                        <input type="checkbox" id="trending" name="trending" {{ $category->trending == "1" ?
                        'checked':''}} class="form-checkbox">
                        <span class="ml-2 text-sm text-gray-700">Trending</span>
                    </label>
                </div>
                <div class="mb-4 col-span-2">
                    <label for="metaTitle" class="block text-sm font-medium text-gray-700">Meta Title</label>
                    <input id="meta_title" name="meta_title" value="{{ $category->meta_title }}" rows="3"
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full"></input>
                </div>
                <div class="mb-4 col-span-2">
                    <label for="metaKeywords" class="block text-sm font-medium text-gray-700">Meta Keywords</label>
                    <textarea id="meta_keywords" name="meta_keywords" rows="3"
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                       {{ $category->meta_keywords }}
                    </textarea>
                </div>
                <div class="mb-4 col-span-2">
                    <label for="metaDescription" class="block text-sm font-medium text-gray-700">Meta
                        Description</label>
                    <textarea id="metaDescription" name="meta_description" rows="3"
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                       {{ $category->meta_descp }}
                    </textarea>
                </div>
                <div class="mb-4 col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" id="image" name="image"
                        class="form-input border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full">
                </div>
                @if($category->image)
                <img src="{{ asset('assests/uploads/category/'.$category->image) }}" alt="Image Category">
                @endif
                <div class="col-span-2">
                    <button type="submit"
                        class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection