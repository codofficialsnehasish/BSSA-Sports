<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class CategoriesController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Delete Category', only: ['destroy']),
            new Middleware('permission:Edit Category', only: ['edit','update']),
            new Middleware('permission:Create Category', only: ['create','store']),
            new Middleware('permission:View Category', only: ['index','show']),
        ];
    }

    public function index()
    {
        $categories = Categories::all();
        return view('category.index',compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

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
                    'slug' => Str::slug($request->name),
                    'is_visible' => $request->is_visible,

                ];

            

                $catgory = Categories::create($data);
                if ($catgory->id) {
                    return redirect()->route('admin.category.list')->with('success', 'Category Created Successfully.');   
                }

                
                
            } catch (\Exception $e) {
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    public function show(Categories $categories)
    {
        //
    }

    public function edit( $id)
    {
        
        $data= Categories::find($id);

        return view('category.edit',compact('data'));
    }

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
                $catgory= Categories::find($request->id);
                if ($catgory) {

                    $catgory->name =$request->name;
                    $catgory->slug =Str::slug($request->name);
                    $catgory->is_visible =$request->is_visible;

                
                }
                if ($catgory->save()) {
                    return redirect()->route('admin.category.list')->with('success', 'Category Updated Successfully.');   
                }

                
                
            } catch (\Exception $e) {
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    public function destroy($id)
    {
        $catgory= Categories::find($id);



        
        if (!$catgory) {
            return redirect()->back()->withErrors(['error' => 'Category not found.'])->withInput();
            
        }

        if ($catgory) {
            $catgory->delete();

            return response()->json(['success' => 'Category Deleted Successfully']);
        } else {
            return response()->json(['error' => 'You cannot delete this catgory because it has associated members.'], 422);

        }
    }
}
