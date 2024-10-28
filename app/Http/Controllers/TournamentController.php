<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\ClubRegistration;
use App\Models\ClubInTournamet;
use App\Models\PlayersInTournamentsClub;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

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
        $request->validate([
            'tournament_name' => 'required',
            'tournament_date' => 'required|date',
            'registration_start_date' => 'required|date|before:tournament_date',
            'registration_end_date' => 'required|date|before_or_equal:tournament_date|after_or_equal:registration_start_date',
            'entry_fee' => 'required|numeric',
            'status' => 'required|in:1,0',
        ]);

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
        $request->validate([
            'tournament_name' => 'required',
            'tournament_date' => 'required|date',
            'registration_start_date' => 'required|date|before:tournament_date',
            'registration_end_date' => 'required|date|before_or_equal:tournament_date|after_or_equal:registration_start_date',
            'entry_fee' => 'required|numeric',
            'status' => 'required|in:1,0',
        ]);

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

    public function clubs(string $id){
        // $club_in_tournamets = ClubInTournamet::join('players_in_tournaments_clubs', 'club_in_tournamets.club_registrations_id', '=', 'players_in_tournaments_clubs.club_registrations_id')
        //         ->select('club_in_tournamets.club_registrations_id', DB::raw('COUNT(players_in_tournaments_clubs.id) AS total_players'))
        //         ->where('club_in_tournamets.tournaments_id', $id)
        //         ->groupBy('club_in_tournamets.id', 'club_in_tournamets.club_registrations_id')
        //         ->get();

        $club_in_tournamets = ClubInTournamet::leftJoin('players_in_tournaments_clubs', 'club_in_tournamets.club_registrations_id', '=', 'players_in_tournaments_clubs.club_registrations_id')
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
        $playersInTournamentsClub  = PlayersInTournamentsClub::where('club_registrations_id',$club_registration_id)->where('tournaments_id',$tournamet_id)->get();
        return view('tournament.player_list',compact('playersInTournamentsClub'));
    }

    public function assign_clubs(string $id){
        $clubs = ClubRegistration::all();
        $tournament = Tournament::find($id);
        return view('tournament.assign_club',compact('clubs','tournament'));
    }

    public function process_assign_clubs(Request $request){
        $request->validate([
            'tournament_id' => 'required|exists:tournaments,id',
            'club_id' => 'required|exists:club_registrations,id',
            'payment_mode' => 'required',
            'fee_amount' => 'required|numeric',
        ]);

        if(!ClubInTournamet::where('tournaments_id',$request->tournament_id)->where('club_registrations_id',$request->club_id)->exists()){
            $club_in_tournamet = new ClubInTournamet();
            $club_in_tournamet->tournaments_id = $request->tournament_id;
            $club_in_tournamet->club_registrations_id = $request->club_id;
            $club_in_tournamet->paid_amount = $request->fee_amount;
            $club_in_tournamet->payment_mode = $request->payment_mode;
            $res = $club_in_tournamet->save();
    
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
