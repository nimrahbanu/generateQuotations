<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use App\Models\Prospect;
use App\Models\Package;
use Illuminate\Http\Request;

class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        // if( in_array('create_prospect', $user_permissions ) ){
            $packages = Package::where('deleted_date', NULL)->get();
            $states = State::where('deleted_date', NULL)->get();
            $countries = Country::where('deleted_date', NULL)->get();
            $prospects = Prospect::where('deleted_date', NULL)->get();
            return view('pages.prospect.prospect')->with('prospects', $prospects)->with('countries', $countries)->with('states', $states)->with('packages', $packages);
        // }else{
        //     return redirect()->route('home');
        // }
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'organization' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
            'cell' => 'required|digits:10',
            'phone' => 'required',
            'whatsapp_no' => 'required|digits:10',
            'email_id' => 'required|email',
        ]);
        $data = $request->all(); 
        $status = Prospect::create($data);
        if($status){
            request()->session()->flash('success', 'Prospect Form Created Successfully !!');
        }else{
            request()->session()->flash('error', 'Prospect not created !!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function show(Prospect $prospect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        if( in_array('edit_prospect', $user_permissions ) ){
            $packages = Package::where('deleted_date', NULL)->get();
            $prospect = Prospect::where('deleted_date', NULL)->get();
            $states = State::where('deleted_date', NULL)->get();
            $countries = Country::where('deleted_date', NULL)->get();
            $prospect = Prospect::findOrFail($id);  
            return view('pages.prospect.prospect_edit')->with('prospect', $prospect)->with('states', $states)->with('countries', $countries)->with('packages', $packages);  
        }else{
                return redirect()->route('home');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prospect = Prospect::findOrFail($id); 
      
        $request->validate([
            'name' => 'required',
            'organization' => 'required',
            'address' => 'required',
            'city' => 'required',
            'cell' => 'required|digits:10',
            'phone' => 'required',
            'whatsapp_no' => 'required|digits:10',
            'email_id' => 'required|email',
        ]);
        $data = $request->all(); 
        
        $status = $prospect->fill($data)->save();
        if($status){
            request()->session()->flash('success', 'Prospect Form Updated Successfully !!');
        }else{
            request()->session()->flash('error', 'Prospect Form Not Updated !!');
        }
        return redirect()->route('prospect.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        if( in_array('delete_prospect', $user_permissions ) ){
             $status = Prospect::destroy($id);
            if($status){
                request()->session()->flash('success', 'Prospect Form Deleted Successfully !!');
            }else{
                request()->session()->flash('error', 'Prospect Form Not Deleted !!');
            }
            return redirect()->back();
        }else{
            return redirect()->route('home');
        }
    }
}
