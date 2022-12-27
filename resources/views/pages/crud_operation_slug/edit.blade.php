@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'user_slug'
])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-10"> 
                <form  method="post" action="{{route('slug.update', [$slugs->id])}}"> 
                    @csrf
                    @method('PATCH')
                    <div class="card">
                        <div class="card-header card-header-primary bg-primary">
                            <h4 class="card-title text-white">{{ __('Edit User Permission Slug') }}</h4>
                        </div>
                        <div class="card-body ml-3 mr-3">
                            <div class="row">
                                <div class="form-group col-md-6">
                                        <label for="name"  class="col-form-label"> Designation Edit Name</label>
                                        <div class="input-container">
                                            <i class="fa fa-file-text icon" aria-hidden="true"></i>
                                            <input type="text" class="form-control" id="name" name="name" value="{{$slugs->name}}">
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </div>  
                                <div class="col-lg-6">
                                        <label for="slug"  class="col-form-label"> Designation-Edit Operation</label>
                                        <div class="input-container">
                                            <i class="fa fa-pencil-square-o icon" aria-hidden="true"></i>
                                            <input type="text" class="form-control" id="slug" name="slug" value="{{$slugs->slug}}">
                                        </div>
                                            @error('slug')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                </div>
                                <div class="form-group col-lg-6 mt-5">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a type="button" href="/slug" class="btn btn-md fs-1 btn-light" >cencel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection