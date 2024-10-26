<?php

namespace App\Http\Controllers;

use App\Models\FeeCategory;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class FeeCategoryController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Delete Fee Category', only: ['destroy']),
            new Middleware('permission:Edit Fee Category', only: ['edit','update']),
            new Middleware('permission:Create Fee Category', only: ['create','store']),
            new Middleware('permission:View Fee Category', only: ['index','show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = FeeCategory::all();
        return view('fee_category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::where('is_visible',1)->get();
        return view('fee_category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')){
            try {
                
                $validator = Validator::make($request->all(), [
                    'category_id' => 'required|exists:categories,id',
                    'name' => 'required|string|max:255',
                    'min_age' => 'required|integer|min:0',  
                    'max_age' => 'required|integer|gte:min_age',  
                    'admission_fees' => 'required|numeric|min:0', 
                    'monthly_fees' => 'required|numeric|min:0', 
                ]);
                


                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data = [
                    'category_id' => $request->category_id,
                    'name' => $request->name,
                    'min_age' => $request->min_age,
                    'max_age' => $request->max_age,
                    'admission_fees' => $request->admission_fees,
                    'monthly_fees' => $request->monthly_fees,
                    'status' => $request->status,
                ];
                $data = FeeCategory::create($data);
                if ($data->id) {
                    return redirect()->route('admin.fee_category.list')->with('success', 'Created Successfully.');   
                }

                
                
            } catch (\Exception $e) {
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        
        $data= FeeCategory::find($id);
        $categories = Categories::where('is_visible',1)->get();
        return view('fee_category.edit',compact('data','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if ($request->isMethod('post')){
            try {
                
                $validator = Validator::make($request->all(), [
                    'category_id' => 'required|exists:categories,id',
                    'name' => 'required|string|max:255',
                    'min_age' => 'required|integer|min:0',  
                    'max_age' => 'required|integer|gte:min_age',  
                    'admission_fees' => 'required|numeric|min:0', 
                    'monthly_fees' => 'required|numeric|min:0',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $data= FeeCategory::find($request->id);
                if ($data) {

                    $data->name =$request->name;
                    $data->category_id =$request->category_id;
                    $data->min_age =$request->min_age;
                    $data->max_age =$request->max_age;
                    $data->admission_fees =$request->admission_fees;
                    $data->monthly_fees =$request->monthly_fees;
                    $data->status =$request->status;

                }
                if ($data->save()) {
                    return redirect()->route('admin.fee_category.list')->with('success', 'Updated Successfully.');   
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
        $data= FeeCategory::find($id);

        if (!$data) {
            return redirect()->back()->withErrors(['error' => 'Fees Category not found.'])->withInput();
            
        }
        if ($data->student->isEmpty()) {
            $data->delete();
            return response()->json(['success' => 'Fees Category Deleted Successfully']);
        } else {
            return response()->json(['error' => 'You cannot delete this catgory because it has associated students.'], 422);

        }
    }
}
