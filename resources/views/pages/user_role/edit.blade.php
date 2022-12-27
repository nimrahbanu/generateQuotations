@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'user_role'
])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-10"> 
                <form  method="post" action="{{route('user-role.update', [$user_roles->id])}}"> 
                    @csrf
                    @method('PATCH')
                    <div class="card">
                        <div class="card-header card-header-primary bg-primary">
                            <h4 class="card-title text-white">{{ __('User Role Edit Form') }}</h4>
                        </div>
                        <div class="card-body ml-3 mr-3">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="user_name"  class="col-form-label"> User Role Name</label>
                                    <div class="input-container">
                                        <i class="fa fa-users icon" aria-hidden="true"></i>
                                        <input type="text" class="form-control" id="user_name" name="user_name" value="{{$user_roles->user_name}}">
                                    </div>
                                    @error('user_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    @foreach($user_slugs as $user_slug)
                                        @php 
                                            $checked = "";
                                            $user_permissions = json_decode($user_roles->user_permission);
                                            if( in_array($user_slug->id, $user_permissions) ){
                                                $checked = "checked";
                                            }
                                        @endphp
                                        <div class="col-sm-4">
                                            <input type="checkbox" {{$checked}} name="user_permission[]" value="{{$user_slug->id}}" id="{{$user_slug->slug}}"> <label for="{{$user_slug->slug}}">{{$user_slug->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('user_permission')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 mt-5">
                                <button type="submit" class="btn btn-primary">Update</button>
                            <a class="btn btn-md fs-1 btn-light" href="/user-role" >Cancel</a>
                            </div>
                        </div> 
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection