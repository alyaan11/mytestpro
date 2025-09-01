@extends('layouts.boilerplate')

@section('content')
        <h1>Roles</h1>
        <a href="{{ route('roles.create') }}" class="btn btn-primary mt-4">Create New Role</a>


        <table class="table mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role Name</th>
                    <th>Assign Role</th>
                    <th>Assign Permissions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        {{-- + --}}
                        <td>
                            <a href="{{ route('roles.assignRolesToUser', $role->id) }}" class="btn btn-sm btn-secondary">Assign Role to User</a>
                        </td>
                        <td>
                            <a href="{{ route('roles.givePermissions', $role->id) }}" class="btn btn-sm btn-info">Give Permissions</a>
                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-primary">view</a>
                        </td>
                        <td>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning">Edit Role</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this role?');">Delete Role</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>




@endsection





















{{-- @section('content')
    <div class="container">
        <h1>Roles</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role Name</th>
                    <th>Permissions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->role_name }}</td>
                        <td>{{ $role->permissions }}</td>
                        <td>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}
