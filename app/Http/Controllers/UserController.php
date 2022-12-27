<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        // if( in_array('create_user', $user_permissions ) ){
            $users = User::where('deleted_date', NULL)->get();
            $user_roles = UserRole::where('deleted_date', NULL)->get();
            return view('pages.user_permission_access.add')->with('users', $users)->with('user_roles', $user_roles);
        // }else{
        //     return redirect()->route('home');
        // }   
         //  return view('users.index', ['users' => $model->paginate(15)]);
    }
    public function store(Request $request)
    {
      $request->validate([
        'name' =>'required',
        'email' =>'required',
        'password' =>'required',
        'mobile_no' =>'required',
        'user_role' =>'required',
        'user_occupation' =>'required',
        // 'id_proof' =>'required',
      ]);
      $data = $request->all();
      $data['password'] = Hash::make( $data['password'] );
      $status = User::create($data);
      if($status){
          request()->session()->flash('success', 'User form created successfully!!');
      }else{
          request()->session()->flash('error', 'User Form Not created!!');
      }
      return redirect()->back();
    }
    public function edit($id)
    {
        $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        if( in_array('edit_user', $user_permissions ) ){
            $users = User::where('deleted_date', NULL)->get();
            $users = User::findOrFail($id);
            $user_roles = UserRole::where('deleted_date', NULL)->get();
            return view('pages.user_permission_access.edit')->with('users', $users)->with('user_roles', $user_roles);
        }else{
            return redirect()->route('home');
        }
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id); 
      
        $request->validate([
            'name' =>'required',
            'email' =>'required',
            'password' =>'required',
            'mobile_no' =>'required',
            'user_role' =>'required',
            'user_occupation' =>'required',
            // 'id_proof' =>'required',
        ]);
        $data = $request->all(); 
        $data['password'] = Hash::make( $data['password'] );
        $status = $users->fill($data)->save();
        if($status){
            request()->session()->flash('success', 'Data Format Updated Successfully !!');
        }else{
            request()->session()->flash('error', 'Data Format Not Updated !!');
        }
        return redirect()->route('user.index');
    }


    public function destroy($id){
        $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        if( in_array('delete_user', $user_permissions ) ){
             $status = User::destroy($id);
            if($status){
                request()->session()->flash('success', 'User Deleted Succesfully!!');
            }else{
                request()->session()->flash('error', 'User Not Deleted!!');
            }
            return redirect()->back();
        }else{
            return redirect()->route('home');
        }
    }

}// $password =  Crypt::encryptString($users->passsword); 
            // $some_same_string = Crypt::decryptString($password);
            // $passwords = Crypt::encryptString($users->password);
            // $password = Crypt::decryptString($passwords);
            // $passwor = encrypt($users->password);
            // $password = decrypt($passwor);