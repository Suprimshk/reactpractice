<?php

namespace App\Http\Controllers;
use App\Models\Service;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function addService(request $req)
    {
        $image=new Service;
        $image->title=$req->input('title');
        $image->description=$req->input('description');
       
      $image->logo=$req->file('logo');
      if($req->hasFile('logo'))
      {
          $image->logo=$req->file('logo')->store('images/service');
            $image->save();
            return $image;
      }
      else
      {
            return response()->json('image null');
      }
    }
   
    function getService()
    {
      $service=Service::all();
      return $service;
    }
    function delService($id)
    {
      $result=Service::where('id',$id)->delete();
      if ($result)
      {
        return["data"=>"product has been deleted"];
      }
    }

    function updateService($id,Request $req)
    {
      $image= Service::find($id);
     if ($req->input('title'))
     {
      $image->title=$req->input('title');
     
     }
     if ($req->input('description'))
     {
      $image->description=$req->input('description');
     
     }
      if ($req->file('logo'))
     { 
      $image->logo=$req->file('logo');
      if($req->hasFile('logo'))
      {
       $image->logo=$req->file('logo')->store('images/service');
      }
     }
   
    $image->save();
    return $image;
}
}
