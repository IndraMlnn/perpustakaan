<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function __construct(){
        $this->middleware(['auth','role:admin'])->except(['index','show']);
    }

    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data = $request->validate([
            'title'=>'required|string|max:255',
            'author'=>'nullable|string|max:255',
            'isbn'=>'nullable|string|max:30|unique:books,isbn',
            'stock'=>'required|integer|min:1',
            'description'=>'nullable|string',
        ]);
        Book::create($data);
        return redirect()->route('books.index')->with('ok','Buku dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book = Book::findOrFail($book->id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
         $data = $request->validate([
            'title'=>'required',
            'author'=>'nullable',
            'isbn'=>"nullable|string|max:30|unique:books,isbn,{$book->id}",
            'stock'=>'required|integer|min:1',
            'description'=>'nullable',
        ]);
        $book->update($data);
        return redirect()->route('books.index')->with('ok','Buku diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return back()->with('ok','Buku dihapus');
    }
}
