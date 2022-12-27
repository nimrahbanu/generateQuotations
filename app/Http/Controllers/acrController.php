<?php

namespace App\Http\Controllers;
use App\Models\Prospect;
use App\Models\Package;
use App\Models\State;
use App\Models\Acr;
use App\Models\Bank;
use Illuminate\Http\Request;
use Auth;
use PDF;
use Illuminate\Support\Facades\Mail;
use DB;

class acrController extends Controller
{
    public function index()
    {
        
        $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        if( in_array('create_account', $user_permissions ) ){
            $states = State::where('deleted_date',NULL)->get();
            $prospects = Prospect::where('deleted_date', NULL)->get();
            $packages = Package::where('deleted_date', NULL)->get();
            $accounts = Acr::where('deleted_date', NULL)->get();
            $banks = Bank::where('deleted_date', NULL)->get();
            $acrs = Acr::where('deleted_date', NULL)->get();
            return view('pages.account_confirmation_request.add')->with('accounts', $accounts)->with('prospects', $prospects)->with('packages', $packages)->with('banks',$banks)->with('acrs',$acrs)->with('states',$states);
        }else{
            return redirect()->route('home');
        }
    }

    public function create()
    {
        $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        if( in_array('list_account', $user_permissions ) ){
            $states = State::where('deleted_date',NULL)->get();
            $prospects = Prospect::where('deleted_date', NULL)->get();
            $packages = Package::where('deleted_date', NULL)->get();
            $accounts = Acr::where('deleted_date', NULL)->get();
            $banks = Bank::where('deleted_date', NULL)->get();
            $acrs = Acr::where('deleted_date', NULL)->get();
            return view('pages.account_confirmation_request.list')->with('accounts', $accounts)->with('prospects', $prospects)->with('packages', $packages)->with('banks',$banks)->with('acrs',$acrs)->with('states',$states);;
        }else{
            return redirect()->route('home');
        }
    }
    public function store(Request $request){
        $request->validate([
            'project_id' => 'required',
            'client_name' => 'required',
            'email_id' => 'required',
            'contact_no' => 'required',
            'district' => 'required',
            'state_id' => 'required',
            'whatsapp_no' => 'required',
            'package_id' => 'required',
            'request_type' => 'required',
            'final_ammount' => 'required',
            'bank_id' => 'required',
            'deposit_date' => 'required',
            'payment_mode' => 'required',
            'neft_payment' => 'required',
            'amount' => 'required',
            'advance_amount' => 'required',
            'narration' => 'required',
            'attachment' => 'required',
        ]);
        $data = $request->all();
        print_r('<pre>');
        print_r($data);
        $status = Acr::create($data);
        if($status){
            request()->session()->flash('success', 'Account Confirmation Form Created Successfully !!');
        }else{
            request()->session()->flash('error', 'Account Confirmation Form not created !!');
        }
        return redirect()->back();
    }
    // public function getallData(Request $request){
    //     $all_data = Prospect::where('id', $request->project_id)->get()->toArray();
    //     return json_encode($all_data);
    // }

    public function show($id)
    {
        $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        if( in_array('view_account', $user_permissions ) ){
            $acrs = Acr::where('deleted_date', NULL)->findOrFail($id);
            return view('pages.account_confirmation_request.view')->with('acrs',$acrs);
        }else{
            return redirect()->back();
        }    
    }
    public function edit($id){
        $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        if( in_array('edit_account', $user_permissions ) ){
            $acrs = Acr::where('deleted_date',NULL)->get();
            $states = State::where('deleted_date',NULL)->get();
            $prospects = Prospect::where('deleted_date',NULL)->with('state_info')->get();
            $banks = Bank::where('deleted_date', NULL)->get();
            $acrs = Acr::findOrFail($id);
            return view('pages.account_confirmation_request.edit')->with('acrs', $acrs)->with('states', $states)->with('prospects', $prospects)->with('banks', $banks);
        }else{
            return redirect()->route('home');
        }
    }
    public function update(Request $request, $id){
        $acrs = Acr::findOrFail($id);
        $request->validate([
          
            'request_type' => 'required',
            'final_ammount' => 'required',
            'bank_id' => 'required',
            'deposit_date' => 'required',
            'payment_mode' => 'required',
            'neft_payment' => 'required',
            'amount' => 'required',
            'advance_amount' => 'required',
            'narration' => 'required',
            'attachment' => 'required',
        ]);
        $data = $request->all();
        print_r('<pre>');
        print_r($data);
        $status = $acrs->fill($data)->save();
        if($status){
            request()->session()->flash('success', 'Data Edited SuccessFully');
        }else{
            request()->session()->flash('error', 'Data not Edited');
        }
        return redirect()->route('acr.index');
    }


