<?php

class AccountController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($uid) {
        // get all the accounts
//        echo $uid;
//        die();
        $accounts = DB::table('lpay_mmv_account')->where('member_id', $uid)->get();
//        print_r($accounts);
//        die();
//        $accounts = Account::where('member_id','=',$uid)->all();
        // load the view and pass the accounts
        return View::make('accounts.index')
                        ->with('accounts', $accounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        // load the create form (app/views/accounts/create.blade.php)
        return View::make('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'bank_name' => 'required',
            'ac_no' => 'required',
            'benef_name' => 'required',
            'balance' => 'required|numeric',
            'member_id' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('accounts/create')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            // store
            $account = new Account;
            $account->bank_name = Input::get('bank_name');
            $account->ac_no = Input::get('ac_no');
            $account->benef_name = Input::get('benef_name');
            $account->balance = Input::get('balance');
            $account->member_id = Input::get('member_id');

            $account->save();

            // redirect
            Session::flash('message', 'Successfully created account!');
            return Redirect::to('accounts/index/'.$account->member_id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        // get the account
        $account = Account::find($id);

        // show the view and pass the account to it
        return View::make('accounts.show')
                        ->with('account', $account);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        // get the account
        $account = Account::find($id);

        // show the edit form and pass the account
        return View::make('accounts.edit')
                        ->with('account', $account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        
        
        $rules = array(
            'bank_name' => 'required',
            'ac_no' => 'required',
            'benef_name' => 'required',
            'balance' => 'required|numeric',
            'member_id' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('accounts/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            // store
            $account = Account::find($id);
            $account->bank_name = Input::get('bank_name');
            $account->ac_no = Input::get('ac_no');
            $account->benef_name = Input::get('benef_name');
            $account->balance = Input::get('balance');
            $account->member_id = Input::get('member_id');
            $account->save();

            // redirect
            Session::flash('message', 'Successfully updated account!');
            return Redirect::to('accounts/index/'.$account->member_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        // delete
        $account = Account::find($id);
        $account->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the account!');
        return Redirect::to('accounts/index/'.$account->member_id);
    }

}
