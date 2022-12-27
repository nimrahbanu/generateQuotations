@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'add'
])
@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-10">
                  <form action="{{route('acr.update', [$acrs->id])}}" method="post">
                    @csrf 
                    @method('PATCH')
                    <div class="card">
                        <div class="card-header card-header-primary bg-primary">
                            <h4 class="card-title text-white text-center" >{{ __('ACCOUNT CONFIRMATION EDIT FORM') }}</h4>
                        </div>
                        <div class="card-body ml-3 mr-3">
                            <div class="row" >
                                <div class="form-group col-md-6 ">
                                    <label for="project_id">Enter Project ID</label>
                                    <div class="input-container">
                                        <i class="fa fa-id-card icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="project_id" value="{{$acrs->project_id}}" readonly>
                                    </div>
                                    @error('project_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row" >
                                <div class="form-group col-md-6">
                                    <label for="client_name">Client Name</label>
                                    <div class="input-container">
                                        <i class="fa fa-user icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="client_name" value="{{$acrs->client_name}}" readonly> 
                                    </div>
                                    @error('client_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6"  >
                                    <label for="contact_no">Contact No</label>
                                    <div class="input-container"  >
                                        <i class="fa fa-phone icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="contact_no" value="{{$acrs->contact_no}}" readonly> 
                                    </div>
                                    @error('contact_no')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="district">Dist</label>
                                    <div class="input-container" >
                                        <i class="fa fa-map-marker icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="district" value="{{$acrs->district}}" readonly> 
                                    </div>
                                    @error('district')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="state_id">State</label>
                                    <div class="input-container">
                                        <i class="fa fa-building-o icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="state_id" value="{{$acrs->state_id}}" readonly> 
                                    </div>
                                    @error('state_id')
                                            <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6"  >
                                    <label for="whatsapp_no">Whats App no</label>
                                    <div class="input-container">
                                        <i class="fa fa-whatsapp icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="whatsapp_no" value="{{$acrs->whatsapp_no}}" readonly> 
                                    </div>
                                    @error('whatsapp_no')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6"  >
                                    <label for="package_id">Package</label>
                                    <div class="input-container">
                                        <i class="fa fa-square icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="package_id" value="{{$acrs->package_id}}" readonly> 
                                    </div>
                                    @error('package_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="request_type">Request Type</label>
                                    <div class="input-container">
                                        <i class="fa fa-file-text icon" aria-hidden="true"></i>
                                        <select name="request_type" id="request_type" class="form-control" style="height:39px;">
                                        <option style="hight:39px;" disabled selected>--select request type--</option>
                                        <option value="Amount Confirm" @php echo $acrs->request_type == 'Amount Confirm' ? 'selected': ''; @endphp>Amount Confirm</option>
                                        <option value="Amount on pending" @php echo $acrs->request_type == 'Amount on pending'? 'selected': ''; @endphp>Amount on pending</option>
                                        <option value="Amount Not Received" @php echo $acrs->request_type == 'Amount Not Received'? 'selected':''; @endphp>Amount Not Received</option>    
                                    </select>
                                    </div>
                                    @error('request_type')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="final_ammount">Finalize Amount</label>
                                    <div class="input-container">
                                        <i class="fa fa-handshake-o icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="final_ammount" value="{{$acrs->final_ammount}}"> 
                                    </div>
                                    @error('final_ammount')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="bank_id">Bank</label>
                                    <div class="input-container">
                                        <i class="fa fa-university icon" aria-hidden="true"></i>
                                        <select class="form-control" name="bank_id" id="" style="height: 39px;">
                                                <option style="height: 39px;" disabled selected>--selected Bank Name--</option>
                                                @foreach($banks as $bank)
                                                    <option value="{{$bank->id}}" {{$bank->id == $acrs->bank_id ? 'selected': ""}}>{{$bank->bank_name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    @error('bank_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="deposit_date">Deposit Date</label>
                                    <div class="input-container">
                                        <i class="fa fa-calendar icon" aria-hidden="true"></i>
                                        <input type="date" class="form-control" name="deposit_date" value="{{$acrs->deposit_date}}"> 
                                    </div>  
                                    @error('deposit_date')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="payment_mode">Payment mode</label>
                                    <div class="input-container">
                                        <i class="fa fa-credit-card icon" aria-hidden="true"></i>
                                        <select name="payment_mode" class="form-control" style="height:39px;" id="payment_mode">
                                            <option style="hight:39px;"  disable selected>--Select Payment Mode--</option>
                                            <option value="Cash" @php echo $acrs->payment_mode == 'Cash' ? 'selected': ''; @endphp>Cash</option>
                                            <option value="Online" @php echo $acrs->payment_mode == 'Online' ? 'selected' : ''; @endphp>Online</option>
                                            <option value="offline" @php echo $acrs->payment_mode == 'offline' ? 'selected' : ''; @endphp>offline</option>
                                        </select>        
                                    </div>
                                    @error('payment_mode')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="neft_payment">Cheque/Ref. No /Tran. ID/ UTR / Branch Code</label>
                                    <div class="input-container">
                                        <i class="fa fa-credit-card icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="neft_payment" value="{{$acrs->neft_payment}}"> 
                                    </div>
                                    @error('neft_payment')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="amount">Amount</label>
                                    <div class="input-container">
                                        <i class="fa fa-money icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="amount" value="{{$acrs->amount}}"> 
                                    </div>
                                    @error('amount')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="advance_amount">Advance amount deposit with us</label>
                                    <div class="input-container">
                                        <i class="fa fa-smile-o icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="advance_amount" value="{{$acrs->advance_amount}}"> 
                                    </div>
                                    @error('advance_amount')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="narration">Narration</label>
                                    <div class="input-container">
                                        <i class="fa fa-microphone icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="narration" value="{{$acrs->narration}}"> 
                                    </div>
                                    @error('narration')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="attachment">Attachment for refrence</label>
                                    <div class="input-container">
                                        <a data-input="thumbnail-attachment" data-preview="preview-attachment" class="lfm">
                                            <i class="fa fa-paperclip icon" aria-hidden="true"></i>
                                        </a>
                                        <input id="thumbnail-attachment" class="choose_input choose_img_width" value="{{$acrs->attachment}}" type="text" name="attachment" readonly>
                                    </div>
                                    <div id="preview-attachment" style="margin-top:15px;max-height:100px;">
                                        <img src= "{{$acrs->attachment}}" style="margin-top:15px;max-height:100px;" />
                                    </div>
                                    @error('attachment')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12 ml-2 text-center">
                            <button class="btn btn-primary"> Edit</button>
                            <a class="btn btn-md fs-1 btn-light" href="/acr"> Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script> 
        jQuery('.lfm').filemanager('image', {prefix:'{{route("unisharp.lfm.show")}}'});
    </script>
@endpush
