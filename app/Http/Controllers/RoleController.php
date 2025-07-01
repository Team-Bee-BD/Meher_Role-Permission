<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('name', 'ASC')->paginate(10);
        return view('roles.list', [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view('roles.create', [
            'permissions' => $permissions

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:roles|min:3'
            ]
        );

        if ($validator->passes()) {

            $role = Role::create((['name' => $request->name]));
            if (!empty($request->permission)) {
                foreach ($request->permission as $name) {
                    $role->givePermissionTo($name);
                }
            }


            return redirect()->route('roles.index')->with('success', 'Role added succesfully . ');
        } else {
            return redirect()->route('roles.create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = $role->permissions->pluck('name');

        return view('roles.edit');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:roles,name,' . $id,
                'id'
            ]
        );

        if ($validator->passes()) {

            // $role = Role::create((['name' => $request->name]));
            $role->name = $request->name;
            $role->save();
            if (!empty($request->permission)) {
                $role->syncPermissions($request->permission);
            } else {
                $role->syncPermissions([]);
            }


            return redirect()->route('roles.index')->with('success', 'Role Updated successfully succesfully . ');
        } else {
            return redirect()->route('roles.edit', $id)->withInput()->withErrors($validator);
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;

        $role = Role::find($id);

        if ($role == null) {

            session()->flash('error', '$role not found');
            return response()->json([
                'status' => false
            ]);
        }
        $role->delete();


        session()->flash('success', '$role Deleted Successfully .');
        return response()->json([
            'status' => True

        ]);
    }
}
