<?php

namespace App\Http\Controllers;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    function addEmail(Request $req)
    {
        $email= new Email;
        $email->name=$req->input('name');
        $email->email=$req->input('email');     
        $email->message=$req->input('message');
        $email->subject=$req->input('subject');
        $email->save();
        return $email;
    }
    function getEmail()
{
  $email=Email::all();
  return $email;
}
function delEmail($id)
{
  $result=Email::where('id',$id)->delete();
  if ($result)
  {
    return["data"=>"Email has been deleted"];
  }
}
}

