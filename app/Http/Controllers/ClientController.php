<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    function addClient (Request $req)
        {
            $client=new Client;
       
       
      $client->image=$req->file('image');
      if($req->hasFile('image'))
      {
          $client->image=$req->file('image')->store('images\client');
            $client->save();
            return $client;
      }
      else
      {
            return response()->json('image null');
      }
    }
     function getClient()
     {
         $client=Client::all();
         return $client;
     }
     function delClient($id)
     {
         $client=Client::where('id',$id)->delete();
       
         if ($client)
         {
           return["data"=>"Client has been deleted"];
         }
     }
     function updateClient($id,Request $req)
     {
        $client= Client::find($id);
      
        if ($req->file('image'))
       { 
        $client->image=$req->file('image');
        if($req->hasFile('image'))
        {
         $client->image=$req->file('image')->store('images\client');
        }
       }
     
      $client->save();
      return $client;
  }
            
    
   
}
