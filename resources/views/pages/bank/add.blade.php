@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'bank'
])
@section('content') 

@php 
    $user_permisions = App\Http\Controllers\SlugController::get_user_permissions(Auth()->user()->id);
@endphp
@if( in_array('create_bank', $user_permisions ) )
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-10"> 
                <form method="post" action="{{ route('bank.store') }}">
                    @csrf 
                    <div class="card">
                        <div class="card-header card-header-primary bg-primary">
                            <h4 class="card-title text-white text-center" >{{ __('BANK FORM') }}</h4>
                        </div>
                        <div class="card-body ml-3 mr-3">
                            <div class="row" >
                                <div class="form-group col-md-6">
                                    <label for="bank_name">Bank Name</label>
                                    <div class="input-container">
                                    <i class="fa fa-university icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="bank_name" value="{{old('bank_name')}}" placeholder="Bank Name">
                                    </div> 
                                    @error('bank_name')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12 ml-2">
                            <button class="btn btn-primary ">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif    
@if( in_array('list_bank', $user_permisions ) )

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-10">
                <div class="card">
                    <div class="card-header card-header-primary bg-primary">
                        <h4 class="card-title text-white text-center">{{ __('BANK LIST') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-stripped table-no-bordered-table-hover" id="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Bank Name</th>
                                        @if( in_array('edit_bank', $user_permisions ) || in_array('delete_bank', $user_permisions ) )
                                            <th>Action</th>
                                        @endif    
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach($banks as $bank)
                                        @php $i++; @endphp 
                                            <tr>
                                                <td>@php echo $i; @endphp</td>
                                                <td> {{$bank->bank_name}} </td>
                                                <td class="td-actions row">
                                                @if( in_array('edit_bank', $user_permisions )  )
                                                    <a href="{{route('bank.edit', [$bank->id])}}" type="button" class="btn btn-success btn-edit">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </a>
                                                @endif    
                                                @if(  in_array('delete_bank', $user_permisions ) )
                                                    <form method="post" action="{{route('bank.destroy', [$bank->id])}}">
                                                        @csrf 
                                                        @method('delete')
                                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-delete"> 
                                                        <i class="fa fa-trash-o"></i> </button>
                                                    </form>
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