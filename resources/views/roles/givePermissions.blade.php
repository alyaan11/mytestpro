@extends('layouts.boilerplate')

@section('content')
    <div class="container">
        <h1>Give Permissions to Role: {{ $role->name }}</h1>

        <form action="{{ route('roles.storePermissions', $role->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Select Permissions</label>
                <div class="row">
                    @foreach ($permissions as $permission)
                        <div class="col-md-3">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="permissions[]"
                                    value="{{ $permission->id }}"
                                    id="perm_{{ $permission->id }}"
                                    {{ $role->permissions->contains('id', $permission->id) ? 'checked' : '' }}>

                                <label class="form-check-label" for="perm_{{ $permission->id }}">
                                    {{ ucfirst($permission->name) }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Assign Permissions</button>
        </form>
    </div>
@endsection


