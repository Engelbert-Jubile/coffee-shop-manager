@extends('layouts.app')
@section('title','Detail Item')

@section('content')
<div class="col-md-6 mx-auto">
  <div class="card shadow-sm">
    <img src="https://via.placeholder.com/400x200.png?text={{ urlencode($item->name) }}" class="card-img-top" alt="{{ $item->name }}">
    <div class="card-body">
      <h5 class="card-title">{{ $item->name }}</h5>
      <p class="card-text"><strong>Harga:</strong> Rp {{ number_format($item->price, 2, ',', '.') }}</p>
      <p class="card-text"><strong>Deskripsi:</strong><br> {{ $item->description }}</p>
      <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('items.edit', $item) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('items.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus item ini?');">
          @csrf @method('DELETE')
          <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection
