@extends('layouts.boilerplate')

@section('content')
    <h1>Create Category</h1>
    <div class="container mt-4">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

@endsection