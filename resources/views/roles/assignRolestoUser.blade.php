@extends('layouts.boilerplate')

@section('content')
    <h1>Assign Roles to Users</h1>
    <form action="{{ route('roles.assignRolesToUser', $role->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="users">Select User:</label>
            <select name="user" id="user" class="form-control">
                <option value="">---Select User---</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-2">
            <button type="submit" class="btn btn-primary">Assign Role</button>
        </div>

    </form>
@endsection
