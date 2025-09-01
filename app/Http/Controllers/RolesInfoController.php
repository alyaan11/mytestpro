<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolesInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);
        $role = Role::create($request->only('name'));
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */

    public function givePermissions(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.givePermissions', compact('role', 'permissions'));
    }



        public function storePermissions(Request $request, Role $role)
        {
            $request->validate([
                'permissions' => 'array',
            ]);

            // Convert IDs from request to Permission models
            $permissions = Permission::whereIn('id', $request->input('permissions', []))->get();

            // Sync role with actual Permission models
            $role->syncPermissions($permissions);

            return redirect()->route('roles.index')->with('success', 'Permissions updated successfully.');
        }

        public function assignRolesToUser(Role $role)
        {
            $users = User::all();
            return view('roles.assignRolesToUser', compact('role', 'users'));
        }

        public function storeAssignedRoles(Request $request, Role $role)
        {
            $validated = $request->validate([
                'user' => 'required|exists:users,id',
            ]);

            // Convert IDs from request to User models
            $user = User::where('id', $validated['user'])->first();

            // Assign role to selected users
            if (!$user->hasRole($role->name)) {
                $user->assignRole($role->name);
                }
            return redirect()->route('roles.index')->with('success', 'Role assigned to user successfully.');
        }

        public function show($id){
            $role = Role::findOrFail($id);

            // All permissions assigned to this role
            $permissions = $role->permissions;

            return view('roles.show', compact('role', 'permissions'));
        }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->only('name'));
        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
