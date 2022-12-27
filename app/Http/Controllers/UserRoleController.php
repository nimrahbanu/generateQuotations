<?php

namespace App\Http\Controllers;
use App\Models\UserSlug;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        // if( in_array('create_user_role', $user_permissions ) ){
            $user_roles = UserRole::where('deleted_date', NULL)->get();
            $user_slugs = UserSlug::where('deleted_date', NULL)->get();
            return view('pages.user_role.add')->with('user_roles', $user_roles)->with('user_slugs', $user_slugs);
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
            'user_name' =>'required',
            'user_permission' =>'required',
        ]);
        $data = $request->all();
        if(isset($data['user_permission'])){
            $data['user_permission'] = json_encode($data['user_permission']);
        }
        $status = UserRole::create($data);
        if($status){
            request()->session()->flash('success','User Role Created Successfully');
        }else{
            request()->session()->flash('error','User role not created');
        }
        return redirect()->back();

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function show(UserRole $userRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        if( in_array('edit_user_role', $user_permissions ) ){
            $user_roles = UserRole::where('deleted_date', NULL)->get();
            $user_roles = UserRole::findOrFail($id);
            $user_slugs = UserSlug::where('deleted_date', NULL)->get();
            return view('pages.user_role.edit')->with('user_roles', $user_roles)->with('user_slugs', $user_slugs);
        }else{
            return redirect()->route('home');
        }    

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_roles = UserRole::findOrFail($id);
        $request->validate([
            'user_name' => 'required',
            'user_permission' => 'required',
        ]);
        $data = $request->all();
        $status = $user_roles->fill($data)->save();
        if($status){
            request()->session()->flash('success','User Role Updated Successfully!!');
        }else{
            request()->session()->flash('error', 'User Role Not Updated!!');
        }
        return redirect()->route('user-role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        if( in_array('edit_user_role', $user_permissions ) ){
            $status = UserRole::destroy($id);
            if($status){
                request()->session()->flash('success', 'Data Deleted successfully!!');
            }else{
                request()->session()->flash('error', 'Data not Deleted!!');
            }
            return redirect()->back();
        }else{
            return redirect()->route('home');
        }
    }
}
