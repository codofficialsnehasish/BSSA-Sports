<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\ClubRegistration;
use App\Models\ClubInTournamet;
use App\Models\Categories;
use App\Models\TournamentCategory;
use App\Models\Transaction;
use App\Models\PlayersInTournamentsClub;
use App\Models\EntryFeesStructure;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TournamentController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Create Tournament', only: ['create','store','process_assign_clubs']),
            new Middleware('permission:View Tournament', only: ['index','show','clubs','player_list']),
            new Middleware('permission:Edit Tournament', only: ['edit','update']),
            new Middleware('permission:Delete Tournament', only: ['destroy']),
        ];
    }

    public function index()
    {
        $tournament = Tournament::all();
        return view('tournament.index',compact('tournament'));
    }

    public function create()
    {
        $categories = Categories::where('is_visible',1)->get();  
        $tournament_categorys = TournamentCategory::where('status',1)->get();
        return view('tournament.create',compact('tournament_categorys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tournament_name' => 'required',
            'tournament_category_id' => 'required|exists:tournament_categories,id',
            // 'tournament_date' => 'required|date',
            'registration_start_date' => 'required|date',
            'registration_end_date' => 'required|date|after_or_equal:registration_start_date',
            'entry_fee' => 'required|numeric',
            'status' => 'required|in:1,0',
        ]);

        $tournament = new Tournament();
        $tournament->tournament_name = $request->tournament_name;
        $tournament->tournament_category_id = $request->tournament_category_id;
        // $tournament->tournament_date = $request->tournament_date;
        $tournament->registration_start_date = $request->registration_start_date;
        $tournament->registration_end_date = $request->registration_end_date;
        $tournament->entry_fee = $request->entry_fee;
        $tournament->status = $request->status;
        $res = $tournament->save();

        foreach($request->fees_name as $key => $value){
            $entry_fees_structure = new EntryFeesStructure();
            $entry_fees_structure->tournaments_id = $tournament->id;
            $entry_fees_structure->name = $value;
            $entry_fees_structure->amount = $request->amount[$key];
            $entry_fees_structure->save();
        }
        // EntryFeesStructure
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
        $categories = Categories::where('is_visible',1)->get(); 
        $tournament_categorys = TournamentCategory::where('status',1)->get();
        $entry_fees_structures = EntryFeesStructure::where('tournaments_id',$tournament->id)->get();
        return view('tournament.edit',compact('tournament','tournament_categorys','entry_fees_structures'));
    }

    public function delete_fees_structure(string $id){
        $entry_fees_structures = EntryFeesStructure::find($id);
        if($entry_fees_structures){
            $res = $entry_fees_structures->delete();
            if($res){
                return back()->with('success','Fees Structure Deleted Successfully');
            }else{
                return back()->withErrors(['error'=>'Fees Structure Not Deleted']);
            }
        }else{
            return back()->withErrors(['error'=>'Fees Structure Not Found']);
        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'tournament_name' => 'required',
            'tournament_category_id' => 'required|exists:tournament_categories,id',
            // 'tournament_date' => 'required|date',
            'registration_start_date' => 'required|date',
            'registration_end_date' => 'required|date|after_or_equal:registration_start_date',
            'entry_fee' => 'required|numeric',
            'status' => 'required|in:1,0',
        ]);

        $tournament = Tournament::find($id);
        $tournament->tournament_name = $request->tournament_name;
        $tournament->tournament_category_id = $request->tournament_category_id;
        // $tournament->tournament_date = $request->tournament_date;
        $tournament->registration_start_date = $request->registration_start_date;
        $tournament->registration_end_date = $request->registration_end_date;
        $tournament->entry_fee = $request->entry_fee;
        $tournament->status = $request->status;
        $res = $tournament->update();

        foreach($request->fees_name as $key => $value){
            $entry_fees_structure = new EntryFeesStructure();
            $entry_fees_structure->tournaments_id = $tournament->id;
            $entry_fees_structure->name = $value;
            $entry_fees_structure->amount = $request->amount[$key];
            $entry_fees_structure->save();
        }

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

    public function clubs(string $id){
        // $club_in_tournamets = ClubInTournamet::join('players_in_tournaments_clubs', 'club_in_tournamets.club_registrations_id', '=', 'players_in_tournaments_clubs.club_registrations_id')
        //         ->select('club_in_tournamets.club_registrations_id', DB::raw('COUNT(players_in_tournaments_clubs.id) AS total_players'))
        //         ->where('club_in_tournamets.tournaments_id', $id)
        //         ->groupBy('club_in_tournamets.id', 'club_in_tournamets.club_registrations_id')
        //         ->get();

        // $club_in_tournamets = ClubInTournamet::leftJoin('players_in_tournaments_clubs', 'club_in_tournamets.club_registrations_id', '=', 'players_in_tournaments_clubs.club_registrations_id')
        //         ->select('club_in_tournamets.club_registrations_id', DB::raw('COUNT(players_in_tournaments_clubs.id) AS total_players'))
        //         ->where('club_in_tournamets.tournaments_id', $id)
        //         ->groupBy('club_in_tournamets.id', 'club_in_tournamets.club_registrations_id')
        //         ->get();
        $club_in_tournamets = ClubInTournamet::leftJoin('players_in_tournaments_clubs', function($join) use ($id) {
            $join->on('club_in_tournamets.club_registrations_id', '=', 'players_in_tournaments_clubs.club_registrations_id')
                    ->where('players_in_tournaments_clubs.tournaments_id', '=', $id);
        })
        ->select('club_in_tournamets.club_registrations_id', DB::raw('COUNT(players_in_tournaments_clubs.id) AS total_players'))
        ->where('club_in_tournamets.tournaments_id', $id)
        ->groupBy('club_in_tournamets.id', 'club_in_tournamets.club_registrations_id')
        ->get();



        // $club_in_tournamets = ClubInTournamet::where('tournaments_id',$id)
        //                                     ->withCount('players')
        //                                     ->get();

        return view('tournament.tournament_clubs',compact('club_in_tournamets'));
    }

    public function player_list($club_registration_id, $tournamet_id){
        $ClubRegistration = ClubRegistration::find($club_registration_id);
        $playersInTournamentsClub  = PlayersInTournamentsClub::where('club_registrations_id',$club_registration_id)->where('tournaments_id',$tournamet_id)->get();
        return view('tournament.player_list',compact('playersInTournamentsClub','ClubRegistration'));
    }

    public function assign_clubs(string $id){
        $clubs = ClubRegistration::all();
        $tournament = Tournament::find($id);
        return view('tournament.assign_club',compact('clubs','tournament'));
    }

    public function invoice(string $club_registration_id, string $tournamet_id){
        $data = ClubInTournamet::where('tournaments_id',$tournamet_id)->where('club_registrations_id',$club_registration_id)->first();
        $entry_fees_structures = EntryFeesStructure::where('tournaments_id',$tournamet_id)->get();
        // d($data);
        return view('tournament.invoice',compact('data','entry_fees_structures'));
    }

    public function process_assign_clubs(Request $request){
        $request->validate([
            'tournament_id' => 'required|exists:tournaments,id',
            'club_id' => 'required|exists:club_registrations,id',
            'payment_mode' => 'required',
            'fee_amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        if(!ClubInTournamet::where('tournaments_id',$request->tournament_id)->where('club_registrations_id',$request->club_id)->exists()){
            $club_in_tournamet = new ClubInTournamet();
            $club_in_tournamet->memo_no = $request->memo_no;
            $club_in_tournamet->tournaments_id = $request->tournament_id;
            $club_in_tournamet->club_registrations_id = $request->club_id;
            $club_in_tournamet->paid_amount = $request->fee_amount;
            $club_in_tournamet->payment_mode = $request->payment_mode;
            $club_in_tournamet->created_at = Carbon::parse($request->date)->format('Y-m-d H:i:s');
            $res = $club_in_tournamet->save();

            if($res){
                $tournament = Tournament::find($request->tournament_id);
                Transaction::create([
                    'transaction_name' => $tournament->category->name,
                    'transaction_category_name' => 'Entry Fee',
                    'amount' => $club_in_tournamet->paid_amount,
                    'remarks' => 'by '.$club_in_tournamet->payment_mode,
                    'transaction_type' => 'credit',
                    'created_at' => $club_in_tournamet->created_at
                ]);
            }
    
            if($res){
                return back()->with('success','Club Added to Tournament Successfully');
            }else{
                return back()->withErrors(['error'=>'Club Not Added to Tournament']);
            }
        }else{
            return back()->withErrors(['error'=>'Club Already Added to Tournament']);
        }

    }
}
