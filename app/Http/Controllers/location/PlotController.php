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
        return view('adminPanel.Plots.sale_plot',compact('Location_data','Customers_data'));
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


