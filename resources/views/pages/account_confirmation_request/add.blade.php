@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'add'
])
@section('content') 

@php 
    $user_permisions = App\Http\Controllers\SlugController::get_user_permissions(Auth()->user()->id);
@endphp
@if( in_array('create_account', $user_permisions ) )
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-10"> 
                <form  method="post" action="{{route('acr.store')}}">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary bg-primary">
                            <h4 class="card-title text-white text-center" >{{ __('ACCOUNT CONFIRMATION FORM') }}</h4>
                        </div>
                        <div class="card-body ml-3 mr-3">
                            <div class="row">
                                <div class="form-group col-md-4 ml-auto">
                                    <button type="button" class="btn d-block ml-auto"  style=" background: #51cbce; color: white;  text-align: center;
                                        background-image: linear-gradient(to bottom right, #6259ca 0%, rgb(98 89 202 / 60%) 100%);
                                        box-shadow: 0 7px 12px 0 rgb(98 89 202 / 20%);"  onclick="displayDivDemo()">
                                        <i class="fa fa-search " aria-hidden="true"></i>
                                        Search
                                    </button>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="form-group col-md-6 ">
                                    <label for="project_id">Enter Project ID</label>
                                    <div class="input-container">
                                        <i class="fa fa-id-card icon" aria-hidden="true"></i>
                                        <select class="form-control" id="project_id" name="project_id" style="height: 39px;">
                                            <option style="height: 39px;" disabled selected>--Select Proprietor ID--</option>
                                                @if($prospects)
                                                @foreach($prospects as $prospect)
                                                    <option value="{{$prospect->id}}" {{old('project_id') == $prospect->id ? 'selected': ''}}>{{$prospect->id}}</option>
                                                @endforeach
                                                @endif
                                        </select>
                                    </div>
                                    @error('project_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12" id="hideValuesOnSelect" >
                                    <label for="client_name" style="display:none;" >Client Name</label>
                                    <div class="row" >
                                        @foreach($prospects as $prospect)
                                            <div class="col-sm-6" style="display:none;" >
                                                <input type="text" class="form-control" name="client_name" value="{{$prospect->name}}" id="{{$prospect->name}}"> 
                                                <label for="{{$prospect->name }}">
                                                <i class="fa fa-inr" aria-hidden="true"></i>{{$prospect->name}}
                                                </label>
                                            </div>
                                        @endforeach 
                                    </div>
                                    @error('client_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row" >
                                <div class="form-group col-md-6" style="display:none;" >
                                    <label for="contact_no">Contact No</label>
                                    <div class="input-container"  >
                                        <i class="fa fa-phone icon" aria-hidden="true"></i>
                                        @foreach($prospects as $prospect)
                                            <option value="{{$prospect->id}}" {{old('contact_no') == $prospect->cell ? 'selected': ''}}>{{$prospect->cell}}</option>
                                        @endforeach
                                    </div>
                                    @error('contact_no')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6" style="display:none;" >
                                    <label for="district">Dist</label>
                                    <div class="input-container" >
                                        <i class="fa fa-map-marker icon" aria-hidden="true"></i>
                                        @foreach($prospects as $prospect)
                                            <option value="{{$prospect->id}}" {{old('district') == $prospect->city ? 'selected': ''}}>{{$prospect->city}}</option>
                                        @endforeach
                                    </div>
                                    @error('district')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6" style="display:none;" >
                                    <label for="state_id">State</label>
                                    <div class="input-container">
                                        <i class="fa fa-building-o icon" aria-hidden="true"></i>
                                        @foreach($prospects as $prospect)
                                            <option value="{{$prospect->id}}" {{old('state_id') == $prospect->state_id ? 'selected': ''}}>{{$prospect->state_id}}</option>
                                        @endforeach
                                      <!-- @foreach($prospects as $prospect)
                                            <input type="text" class="form-control"  name="state_id" value="{{$prospect->state_id}}" id="{{$prospect->state_id}}" >
                                        @endforeach  -->
                                    </div>
                                    @error('state_id')
                                            <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6" style="display:none;" >
                                    <label for="whatsapp_no">Whats App no</label>
                                    <div class="input-container">
                                        <i class="fa fa-whatsapp icon" aria-hidden="true"></i>
                                        @foreach($prospects as $prospect)
                                            <option value="{{$prospect->id}}" {{old('whatsapp_no') == $prospect->whatsapp_no ? 'selected': ''}}>{{$prospect->state_id}}</option>
                                        @endforeach
                                    </div>
                                    @error('whatsapp_no')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6" style="display:none;" >
                                    <label for="package_id">Package</label>
                                    <div class="input-container">
                                        <i class="fa fa-square icon" aria-hidden="true"></i>
                                        @foreach($prospects as $prospect)
                                            <option value="{{$prospect->id}}" {{old('package_id') == $prospect->package_id ? 'selected': ''}}>{{$prospect->package_id}}</option>
                                        @endforeach
                                    </div>
                                    @error('package_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6" style="display:none;" >
                                    <label for="email_id">Package</label>
                                    <div class="input-container">
                                        <i class="fa fa-square icon" aria-hidden="true"></i>
                                        @foreach($prospects as $prospect)
                                            <option value="{{$prospect->id}}" {{old('email_id') == $prospect->email_id ? 'selected': ''}}>{{$prospect->email_id}}</option>
                                        @endforeach
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
                                        <option value="Amount Confirm" @if (old('request_type') == "Amount Confirm") {{ 'selected' }} @endif>Amount Confirm</option>
                                        <option value="Amount on pending" @if (old('request_type') == "Amount on pending") {{ 'selected' }} @endif>Amount on pending</option>
                                        <option value="Amount Not Received" @if (old('request_type') == "Amount Not Received") {{ 'selected' }} @endif>Amount Not Received</option>    
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
                                        <input type="text" class="form-control" name="final_ammount" value="{{old('final_ammount')}}"  placeholder="final_ammount">
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
                                        <select name="bank_id" id="bank_id" class="form-control" style="height: 39px;">
                                            <option disabled selected>--select Bank Name--</option>
                                            @foreach($banks as $bank)
                                                <option value="{{$bank->id}}" {{old('bank_id') == $bank->id ? 'selected' : ''}}> {{$bank->bank_name}} </option>
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
                                        <input type="date" class="form-control" name="deposit_date" value="{{old('deposit_date')}}"  placeholder="Deposit Date ">
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
                                                <option value="Cash" @if (old('payment_mode') == "Cash") {{ 'selected' }} @endif>Cash</option>
                                                <option value="Online" @if (old('payment_mode') == "Online") {{ 'selected' }} @endif>Online</option>
                                                <option value="offline" @if (old('payment_mode') == "offline") {{ 'selected' }} @endif>offline</option>
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
                                        <input type="text" class="form-control" name="neft_payment" value="{{old('neft_payment')}}"  placeholder="neft_payment ">
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
                                        <input type="text" class="form-control" name="amount" value="{{old('amount')}}"  placeholder="Amount">
                                    </div>
                                    @error('amount')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="advance_amount">Advance amount deposit with us</label>
                                    <div class="input-container">
                                        <i class="fa fa-smile-o icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="advance_amount" value="{{old('advance_amount')}}"  placeholder="advance_amount">
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
                                        <input type="text" class="form-control" name="narration" value="{{old('narration')}}"  placeholder="narration">
                                    </div>
                                    @error('narration')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="attachment">Attachment for refrence</label>
                                    <div class="input-container">
                                        <!-- <i class="fa fa-paperclip icon" aria-hidden="true"></i> -->
                                        <a data-input="thumbnail-attachment" data-preview="preview-attachment" class="lfm">
                                        <i class="fa fa-paperclip icon" aria-hidden="true"></i>

                                        </a>
                                        <input id="thumbnail-attachment" class="choose_input choose_img_width" value="{{old('attachment')}}" type="text" name="attachment" readonly>
                                    </div>
                                    <div id="preview-attachment" style="margin-top:15px;max-height:100px;">
                                    </div>
                                    @error('attachment')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12 ml-2 text-center">
                            <button class="btn btn-primary submit-btn"><i class="fa fa-sign-in"></i> Submit</button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
@endif    
<!-- <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-10">
                <div class="card">
                    <div class="card-header card-header-primary bg-primary">
                        <h4 class="card-title text-white text-center" >{{ __('AMOUNT CONFIRMATION LIST') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive"> 
                            <table id="table" class="table table-striped table-no-bordered table-hover">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Id</th>
                                        <th>Client Name</th>
                                        <th>Contact No</th>
                                        <th>District</th>
                                        <th>WhatsApp No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0  @endphp
                                    @foreach($acrs as $acr)
                                        @php $i++; @endphp
                                        <tr>
                                            <td> @php echo $i; @endphp</td>
                                            <td>{{ $acr->client_name }}</td> 
                                            <td>{{ $acr->contact_no }}</td> 
                                            <td>{{ $acr->district }}</td> 
                                            <td>{{ $acr->whatsapp_no }}</td> 
                                            <td class="td-actions row">
                                                <a  href="{{ route('acr.edit', [$acr->id])}}" type="button" class="btn btn-success btn-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <form  method="post" action="{{ route('acr.destroy', [$acr->id])}}"> 
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form> 
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>     -->
@endsection 

@push('scripts')
    <script> 
        jQuery('.lfm').filemanager('image', {prefix:'{{route("unisharp.lfm.show")}}'});
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script> 
    jQuery(document).on('change','#project_id', function () {
        id = jQuery(this).val();
        $.ajax({
            url: "{{route('getdata')}}", 
            data : {'_token' : "{{ csrf_token() }}",id: id},
            type : 'POST',
            success: function(result){
                console.log(result)
                var name = $.parseJSON(result);
                var html = '';
                $.each(name, function( index, value ) {
                    html += '<div class="form-group col-md-6">'+
                                '<label>Client Name </label>'+
                                '<div class="input-container">'+
                                    '<i class="fa fa-user icon" aria-hidden="true"></i>'+
                                    '<input type="text" class="form-control" name="client_name" value="'+value.name+'" id="{{$prospect->name}}" readonly>'+
                                '</div>'+
                            '</div>';
                    html +=  '<div class="form-group col-md-6">'+
                                '<label>Contact Number </label>'+
                                '<div class="input-container">'+
                                    '<i class="fa fa-phone icon" aria-hidden="true"></i>'+
                                    '<input type="text" class="form-control" name="contact_no" value="'+value.cell+'" id="{{$prospect->cell}}" readonly>'+
                                '</div>'+
                            '</div>';
                    html += '<div class="form-group col-md-6">'+
                                '<label>District</label>'+
                                '<div class="input-container">'+
                                    '<i class="fa fa-map-marker icon" aria-hidden="true"></i>'+
                                    '<input type="text" class="form-control" name="district" value="'+value.city+'" id="{{$prospect->city}}" readonly>'+
                                '</div>'+
                            '</div>';
                    html += '<div class="form-group col-md-6">'+
                                '<label>State</label>'+
                                '<div class="input-container">'+
                                    '<i class="fa fa-building-o icon" aria-hidden="true"></i>'+
                                    '<input type="text" class="form-control" name="state_id" value="'+value.state_info.state+'" id="{{$prospect->state_id}}" readonly>'+
                                '</div>'+
                            '</div>';
                    html += '<div class="form-group col-md-6">'+
                                '<label>WhatsApp Number</label>'+
                                '<div class="input-container">'+
                                    '<i class="fa fa-whatsapp icon" aria-hidden="true"></i>'+
                                    '<input type="text" class="form-control" name="whatsapp_no" value="'+value.whatsapp_no+'" id="{{$prospect->whatsapp_no}}" readonly>'+
                                '</div>'+
                            '</div>';
                    html += '<div class="form-group col-md-6">'+
                                '<label>Package </label>'+
                                '<div class="input-container">'+
                                    '<i class="fa fa-square icon" aria-hidden="true"></i>'+
                                    '<input type="text" class="form-control" name="package_id" value="'+value.package_info.Plannig_package_name+'" id="{{$prospect->package_id}}" readonly>'+
                                '</div>'+
                            '</div>';
                    html += '<div class="form-group col-md-6">'+
                        '<label>Email </label>'+
                        '<div class="input-container">'+
                            '<i class="fa fa-square icon" aria-hidden="true"></i>'+
                            '<input type="email" class="form-control" name="email_id" value="'+value.email_id+'" id="{{$prospect->email_id}}" readonly>'+
                        '</div>'+
                    '</div>';
                
                            
                });
                $('#hideValuesOnSelect .row').html(html);
            }
        });
    }); 
    </script>
@endpush
                                     