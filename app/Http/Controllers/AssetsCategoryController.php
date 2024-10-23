<?php

namespace App\Http\Controllers;

use App\Models\AssetsCategory;
use Illuminate\Http\Request;

class AssetsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets_categorys = AssetsCategory::all();
        return view('assets-category.index',compact('assets_categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assets-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(AssetsCategory $assetsCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $assets_category = AssetsCategory::find($id);
        return view('assets-category.edit',compact('assets_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $assets_category = AssetsCategory::find($id);
        $assets_category->name = $request->name;
        $assets_category->visiblity = $request->status;
        $res = $assets_category->update();

        if($res){
            return back()->with(['success'=>'Update Successfully']);
        }else{
            return back()->with(['success'=>'Not Updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assets_category = AssetsCategory::find($id);
        $res = $assets_category->delete();

        if($res){
            return back()->with(['success'=>'Deleted Successfully']);
        }else{
            return back()->with(['success'=>'Not Deleted']);
        }
    }
}
