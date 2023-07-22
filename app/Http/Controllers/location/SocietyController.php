<?php

namespace App\Http\Controllers\location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\locations\Societies;
use App\Models\locations\Marala;
use App\Models\locations\Blocks;

use Auth;

class SocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch_socities_wi_location(Request $request)
    {
        $location_socities = Societies::where('location',$request->location_id)
        ->select('id','society_name')
        ->get();
        
        return $location_socities;
        // print_r($location_socities);
        // echo "Socitites Function is call now ";
    }

    public function fetch_blocks_wi_scotites(Request $request)
    {
        $socities_blocks = Blocks::where('scoiety',$request->scoitiy_id)
        ->select('id','block_name')
        ->get();
        
        return $socities_blocks;
        // print_r($location_socities);
        // echo "Socitites Function is call now ";
    }

    public function fetch_marala_type(Request $request)
    {
        $maralas =  Marala::all();
        return $maralas;
        // print_r($request->all());
    }

     public function add_marala_type(Request $request)
    {
        $maralaObj = new Marala;
        $maralaObj->marala = $request->marala;
        $result = $maralaObj->save();

        if($result){
            return true;
        }

        return false;
        // print_r($request->all());
    }

    public function index()
    {
        //
        // $locationSocieties = Location::find(3)->locationSocieties;
        // $locationSocieties = Societies::find(1)->SocietyLocation;

        $Societies_data = Societies::orderBy("id","desc")->paginate(10);
        return view('adminPanel.locations.societitesList',compact('Societies_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Location_data = Location::all();
        return view('adminPanel.locations.societyAdd',compact('Location_data'));
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
                'society_name' => 'required|max:255',
                'description' => 'max:4294967295',
                'picture'=>'required|mimes:jpeg,png,jpg,gif,svg|max:1048',
             ]);

             $SocietiesObj = new Societies;
             $SocietiesObj->society_name = $request->society_name;
             $SocietiesObj->location = $request->location;
             $SocietiesObj->description = $request->description;
             if(isset($request->display_on_web)){
                $SocietiesObj->display_on_web = 1;
             }
            
             
             if($request->file('picture')){
                 
                 $img_file = $request->file('picture');
                 $name_gen = hexdec(uniqid());
                 $img_ext = strtolower($img_file->getClientOriginalExtension());
                 $img_name = $name_gen.".".$img_ext;
                 $upload = 'public/images/Societies';
                 $file_upload = $img_file->move($upload,$img_name);
                 if($file_upload){
                     $SocietiesObj->picture = $img_name;
                     $SocietiesObj->user_id = Auth::user()->id;
     
                     $result = $SocietiesObj->save();
                     if($result){
                         return redirect('/societies-list')->with(['success'=>'Society is Added Successfully']);
                     }else{
                         return redirect()->back()->with(['error'=>'Something Went Wrong Try Again']);
                     }
                 }
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
        $Societies_data = Societies::find($id);
        $Location_data = Location::all();
        return view('adminPanel.locations.societyEdit',compact('Societies_data','Location_data'));
    
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
            'society_name' => 'required|max:255',
            'description' => 'max:4294967295',
        ]);

        if($request->file('picture')){
            
            $img_file = $request->file('picture');
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($img_file->getClientOriginalExtension());
            $img_name = $name_gen.".".$img_ext;
            $upload = 'public/images/Societies';
            $file_upload = $img_file->move($upload,$img_name);
            if($file_upload){
                $result = Societies::find($id)->update([
                    'society_name' => $request->society_name,
                    'description' => $request->description,
                    'location' => $request->location,
                    'display_on_web' => $request->display_on_web,
                    'picture' => $img_name
                ]);
            }
        }else{
            
            $result = Societies::find($id)->update([
                'society_name' => $request->society_name,
                'description' => $request->description,
                'location' => $request->location,
                'display_on_web' => $request->display_on_web,
            ]);            
        }

        if($result){
            return redirect()->back()->with(['success'=>'Society is updated Successfully']);
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
