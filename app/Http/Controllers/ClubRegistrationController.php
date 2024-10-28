<?php

namespace App\Http\Controllers;

use App\Models\ClubRegistration;
use App\Models\District;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ClubRegistrationController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:Create Club', only: ['create','store']),
            new Middleware('permission:View Club', only: ['index','show']),
            new Middleware('permission:Edit Club', only: ['edit','update']),
            new Middleware('permission:Delete Club', only: ['destroy']),
        ];
    }

    public function index()
    {
        $club_registrations = ClubRegistration::all();
        return view('club_registration.index',compact('club_registrations'));
    }

    public function create()
    {
        $districts = District::where('state_id',4853)->get();
        return view('club_registration.create',compact('districts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'club_name' => 'required',
            'club_address' => 'nullable',
            'district_id' => 'required|exists:districts,id',
            'contact_no' => 'required|digits:10|regex:/^[6789]/',
            // 'status' => 'required|in:1,0',
        ]);

        $club_registration = new ClubRegistration();
        $club_registration->club_name = $request->club_name;
        $club_registration->club_address = $request->club_address;
        $club_registration->contact_no = $request->contact_no;
        $club_registration->district_id = $request->district_id;
        $res = $club_registration->save();

        if($res){
            return back()->with('success','Club Registered Successfully');
        }else{
            return back()->withErrors(['error'=>'Tournament Not Registered']);
        }
    }

    public function show(ClubRegistration $clubRegistration)
    {
        //
    }

    public function edit(string $id)
    {
        $club_registration = ClubRegistration::find($id);
        $districts = District::where('state_id',4853)->get();
        return view('club_registration.edit',compact('club_registration','districts'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'club_name' => 'required',
            'club_address' => 'nullable',
            'district_id' => 'required|exists:districts,id',
            'contact_no' => 'required|digits:10|regex:/^[6789]/',
            // 'status' => 'required|in:1,0',
        ]);

        $club_registration = ClubRegistration::find($id);
        $club_registration->club_name = $request->club_name;
        $club_registration->club_address = $request->club_address;
        $club_registration->contact_no = $request->contact_no;
        $club_registration->district_id = $request->district_id;
        $res = $club_registration->update();

        if($res){
            return back()->with('success','Club Registration Updated Successfully');
        }else{
            return back()->withErrors(['error'=>'Tournament Registration Not Updated']);
        }
    }

    public function destroy(string $id)
    {
        $club_registration = ClubRegistration::find($id);
        if($club_registration){
            $res = $club_registration->delete();
            if($res){
                return back()->with('success','Club Registration Deleted Successfully');
            }else{
                return back()->withErrors(['error'=>'Club Registration Not Deleted']);
            }
        }
    }
}
