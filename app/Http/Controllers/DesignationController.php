<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;
class DesignationController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Delete Designation', only: ['destroy']),
            new Middleware('permission:Edit Designation', only: ['edit','update']),
            new Middleware('permission:Create Designation', only: ['create','store']),
            new Middleware('permission:View Designation', only: ['index','show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designations = Designation::all();
        return view('designations.index',compact('designations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('designations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')){
            try {
                
                $validator =  Validator::make($request->all(), [
                    'name' => 'required|string|unique:designations,name',
                ]);


                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data = [
                    'name' => $request->name,
                    'description' => $request->description,
                    'status' => $request->status,
                ];

                $catgory = Designation::create($data);
                if ($catgory->id) {
                    return redirect()->route('admin.designations.list')->with('success', 'Created Successfully.');   
                }

                
                
            } catch (\Exception $e) {
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

  
    public function edit( $id)
    {
        
        $data= Designation::find($id);

        return view('designations.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if ($request->isMethod('post')){
            try {
                
                $validator =  Validator::make($request->all(), [
                'name' => 'required|string', Rule::unique('designations', 'name')->ignore($request->id),
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $data= Designation::find($request->id);
                if ($data) {

                    $data->name =$request->name;
                    $data->description = $request->description;
                    $data->status =$request->status;

                
                }
                if ($data->save()) {
                    return redirect()->route('admin.designations.list')->with('success', 'Updated Successfully.');   
                }

                
                
            } catch (\Exception $e) {
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data= Designation::find($id);

        if (!$data) {
            return redirect()->back()->withErrors(['error' => 'Designation not found.'])->withInput();
            
        }

        if ($data->committee_members->isEmpty()) {
            $data->delete();
            return response()->json(['success' => 'Deleted Successfully']);
        } else {
            return response()->json(['error' => 'You cannot delete this designation it has associated members.'], 422);

        }
    }
}
