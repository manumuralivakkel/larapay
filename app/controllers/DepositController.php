<?php

class DepositController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($uid) {
        // get all the deposits
//        echo $uid;
//        die();
//        $deposits = DB::table('lpay_mmv_deposit')->where('member_id', $uid)->get();
//         $deposits =Deposit::find($uid)->accounts;
        $deposits = DB::table('lpay_mmv_deposit')
                ->join('lpay_mmv_account', 'lpay_mmv_account.account_id', '=', 'lpay_mmv_deposit.account_id')
                ->where('lpay_mmv_deposit.member_id', $uid)
                ->get();
//        print_r($deposits);
//        die();
//        $deposits = Deposit::where('member_id','=',$uid)->all();
        // load the view and pass the deposits
        return View::make('deposits.index')
                        ->with('deposits', $deposits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($uid) {
        // load the create form (app/views/deposits/create.blade.php)
        $accounts = DB::table('lpay_mmv_account')->where('member_id', $uid)->get();
//        print_r($deposits);
//        die();
        return View::make('deposits.create')
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

        $deposits = new Deposit;
        $deposits->account_id = Input::get('account_id');
        $deposits->amount = Input::get('amount');
        $deposits->member_id = Input::get('member_id');
       

        $depositrow = DB::table('lpay_mmv_account')
                        ->where('account_id', $deposits->account_id)->first();

        if ($depositrow->balance > $deposits->amount) {
             $deposits->save();
            DB::table('lpay_mmv_member_master')
                    ->where('member_id', $deposits->member_id)
                    ->increment('wallet', $deposits->amount);

            DB::table('lpay_mmv_account')
                    ->where('account_id', $deposits->account_id)
                    ->decrement('balance', $deposits->amount);

            // redirect
            Session::flash('message', 'Deposit done successfully !');
            return Redirect::to('deposits/index/' . $deposits->member_id);
        } else {
            Session::flash('message', 'You don\'t have sufficeint balance to do the transaction.Your current account balance is $'.$depositrow->balance);
            return Redirect::to('deposits/index/' . $deposits->member_id);
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
        $deposits = Deposit::find($id);
        $deposits->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the deposit!');
        return Redirect::to('deposits/index/' . $deposits->member_id);
    }

}
