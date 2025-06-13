<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    // Menampilkan semua item (dengan search + pagination)
    public function index(Request $request)
    {
        $query = Item::query();

        if ($q = $request->q) {
            $query->where('name', 'like', "%$q%")
                  ->orWhere('description', 'like', "%$q%");
        }

        $items = $query->latest()->paginate(9)->withQueryString();

        return view('items.index', compact('items'));
    }

    // Form tambah item
    public function create()
    {
        return view('items.create');
    }

    // Menyimpan item baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Item::create($data);

        return redirect()->route('items.index')->with('success', 'Item berhasil ditambahkan.');
    }

    // Menampilkan detail item
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    // Form edit item
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    // Menyimpan perubahan item
    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $item->update($data);

        return redirect()->route('items.index')->with('success', 'Item berhasil diperbarui.');
    }

    // Menghapus item (soft delete)
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item berhasil dihapus.');
    }

    // Melihat item yang dihapus (trash)
    public function trash()
    {
        $items = Item::onlyTrashed()->paginate(10);
        return view('items.trash', compact('items'));
    }

    // Mengembalikan item
    public function restore($id)
    {
        Item::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('items.trash')->with('success', 'Item berhasil dikembalikan.');
    }

    // Hapus permanen
    public function forceDelete($id)
    {
        $item = Item::withTrashed()->findOrFail($id);

        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->forceDelete();

        return redirect()->route('items.trash')->with('success', 'Item dihapus permanen.');
    }
}
