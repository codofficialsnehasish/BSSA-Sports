<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expense_categorys = ExpenseCategory::all();
        return view('expense-category.index',compact('expense_categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expense-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $expense_categorys = new ExpenseCategory();
        $expense_categorys->name = $request->name;
        $expense_categorys->visiblity = $request->status;
        $res = $expense_categorys->save();

        if($res){
            return back()->with(['success'=>'Added Successfully']);
        }else{
            return back()->with(['success'=>'Not Added']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpenseCategory $expenseCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $expense_category = ExpenseCategory::find($id);
        return view('expense-category.edit',compact('expense_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $expense_categorys = ExpenseCategory::find($id);
        $expense_categorys->name = $request->name;
        $expense_categorys->visiblity = $request->status;
        $res = $expense_categorys->update();

        if($res){
            return back()->with(['success'=>'Updated Successfully']);
        }else{
            return back()->with(['success'=>'Not Updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expense_categorys = ExpenseCategory::find($id);
        $res = $expense_categorys->delete();

        if($res){
            return back()->with(['success'=>'Deleted Successfully']);
        }else{
            return back()->with(['success'=>'Not Deleted']);
        }
    }
}
