<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('studentMiddleware');
        $this->middleware('doNotCreateProfileAgain')->only('create');
        $this->middleware('fillProfileForm')->except(['create', 'store']);
        $this->middleware('profileEdit')->only(['edit', 'update', 'show']);
    }

    public function showUsers(){
        $users = User::all();
        // return $users;
        return view('admin.showUsers', compact('users'));
    }

    public function showOneUser($user_id){
        // return $user_id;
        $user = User::find($user_id);
        return view('admin.showOneUser', compact('user'));
    }

    public function showApplicants(){
        $profiles = Profile::all();
        return view('admin.showApplicants', compact('profiles'));
    }


    public function compareFloatDesc($a, $b) {
        if ($a == $b) {
            return 0;
        }
        return ($a < $b) ? 1 : -1;
    }

    public function filter(){
        $lowerCasteApplicants[-1] = NULL;
        $profiles = Profile::all();
        foreach($profiles as $profile){
            if($profile->user->has_applied == 1){
                if (strpos($profile->parent_id, "GOVT-Serv-") !== false){
                    if(strcmp($profile->caste, "Dalit") == 0 || strcmp($profile->caste, "Janajati") == 0 || strcmp($profile->caste, "Aadibasi") == 0){
                        array_push($lowerCasteApplicants, $profile->user_id);
                    }
                }
            }
        }
        
        foreach($profiles as $profile){
            foreach($lowerCasteApplicants as $applicant){
                if($profile->user_id == $applicant){
                    $candidates[$profile->user_id] = $profile->high_school_gpa;                    
                }
            }
        }
        // var_dump($candidates);

        $callback = function($a, $b) {
            if ($a == $b) {
                return 0;
            }
            return ($a < $b) ? 1 : -1;
        };
        uasort($candidates, $callback); 


        // Function to slice an associative array
        function slice_10_percent($array) {
            $length = ceil(count($array) * 0.1);
            $slicedArray = array_slice($array, 0, $length, true);
            return $slicedArray;
        }

        // Slice the associative array
        $winners = slice_10_percent($candidates);
        // var_dump($winners); exit();

        // Output the sliced array
        // var_dump($winners);

        $winner_ids = array_keys($winners);

        $users = User::all();
        foreach($users as $user){
            if (in_array($user->id, $winner_ids)) {
                $user->scholarship_status = 1;
                $user->save();
            }else{
                $user->scholarship_status = 2;
                $user->save();
            }
        }
        return redirect()->route('adminHome')->withStatus('Scholarship has been awarded to the 10% of eligible students!');
    }

    public function showWinners()
    {
        $users = User::all();
        return view('admin.showWinners', compact('users'));
    }

}
