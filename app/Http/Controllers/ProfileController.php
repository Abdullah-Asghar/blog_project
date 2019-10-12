<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\file;
use Illuminate\Support\Facades\URL;
use App\profile;
use Auth;

class ProfileController extends Controller
{
   public function profile(){
   	return view('profiles.profile');
   }

   public function addProfile(Request $request){
  $this->validate($request , [
     'name' =>'required',
     'designation' => 'required',
     'profile_pic' => 'required'
  ]);

  $profiles = new profile;
  $profiles->name = $request->input('name');
  $profiles->user_id = Auth::user()->id;
  $profiles->designation = $request->input('designation');
  // images paths code
  if (Input::hasfile('profile_pic')) {
  	$file = Input::file('profile_pic');
  	$file->move(public_path().'/uploads',
$file->getClientOriginalName());
  	$url = URL::to("/").'/uploads/' . $file->getClientOriginalName();
  }
  // till here
  $profiles->profile_pic = $url;
  $profiles->save();
  return redirect('/home')->with('response','Profile Added Successfully');
   }
}
