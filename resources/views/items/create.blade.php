@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-bold mb-4">Tambah Item Baru</h2>

    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Nama" class="w-full p-2 border rounded" required>
        <textarea name="description" placeholder="Deskripsi" class="w-full p-2 border rounded"></textarea>
        <input type="number" name="price" placeholder="Harga" class="w-full p-2 border rounded" required>
        <input type="file" name="image" class="w-full">
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
@endsection