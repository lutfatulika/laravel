@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
    <h1>Edit Kategori</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="photo">Foto</label>
            <input type="file" class="form-control" id="photo" name="photo">
            @if ($category->photo)
                <img src="{{ asset('storage/' . $category->photo) }}" alt="Category Photo" width="100" class="mt-2">
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="categories">Kategori</label>
            <input type="text" class="form-control" id="categories" name="categories" value="{{ old('categories', $category->categories) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="price">Harga</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $category->price) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a style="margin-top: 1em; position:relative; left:65%;" href="{{ route('categories.download-pdf', $category->id) }}" class="btn btn-success">Download PDF</a>
    </form>
@endsection
