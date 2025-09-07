<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Tampilkan semua buku
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Form tambah buku
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Simpan buku baru
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'author'      => 'nullable|string|max:255',
            'isbn'        => 'nullable|string|unique:books,isbn',
            'stock'       => 'required|integer|min:1',
            'description' => 'nullable|string',
            'cover'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Upload cover jika ada
        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        Book::create($data);

        return redirect()->route('admin.books.index')
            ->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Detail buku
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('admin.books.show', compact('book'));
    }

    /**
     * Form edit buku
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('admin.books.edit', compact('book'));
    }

    /**
     * Update data buku
     */
    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'author'      => 'nullable|string|max:255',
            'isbn'        => 'nullable|string|unique:books,isbn,' . $book->id,
            'stock'       => 'required|integer|min:1',
            'description' => 'nullable|string',
            'cover'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Jika ada cover baru
        if ($request->hasFile('cover')) {
            // hapus cover lama jika ada
            if ($book->cover && Storage::disk('public')->exists($book->cover)) {
                Storage::disk('public')->delete($book->cover);
            }
            // simpan cover baru
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $book->update($data);

        return redirect()->route('admin.books.index')
            ->with('success', 'Buku berhasil diperbarui');
    }

    /**
     * Hapus buku
     */
    public function destroy(Book $book)
    {
        // hapus cover dari storage jika ada
        if ($book->cover && Storage::disk('public')->exists($book->cover)) {
            Storage::disk('public')->delete($book->cover);
        }

        $book->delete();

        return redirect()->route('admin.books.index')
            ->with('success', 'Buku berhasil dihapus');
    }
}
