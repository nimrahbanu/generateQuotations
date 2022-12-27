@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'user_role'
])
@section('content')

@php 
    $user_permisions = App\Http\Controllers\SlugController::get_user_permissions(Auth()->user()->id);
@endphp
@if( in_array('create_user_role', $user_permisions ) )
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-10"> 
                <form  method="post" action="{{route('user-role.store')}}"> 
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary bg-primary">
                            <h4 class="card-title text-white text-center">{{ __('User Role Form') }}</h4>
                        </div>
                        <div class="card-body ml-3 mr-3">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="user_name"  class="col-form-label"> User Role Name</label>
                                    <div class="input-container">
                                        <i class="fa fa-users icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter User Role Name">
                                    </div>
                                    @error('user_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    @foreach($user_slugs as $user_slug)
                                        <div class="col-sm-4">
                                            <input type="checkbox" name="user_permission[]" value="{{$user_slug->id}}" id="{{$user_slug->slug}}"> <label for="{{$user_slug->slug}}">{{$user_slug->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('user_permission')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 mt-5">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div> 
                    </div> 
                </form>
            </div>
        </div>
    </div>
@endif
@if( in_array('list_user_role', $user_permisions ) )
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-1 col-md-10"> 
                    <div class="card">
                        <div class="card-header card-header-primary bg-primary">
                            <h4 class="card-title text-white text-center" >{{ __('User Role List') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive"> 
                                    <table id="table" class="table table-striped table-no-bordered table-hover">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                @if( in_array('edit_user_role', $user_permisions ) || in_array('delete_user_role', $user_permisions ) )
                                                    <th>Action</th>
                                                @endif    
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $i = 0  @endphp
                                            @foreach($user_roles as $user_role)
                                                @php $i++; @endphp
                                                <tr>
                                                    <td> @php echo $i; @endphp</td>
                                                    <td>{{ $user_role->user_name }}</td> 
                                                    <td>
                                                        @if(!empty(($user_role->user_permission)))
                                                            @php 
                                                                $permissions = json_decode($user_role->user_permission);
                                                                $all_permission = \App\Models\UserSlug::whereIn('id',$permissions)->where('deleted_date', NULL)->get();
                                                            @endphp
                                                            @foreach( $all_permission as $permission)
                                                                {{ $permission->name }}, 
                                                            @endforeach
                                                        @endif
                                                    </td> 
                                                    <td class="td-actions row">
                                                    @if( in_array('edit_user_role', $user_permisions ) )
                                                        <a  href="{{route('user-role.edit',[$user_role->id])}}" type="button" class="btn btn-success btn-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    @endif
                                                    @if( in_array('delete_user_role', $user_permisions ) )
                                                        <form  method="post" action="{{route('user-role.destroy',[$user_role->id])}}"> 
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