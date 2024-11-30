@extends('layout.app')

@section('content')
<div class="container">
    <h1>Create New Author</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('authors.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="Email" class="form-control" id="email" name="email"  value="{{ old('email') }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save Author</button>
    </form>
</div>
@endsection