    public function email(Request $request)
    {     
        $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        if( in_array('email_account', $user_permissions ) )
        {
            $request->validate([
            'project_id' => 'required',
            ]);
            $project_id  = $request->project_id;
            $client_name  = $request->client_name;
            $district = $request->district;
            $state_id = $request->state_id;
            $package_id = $request->package_id;
            $request_type = $request->request_type;
            $final_ammount = $request->final_ammount;
            $deposit_date = $request->deposit_date;
            $amount = $request->amount;
            $advance_amount = $request->advance_amount;
            $acrs = Acr::where('project_id',$request->project_id)->first();
          
            $project_id  = $acrs->project_id;
            $client_name  = $acrs->client_name;
            $district = $acrs->district;
            $state_id = $acrs->state_id;
            $package_id = $acrs->package_id;
            $request_type = $acrs->request_type;
            $final_ammount = $acrs->final_ammount;
            $amount = $acrs->amount;
            $advance_amount = $acrs->advance_amount;
            $deposit_date = date('d/m/y' ,strtotime($acrs->deposit_date) );

        $no = floor($amount);
        $point = round($amount - $no, 2) * 100; //
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $final__ammount = array();
        $words = array('0' => '', '1' => 'One', '2' => 'Two',
            '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
            '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
            '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
            '13' => 'Thirteen', '14' => 'Fourteen',
            '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
            '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
            '30' => 'Thirty', '40' => 'Torty', '50' => 'Fifty',
            '60' => 'Sixty', '70' => 'Seventy',
            '80' => 'Eighty', '90' => 'Ninety');
            $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
        while ($i < $digits_1) {
            $divider = ($i == 2) ? 10 : 100;
            $pay_number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += ($divider == 10) ? 1 : 2;
            if ($pay_number) {
                $plural = (($counter = count($final__ammount)) && $pay_number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $final__ammount[0]) ? ' and ' : null;
                $final__ammount [] = ($pay_number < 21) ? $words[$pay_number] .
                    " " . $digits[$counter] . $plural . " " . $hundred
                    :
                    $words[floor($pay_number / 10) * 10]
                    . " " . $words[$pay_number % 10] . " "
                    . $digits[$counter] . $plural . " " . $hundred;
            } else $final__ammount[] = null;
        }
            $final__ammount = array_reverse($final__ammount);
            $rupees = implode('', $final__ammount);
            $paise = ($point) ? "." . $words[$point / 10] . " " . $words[$point = $point % 10] : '';
            $amount_string = $rupees . "Rupees  ";
            $amount_string .= $paise > 0 ? $paise . " Paise" : "";
         
            $pdf = PDF::loadview('pages.account_confirmation_request.acr_pdf', compact('project_id', 'client_name', 'district', 
            'state_id', 'package_id','request_type', 'final_ammount', 'amount','advance_amount', 'deposit_date', 'acrs','amount_string'))->setOptions(['defaultFont' => 'sans-serif']);
            $output = $pdf->output();
            $file_name = 'Receipt'.'_'.str_replace( " " , "-", $acrs->project_id ).'.pdf';
            \Storage::disk('local')->put('/acr_pdf/'.$file_name, $output);
            if(!empty($request->email)){
                $storagePath  = \Storage::disk('local')->path('acr_pdf/'.$file_name);
                Mail::send('emails.acr_pdf', ['user' => $acrs, 'path' => $storagePath], function ($mail) use ($acrs, $storagePath)
                    {
                        $mail->from($_ENV['MAIL_FROM_ADDRESS'], $_ENV['MAIL_FROM_NAME']);
                        $mail->to($acrs->email_id, $acrs->client_name)->subject('acr details');
                        $mail->attach($storagePath);
                        request()->session()->flash('success', 'Client Email Send Successfully !!');
                    });  
                }
            if($request->download_pdf){
                request()->session()->flash('success', 'Employee Pdf Downloaded Successfully !!');
                return $pdf->download($file_name);
            }else{
                request()->session()->flash('success', 'Employee Data Send Successfully !!');
                return redirect()->back();
            }
            }else{
                return redirect()->route('home');
        }    
    }

    public function getallData(Request $request){
        $all_data_prospect = Prospect::where('id', $request->id)->with('state_info')->with('package_info')->get()->toArray();
        return json_encode($all_data_prospect);
    } 
    public function destroy($id)
    {
        $user_permissions = (new SlugController)->get_user_permissions(Auth()->user()->id);
        if( in_array('delete_account', $user_permissions ) )
       {
            $status = ACR::destroy($id);
            if($status){
                request()->session()->flash('success','data deleted successfully!!');
            }else{
                request()->session()->flash('error','data not deleted!! ');
            }
            return redirect()->back();
        }else{
            return redirect()->route('home');
        }
    }
}
