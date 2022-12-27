@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'work_name'
])
@section('content')

@php 
    $user_permisions = App\Http\Controllers\SlugController::get_user_permissions(Auth()->user()->id);
@endphp
@if( in_array('create_work_name', $user_permisions ) )
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-10"> 
                <form  method="post" action="{{route('work-name.store')}}"> 
                @csrf
                    <div class="card">
                        <div class="card-header card-header-primary bg-primary">
                            <h4 class="card-title text-white text-center" >{{ __('WORK NAME FORM') }}</h4>
                        </div>
                        <div class="card-body ml-3 mr-3">
                            <div class="row" >
                                <div class="form-group col-md-6 ">
                                    <label for="work_name">Work Name</label>
                                    <div class="input-container">
                                    <i class="fa fa-briefcase icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="work_name" value="{{old('work_name')}}" placeholder="Enter Work Name">
                                    </div> 
                                    @error('work_name')
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
@if( in_array('list_work_name', $user_permisions ) )

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-1 col-md-10"> 
                    <div class="card">
                        <div class="card-header card-header-primary bg-primary">
                            <h4 class="card-title text-white text-center" >{{ __('WORK NAME LIST') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive"> 
                                    <table id="table" class="table table-striped table-no-bordered table-hover">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>Id</th>
                                                <th>Work Name</th>
                                                @if( in_array('edit_work_name', $user_permisions ) || in_array('delete_work_name', $user_permisions ) )          
                                                    <th>Action</th>
                                                @endif    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 0  @endphp
                                            @foreach($work_name as $work_name)
                                                @php $i++; @endphp
                                                <tr>
                                                    <td> @php echo $i; @endphp</td>
                                                    <td>{{ $work_name->work_name }}</td> 
                                                    <td class="td-actions row">
                                                    @if( in_array('edit_work_name', $user_permisions ) )          
                                                        <a  href="{{route('work-name.edit',[$work_name->id])}}" type="button" class="btn btn-success btn-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    @endif    
                                                    @if( in_array('delete_work_name', $user_permisions ) )          
                                                        <form  method="post" action="{{route('work-name.destroy',[$work_name->id])}}"> 
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
</div>
@endsection
