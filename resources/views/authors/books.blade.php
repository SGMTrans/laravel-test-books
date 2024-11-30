<!-- resources/views/authors/books.blade.php -->

@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Buku-buku oleh {{ $author->name }}</h1>

        @if($books->isEmpty())
            <p>Author ini belum memiliki buku.</p>
        @else
            <ul>
                @foreach($books as $book)
                    <li>{{ $book->title }} (Terbit: {{ $book->published_at->format('Y') }})</li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('authors.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Author</a>
    </div>
@endsection
