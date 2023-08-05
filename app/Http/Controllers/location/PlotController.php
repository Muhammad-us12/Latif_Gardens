<?php

namespace App\Http\Controllers\location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\locations\Plot;
use App\Models\locations\PlotSale;
use App\Models\persons\Customers;
use App\Models\persons\CustomerPlots;
use App\Models\persons\Customerledger;
use App\Models\PlotOwnerChange;
use App\Models\persons\Agent;
use App\Models\persons\AgentLedeger;

use DB;

use Auth;

class PlotController extends Controller
{
    //
    
    public function index()
    {
        //
        $all_plosts = Plot::orderBy('id','desc')->paginate(10);
        return view('adminPanel.Plots.plots_list',compact('all_plosts'));
    }

    public function plots_customer_list($id){
        $custoemr_plot_data = CustomerPlots::join('customers','customers.id','=','customer_plots.customer_id')
                                ->join('plots','plots.id','=','customer_plots.plot_id')
                                ->where('customer_plots.plot_id',$id)
                                ->select('customer_plots.*','customer_plots.id as plot_bal_id',
                                    'plots.plot_no',
                                    'customers.custfname','customers.custlname','customers.CNIC')
                                ->get();
        return view('adminPanel.Plots.plots_customer_list',compact('custoemr_plot_data'));
    }

    public function create()
    {
        //
        $Location_data = Location::all();
        return view('adminPanel.Plots.add_plot',compact('Location_data'));
    }

    public function fetch_plots_wi_block(Request $request){
        $all_plosts = Plot::where('block_id',$request->block_id)
                        ->where('status',$request->status)
                        ->get();
        return response()->json($all_plosts);

    }

    public function plot_owner_change(){
        $Customers_data = Customers::all();
        $all_plosts = Plot::where('status','!=','Not Sale')
                        ->get();
        return view('adminPanel.Plots.plot_owner_change',compact('all_plosts','Customers_data'));
    }

    public function fetch_plots_balance_data(Request $request){
        $custoemr_plot_data = CustomerPlots::join('customers','customers.id','=','customer_plots.customer_id')
                                    ->where('customer_plots.plot_id',$request->plot_id)
                                    ->where('customer_plots.plot_owner','1')
                                    ->select('customer_plots.*','customer_plots.id as plot_bal_id','customers.custfname','customers.custlname','customers.CNIC')
                                    ->first();
        return response()->json([
            'plot_data' => $custoemr_plot_data
        ]);
    }

    public function plot_owner_change_submit(Request $request){
        $validated = $request->validate([
            'customer_id' => 'required',
            'plot_id' => 'required',
            
        ]);
        $custoemr_plot_data = CustomerPlots::join('customers','customers.id','=','customer_plots.customer_id')
                                    ->where('customer_plots.plot_id',$request->plot_id)
                                    ->where('customer_plots.plot_owner','1')
                                    ->select('customer_plots.*','customer_plots.id as plot_bal_id','customers.custfname','customers.custlname')
                                    ->first();

        if($request->customer_id != $custoemr_plot_data->customer_id){

            $plot_owner_change_obj = new PlotOwnerChange;
            $plot_owner_change_obj->plot_id = $request->plot_id;
            $plot_owner_change_obj->prev_owner_id = $custoemr_plot_data->customer_id;
            $plot_owner_change_obj->new_owner_id = $request->customer_id;
            $plot_owner_change_obj->plot_balance_id = $custoemr_plot_data->plot_bal_id;
            $plot_owner_change_obj->plot_sale_price = $custoemr_plot_data->total_plot_price;
            $plot_owner_change_obj->plot_balance = $custoemr_plot_data->balance;

            try {
                DB::transaction(function() use ($plot_owner_change_obj,$custoemr_plot_data,$request) {
                    $plot_owner_change_obj->save();

                    $CustomerPlots = new CustomerPlots;
                    $CustomerPlots->plot_id = $request->plot_id;
                    $CustomerPlots->total_plot_price = $custoemr_plot_data->total_plot_price;
                    $CustomerPlots->balance = $custoemr_plot_data->balance;
                    $CustomerPlots->customer_id = $request->customer_id;
                    $CustomerPlots->plot_owner_change_id = $plot_owner_change_obj->id;
                    $CustomerPlots->user_id = Auth::user()->id;
                    $CustomerPlots->save();
                    
                    $Customerledger = new Customerledger;
                    $Customerledger->received = $custoemr_plot_data->balance;
                    $Customerledger->balance = $custoemr_plot_data->balance;
                    $Customerledger->plot_balance = $custoemr_plot_data->balance;
                    $Customerledger->plot_id = $request->plot_id;
                    $Customerledger->plot_balance_id = $CustomerPlots->id;
                    $Customerledger->customer_id = $CustomerPlots->customer_id;
                    $Customerledger->plot_owner_change_id = $plot_owner_change_obj->id;
                    
                    $Customerledger->user_id = Auth::user()->id;
                    $Customerledger->save();
                    
                    CustomerPlots::find($custoemr_plot_data->plot_bal_id)->update([
                        'plot_owner_change_id' => $plot_owner_change_obj->id,
                        'plot_owner' => 0,
                        'balance' => 0,
                    ]);

                });
                return redirect('/plots-list')->with(['success'=>'Plot Owner Change Sale Successfully']);
            } catch (\PDOException $e) {
                // Woopsy
                echo $e;
                DB::rollBack();
                // die;
                return redirect()->back()->with(['error'=>'Something Went Wrong Try Again']);
            }
        }else{
            return redirect()->back()->with(['error'=>'Please Select Differen Customer']);
        }
                                    
    }

