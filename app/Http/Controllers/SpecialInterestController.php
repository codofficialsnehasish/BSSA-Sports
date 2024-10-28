<?php

namespace App\Http\Controllers;

use App\Models\SpecialInterest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class SpecialInterestController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Create Special Interest', only: ['create','store']),
            new Middleware('permission:View Special Interest', only: ['index','show']),
            new Middleware('permission:Edit Special Interest', only: ['edit','update']),
            new Middleware('permission:Delete Special Interest', only: ['destroy']),
        ];
    }

    public function index()
    {
        $special_interests = SpecialInterest::all();
        return view('special_interest.index',compact('special_interests'));
    }

    public function create()
    {
        return view('special_interest.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'special_interest_name' => 'required'
        ]);

        $special_interest = new SpecialInterest();
        $special_interest->name = $request->special_interest_name;
        $special_interest->status = $request->status;
        $res = $special_interest->save();

        if($res){
            return back()->with(['success'=>'Special Interest Created Successfully']);
        }else{
            return back()->withErrors(['error'=>'Special Interest Not Created']);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $special_interest = SpecialInterest::find($id);
        return view('special_interest.edit',compact('special_interest'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'special_interest_name' => 'required'
        ]);

        $special_interest = SpecialInterest::find($id);
        $special_interest->name = $request->special_interest_name;
        $special_interest->status = $request->status;
        $res = $special_interest->update();

        if($res){
            return back()->with(['success'=>'Special Interest Updated Successfully']);
        }else{
            return back()->withErrors(['error'=>'Special Interest Not Updated']);
        }
    }

    public function destroy(string $id)
    {
        $special_interest = SpecialInterest::find($id);
        if($special_interest){
            $res = $special_interest->delete();

            if($res){
                return back()->with(['success'=>'Special Interest Deleted Successfully']);
            }else{
                return back()->withErrors(['error'=>'Special Interest Not Deleted']);
            }
        }else{
            return back()->withErrors(['error'=>'Special Interest not found']);
        }
    }
}
