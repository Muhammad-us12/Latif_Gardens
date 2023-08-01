<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounts\CashAccounts;
use App\Models\Accounts\ReceviedPayments;

use App\Models\persons\CustomerPlots;
use App\Models\persons\Customerledger;
use App\Models\persons\AgentBalance;
use App\Models\persons\Agent;

use App\Models\persons\AgentLedeger;
use App\Models\Accounts\CashAccountsBal;
use App\Models\Accounts\CashAccountledger;
use App\Models\locations\Plot;
use Auth;
use DB;

class ReceivedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ReceviedPayments_list = ReceviedPayments::orderBy("id",'desc')->select('id','date','received_from','total_received')->paginate(50);
        return view('adminPanel.accounts.receviedList',compact('ReceviedPayments_list'));
        // print_r($ReceviedPayments_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $CashAccountsdata = CashAccounts::all();
        return view('adminPanel.accounts.receviedAdd',compact('CashAccountsdata'));
        
    }

    function payment_list_print($id){
        $payment_data = ReceviedPayments::find($id);
        // print_r($payment_data);
        // die;
        return view('adminPanel.accounts.recveive_list_print',compact('payment_data'));
    }

    public function date_wise_recveive_payments(Request $request){
        $payments_data = DB::table('recevied_payments')
                            ->join('cash_accounts', 'cash_accounts.id', '=', 'recevied_payments.received_from')// joining the contacts table , where user_id and contact_user_id are same
                            ->whereBetween('date', [$request->start_date,$request->end_date])
                            ->select('recevied_payments.id','recevied_payments.total_received','recevied_payments.date','recevied_payments.received_from','cash_accounts.account_name','cash_accounts.account_number')
                            ->get();
        // print_r($payments_data);
        // die;
        return view('adminPanel.accounts.date_wise_recv',compact('payments_data','request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // print_r($request->all());
        // die;

        DB::beginTransaction();
        try {
            // Insert Payment in Table 
            $paymentObj = new ReceviedPayments;
            $paymentObj->date = $request->current_date;
            $paymentObj->prev_balance = $request->account_prev_bal;
            $paymentObj->updated_balance = $request->updated_balnc;
            $paymentObj->total_received = $request->total_payments;
            $paymentObj->Criteria = json_encode($request->criteria);
            $paymentObj->Content = json_encode($request->content);
            $paymentObj->Content_Ids = json_encode($request->content_ids);
            $paymentObj->plots_balance_ids = json_encode($request->plot_ids);
            $paymentObj->Amount = json_encode($request->amount);
            $paymentObj->remarks = json_encode($request->remarks);
            $paymentObj->received_from = $request->payment_from;
            $paymentObj->user_id = Auth::user()->id;
            $paymentObj->save();

            foreach($request->criteria as $index => $ctr_res){
                if($ctr_res == 'Agent'){
                    
                    $AgentBal = Agent::find($request->content_ids[$index]);
                    $updatedBalance = $AgentBal->balance + $request->amount[$index];
                    $AgentBal->balance = $updatedBalance;
                    $AgentBal->save();

                    // Insert Account Ledeger 
                    $AgentledgerObj = new AgentLedeger;
                    // Insert Customer Ledeger 
                    $AgentledgerObj->payment = $request->amount[$index];
                    $AgentledgerObj->agent_id = $request->content_ids[$index];
                    $AgentledgerObj->balance = $updatedBalance;
                    $AgentledgerObj->recevied_id = $paymentObj->id;
                    $AgentledgerObj->user_id = Auth::user()->id;
                    $AgentledgerObj->save();
                }

                if($ctr_res == 'Account'){
                    // Update Account Balance
                    $accountBal = CashAccountsBal::where('account_id',$request->content_ids[$index])->first();
                    $updatedBalanceAcc = $accountBal->balance -  $request->amount[$index];
                    $accountBal->balance = $updatedBalanceAcc;
                    $accountBal->save();
                    
                    // Insert Account Ledeger 
                    $CashAccledgerObj = new CashAccountledger;
                    $CashAccledgerObj->payment =  $request->amount[$index];
                    $CashAccledgerObj->account_id = $request->content_ids[$index];
                    $CashAccledgerObj->balance = $updatedBalanceAcc;
                    $CashAccledgerObj->recevied_id = $paymentObj->id;
                    $CashAccledgerObj->user_id = Auth::user()->id;
                    $CashAccledgerObj->save();

                }

                if($ctr_res == 'Customer'){
                    // Update Custoemr Balance 
                        $CustomerBal = CustomerPlots::find($request->plot_ids[$index]);
                        $custUpdatedBalance = $CustomerBal->balance -  $request->amount[$index];
                        $CustomerBal->balance = $custUpdatedBalance;
                        $CustomerBal->save();

                        if($custUpdatedBalance <= 0){
                            Plot::find($CustomerBal->plot_id)->update([
                                'status' => 'Sale Complete'
                            ]);
                        }
                    // Insert Customer Ledeger 
                    $CustomerledgerObj = new Customerledger;
                    $CustomerledgerObj->payment = $request->amount[$index];
                    $CustomerledgerObj->customer_id = $request->content_ids[$index];
                    $CustomerledgerObj->balance = $custUpdatedBalance;
                    $CustomerledgerObj->plot_balance = $custUpdatedBalance;
                    $CustomerledgerObj->recevied_id = $paymentObj->id;
                    $CustomerledgerObj->plot_balance_id = $request->plot_ids[$index];
                    $CustomerledgerObj->plot_id = $CustomerBal->plot_id;
                    $CustomerledgerObj->user_id = Auth::user()->id;
                    $CustomerledgerObj->save();
                }
            }
            // Update Account Balance 

            // Update Uper Account Balance
            $accountBalUpper = CashAccountsBal::where('account_id',$request->payment_from)->first();
            $updatedBalance = $accountBalUpper->balance + $request->total_payments;
            $accountBalUpper->balance = $updatedBalance;
            $accountBalUpper->save();
            // Insert Account Ledeger 
            $CashAccledgerObj = new CashAccountledger;
            $CashAccledgerObj->received = $request->total_payments;
            $CashAccledgerObj->account_id = $request->payment_from;
            $CashAccledgerObj->balance = $updatedBalance;
            $CashAccledgerObj->recevied_id = $paymentObj->id;
            $CashAccledgerObj->user_id = Auth::user()->id;
            $CashAccledgerObj->save();

            DB::commit();
            return redirect('/received-list')->with(['success'=>'Payment Received Added Successfully']);
        } catch (\PDOException $e) {
            // Woopsy
            echo $e;
            DB::rollBack();
            // return redirect()->back()->with(['error'=>'Something Went Wrong Try Again']);
        }
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