    public function plot_sale_submit(Request $request){
        $validated = $request->validate([
            'customer_id' => 'required',
            'plot_id' => 'required',
            'location_id'=>'required',
            'society_id'=>'required',
            'block_id'=>'required',
            'plot_cost_price'=>'required',
            'plot_sale_price'=>'required',
            'plot_demand'=>'required',
        ]);

        $plot_data = json_decode($request->plot_id);
        $plot_object = new PlotSale;
        $plot_object->customer_id = $request->customer_id;
        $plot_object->plot_id = $plot_data->id;
        $plot_object->location_id = $request->location_id;
        $plot_object->society_id = $request->society_id;
        $plot_object->block_id = $request->block_id;
        $plot_object->plot_cost_price = $request->plot_cost_price;
        $plot_object->plot_demand = $request->plot_demand;
        $plot_object->plot_sale_price = $request->plot_sale_price;
        $plot_object->at_booking_perc = $request->at_booking_perc;
        $plot_object->complete_in_years = $request->complete_in_years;
        $plot_object->sixth_month_inst = $request->sixth_month_inst;
        $plot_object->at_booking_price = $request->at_booking_price;
        $plot_object->no_of_6_month_inst = $request->no_of_6_month_inst;
        $plot_object->no_of_monthly_inst = $request->no_of_monthly_inst;
        $plot_object->monthly_inst_price = $request->monthly_inst_price;
        $plot_object->agent_id = $request->agent_id;
        $plot_object->agent_commison_perc = $request->commission_perc;
        $plot_object->agent_commison_amount = $request->commission_amount;
        $plot_object->user_id = Auth::user()->id;

        try {
            DB::transaction(function() use ($plot_object, $request) {
                $plot_object->save();

                $CustomerPlots = new CustomerPlots;
                $CustomerPlots->plot_id = $plot_object->plot_id;
                $CustomerPlots->total_plot_price = $plot_object->plot_sale_price;
                $CustomerPlots->balance = $plot_object->plot_sale_price;
                $CustomerPlots->customer_id = $plot_object->customer_id;
                $CustomerPlots->plot_sale_id = $plot_object->id;
                $CustomerPlots->user_id = Auth::user()->id;
                $CustomerPlots->save();
                
                $Customerledger = new Customerledger;
                $Customerledger->received = $plot_object->plot_sale_price;
                $Customerledger->balance = $plot_object->plot_sale_price;
                $Customerledger->plot_balance = $plot_object->plot_sale_price;
                $Customerledger->plot_id = $plot_object->plot_id;
                $Customerledger->plot_balance_id = $CustomerPlots->id;
                $Customerledger->customer_id = $CustomerPlots->customer_id;
                $Customerledger->user_id = Auth::user()->id;
                $Customerledger->save();

                if($request->agent_id != '-1'){
                    $agent_data = Agent::find($request->agent_id);
                    $agent_data->balance = $agent_data->balance + $request->commission_amount;
                    $agent_data->update();

                    $AgentledgerObj = new AgentLedeger;
                    // Insert Customer Ledeger 
                    $AgentledgerObj->payment = $request->commission_amount;
                    $AgentledgerObj->agent_id = $request->agent_id;
                    $AgentledgerObj->balance = $agent_data->balance;
                    $AgentledgerObj->plot_sale_id = $plot_object->id;
                    $AgentledgerObj->user_id = Auth::user()->id;
                    $AgentledgerObj->save();
                }
                
                

                Plot::where('id',$plot_object->plot_id)->update([
                    'status' => 'Sale Progress'
                ]);

            });
            return redirect('/plots-list')->with(['success'=>'Plot Sale Successfully']);
        } catch (\PDOException $e) {
            // Woopsy
            echo $e;
            DB::rollBack();
            die;
            return redirect()->back()->with(['error'=>'Something Went Wrong Try Again']);
        }

        // dd($plot_object);
    }

    public function sale_plot(){
        $Location_data = Location::all();
        $Customers_data = Customers::all();
        $agents_data = Agent::all();
        return view('adminPanel.Plots.sale_plot',compact('Location_data','Customers_data','agents_data'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'plot_no' => 'required|unique:plots',
            'location_id'=>'required',
            'society_id'=>'required',
            'block_id'=>'required',
            'plot_cost_price'=>'required',
            'plot_sale_price'=>'required',
            'marala_type'=>'required',
            'description' => 'max:4294967295',
        ]);

        $result = Plot::insert([
            'plot_no' => $request->plot_no,
            'location_id'=>$request->location_id,
            'society_id'=>$request->society_id,
            'block_id'=>$request->block_id,
            'plot_cost_price'=>$request->plot_cost_price,
            'plot_sale_price'=>$request->plot_sale_price,
            'marala_type'=>$request->marala_type,
            'state_type'=>$request->state_type,
            'description' => $request->description,
        ]);

        if($result){
            return redirect('/plots-list')->with(['success'=>'Plot Added Successfully']);
        }else{
            return redirect()->back()->with(['error'=>'Something Went Wrong Try Again']);
        }
        // dd($request->all());
    }
}


