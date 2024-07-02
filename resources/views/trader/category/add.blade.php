@extends('layouts.trader')

@section('title')
Add Category
@endsection

@section('content')
<div class="card">
    <div class="cardheader">
        <h4 class="text-3xl text-center font-semibold text-teal-500">Add Category</h4>
    </div>
    <div class="card-body mt-3 rounded-lg bg-white border p-6">
        <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" required
                        class="form-input mt-1 block w-full rounded-md border border-gray-300 focus:ring focus:ring-blue-200">
                </div>
                <div class="mb-4">
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="text" id="slug" name="slug" required
                        class="form-input mt-1 block w-full rounded-md border border-gray-300 focus:ring focus:ring-blue-200">
                </div>
                <div class="mb-4 col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="3" v
                        class="form-input mt-1 block w-full rounded-md border border-gray-300 focus:ring focus:ring-blue-200"></textarea>
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
                        class="form-input mt-1 block w-full rounded-md border border-gray-300 focus:ring focus:ring-blue-200"></textarea>
                </div>
                <div class="mb-4 col-span-2">
                    <label for="metaKeywords" class="block text-sm font-medium text-gray-700">Meta Keywords</label>
                    <textarea id="metaKeywords" name="meta_keywords" rows="3" required
                        class="form-input mt-1 block w-full rounded-md border border-gray-300 focus:ring focus:ring-blue-200"></textarea>
                </div>
                <div class="mb-4 col-span-2">
                    <label for="metaDescription" class="block text-sm font-medium text-gray-700">Meta
                        Description</label>
                    <textarea id="metaDescription" name="meta_description" rows="3" required
                        class="form-input mt-1 block w-full rounded-md border border-gray-300 focus:ring focus:ring-blue-200"></textarea>
                </div>
                <div class="mb-4 col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" id="image" name="image" required
                        class="form-input mt-1 block w-full  focus:ring focus:ring-blue-200">
                </div>
                <div class="col-span-2">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection