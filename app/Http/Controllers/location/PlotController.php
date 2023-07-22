<?php

namespace App\Http\Controllers\location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\locations\Plot;

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


