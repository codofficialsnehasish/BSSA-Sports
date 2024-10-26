<?php

namespace App\Http\Controllers;

use App\Models\CommitteeMembers;
use Illuminate\Http\Request;
use App\Models\Members;
use App\Models\Designation;
use Illuminate\Validation\ValidationException;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;
class CommitteeMembersController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            // new Middleware('permission:Delete Comity', only: ['destroy']),
            // new Middleware('permission:Edit Comity', only: ['edit','update']),
            new Middleware('permission:Create Committee Members', only: ['create','store']),
            new Middleware('permission:View Committee Members', only: ['index','show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {

        $committe_id =  $id;
        $commitee_members = CommitteeMembers::with(['member', 'committee'])
        ->where('committee_id', $committe_id)
        ->get();
       
        return view('commitee_members.index',compact('commitee_members','committe_id'));
    }

    public function create($committe_id)
    {
        $members = Members::all();
        $designations = Designation::where('status',1)->get();
        $committe_id =  $committe_id;
        $commitee_members = CommitteeMembers::with(['member', 'committee'])
        ->where('committee_id', $committe_id)
        ->get();
        // d($commitee_members);
        return view('commitee_members.create',compact('members','committe_id','commitee_members','designations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
        if ($request->isMethod('post')){

            // d($request->all());
            try {
                $filteredItems = array_filter($request->selected_members, function($members) {
                    return !empty($members['member_id']);
                });
        
                $request->merge(['selected_members' => $filteredItems]); 
                // d($request->all());
              
                $validator =  Validator::make($request->all(),[
                    'committe_id' => 'required|exists:comities,id',
                    'selected_members' => 'required|array',
                    'selected_members.*.member_id' => 'required|exists:members,id',
                    
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                foreach ($request->selected_members as $member) {
                    CommitteeMembers::updateOrCreate([
                        'committee_id' => $request->committe_id,
                        'member_id' => $member['member_id'],
                    ], [
                        'designation_id' => $member['designation_id'] ?? null,
                    ]);
                }
                return redirect()->back()->with('success', 'Members assigned successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
      
    }

    /**
     * Display the specified resource.
     */
    public function show(CommitteeMembers $committeeMembers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommitteeMembers $committeeMembers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommitteeMembers $committeeMembers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommitteeMembers $committeeMembers)
    {
        //
    }
}
