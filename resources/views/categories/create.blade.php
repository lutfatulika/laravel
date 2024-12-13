@extends('layouts.app')

@section('title', 'Add Category')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Add New Category</h1>

        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="categories" class="form-label">Category Name</label>
                <input type="text" name="categories" class="form-control" placeholder="Enter category name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4" placeholder="Enter category description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" class="form-control" placeholder="Enter price" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
