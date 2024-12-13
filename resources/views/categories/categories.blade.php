@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-tambah">Tambah Data</a>

    <table class="table-data">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Categories</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td><img src="{{ asset('storage/' . $category->photo) }}" width="100" alt="Photo"></td>
                    <td>{{ $category->categories }}</td>
                    <td>{{ $category->description }}</td>
                    <td>Rp {{ number_format($category->price, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button style="padding: 5.3px 10px; border-radius: 3px; border:none;" type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">Data Kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
