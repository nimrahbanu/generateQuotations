<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        // if( in_array('create_bank', $user_permissions ) )
        // {
            $banks = Bank::where('deleted_date' ,NULL)->get();
            return view('pages.bank.add')->with('banks', $banks);
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
            'bank_name' => 'required',
           
        ]);
        $data = $request->all();
        $status = Bank::create($data);
        if($status){
            request()->session()->flash('success', 'Bank Name Created Successfully !!');
        }else{
            request()->session()->flash('error', 'Bank Name not created !!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        if( in_array('edit_bank', $user_permissions ) )
        {
            $banks = Bank::where('deleted_date' ,NULL)->get();
            $banks = Bank::findOrFail($id);
            return view('pages.bank.edit')->with('banks', $banks);
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $banks = Bank::findOrFail($id);
        $request->validate([
            'bank_name' =>  'required',
        ]);
        $data = $request->all();
        $status = $banks->fill($data)->save();
        if($status){
            request()->session()->flash('success','Bank Name Updated Successfully');
        }else{
            request()->session()->flash('error','Not UPdated');
        }         
        return redirect()->route('bank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        if( in_array('delete_bank', $user_permissions ) )
        {
            $status = Bank::destroy($id);
            if($status){
                request()->session()->flash('success', 'Bank Deleted Successfully!!');
            }else{
                request()->session()->flash('error','Bank Not Deleted!!');
            }
            return redirect()->back();
        }else{
            return redirect()->route('home');
        } 
    }  
}