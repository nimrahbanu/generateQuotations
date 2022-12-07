@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'measurement'
])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-10"> 
            <form method="post" action="{{route('measurement.update', [$measurement->id])}}"> 
                @csrf
                @method('PATCH')
                    <div class="card">
                        <div class="card-header card-header-primary bg-primary">
                            <h4 class="card-title text-white" >{{ __('MEASUREMENT UPDATE FORM') }}</h4>
                        </div>
                        <div class="card-body ml-3 mr-3">
                            <div class="row" >
                                <div class="form-group col-md-6 ">
                                    <label for="measurement_name">Measurement Name</label>
                                    <div class="input-container">
                                        <i class="fa fa-building-o icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="measurement_name"  value="{{$measurement->measurement_name}}" placeholder="Measurement Name">
                                    </div> 
                                    @error('measurement_name')
                                             <span class="text-danger">{{$message}}</span>
                                        @enderror 
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="measurement_short_name">Measurement Short Name</label>
                                    <div class="input-container">
                                        <i class="fa fa-building-o icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="measurement_short_name"  value="{{$measurement->measurement_short_name}}" placeholder="Measurement Short Name">
                                    </div> 
                                    @error('measurement_short_name')
                                             <span class="text-danger">{{$message}}</span>
                                        @enderror 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12 ml-2">
                            <button class="btn btn-primary ">Add</button>
                            <a class="btn btn-md fs-1 btn-light" href="/measurement" >Cancel</a>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>
@endsection
