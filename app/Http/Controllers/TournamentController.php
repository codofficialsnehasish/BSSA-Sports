<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index()
    {
        $tournament = Tournament::all();
        return view('tournament.index',compact('tournament'));
    }

    public function create()
    {
        return view('tournament.create');
    }

    public function store(Request $request)
    {
        $tournament = new Tournament();
        $tournament->tournament_name = $request->tournament_name;
        $tournament->tournament_date = $request->tournament_date;
        $tournament->registration_start_date = $request->registration_start_date;
        $tournament->registration_end_date = $request->registration_end_date;
        $tournament->entry_fee = $request->entry_fee;
        $tournament->status = $request->status;
        $res = $tournament->save();
        if($res){
            return back()->with('success','Tournament Added Successfully');
        }else{
            return back()->withErrors(['error'=>'Tournament Not Added']);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $tournament = Tournament::find($id);
        return view('tournament.edit',compact('tournament'));
    }

    public function update(Request $request, string $id)
    {
        $tournament = Tournament::find($id);
        $tournament->tournament_name = $request->tournament_name;
        $tournament->tournament_date = $request->tournament_date;
        $tournament->registration_start_date = $request->registration_start_date;
        $tournament->registration_end_date = $request->registration_end_date;
        $tournament->entry_fee = $request->entry_fee;
        $tournament->status = $request->status;
        $res = $tournament->update();
        if($res){
            return back()->with('success','Tournament Updated Successfully');
        }else{
            return back()->withErrors(['error'=>'Tournament Not Updated']);
        }
    }

    public function destroy(string $id)
    {
        $tournament = Tournament::find($id);
        if($tournament){
            $res = $tournament->delete();
            if($res){
                return back()->with('success','Tournament Deleted Successfully');
            }else{
                return back()->withErrors(['error'=>'Tournament Not Deleted']);
            }
        }else{
            return back()->withErrors(['error'=>'Tournament Not Found']);
        }
    }
}
