<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ImageUploadRequest;
use App\Http\Requests\ImageEditRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('adminMiddleware');
        $this->middleware('doNotCreateProfileAgain')->only('create');
        $this->middleware('fillProfileForm')->except(['create', 'store']);
        $this->middleware('profileEdit')->only(['edit', 'update', 'show']);
    }

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
        $your_photo = 'images/your_photos/'.uniqid().$request->your_photo->getClientOriginalExtension();
        $request->your_photo->move(public_path('/images/your_photos'), $your_photo);
        $profile->your_photo = $your_photo;

        //citizenship_front upload
        $citizenship_front = 'images/citizenship_fronts/'.uniqid().$request->citizenship_front->getClientOriginalExtension();
        $request->citizenship_front->move(public_path('/images/citizenship_fronts'), $citizenship_front);
        $profile->citizenship_front = $citizenship_front;

        //citizenship_back upload
        $citizenship_back = 'images/citizenship_backs/'.uniqid().$request->citizenship_back->getClientOriginalExtension();
        $request->citizenship_back->move(public_path('/images/citizenship_backs'), $citizenship_back);
        $profile->citizenship_back = $citizenship_back;

        //marksheet_photo upload
        $marksheet_photo = 'images/marksheet_photos/'.uniqid().$request->marksheet_photo->getClientOriginalExtension();
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
        $profile = Profile::find($id);
        return view('profile.showMyProfile', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        // return $profile;
        $user = User::find(Auth::user()->id);
        // return $user;
        return view('profile.edit', compact('profile', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImageEditRequest $request, $id)
    {
        $profile = Profile::find($id);

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


        $myArray =explode('@', Auth::user()->email);

        //your_photo upload
        if($request->has('your_photo')){
            unlink(public_path('/images/your_photos/'.$profile->your_photo));
            $your_photo = 'your_photo_'.Auth::user()->id.'_'.time().'_'.$myArray[0].'.'.$request->your_photo->getClientOriginalExtension();
            $request->your_photo->move(public_path('/images/your_photos'), $your_photo);
            $profile->your_photo = $your_photo;
        }

        //citizenship_front upload
        if($request->has('citizenship_front')){
            unlink(public_path('/images/citizenship_fronts/'.$profile->citizenship_front));
            $citizenship_front = 'citizenship_front_'.Auth::user()->id.'_'.time().'_'.$myArray[0].'.'.$request->citizenship_front->getClientOriginalExtension();
            $request->citizenship_front->move(public_path('/images/citizenship_fronts'), $citizenship_front);
            $profile->citizenship_front = $citizenship_front;
        }

        //citizenship_back upload
        if($request->has('citizenship_back')){
            unlink(public_path('/images/citizenship_backs/'.$profile->citizenship_back));
            $citizenship_back = 'citizenship_back_'.Auth::user()->id.'_'.time().'_'.$myArray[0].'.'.$request->citizenship_back->getClientOriginalExtension();
            $request->citizenship_back->move(public_path('/images/citizenship_backs'), $citizenship_back);
            $profile->citizenship_back = $citizenship_back;
        }

        //marksheet_photo upload
        if($request->has('marksheet_photo')){
            unlink(public_path('/images/marksheet_photos/'.$profile->marksheet_photo));
            $marksheet_photo = 'marksheet_photo_'.Auth::user()->id.'_'.time().'_'.$myArray[0].'.'.$request->marksheet_photo->getClientOriginalExtension();
            $request->marksheet_photo->move(public_path('/images/marksheet_photos'), $marksheet_photo);
            $profile->marksheet_photo = $marksheet_photo;
        }

        $profile->save();

        return redirect()->route('profile.show', Auth::user()->id)->withStatus('Your information updated!');
    }

    public function apply()
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->has_applied = 1;
        $user->save();

        return redirect('/home')->withStatus('You have applied for the scholarship successfully.');
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