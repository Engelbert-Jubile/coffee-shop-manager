@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-bold mb-4">Edit Item</h2>

    <form action="{{ route('items.update', $item) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf @method('PUT')
        <input type="text" name="name" value="{{ $item->name }}" class="w-full p-2 border rounded" required>
        <textarea name="description" class="w-full p-2 border rounded">{{ $item->description }}</textarea>
        <input type="number" name="price" value="{{ $item->price }}" class="w-full p-2 border rounded" required>

        @if($item->image)
            <img src="{{ asset('storage/'.$item->image) }}" class="h-32 mb-2">
        @endif
        <input type="file" name="image" class="w-full">

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
@endsection