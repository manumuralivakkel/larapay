<?php

class ProfileController extends \BaseController {

    
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($uid) {
        // get all the profiles
//        echo $uid;
//        die();
        $profiles = DB::table('lpay_mmv_profile')->where('member_id', $uid)->get();
//        print_r($profiles);
//        die();
//        $profiles = Account::where('member_id','=',$uid)->all();
        // load the view and pass the profiles
        return View::make('profiles.index')
                        ->with('profiles', $profiles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($uid) {
        // load the create form (app/views/profiles/create.blade.php)
        $user = DB::table('lpay_mmv_member_master')->where('member_id', $uid)->first();
//        print_r($user);
//        die();
        return View::make('profiles.create')
                ->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $user=  User::find(Input::get('member_id'));
        $profile = new Profile;
        
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->save();
        $profile->member_id = Input::get('member_id');
        $profile->dob = Input::get('dob');
        $profile->phone = Input::get('phone');
        $profile->mobile = Input::get('mobile');
        $profile->address = Input::get('address');
        $profile->country = Input::get('country');
        
        $profile->save();

        // redirect
        Session::flash('message', 'Successfully created profile!');
        return Redirect::to('profiles/show/' . $profile->member_id);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        
        
        // get the profile
        $profile = DB::table('lpay_mmv_member_profile')
                ->join('lpay_mmv_member_master', 'lpay_mmv_member_master.member_id', '=', 'lpay_mmv_member_profile.member_id')
                ->where('lpay_mmv_member_profile.member_id', $id)
                ->first();
//        print_r($profile);
//        die();
        // show the view and pass the profile to it
        if(!empty($profile)){
            return View::make('profiles.show')
                        ->with('profile', $profile);
        }else{
            return View::make('profiles.index');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        // get the profile
        $profile = DB::table('lpay_mmv_member_profile')
                ->join('lpay_mmv_member_master', 'lpay_mmv_member_master.member_id', '=', 'lpay_mmv_member_profile.member_id')
                ->where('lpay_mmv_member_profile.member_id', $id)
                ->first();
//         print_r($profile);
//        die();
        // show the edit form and pass the profile
        return View::make('profiles.edit')
                        ->with('profile', $profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        
        $user=  User::find($id);
        $profile = Profile::find($id);
        
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->save();
        
        $profile->dob = Input::get('dob');
        $profile->phone = Input::get('phone');
        $profile->mobile = Input::get('mobile');
        $profile->address = Input::get('address');
        $profile->country = Input::get('country');
        $profile->save();

        // redirect
        Session::flash('message', 'Successfully updated profile!');
        return Redirect::to('profiles/show/' . $id);
    }

}
