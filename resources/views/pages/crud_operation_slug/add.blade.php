@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'user_slug'
])
@section('content')
@php 
    $user_permisions = App\Http\Controllers\SlugController::get_user_permissions(Auth()->user()->id);
@endphp
@if( in_array('create_slug', $user_permisions ) )
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-10"> 
                <form  method="post" action="{{route('slug.store')}}"> 
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary bg-primary">
                            <h4 class="card-title text-white text-center">{{ __('Add User Permission Slug Form') }}</h4>
                        </div>
                        <div class="card-body ml-3 mr-3">
                            <div class="row">
                                <div class="form-group col-md-6">
                                        <label for="name"  class="col-form-label"> Designation Name</label>
                                        <div class="input-container">
                                            <i class="fa fa-file-text icon" aria-hidden="true"></i>
                                            <input type="text" class="form-control" id="name" name="name" placeholder=" Designation Edit">
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </div>  
                                <div class="col-lg-6">
                                        <label for="slug"  class="col-form-label"> Designation-Edit Operation</label>
                                        <div class="input-container">
                                            <i class="fa fa-pencil-square-o icon" aria-hidden="true"></i>
                                            <input type="text" class="form-control" id="slug" name="slug" placeholder="CRUD Operation">
                                        </div>
                                            @error('slug')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                </div>
                                <div class="form-group col-lg-6 mt-5">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif    
@if( in_array('list_slug', $user_permisions ) )
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-10"> 
                <div class="card">
                    <div class="card-header card-header-primary bg-primary">
                        <h4 class="card-title text-white text-center" >{{ __('User Permission Slug LIST') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive"> 
                            <table id="table" class="table table-striped table-no-bordered table-hover">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Id</th>
                                        <th>name</th>
                                        <th>slug</th>
                                        @if( in_array('edit_slug', $user_permisions ) || in_array('delete_slug', $user_permisions ) )
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                @php $i = 0  @endphp
                                    @foreach($slugs as $slug)
                                        @php $i++; @endphp
                                        <tr>
                                            <td> @php echo $i; @endphp</td>
                                            <td>{{ $slug->name }}</td> 
                                            <td>{{ $slug->slug }}</td> 
                                            <td class="td-actions row">
                                            @if( in_array('edit_slug', $user_permisions ) )
                                                <a href="{{route('slug.edit', [$slug->id])}}" type="button" class="btn btn-success btn-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                                            @endif
                                            @if( in_array('delete_slug', $user_permisions ) )
                                                <form action="{{route('slug.destroy',[$slug->id])}}" method='post'>
                                                    @csrf 
                                                    @method('delete')
                                                    <button type="submit" onclick ="return confirm('Are you sure')"  class="btn btn-danger btn-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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