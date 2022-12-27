@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'bank'
])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-1 col-md-10">
                    <form action="{{ route('bank.update', [$banks->id]) }}" method="post">
                        @csrf 
                        @method('PATCH')
                        <div class="card">
                            <div class="card-header card-header-primary bg-primary">
                                <h4 class="card-title text-white">{{ __('BANK NAME EDIT FORM')}} </h4>
                            </div>
                            <div class="card-body mt-3 mr-3">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="bank_name">Bank Name</label>
                                        <div class="input-container">
                                        <i class="fa fa-university icon" aria-hidden="true"></i>
                                            <input type="text" name="bank_name" value="{{$banks->bank_name}}" class="form-control">
                                        </div>
                                        @error('bank_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12 ml-2">
                                <button class="btn btn-primary"> Update</button>
                                <a class="btn btn-md fs-1 btn-light" href="/bank"> Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection