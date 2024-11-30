@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-white">Daftar Buku</h1>

    <!-- Form Filter Dropdown -->
    <form action="{{ route('books.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-6">
                <select name="author_id" class="form-control text-white bg-dark" onchange="this.form.submit()">
                    <option value="">Pilih Author</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" 
                            {{ request('author_id') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    <!-- Button to add new book -->
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-4">Tambah Buku</a>

    <!-- Daftar Buku -->
    <table class="table table-hover text-white">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Nomor Seri</th>
                <th scope="col">Penulis</th>
                <th scope="col">Tanggal Terbit</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <th scope="row" class="number-cell">{{ $loop->iteration }}</th>
                    <td class="title-cell bg-danger">{{ $book->title }}</td>
                    <td class="serial-number">{{ $book->serial_number }}</td>
                    <td>
                        <!-- Penulis dan Email -->
                        <div class="author-info">
                            <div class="author-name">{{ $book->author->name }}</div>
                            <div class="author-email">{{ $book->author->email }}</div>
                        </div>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($book->published_at)->format('d-m-Y') }}</td>
                    <td>
                        <!-- Tombol Edit dan Delete -->
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination links -->
    {{ $books->links() }}
</div>
@endsection

@section('styles')
    <style>
        /* Styling untuk Nomor dengan Border Bulat */
        .number-cell {
            width: 35px;
            height: 35px;
            border: 2px solid #007bff; /* Biru */
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f8ff; /* Warna latar belakang */
            font-weight: bold;
        }

        /* Styling untuk Judul Buku dengan Background Merah dan Ukuran Box lebih Kecil */
        .title-cell {
            background-color: #ff4d4d; /* Merah */
            padding: 5px 10px;
            max-width: 250px;
            word-wrap: break-word;
            text-align: center;
            margin: 0 auto;
            font-size: 14px;
            font-weight: bold;
        }

        /* Styling untuk Nomor Seri dengan Font Kecil dan Border Silver */
        .serial-number {
            font-size: 13px;
            border: 1px solid silver;
            padding: 3px;
            background-color: #f9f9f9;
            text-align: center;
        }

        /* Styling untuk Penulis */
        .author-info {
            text-align: center; /* Memusatkan semua isi */
        }

        .author-name {
            font-size: 16px; /* Ukuran font lebih besar untuk nama penulis */
            font-weight: bold;
        }

        .author-email {
            font-size: 12px; /* Ukuran font lebih kecil untuk email penulis */
            font-weight: normal;
            color: #6c757d; /* Warna lebih pudar untuk email */
        }
    </style>
@endsection
