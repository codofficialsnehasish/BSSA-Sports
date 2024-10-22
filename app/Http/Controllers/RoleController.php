<?php

namespace App\Http\Controllers;

use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller implements HasMiddleware
{
   
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Delete Role', only: ['destroy']),
            new Middleware('permission:Edit Role', only: ['edit','update']),
            new Middleware('permission:Create Role', only: ['create','store']),
            new Middleware('permission:View Role', only: ['index','show']),
            new Middleware('permission:Asign Permission', only: ['addPermissionToRole','givePermissionToRole'])
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::get();
        $permissions = Permission::get();
        return view('role-permission.role.index',compact('roles','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role-permission.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
                $request->validate([
                    'name' => [
                        'required',
                        'string',
                        'unique:roles,name'
                    ]
                ]);

            Role::Create([
                'name' => $request->name
            ]);
            return redirect()->route('roles.index')->with('success','Role Created Successfully');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
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
    public function edit(Role $role)
    {
        return view('role-permission.role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        try{
            $request->validate([
                'name' => [
                    'required',
                    'string',
                    'unique:roles,name,'.$role->id
                ]
            ]);
            $role->update([
                'name' => $request->name
            ]);
            return redirect()->route('roles.index')->with('success','Role Updated Successfully');
        }  catch (ValidationException $e) {
         return redirect()->back()->withErrors($e->errors())->withInput();
      }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success','Role Deleted Successfully');
    }

    public function addPermissionToRole($roleId){
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
                                ->where('role_has_permissions.role_id',$role->id)
                                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                ->all();

        return view('role-permission.role.add-permissions',[
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }

    public function givePermissionToRole(Request $request, $roleId){
        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with('success','Permissions Added to Role Successfully');
    }
}
