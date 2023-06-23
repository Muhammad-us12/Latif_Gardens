<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounts\CashAccounts;
use App\Models\Accounts\CashAccountsBal;
use App\Models\Accounts\CashAccountledger;
use App\Models\Accounts\CashAccountDeposit;
use App\Models\persons\Agent;

use App\Models\expense\expense;

use Carbon\Carbon;


use App\Models\persons\AgentLedeger;
use Auth;
use DB;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $CashAccountsdata = CashAccounts::paginate(10);
        return view('adminPanel.accounts.accountsList',compact('CashAccountsdata'));
    }
    
    public function cash_deposit_print($id)
    {
        //
         $cash_deposit_data = CashAccountDeposit::find($id);
        return view('adminPanel.accounts.cash_deposit_print',compact('cash_deposit_data'));
    }
    
    

    public function reports_list(){
        return view('adminPanel.accounts.reports_list');
    }

    public function payable_receivable(){
        $customers = DB::table('customers')
                            ->join('customer_balances', 'customer_balances.customer_id', '=', 'customers.id')// joining the contacts table , where user_id and contact_user_id are same
                            
                            ->select('customer_balances.*', 'customers.custfname','customers.custlname')
                            ->orderBy("id",'asc')
                            ->get();
        $agents = DB::table('agents')
                            ->join('agent_balances', 'agent_balances.agent_id', '=', 'agents.id')// joining the contacts table , where user_id and contact_user_id are same
                            
                            ->select('agent_balances.*', 'agents.fname','agents.lname')
                            ->orderBy("id",'asc')
                            ->get();

        return view('adminPanel.accounts.payable_receivable',compact('customers','agents'));
        // print_r($customers);
        // die;
    }

    public function fetch_account_list(){
        $accountsList = CashAccounts::all();
        return $accountsList;
    }

    public function fetch_cash_acc_bal($id)
    {
    //    echo "The id is $id";
       $accountBalance = CashAccountsBal::where('account_id',$id)->first();
       return $accountBalance->balance;
    //    print_r($accountBalance);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('adminPanel.accounts.addAccount');
    }

    public function cashDeposit()
    {
        //
        $CashAccountsdata = CashAccounts::all();
        $CashAccountDeposit = CashAccountDeposit::orderBy('created_at', 'desc')->paginate(10);
        return view('adminPanel.accounts.cashDeposit',compact('CashAccountsdata','CashAccountDeposit'));
    }

    public function accountLedeger($id)
    {
        //
        $CashAccountsdata = CashAccountledger::where('account_id',$id)->paginate(500);
        // print_r($CashAccountsdata);
        // die;
        return view('adminPanel.accounts.cashAccountLedeger',compact('CashAccountsdata'));
    }
    
    public function ledger_reports(){
        $CashAccountsdata = CashAccounts::all();
        $agentdata = Agent::all();
        return view('adminPanel.accounts.ledegers_reports',compact('CashAccountsdata','agentdata'));
    }
    

    public function print_cash_account_ledeger(Request $request)
    {
        //
        $CashAccountsdata = CashAccounts::find($request->account_id);
        $CashAccountsLedeger = CashAccountledger::where('account_id',$request->account_id)->get();
        // print_r($CashAccountsLedeger);
        // die;
        return view('adminPanel.accounts.cashAccountLedegerPrint',compact('CashAccountsLedeger','CashAccountsdata'));
    }

    public function print_agent_account_ledeger(Request $request)
    {
        //
        $agent_data = Agent::find($request->agent_id);
        $agentLedeger = AgentLedeger::where('agent_id',$request->agent_id)->get();
        // print_r($agentLedeger);
        // die;
        return view('adminPanel.accounts.agentLedegerPrint',compact('agentLedeger','agent_data'));
    }

    

    public function date_wise_cash_account_ledeger(Request $request)
    {
        //
        // print_r($request->all());
        $CashAccountsdata = CashAccounts::find($request->account_id);
        $CashAccountsLedeger = CashAccountledger::
        whereBetween(\DB::raw('DATE(created_at)'), [$request->start_date,$request->end_date])
        ->where('account_id',$request->account_id)
        ->get();
        // print_r($CashAccountsLedeger);
        // die;
        return view('adminPanel.accounts.dateWiseCashAccLedeger',compact('CashAccountsLedeger','CashAccountsdata','request'));
    }

    public function date_wise_agent_account_ledeger(Request $request)
    {
        //
        // print_r($request->all());
        $agent_data = Agent::find($request->agent_id);
        $agentLedeger = AgentLedeger::
        whereBetween(\DB::raw('DATE(created_at)'), [$request->start_date,$request->end_date])
        ->where('agent_id',$request->agent_id)
        ->get();
        // print_r($CashAccountsLedeger);
        // die;
        return view('adminPanel.accounts.dateWiseAgentAccLedeger',compact('agentLedeger','agent_data','request'));
    }

    public function profit_report(){
   

        $sale_files = Files::where('status','sale')->select('id','purchase_amount','sale_amount','commission_amount')->get();
        $localproperty = LocalProperty::where('status','sale')->select('id','commission_amount')->get();
        $expense = expense::all()->sum('total_amount');
        
        // dd($expense);
        return view('adminPanel.accounts.profit_report',compact('sale_files','localproperty','expense'));
    }
    
      public function date_wise_profit_report_sub(Request $request){
   

        $sale_files = Files::where('status','sale')->select('id','purchase_amount','sale_amount','commission_amount')
                        ->whereBetween('sold_date',[$request->start_date,$request->end_date])
                        ->get();
        $localproperty = LocalProperty::where('status','sale')->select('id','commission_amount')
                        ->whereBetween('sold_date',[$request->start_date,$request->end_date])
                        ->get();
        $expense = expense::whereBetween('date', [$request->start_date,$request->end_date])->sum('total_amount');
        
        // dd($expense);
        return view('adminPanel.accounts.date_wise_profit_report_print',compact('sale_files','localproperty','expense','request'));
    }
    
    
    
    public function date_wise_profit_report(){
        
        
        return view('adminPanel.accounts.date_wise_profit_report');
    }

    public function dashboard(){
        return view('adminPanel/dashboard');
    }
    
    


    public function cashDepositSub(Request $request){
        $validated = $request->validate([
            'deposit_amount' => 'required|integer',
            'deposit_by' => 'required|max:50',
        ]);

        // Save Cash Deposit
        $CashAccDepObj = new CashAccountDeposit;
        $CashAccDepObj->deposit_amount = $request->deposit_amount;
        $CashAccDepObj->deposit_by = $request->deposit_by;
        $CashAccDepObj->insevter_name = $request->insevter_name;
        $CashAccDepObj->account_id = $request->account_id;
        $CashAccDepObj->user_id = Auth::user()->id;

        // Update Account Balance 
        $accountBal = CashAccountsBal::where('account_id',$request->account_id)->first();
        $updatedBalance = $accountBal->balance + $request->deposit_amount;
        $accountBal->balance = $updatedBalance;
       
        $CashAccledgerObj = new CashAccountledger;
        $CashAccledgerObj->received = $request->deposit_amount;
        $CashAccledgerObj->account_id = $request->account_id;
        $CashAccledgerObj->balance = $updatedBalance;
        $CashAccledgerObj->insevter_name = $request->insevter_name;
        
        $CashAccledgerObj->user_id = Auth::user()->id;

        try {
            DB::transaction(function() use ($CashAccDepObj, $CashAccledgerObj,$accountBal) {
                $CashAccDepObj->save();
                $CashAccledgerObj->deposit_id = $CashAccDepObj->id;
                $accountBal->update();
                $CashAccledgerObj->save();


            });
            return redirect('/accounts-list')->with(['success'=>'Account Added Successfully']);
        } catch (\PDOException $e) {
            // Woopsy
            echo $e;
            DB::rollBack();
            // return redirect()->back()->with(['error'=>'Something Went Wrong Try Again']);
        }
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
        $validated = $request->validate([
            'account_name' => 'required|max:50|unique:cash_accounts',
            'account_number' => 'required|max:50',
            'opening_bal' => 'required|integer',
        ]);

        $CashAccountsObj = new CashAccounts;
        $CashAccountsObj->account_name = $request->account_name;
        $CashAccountsObj->account_number = $request->account_number;
        $CashAccountsObj->opening_bal = $request->opening_bal;
        $CashAccountsObj->user_id = Auth::user()->id;
       
        $CashAccountsBalObj = new CashAccountsBal;
        $CashAccountsBalObj->balance = $request->opening_bal;

        try {
            DB::transaction(function() use ($CashAccountsObj, $CashAccountsBalObj) {
                $CashAccountsObj->save();
                $CashAccountsBalObj->account_id = $CashAccountsObj->id;
                $CashAccountsBalObj->save();
            });
            return redirect('/accounts-list')->with(['success'=>'Account Added Successfully']);
        } catch (\PDOException $e) {
            // Woopsy
            // echo $e;
            DB::rollBack();
            return redirect()->back()->with(['error'=>'Something Went Wrong Try Again']);
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
