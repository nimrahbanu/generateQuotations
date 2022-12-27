@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'list'
])
@section('content') 


@php 
    $user_permisions = App\Http\Controllers\SlugController::get_user_permissions(Auth()->user()->id);
@endphp
@if( in_array('list_account', $user_permisions ) )
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-10">
                <div class="card">
                    <div class="card-header card-header-primary bg-primary">
                        <h4 class="card-title text-white text-center" >{{ __('ACCOUNT CONFIRMATION LIST') }}</h4>
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
                                        @if( in_array('edit_account', $user_permisions ) || in_array('delete_acconut', $user_permisions ) || in_array('view_account', $user_permisions ) || in_array('email_account', $user_permisions ) || in_array('download_acconut', $user_permisions ) )
                                            <th>Action</th>
                                        @endif    
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
                                            @if( in_array('download_acconut', $user_permisions ) )
                                                <form  method="post" action="{{route('acr-email')}}"> 
                                                    @csrf
                                                    <input type="hidden" class="form-group" id="project_id" name="project_id" value="{{ $acr->project_id }}">
                                                    <input type="hidden" class="form-group" id="client_name" name="client_name" value="{{ $acr->client_name }}">
                                                    <input type="hidden" class="form-group" id="district" name="district" value="{{$acr->district}}">
                                                    <input type="hidden" class="form-group" id="state_id" name="state_id" value="{{$acr->state_id}}">
                                                    <input type="hidden" class="form-group" id="package_id" name="package_id" value="{{$acr->package_id}}">
                                                    <input type="hidden" class="form-group" id="request_type" name="request_type" value="{{$acr->request_type }}">
                                                    <input type="hidden" class="form-group" id="final_ammount" name="final_ammount" value="{{$acr->final_ammount }}">
                                                    <input type="hidden" class="form-group" id="deposit_date" name="deposit_date" value="{{$acr->deposit_date }}">
                                                    <input type="hidden" class="form-group" id="amount" name="amount" value="{{$acr->amount }}">
                                                    <input type="hidden" class="form-group" id="advance_amount" name="advance_amount" value="{{$acr->advance_amount }}">
                                                    <input type="hidden" class="form-group" id="download_pdf" name="download_pdf" value="1">
                                                    <button type="submit" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i></button>
                                                </form>
                                            @endif
                                            @if( in_array('email_account', $user_permisions ) )
                                                <form  method="post" action="{{route('acr-email')}}"> 
                                                    @csrf
                                                    <input type="hidden" class="form-group" id="project_id" name="project_id" value="{{ $acr->project_id }}">
                                                    <input type="hidden" class="form-group" id="client_name" name="client_name" value="{{ $acr->client_name }}">
                                                    <input type="hidden" class="form-group" id="district" name="district" value="{{$acr->district}}">
                                                    <input type="hidden" class="form-group" id="state_id" name="state_id" value="{{$acr->state_id}}">
                                                    <input type="hidden" class="form-group" id="package_id" name="package_id" value="{{$acr->package_id}}">
                                                    <input type="hidden" class="form-group" id="request_type" name="request_type" value="{{$acr->request_type }}">
                                                    <input type="hidden" class="form-group" id="final_ammount" name="final_ammount" value="{{$acr->final_ammount }}">
                                                    <input type="hidden" class="form-group" id="deposit_date" name="deposit_date" value="{{$acr->deposit_date }}">
                                                    <input type="hidden" class="form-group" id="amount" name="amount" value="{{$acr->amount }}">
                                                    <input type="hidden" class="form-group" id="advance_amount" name="advance_amount" value="{{$acr->advance_amount }}">
                                                    <input type="hidden" class="form-group" id="email" name="email" value="1"> 
                                                    <button type="submit" class="btn btn-warning"><i class="fa fa-envelope" aria-hidden="true"></i></button>
                                                </form>
                                            @endif
                                            @if( in_array('edit_account', $user_permisions ) )
                                                <a  href="{{ route('acr.edit', [$acr->id])}}" type="button" class="btn " style = "background-color:pink;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            @endif
                                            @if( in_array('delete_acconut', $user_permisions ) )
                                                <form  method="post" action="{{ route('acr.destroy', [$acr->id])}}"> 
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger "><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form> 
                                            @endif
                                            @if( in_array('view_account', $user_permisions ) )
                                                <a href="{{route('acr.show', [$acr->id])}}" rel="tooltip"  class="btn btn-success "><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            @endif
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
</div>    
@endif
@endsection 
