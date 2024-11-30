<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::paginate(10);
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:225',
            'email'=> 'required|email|unique:authors,email',
        ]);

        Author::create($request->all());
        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:225',
            'email' => 'required|email|unique:authors,email,' .$author->id,
        ]);

        $author->update($request->all());
        return redirect()->route('authors.index');
    }
    public function showBooks($authorId)
    {
        // Cari author berdasarkan ID
        $author = Author::findOrFail($authorId);

        // Ambil semua buku yang ditulis oleh author ini
        $books = $author->books;  // Menggunakan relasi books yang sudah didefinisikan di model Author

        // Kirim data author dan books ke view
        return view('authors.books', compact('author', 'books'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        if ($author) {
            $author->delete();
            return redirect()->route('authors.index');
        } else {
            return redirect()->route('authors.index')->with('error', 'Author not found.');
        }
    }
}
