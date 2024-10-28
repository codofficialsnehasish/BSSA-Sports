<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Tournament;
use App\Models\ClubRegistration;
use App\Models\ClubInTournamet;
use App\Models\District;
use App\Models\Media;
use App\Models\PlayersInTournamentsClub;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Validator;

class Sitecontroller extends Controller
{
    public function player_entry_form(){

        $clubs = ClubRegistration::all();
        $districts = District::where('state_id',4853)->get();
        return view('site.player-registration',compact('clubs','districts'));
    }

    public function get_tournaments_by_club_id(Request $request){
        $tournaments = ClubInTournamet::leftjoin('tournaments','club_in_tournamets.tournaments_id','tournaments.id')
                                    ->whereDate('tournaments.registration_start_date', '<=', Carbon::today())
                                    ->whereDate('tournaments.registration_end_date', '>=', Carbon::today())
                                    ->where('club_registrations_id',$request->club_id)
                                    ->get();
        return response()->json($tournaments);
    }

    public function process_player_entry_form(Request $request){
        $validator =  Validator::make($request->all(), [
            'club_id' => 'required|exists:club_registrations,id',
            'tournament_id' => 'required|exists:tournaments,id',
            'player_name' => 'required|string|regex:/^[A-Za-z\s]+$/|max:255',
            'player_father_name' => 'required|string|regex:/^[A-Za-z\s]+$/|max:255',
            'phone_number' => [
                'required',
                'digits:10',
                'regex:/^[6789]/',
                Rule::unique('players_in_tournaments_clubs')->where(function ($query) use ($request) {
                    return $query->where('tournaments_id', $request->tournament_id)
                                ->where('club_registrations_id', $request->club_id);
                }),
            ],
            'whatsapp_number' => [
                'nullable',
                'digits:10',
                'regex:/^[6789]/',
                Rule::unique('players_in_tournaments_clubs')->where(function ($query) use ($request) {
                    return $query->where('tournaments_id', $request->tournament_id)
                                ->where('club_registrations_id', $request->club_id);
                }),
            ],
            'dob' => 'required|date',
            'age' => 'required|integer',
            // 'aadhar_number' => 'required|string|max:12',
            'aadhar_number' => [
                'required',
                'digits:12',
                Rule::unique('players_in_tournaments_clubs')->where(function ($query) use ($request) {
                    return $query->where('tournaments_id', $request->tournament_id)
                                ->where('club_registrations_id', $request->club_id);
                }),
            ],
            'address' => 'nullable|string|max:500',
            'district_id' => 'required|exists:districts,id',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if(PlayersInTournamentsClub::where('club_registrations_id',$request->club_id)->where('tournaments_id',$request->tournament_id)->count() > 18){
            return response()->json(['errors' => 'Already 18 Players avaliable, we not accept any application'], 422);
        }

        $players_in_tournaments_club = new PlayersInTournamentsClub();
        $players_in_tournaments_club->club_registrations_id = $request->club_id;
        $players_in_tournaments_club->tournaments_id = $request->tournament_id;
        $players_in_tournaments_club->player_name = $request->player_name;
        $players_in_tournaments_club->father_name = $request->player_father_name;
        $players_in_tournaments_club->phone_number = $request->player_phone;
        $players_in_tournaments_club->whatsapp_number = $request->whatsapp_number;
        $players_in_tournaments_club->date_of_birth = $request->dob;
        $players_in_tournaments_club->age = $request->age;
        $players_in_tournaments_club->aadhar_number = $request->aadhar_number;
        $players_in_tournaments_club->address = $request->address;
        $players_in_tournaments_club->district_id = $request->district_id;
        // $players_in_tournaments_club->profile_image = 0;

        if ($request->hasFile('profile_image')) {

            $currentYear = date('Y');
            $currentMonth = date('m');
            $directoryPath = "uploads/media/{$currentYear}/{$currentMonth}";

            $fileName = hexdec(uniqid()) . '.' . $request->profile_image->getClientOriginalExtension();
            $filePath = $request->file('profile_image')->storeAs($directoryPath, $fileName, 'public');
            // $fileName = $request->file('aadhar_proof')->getClientOriginalName();

            $media = Media::create([
                'file_type' => 'image',
                'file_name' => $fileName,
                'file_path' => $filePath,
                'status' => 1,
            ]);

            $players_in_tournaments_club->profile_image = $media->id;
        }

        $res = $players_in_tournaments_club->save();

        if ($res) {
            return response()->json(['message' => 'Player Registered Successfully'], 201);
        } else {
            return response()->json(['error' => 'Player not Registered, Try Again'], 500);
        }

        // if($res){
        //     return back()->with('success','Player Registred Successfully');
        // }else{
        //     return back()->withErrors(['error'=>'Player not Registred, Try Again']);
        // }
    }
}
