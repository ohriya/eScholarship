<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ImageUploadRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageUploadRequest $request)
    {
        $profile = new Profile();
        
        $profile->id = Auth::user()->id;
        $profile->gender = $request->gender;
        $profile->perma_address = $request->perma_address;
        $profile->dob = $request->dob;
        $profile->phone_number = $request->phone_number;
        $profile->high_school_name = $request->high_school_name;
        $profile->high_school_gpa = $request->high_school_gpa;
        $profile->caste = $request->caste;
        $profile->parent_id = $request->parent_id;
        $profile->user_id = Auth::user()->id;



        //your_photo upload
        $myArray =explode('@', Auth::user()->email);
        $your_photo = 'your_photo_'.Auth::user()->id.'_'.time().'_'.$myArray[0].'.'.$request->your_photo->getClientOriginalExtension();
        $request->your_photo->move(public_path('/images/your_photos'), $your_photo);
        $profile->your_photo = $your_photo;

        //citizenship_front upload
        $citizenship_front = 'citizenship_front_'.Auth::user()->id.'_'.time().'_'.$myArray[0].'.'.$request->citizenship_front->getClientOriginalExtension();
        $request->citizenship_front->move(public_path('/images/citizenship_fronts'), $citizenship_front);
        $profile->citizenship_front = $citizenship_front;

        //citizenship_back upload
        $citizenship_back = 'citizenship_back_'.Auth::user()->id.'_'.time().'_'.$myArray[0].'.'.$request->citizenship_back->getClientOriginalExtension();
        $request->citizenship_back->move(public_path('/images/citizenship_backs'), $citizenship_back);
        $profile->citizenship_back = $citizenship_back;

        //marksheet_photo upload
        $marksheet_photo = 'marksheet_photo_'.Auth::user()->id.'_'.time().'_'.$myArray[0].'.'.$request->marksheet_photo->getClientOriginalExtension();
        $request->marksheet_photo->move(public_path('/images/marksheet_photos'), $marksheet_photo);
        $profile->marksheet_photo = $marksheet_photo;

        $profile->save();
    
        $user  = User::findOrFail(Auth::user()->id);
        $user->profile_id = Auth::user()->id;
        $user->save();

        return redirect()->route('home')->withStatus('Your personal info added successfully!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
