<?php

namespace App\Http\Controllers\members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\persons\Customers;
use App\Models\persons\CustomerBalance;
use App\Models\persons\Customerledger;
use App\Models\persons\CustomerPlots;

use Auth;
use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customerData = Customers::orderBy("id","desc")->paginate(10);
        $customerData = Customers::with('CustomerPlots')
                                    ->select('customers.*')
                                    ->selectSub(function ($query) {
                                        $query->selectRaw('sum(balance)')->from('customer_plots')
                                            ->whereColumn('customer_id', 'customers.id')
                                            ->where('customer_plots.plot_owner', '1');
                                    }, 'total_balance')
                                    ->paginate(10);
        // dd($customerData);

        return view('adminPanel.members.customerList',compact('customerData'));
    }

    public function fetch_customer_list(){
        $customerData = Customers::all();
        return $customerData;
    }

    public function fetch_customer_bal($id)
    {
    //    echo "The id is $id";
       $customerBalance = CustomerBalance::where('customer_id',$id)->first();
       return $customerBalance->balance;
    //    print_r($accountBalance);
    }

    public function customerPlots($customer_id){
        $customer_plots = CustomerPlots::join('customers', 'customers.id', '=', 'customer_plots.customer_id')
                                    ->join('plots','plots.id','=','customer_plots.plot_id')
                                    ->where('customer_plots.customer_id',$customer_id)
                                    ->select('customers.id as customer_id','customers.custfname','customers.custlname',
                                            'customer_plots.*','customer_plots.id as plot_balance_id','customers.custfname','customers.custlname','plots.plot_no')
                                    ->get();
        return view('adminPanel.members.customer_plots_balance',compact('customer_plots'));
        
    }

    public function fetch_customer_plots($customer_id){
        $customer_plots = CustomerPlots::join('plots','plots.id','=','customer_plots.plot_id')
        ->where('customer_plots.customer_id',$customer_id)
        ->where('customer_plots.plot_owner','1')
        ->select('customer_plots.*','customer_plots.id as plot_balance_id','plots.plot_no')
        ->get();

        return response()->json([
            'status' => 'success',
            'data' => $customer_plots
        ]);
    }

    public function customerPlotsledger($plot_bal_id){
        $customer_plots_ledger = Customerledger::join('customers', 'customers.id', '=', 'customerledgers.customer_id')
                                    ->join('plots','plots.id','=','customerledgers.plot_id')
                                    ->where('customerledgers.plot_balance_id',$plot_bal_id)
                                    ->select('customers.id as customer_id','customers.custfname','customers.custlname','customers.CNIC',
                                            'customerledgers.*','plots.plot_no')
                                    ->orderBy('customerledgers.id','asc')
                                    ->paginate(500);
        return view('adminPanel.members.customerLedeger',compact('customer_plots_ledger'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $countriesList = DB::table('country')->get();
        return view('adminPanel.members.addCustomer',compact('countriesList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'custfname' => 'required|max:50',
            'custlname' => 'required|max:50',
            'email' => 'required|max:250',
            'CNIC' => 'required|unique:customers',
            'city' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'picture'=>'mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);

        $customerObj = new Customers;
        $customerObj->custfname = $request->custfname;
        $customerObj->custlname = $request->custlname;
        $customerObj->email = $request->email;
        $customerObj->CNIC = $request->CNIC;
        $customerObj->customer_type = $request->customer_type;
        $customerObj->city = $request->city;
        $customerObj->phone = $request->phone;
        $customerObj->address = $request->address;
        $customerObj->country = $request->country;

        if($request->file('picture')){
            
            $img_file = $request->file('picture');
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($img_file->getClientOriginalExtension());
            $img_name = $name_gen.".".$img_ext;
            $upload = 'public/images/persons';
            $file_upload = $img_file->move($upload,$img_name);
            if($file_upload){
                $customerObj->picture = $img_name;
                $customerObj->user_id = Auth::user()->id;

                try {
                    DB::transaction(function() use ($customerObj) {
                        $customerObj->save();
                        
                    });
                    return redirect('/customers-list')->with(['success'=>'Customer is Added Successfully']);
                } catch (\PDOException $e) {
                    // Woopsy
                    echo $e;
                    die;
                    DB::rollBack();
                    return redirect()->back()->with(['error'=>'Something Went Wrong Try Again']);
                }
                

                
                // if($result){
                //     return redirect('/agents-list')->with(['success'=>'Agent is Added Successfully']);
                // }else{
                //     return redirect()->back()->with(['error'=>'Something Went Wrong Try Again']);
                // }
                    
            }
        }
        // print_r($request->all());
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
        return view('adminPanel.members.customerProfile');
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
        $customerData = Customers::find($id);
        $countriesList = DB::table('country')->get();
        return view('adminPanel.members.customerUpdate',compact('customerData','countriesList'));
   
    }

    public function customerLedeger($id)
    {
        //
        $CashCustomerdata = Customerledger::where('customer_id',$id)->paginate(500);
        // print_r($CashCustomerdata);
        // die;
        return view('adminPanel.members.customerLedeger',compact('CashCustomerdata'));
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
        $validated = $request->validate([
            'custfname' => 'required|max:50',
            'custlname' => 'required|max:50',
            'email' => 'required|max:250',
            'CNIC' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'picture'=>'mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);

        if($request->file('picture')){
            
            $img_file = $request->file('picture');
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($img_file->getClientOriginalExtension());
            $img_name = $name_gen.".".$img_ext;
            $upload = 'public/images/persons';
            $file_upload = $img_file->move($upload,$img_name);
            if($file_upload){

                $result = Customers::find($id)->update([
                    'custfname' => $request->custfname,
                    'custlname' => $request->custlname,
                    'email' => $request->email,
                    'CNIC' => $request->CNIC,
                    'customer_type' => $request->customer_type,
                    'city' => $request->city,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'country' => $request->country,
                    'picture' => $img_name,
                ]);
            }
        }else{
            
            $result = Customers::find($id)->update([
                'custfname' => $request->custfname,
                'custlname' => $request->custlname,
                'email' => $request->email,
                'CNIC' => $request->CNIC,
                'customer_type' => $request->customer_type,
                'city' => $request->city,
                'phone' => $request->phone,
                'address' => $request->address,
                'country' => $request->country,
            ]);         
        }

        if($result){
            return redirect()->back()->with(['success'=>'Customer is updated Successfully']);
        }else{
            return redirect()->back()->with(['error'=>'Something Went Wrong Try Again']);
        }
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
