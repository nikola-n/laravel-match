<?php

namespace App\Http\Controllers;

use App\Team;
use App\Match;
use App\Player;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $teams = Team::all();
        $players = Player::all();
        $matches = Match::all();
        return view('admin',compact('teams','players','matches'));
    }

    public function teams()
    {
        return view('teams');
    }
    public function showTeams()
    {
        $teams = Team::all();
       return view('teams_view',compact('teams'));
    }
    public function storeTeam(Request $request)
    {
        $team = new Team();
        $team->name = $request->name;
        $team->year_founded =$request->year_founded;
        $team->save();

        return redirect()->route('showTeams');
    }
    public function editTeams($id)
    {
        $teams = Team::where('id',$id)->first();
        if($teams)
        {
            return view('teams_edit',compact('teams'));
        }else {
            return redirect()->route('team');
        }
    }
    public function updateTeams(Request $request, $id)
    {
        $team = Team::where('id',$id)->first();
        if($team)
        {
            $team->name = $request->name;
            $team->year_founded =$request->year_founded;
            $team->save();
            return redirect()->route('showTeams');
        }else {
            return back();
        }
    }
    public function deleteTeams($id)
    {
        Team::where('id',$id)->delete();

        return redirect()->route('showTeams');
    }


    public function players()
    {
        $teams = Team::all();
        return view('players',compact('teams'));
    }
    public function showPlayers()
    {
        $players = Player::with('teams')->get();
        return view('players_view',compact('players'));

    }
    public function storePlayers(Request $request)
    {
        $player = new Player();
        $player->name = $request->name;
        $player->date_of_birth =$request->date_of_birth;
        $player->teams_id=$request->teams_id;
        $player->save();

        return redirect()->route('showPlayers');
    }
    public function editPlayers($id)
    {
        $teams = Team::all();
        $players = Player::where('id',$id)->first();
        if($players)
        {
            return view('players_edit',compact('players','teams'));
        }else {
            return redirect()->route('player');
        }
    }
    public function updatePlayers(Request $request, $id)
    {
        $players = Player::where('id',$id)->first();
        if($players)
        {
            $players->name = $request->name;
            $players->date_of_birth =$request->date_of_birth;
            $players->teams_id=$request->teams_id;
            $players->save();
            return redirect()->route('showPlayers');
        }else {
            return back();
        }
    }
    public function deletePlayers($id)
    {
        Player::where('id',$id)->delete();

        return redirect()->route('showPlayers');
    }

    public function matches()
    {
        $teams = Team::all();
        return view('matches',compact('teams'));
    }
    public function showMatches()
    {
        $matches = Match::all();
        return view('admin',compact('matches'));
    }
    public function storeMatches(Request $request)
    {
        $match = new Match();
        $match->team1_id = $request->team1_id;
        $match->team2_id =$request->team2_id;
        $match->date=$request->date;
        if($match->team1_id != $match->team2_id)
        {
            $match->save();
            return redirect()->route('showMatches');
        }else {
            return redirect()->route('matches')->with('error', 'Choose different teams');
        }
    }
}
