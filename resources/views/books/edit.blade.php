@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Buku</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="title" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title) }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="serial_number" class="form-label">Nomor Seri</label>
            <input type="text" class="form-control" id="serial_number" name="serial_number" value="{{ old('serial_number', $book->serial_number) }}" required>
            @error('serial_number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="published_at" class="form-label">Tanggal Terbit</label>
            <input type="date" class="form-control" id="published_at" name="published_at" value="{{ old('published_at', $book->published_at) }}" required>
            @error('published_at')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="author_id" class="form-label">Penulis</label>
            <select class="form-control" id="author_id" name="author_id" required>
                <option value="">Pilih Penulis</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                @endforeach
            </select>
            @error('author_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
