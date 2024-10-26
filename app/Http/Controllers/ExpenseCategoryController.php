<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Delete Expense Category', only: ['destroy']),
            new Middleware('permission:Edit Expense Category', only: ['edit','update']),
            new Middleware('permission:Create Expense Category', only: ['create','store']),
            new Middleware('permission:View Expense Category', only: ['index','show']),
        ];
    }
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
            return back()->withErrors(['error'=>'Not Added']);
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
            return back()->withErrors(['error'=>'Not Updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expense_categorys = ExpenseCategory::find($id);
        if($expense_categorys->expenses->isEmpty()){

            $res = $expense_categorys->delete();
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
