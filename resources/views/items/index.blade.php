@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">List Items</h2>
        <a href="{{ route('items.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">+ Add Item</a>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        @foreach($items as $item)
            <div class="bg-white shadow rounded p-4">
                @if($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}" class="w-full h-40 object-cover mb-2 rounded" alt="">
                @endif
                <h3 class="text-lg font-bold">{{ $item->name }}</h3>
                <p class="text-gray-700">{{ $item->description }}</p>
                <p class="text-sm text-green-600 font-semibold mt-2">Rp{{ number_format($item->price, 0, ',', '.') }}</p>

                <div class="mt-4 flex gap-2">
                    <a href="{{ route('items.show', $item) }}" class="text-blue-500 text-sm">Detail</a>
                    <a href="{{ route('items.edit', $item) }}" class="text-yellow-500 text-sm">Edit</a>
                    <form action="{{ route('items.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus item ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 text-sm">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $items->links() }}
    </div>
@endsection