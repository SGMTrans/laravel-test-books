<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Ambil parameter author_id dari query string (jika ada)
    $authorId = $request->input('author_id');

    // Query untuk menampilkan buku, dengan filter berdasarkan author_id jika tersedia
    $books = Book::with('author')
                 ->when($authorId, function($query) use ($authorId) {
                     return $query->where('author_id', $authorId);
                 })
                 ->paginate(10);

    // Ambil daftar authors untuk dropdown filter
    $authors = Author::all();

    return view('books.index', compact('books', 'authors'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:225',
            'serial_number' =>'required|string|unique:books,serial_number',
            'published_at' => 'required|date',
            'author_id' => 'required|exists:authors,id',
        ]);

        Book::create($request->all());
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show()
    // {
        
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:225',
            'serial_number' => 'required|string|unique:books,serial_number,' .$book->id,
            'published_at' => 'required|date',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
