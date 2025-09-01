@extends('layouts.boilerplate')

@section('content')
    <h1>Role</h1>
    <p><strong>Name:</strong> {{ $role->name }}</p>
    <h1>All Permissions</h1>
    <table class="table mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Permission Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
