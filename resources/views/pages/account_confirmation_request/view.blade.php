@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'list'
])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-10"> 
                <form  method="post" action="{{route('acr.store')}}"> 
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary bg-primary">
                            <h4 class="card-title text-white text-center" >{{ __('ACCOUNT CONFIRMATION VIEW') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead  ><div class="card ml-auto mr-auto " style="max-width:65rem;" >
                                        <tr>
                                            <!-- <th  style="font-size: 17px;"> </th>
                                            <th  style="font-size: 17px;"></th> -->
                                        </tr> 
                                    </thead>       
                                    <tbody> 
                                        <tr>
                                            <td style="font-size: 17px;" >project Id</td>
                                            <td style="font-size: 15px;">{{ $acrs->project_id }}</td>
                                        </tr>
                                        <tr >  
                                            <td style="font-size: 17px;" >Client Name</td> 
                                            <td style="font-size: 15px;">{{ $acrs->client_name }}</td> 
                                        </tr> 
                                        <tr>  
                                            <td style="font-size: 17px;" >Contact Name</td>  
                                            <td style="font-size: 15px;">{{ $acrs->contact_no }}</td>
                                        </tr>  
                                        <tr>  
                                            <td style="font-size: 17px;" >district</td> 
                                            <td style="font-size: 15px;">{{ $acrs->district }}</td> 
                                        </tr>
                                        <tr>  
                                            <td style="font-size: 17px;" >State_id</td>                                                                                     
                                            <td style="font-size: 15px;">{{ $acrs->state_id }}</td> 
                                        </tr>  
                                        <tr>  
                                            <td style="font-size: 17px;" >WhatsaApp No</td>  
                                            <td style="font-size: 15px;">{{ $acrs->whatsapp_no }}</td> 
                                        </tr>  
                                        <tr>  
                                        <td style="font-size: 17px;" >Package Name</td>
                                        <td style="font-size: 15px;">{{ $acrs->package_id }}</td>  
                                        </tr>      
                                        <tr>  
                                        <td style="font-size: 17px;" >Request Type</td> 
                                        <td style="font-size: 15px;">{{ $acrs->request_type }}</td> 
                                        </tr>  
                                        <tr>  
                                        <td style="font-size: 17px;" >Final Ammount </td> 
                                        <td style="font-size: 15px;">{{ $acrs->final_ammount }}</td> 
                                        </tr>
                                        <tr>  
                                        <td style="font-size: 17px;" >Bank Name</td> 
                                        <td style="font-size: 15px;">{{ $acrs->bank_id }}</td> 
                                        </tr>  
                                        <tr>  
                                        <td style="font-size: 17px;" >Deposit Date</td> 
                                        <td style="font-size: 15px;">{{ $acrs->deposit_date }}</td> 
                                        </tr>
                                        <tr>  
                                        <td style="font-size: 17px;" >Payment Mode</td>  
                                        <td style="font-size: 15px;">{{ $acrs->payment_mode }}</td>
                                        </tr>
                                        <tr>  
                                        <td style="font-size: 17px;" >Cheque/Ref. No /Tran. ID</td>  
                                        <td style="font-size: 15px;" >{{ $acrs->neft_payment }}</td>
                                        </tr>  
                                        <tr>  
                                        <td style="font-size: 17px;"  >Amount</td>  
                                        <td style="font-size: 15px;">{{ $acrs->amount }}</td>
                                        </tr> 
                                        <tr>  
                                        <td style="font-size: 17px;" >Advance Amount</td> 
                                        <td style="font-size: 15px;">{{ $acrs->advance_amount }}</td> 
                                        </tr>  
                                        <tr>  
                                        <td style="font-size: 17px;" >Narration</td> 
                                        <td style="font-size: 15px;">{{ $acrs->narration }}</td> 
                                        </tr>
                                        <tr>  
                                        <td style="font-size: 17px;" >Attachment for refrence</td> 
                                        <td style="font-size: 15px;">
                                            <img width="33%" height="33%" src="{{ $acrs['attachment'] }}">
                                        </td> 
                                        </tr>  
                                        <tr>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group col-lg-6 mb-3 ml-3">
                            <a type="button" href="/acr/create" class="btn btn-primary mb-3">Go back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>   
    </div>   
</div>   
@endsection