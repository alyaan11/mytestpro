@extends('layouts.boilerplate')

@section('content')
    <h1>User Details</h1>
    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to Users</a>
@endsection
