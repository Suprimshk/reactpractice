<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    function addTeam (Request $req)
    {
        $team=new Team;
        $team->name=$req->input('name');
        $team->role=$req->input('role');
        $team->image=$req->file('image');
        if($req->hasFile('image'))
  {
      $team->image=$req->file('image')->store('images\team');
        $team->save();
        return $team;
  }
  else
  {
        return response()->json('image null');
  }
}
function getTeam()
{
      $team=Team::all();
      return $team;
}
function delTeam($id)
{
  $result=Team::where('id',$id)->delete();
  if ($result)
  {
    return["data"=>"product has been deleted"];
  }
}

function updateTeam($id,Request $req)
{
  $team= Team::find($id);
 if ($req->input('name'))
 {
  $team->name=$req->input('name');
 
 }
 if ($req->input('role'))
 {
  $team->role=$req->input('role');
 }
 
  if ($req->file('image'))
 { 
  $team->image=$req->file('image');
  if($req->hasFile('image'))
  {
   $team->image=$req->file('image')->store('images\team');
  }
 }

$team->save();
return $team;
}
}
