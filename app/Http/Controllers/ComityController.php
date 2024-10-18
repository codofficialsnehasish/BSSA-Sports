<?php

namespace App\Http\Controllers;

use App\Models\Comity;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;
class ComityController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comites = Comity::all();
        return view('comity.index',compact('comites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')){
            try {
                
                $validator =  Validator::make($request->all(), [
                    'name' => 'required|string|unique:comities,name',
                ]);


                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data = [
                    'name' => $request->name,
                    'description' => $request->description,
                    'status' => $request->status,
                ];

                $catgory = Comity::create($data);
                if ($catgory->id) {
                    return redirect()->route('admin.comity.list')->with('success', 'Created Successfully.');   
                }

                
                
            } catch (\Exception $e) {
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

  
    public function edit( $id)
    {
        
        $data= Comity::find($id);

        return view('comity.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if ($request->isMethod('post')){
            try {
                
                $validator =  Validator::make($request->all(), [
                'name' => 'required|string', Rule::unique('comities', 'name')->ignore($request->id),
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $data= Comity::find($request->id);
                if ($data) {

                    $data->name =$request->name;
                    $data->description = $request->description;
                    $data->status =$request->status;

                
                }
                if ($data->save()) {
                    return redirect()->route('admin.comity.list')->with('success', 'Updated Successfully.');   
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
        $data= Comity::find($id);

        if (!$data) {
            return redirect()->back()->withErrors(['error' => 'Comity not found.'])->withInput();
            
        }
        if ($data->committee_members->isEmpty()) {
            $data->delete();
            return response()->json(['success' => 'Deleted Successfully']);
        } else {
            return response()->json(['error' => 'You cannot delete this Comity because it has associated members.'], 422);

        }
    }
}
