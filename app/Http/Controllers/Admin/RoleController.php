<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Requests\Admin\StoreRoleRequest;
use App\Http\Requests\Admin\UpdateRoleRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $permissions = Permission::orderBy('name', 'asc')->pluck('name', 'id');
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $role = Role::create($request->validated());
        $role->permissions()->attach($request->permissions);

        return redirect(route('admin.roles.index'))->with('status', 'Role Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role): View
    {
        return view('admin.roles.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        $permission_ids = [];
        foreach ($role->permissions as $permission) {
            $permission_ids[] = $permission->id;
        }
        $permissions = Permission::orderBy('name', 'asc')->pluck('name', 'id');
        return view('admin.roles.edit', ['role' => $role, 'permissions' => $permissions, 'permission_ids' => $permission_ids]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        $role->update($request->validated());
        $role->permissions()->sync($request->permissions);

        return redirect(route('admin.roles.index'))->with('status', 'Role Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();
 
        return back()->with('status', 'Role Deleted Successfully');
    }
}
