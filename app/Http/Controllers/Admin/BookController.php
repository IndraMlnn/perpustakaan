<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $data = $request->validate([
            'title' => 'required',
            'author' => 'nullable|string',
            'isbn' => 'nullable|unique:books',
            'stock' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        Book::create($data);

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
         return view('admin.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book,)
    {
          $data = $request->validate([
            'title' => 'required',
            'author' => 'nullable|string',
            'isbn' => 'nullable|unique:books,isbn,' . $book->id,
            'stock' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $book->update($data);

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil dihapus');
    }
}
