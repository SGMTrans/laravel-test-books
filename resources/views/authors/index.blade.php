@extends('layout.app')

@section('content')
<div class="container">
    <h1>Authors</h1>
    <a href="{{ route('authors.create')  }}" class="btn btn-primary">Add Author</a>

    <div class="list-group mt-3">
        @foreach ($authors as $author)
        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center border mb-2">
            <div>
                <h5 class="mb-1"> {{ $author->name }}</h5>
                <p class="mb-1"> {{ $author->email }}</p>
            </div>
            <div>
                <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('authors.destroy', $author->id)}}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    {{ $authors->links() }}
</div>
@endsection
