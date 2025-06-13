@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-bold mb-4">Item Dihapus</h2>

    @foreach($items as $item)
        <div class="bg-white p-4 rounded shadow mb-4">
            <h3 class="font-bold">{{ $item->name }}</h3>
            <div class="flex gap-4 mt-2">
                <form action="{{ route('items.restore', $item->id) }}" method="POST">
                    @csrf
                    <button class="text-green-500">Restore</button>
                </form>
                <form action="{{ route('items.forceDelete', $item->id) }}" method="POST" onsubmit="return confirm('Hapus permanen?')">
                    @csrf @method('DELETE')
                    <button class="text-red-500">Delete Permanen</button>
                </form>
            </div>
        </div>
    @endforeach

    <div class="mt-6">
        {{ $items->links() }}
    </div>
@endsection