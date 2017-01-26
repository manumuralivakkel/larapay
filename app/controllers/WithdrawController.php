<?php

class WithdrawController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($uid) {
        // get all the withdraws
//        echo $uid;
//        die();
//        $withdraws = DB::table('lpay_mmv_withdraw')->where('member_id', $uid)->get();
//         $withdraws =Withdraw::find($uid)->accounts;
        $withdraws = DB::table('lpay_mmv_withdraw')
                ->join('lpay_mmv_account', 'lpay_mmv_account.account_id', '=', 'lpay_mmv_withdraw.account_id')
                ->where('lpay_mmv_withdraw.member_id', $uid)
                ->get();
//        print_r($withdraws);
//        die();
//        $withdraws = Withdraw::where('member_id','=',$uid)->all();
        // load the view and pass the withdraws
        return View::make('withdraws.index')
                        ->with('withdraws', $withdraws);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($uid) {
        // load the create form (app/views/withdraws/create.blade.php)
        $accounts = DB::table('lpay_mmv_account')->where('member_id', $uid)->get();
//        print_r($withdraws);
//        die();
        return View::make('withdraws.create')
                        ->with('accounts', $accounts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        // store
        $withdraws = new Withdraw;
        $withdraws->account_id = Input::get('account_id');
        $withdraws->amount = Input::get('amount');
        $withdraws->member_id = Input::get('member_id');
        

        $withdrawrow = DB::table('lpay_mmv_member_master')
                        ->where('member_id', $withdraws->member_id)->first();
        if($withdrawrow->wallet > $withdraws->amount) {
            $withdraws->save();
            DB::table('lpay_mmv_member_master')
                    ->where('member_id', $withdraws->member_id)
                    ->decrement('wallet', $withdraws->amount);

            DB::table('lpay_mmv_account')
                    ->where('account_id', $withdraws->account_id)
                    ->increment('balance', $withdraws->amount);

            // redirect
            Session::flash('message', 'Withdraw done successfully!');
            return Redirect::to('withdraws/index/' . $withdraws->member_id);
        }else{
            
            Session::flash('message', 'You don\'t have sufficeint balance to withdraw amount.Your current wallet balance is $'.$withdrawrow->wallet);
            return Redirect::to('withdraws/index/' . $withdraws->member_id);
        }
    }

    public function destroy($id) {
        // delete
        $withdraws = Withdraw::find($id);
        $withdraws->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the withdraw!');
        return Redirect::to('withdraws/index/' . $withdraws->member_id);
    }

}
