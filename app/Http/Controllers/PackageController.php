<?php
  
namespace App\Http\Controllers;
use App\Models\WorkName;
use App\Models\Rate;
use App\Models\Package;
use Illuminate\Http\Request;
use Auth;
use DB;
class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        // if( in_array('create_package', $user_permissions ) ){
            $work_names = WorkName::where('deleted_date', NULL)->get();
            $rates = Rate::where('deleted_date', NULL)->get();
            $packages = Package::where('deleted_date', NULL)->get();
            return view('pages.Package.package')->with('packages', $packages)->with('rates', $rates)->with('work_names', $work_names);
        // }else{
        //     return redirect()->route('home');
        // }
    }
        // $packages = DB::table('packages')->select('rate_id')
        //     ->get();
           
        // print_r('<pre>');
        // print_r($rate);
        // die();
    

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
            'Plannig_package_name' => 'required',
            'work_name_id' => 'required',
            'we_provide' => 'required',
            'we_deliver' => 'required',
            'rate_id' => 'required',
        ]);
        $data = $request->all(); 
        if(isset($data['rate_id'])){
            $data['rate_id'] = json_encode($data['rate_id']);
        }
        // print_r($data);
        // die();
        $status = Package::create($data);
        if($status){
            request()->session()->flash('success', 'Package Form Created Successfully !!');
        }else{
            request()->session()->flash('error', 'Package not created !!');
        }
        return redirect()->back();
    }
    public function show($work_name_id)
    {
        $work_names = WorkName::where('deleted_date', NULL)->get();
        $rates = Rate::where('deleted_date', NULL)->get();
        $packages = Package::where('deleted_date', NULL)->get();
        return view('pages.Package.package')->with('packages', $packages)->with('work_name_id', $work_name_id)->with('rates', $rates)->with('work_names', $work_names);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        if( in_array('edit_package', $user_permissions ) ){
            $work_names = WorkName::where('deleted_date', NULL)->get();
            $rates = Rate::where('deleted_date', NULL)->get();
            $packages = Package::where('deleted_date', NULL)->get();
            $packages = Package::findOrFail($id);  
            return view('pages.package.package_edit')->with('rates', $rates)->with('work_names', $work_names)->with('packages', $packages);
        }else{
            return redirect()->route('home');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id); 
      
        $request->validate([
            'Plannig_package_name' => 'required',
            'work_name_id' => 'required',
            'we_provide' => 'required',
            'we_deliver' => 'required',
        ]);
        $data = $request->all(); 
        if(isset($data['rate_id'])){
            $data['rate_id'] = json_encode($data['rate_id']);
        }
        $status = $package->fill($data)->save();
        if($status){
            request()->session()->flash('success', 'package Format Updated Successfully !!');
        }else{
            request()->session()->flash('error', 'package Format Not Updated !!');
        }
        return redirect()->route('package.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        if( in_array('delete_package', $user_permissions ) ){
            $status = Package::destroy($id);
            if($status){
                request()->session()->flash('success', 'Package Format Deleted Successfully !!');
            }else{
                request()->session()->flash('error', 'Package Format Not Deleted !!');
            }
            return redirect()->back();
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function getWork(Request $request){
        $rates = Rate::where('name_id', $request->id)->with('measurement_name_info')->get()->toArray();
        return json_encode($rates);
    }
}
