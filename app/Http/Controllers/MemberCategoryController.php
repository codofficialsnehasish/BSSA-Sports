<?php

namespace App\Http\Controllers;

use App\Models\MemberCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class MemberCategoryController extends Controller
{
    //

    public function index()
    {
        $categories = MemberCategory::all();
        return view('members.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')){
            try {
                
                $validator =  Validator::make($request->all(), [
                'name' => 'required|unique:categories,name',
                ]);


                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data = [
                    'name' => $request->name,
                    'fees_amount' => $request->fees_amount,
                    'type' => $request->type,
                    'status' => $request->status,

                ];

            

                $catgory = MemberCategory::create($data);
                if ($catgory->id) {
                    return redirect()->route('admin.member_category.list')->with('success', 'Category Created Successfully.');   
                }

                
                
            } catch (\Exception $e) {
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    
    public function edit( $id)
    {
        
        $data= MemberCategory::find($id);

        return view('members.category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if ($request->isMethod('post')){
            try {
                
                $validator =  Validator::make($request->all(), [
                'name' => 'required|string', Rule::unique('categories', 'name')->ignore($request->id),
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $catgory= MemberCategory::find($request->id);
                if ($catgory) {

                    $catgory->name =$request->name;
                    $catgory->fees_amount = $request->fees_amount;
                    $catgory->type =$request->type;
                    $catgory->status =$request->status;


                
                }
                if ($catgory->save()) {
                    return redirect()->route('admin.member_category.list')->with('success', 'Category Updated Successfully.');   
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
        $data= MemberCategory::find($id);



        
        if (!$data) {
            return redirect()->back()->withErrors(['error' => 'Member Category not found.'])->withInput();
        }

        if ($data->member->isEmpty()) {
            $data->delete();
            return response()->json(['success' => 'Member Category Deleted Successfully']);
        } else {
            return response()->json(['error' => 'You cannot delete this catgory because it has associated members.'], 422);

        }
    }
}
