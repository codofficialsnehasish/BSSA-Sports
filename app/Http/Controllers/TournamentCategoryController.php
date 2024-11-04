<?php

namespace App\Http\Controllers;

use App\Models\TournamentCategory;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TournamentCategoryController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Create Tournament Category', only: ['create','store']),
            new Middleware('permission:View Tournament Category', only: ['index','show']),
            new Middleware('permission:Edit Tournament Category', only: ['edit','update']),
            new Middleware('permission:Delete Tournament Category', only: ['destroy']),
        ];
    }


    public function index()
    {
        $tournament_category = TournamentCategory::all();
        return view('tournament_category.index',compact('tournament_category'));
    }

    public function create()
    {
        return view('tournament_category.create');
    }

    public function store(Request $request)
    {
        $tournament_category = new TournamentCategory();
        $tournament_category->name = $request->tournament_category_name;
        $tournament_category->status = $request->status;
        $res = $tournament_category->save();

        if($res){
            return back()->with(['success'=>'Main A/C Category Created Successfully']);
        }else{
            return back()->withErrors(['error'=>'Main A/C Category Not Created']);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $tournament_category = TournamentCategory::find($id);
        return view('tournament_category.edit',compact('tournament_category'));
    }

    public function update(Request $request, string $id)
    {
        $tournament_category = TournamentCategory::find($id);
        $tournament_category->name = $request->tournament_category_name;
        $tournament_category->status = $request->status;
        $res = $tournament_category->update();

        if($res){
            return back()->with(['success'=>'Main A/C Category Updated Successfully']);
        }else{
            return back()->withErrors(['error'=>'Main A/C Category Not Updated']);
        }
    }

    public function destroy(string $id)
    {
        $tournament_category = TournamentCategory::find($id);
        if($tournament_category){
            $res = $tournament_category->delete();

            if($res){
                return back()->with(['success'=>'Main A/C Category Deleted Successfully']);
            }else{
                return back()->withErrors(['error'=>'Main A/C Category Not Deleted']);
            }
        }else{
            return back()->withErrors(['error'=>'Main A/C Category not found']);
        }
    }
}
