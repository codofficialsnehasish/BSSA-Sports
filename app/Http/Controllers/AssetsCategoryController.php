<?php

namespace App\Http\Controllers;

use App\Models\AssetsCategory;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AssetsCategoryController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Delete Asset Category', only: ['destroy']),
            new Middleware('permission:Edit Asset Category', only: ['edit','update']),
            new Middleware('permission:Create Asset Category', only: ['create','store']),
            new Middleware('permission:View Asset Category', only: ['index','show']),
        ];
    }

    public function index()
    {
        $assets_categorys = AssetsCategory::all();
        return view('assets-category.index',compact('assets_categorys'));
    }

    public function create()
    {
        return view('assets-category.create');
    }

    public function store(Request $request)
    {
        $assets_category = new AssetsCategory();
        $assets_category->name = $request->name;
        $assets_category->visiblity = $request->status;
        $res = $assets_category->save();

        if($res){
            return back()->with(['success'=>'Added Successfully']);
        }else{
            return back()->with(['success'=>'Not Added']);
        }
    }

    public function show(AssetsCategory $assetsCategory)
    {
        //
    }

    public function edit(string $id)
    {
        $assets_category = AssetsCategory::find($id);
        return view('assets-category.edit',compact('assets_category'));
    }

    public function update(Request $request, string $id)
    {
        $assets_category = AssetsCategory::find($id);
        $assets_category->name = $request->name;
        $assets_category->visiblity = $request->status;
        $res = $assets_category->update();

        if($res){
            return back()->with(['success'=>'Update Successfully']);
        }else{
            return back()->withErrors(['error'=>'Not Updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assets_category = AssetsCategory::find($id);
        if($assets_category->assets->isEmpty()){
            $res = $assets_category->delete();
    
            if($res){
                return back()->with(['success'=>'Deleted Successfully']);
            }else{
                return back()->withErrors(['error'=>'Not Deleted']);
            }
        }else{
            return back()->withErrors(['error'=>'This Category cannot be deleted']);
        }
    }
}
