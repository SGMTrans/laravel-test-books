@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Buku</h1>

    <!-- Form Filter Dropdown -->
    <form action="{{ route('books.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-6">
                <select name="author_id" class="form-control" onchange="this.form.submit()">
                    <option value="">Pilih Author</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" 
                            {{ request('author_id') == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    <!-- Button to add new book -->
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-4">Tambah Buku</a>

    <!-- Daftar Buku -->
    <div class="list-group">
        @foreach ($books as $book)
            <div class="list-group-item list-group-item-action border mb-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="mb-1">{{ $book->title }}</h5>
                        <p class="mb-1">Nomor Seri: {{ $book->serial_number }}</p>
                        <p class="mb-1">Penulis: {{ $book->author->name }}</p>
                        <small>Tanggal Terbit: {{ \Carbon\Carbon::parse($book->published_at)->format('d-m-Y') }}</small>
                    </div>
                    <div class="align-self-center">
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination links -->
    {{ $books->links() }}
</div>
@endsection
