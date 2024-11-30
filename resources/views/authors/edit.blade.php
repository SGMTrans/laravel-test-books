@extends('layout.app')

@section('content')
<div class="container">
    <h1>Edit Author</h1>
    
    <form action="{{ route('authors.update', $author->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $author->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $author->email) }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Author</button>
        <a href="{{ route('authors.index') }}" class="btn btn-secondary mt-3">Back to Authors</a>
    </form>
</div>
@endsection
