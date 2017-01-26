<?php

class TransactionController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($uid) {
        // get all the transactions
//        echo $uid;
//        die();
//        $transactions = DB::table('lpay_mmv_transaction')->where('member_id', $uid)->get();
        $transactions = DB::table('lpay_mmv_transaction')
                ->join('lpay_mmv_member_master', 'lpay_mmv_member_master.member_id', '=', 'lpay_mmv_transaction.to_member')
                ->where('lpay_mmv_transaction.member_id', $uid)
                ->get();
//        print_r($transactions);
//        die();
//        $transactions = Transaction::where('member_id','=',$uid)->all();
        // load the view and pass the transactions
        return View::make('transactions.index')
                        ->with('transactions', $transactions);
    }
    
    public function receive($uid) {
        // get all the transactions
//        echo $uid;
//        die();
//        $transactions = DB::table('lpay_mmv_transaction')->where('member_id', $uid)->get();
        $transactions = DB::table('lpay_mmv_transaction')
                ->join('lpay_mmv_member_master', 'lpay_mmv_member_master.member_id', '=', 'lpay_mmv_transaction.member_id')
                ->where('lpay_mmv_transaction.to_member', $uid)
                ->get();
//        print_r($transactions);
//        die();
//        $transactions = Transaction::where('member_id','=',$uid)->all();
        // load the view and pass the transactions
        return View::make('transactions.receive')
                        ->with('transactions', $transactions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($uid) {
        // load the create form (app/views/deposits/create.blade.php)
        $member = DB::table('lpay_mmv_member_master')->where('member_id', $uid)->get();
//        print_r($transactions);
//        die();
        return View::make('transactions.create')
                        ->with('member', $member);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $transactions = new Transaction;
        $receiver_email = Input::get('to_email');
        $receiver = DB::table('lpay_mmv_member_master')->where('email', $receiver_email)->get();
        $sender = DB::table('lpay_mmv_member_master')->where('member_id', Input::get('member_id'))->first();

        $transactions->amount = Input::get('amount');
        $transactions->member_id = Input::get('member_id');

//        print_r($transactions);
//        die();
        if (!empty($receiver)) {
            if ($sender->wallet > $transactions->amount) {
                $transactions->to_member = $receiver[0]->member_id;
                $transactions->save();

                DB::table('lpay_mmv_member_master')
                        ->where('member_id', $transactions->member_id)
                        ->decrement('wallet', $transactions->amount);

                DB::table('lpay_mmv_member_master')
                        ->where('member_id', $transactions->to_member)
                        ->increment('wallet', $transactions->amount);

                // redirect
                Session::flash('message', 'Amount transfered successfully!');
                return Redirect::to('transactions/index/' . $transactions->member_id);
            } else {
                Session::flash('message', 'You don\'t have sufficeint balance to do the transaction.Your current wallet balance is $' . $sender->wallet);
                return Redirect::to('transactions/index/' . $transactions->member_id);
            }
        } else {
            Session::flash('message', 'No user exists in this email!');
            return Redirect::to('transactions/index/' . $transactions->member_id);
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
        $transaction = Transaction::find($id);
        $transaction->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the transaction!');
        return Redirect::to('transactions/index/' . $transaction->member_id);
    }

}
