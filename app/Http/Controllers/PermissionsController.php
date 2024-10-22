<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Validation\ValidationException;
//use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Delete Permission', only: ['destroy']),
            new Middleware('permission:Edit Permission', only: ['edit','update']),
            new Middleware('permission:Create Permission', only: ['create','store']),
            new Middleware('permission:View Permission', only: ['index','show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::get();
        return view('role-permission.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role-permission.permission.create');
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
                'unique:permissions,name'
            ]
        ]);
        Permission::Create([
            'name' => $request->name
        ]);
         return redirect()->route('permissions.index')->with('success','Permission Created Successfully');
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
    public function edit(Permission $permission)
    {
        return view('role-permission.permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
            try{
                $request->validate([
                    'name' => [
                        'required',
                        'string',
                        'unique:permissions,name,'.$permission->id
                    ]
                ]);
                $permission->update([
                    'name' => $request->name
                ]);
                return redirect()->route('permissions.index')->with('success','Permission Updated Successfully');
            } catch (ValidationException $e) {
                return redirect()->back()->withErrors($e->errors())->withInput();
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->route('permissions.index')->with('success','Permission Deleted Successfully');
    }
}
