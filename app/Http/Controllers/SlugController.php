<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use App\Models\UserSlug;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\SlugController;
use App\Models\UserPermission;
use Auth;
class SlugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        // if( in_array('create_slug', $user_permissions ) ){
            $slugs = UserSlug::where('deleted_date', Null)->get();
            return view('pages.crud_operation_slug.add')->with('slugs', $slugs);
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
            'slug' => 'required',
        ]);
        $data = $request->all();
        $status = UserSlug::create($data);
        if($status){
            request()->session()->flash('success', ' Slug operation created successfully!!');
        }else{
            request()->session()->flash('error','SLug Operation not created!!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Slug $slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        if( in_array('edit_slug', $user_permissions ) ){
            $slugs = UserSlug::where('deleted_date', Null)->get();
            $slugs = UserSlug::findOrFail($id);
            return view('pages.crud_operation_slug.edit')->with('slugs', $slugs);
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slugs = UserSlug::findOrFail($id); 
      
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
        ]);
        $data = $request->all(); 
        
        $status = $slugs->fill($data)->save();
        if($status){
            request()->session()->flash('success', 'State Name Updated Successfully !!');
        }else{
            request()->session()->flash('error', 'State Name Not Updated !!');
        }
        return redirect()->route('slug.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        if( in_array('delete_slug', $user_permissions ) ){
            $status  = UserSlug::destroy($id);
            if($status){
                request()->session()->flash('success','Slug  Data Deleted successfully!!');
            }else{
                requst()->session()->flash('error','Slug Data Deleted Successfully!!');
            }
            return redirect()->back();
        }else{
            return redirect()->route('home');
        }
    }
     public static function get_user_permissions($id)
    {
        $user = User::findOrFail($id);
        $user_permission_ids = UserRole::select('user_permission')->where('id', $user->user_role)->pluck('user_permission')->first();
        $user_permission_slug = UserSlug::select('slug')->whereIn('id', json_decode($user_permission_ids))->pluck('slug')->toArray();
        return $user_permission_slug;
    }
}
