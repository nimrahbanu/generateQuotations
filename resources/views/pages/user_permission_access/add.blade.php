@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'permission'
])
@section('content')
@php 
    $user_permisions = App\Http\Controllers\SlugController::get_user_permissions(Auth()->user()->id);
@endphp
@if( in_array('create_user', $user_permisions ) )
<div class="content">
   <div class="container-fluid">
      <div class="row">
        <div class="offset-md-1 col-md-10"> 
            <form  method="post" action="{{route('user.store')}}" enctype="multipart/form-data" > 
                  @csrf
                  <div class="card">
                     <div class="card-header card-header-primary bg-primary">
                           <h4 class="card-title text-white text-center" >{{ __('USER FORM') }}</h4>
                     </div>
                     <div class="card-body ml-3 mr-3">
                        <div class="row">
                           <div class="form-group col-md-6 ">
                              <label for="name" >Add User Name</label>
                                    <div class="input-container">
                                       <i class="fa fa-user icon" aria-hidden="true"></i>
                                       <input type="text" autocomplete="false" class="form-control" value="{{old('name')}}" name="name" id="name" placeholder="Enter Your Name">
                                    </div>
                              @error('name')
                                    <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <div class="col-lg-6">
                              <label for="email" class=" col-form-label"> Email ID</label>
                              <div class="input-container">
                                 <i class="fa fa-envelope icon" aria-hidden="true"></i>
                                    <input type="text" autocomplete="false" class="form-control" value="{{old('email')}}" name="email" id="email" placeholder="Enter Your Email">
                              </div>
                              @error('email')
                                    <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>   
                        <div class="row mt-3">
                           <div class="col-lg-6">
                              <label for="password" class="col-form-label"> Password</label>
                              <div class="input-container">
                                 <i class="fa fa-key icon" aria-hidden="true"></i>
                                 <input  class="form-control" autocomplete="false" value="{{old('password')}}" type="password" name="password" id="show"  minlength="8" placeholder="Enter Your Password">
                              </div>
                              <label for="password">Show Password</label>
                              <input type="checkbox" name="password" onclick="myfunction()"id="password">
                                 @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                           </div>
                           <div class="col-lg-6">
                              <label for="mobile_no" class=" col-form-label"> mobile_no</label>
                              <div class="input-container">
                                    <i class="fa fa-phone icon" aria-hidden="true"></i>
                                    <input type="text" autocomplete="false" class="form-control" value="{{old('mobile_no')}}" name="mobile_no" id="mobile_no" placeholder="Enter Your mobile No">
                                 </div>
                                 @error('mobile_no')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                           </div>
                        </div>
                        <div class="row mt-3">
                           <div class="col-lg-6">
                              <label for="user_role" class=" col-form-label">User Role</label>
                              <div class="input-container">
                                 <i class="fa fa-users icon" aria-hidden="true"></i>
                                 <select name="user_role" class="form-control" style="height:39px;" id="user_role">
                                       <option  disabled selected>--Select User Role Type--</option>
                                       @foreach ($user_roles as $user_role)
                                       <option value="{{$user_role->id}}" >{{$user_role->user_name}}</option>
                                       @endforeach
                                 </select> 
                              </div>
                              @error('user_role')
                                 <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <div class="col-lg-6">
                              <label for="user_occupation" class=" col-form-label">Add User Occupation</label>
                              <div class="input-container">
                              <i class="fa fa-briefcase icon" aria-hidden="true"></i>
                                    <select class="form-control" id="user_occupation" style="height:39px;" name="user_occupation">
                                       <option value="" disabled selected>--Select Occupation--</option>
                                       <option value="Marketing" @if (old('user_occupation') == 'Marketing') {{'selected' }} @endif>Marketing</option>
                                       <option value="Sales" @if (old('user_occupation') == 'Sales') {{'selected' }} @endif >Sales</option>
                                       <option value="Designer" @if (old('user_occupation') == 'Designer') {{ 'selected' }}  @endif>Designer</option>
                                       <option value="Executive" @if (old('user_occupation') == 'Executive') {{'selected' }} @endif>Executive</option>
                                    </select>
                              </div>
                              @error('user_occupation')
                                 <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12">
                                 <label for="id_proof" >ID proof</label>
                                 <div class="input-container">
                                       <a data-input="thumbnail-id_proof" data-preview="preview-id_proof" class="lfm mt-0 mr-0 btn btn-md btn-primary text-white">CHOOSE</a>
                                       <input id="thumbnail-id_proof" class="choose_input choose_img_width" value="{{old('id_proof')}}" type="text" name="id_proof" readonly>
                                 </div>
                                 <div id="preview-id_proof" style="margin-top:15px;max-height:100px;">
                                 </div>
                              <!-- @error('id_proof')
                                 <span class="text-danger">{{$message}}</span>
                              @enderror -->
                           </div>
                        </div>
                        <div class="row mt-5 mb-5">
                           <div class="col-lg-12">
                              <button class="btn btn-primary ">Add</button>
                           </div>
                        </div>
                     </div>
                  </div>
            </form>
         </div>
      </div>
   </div>
@endif   
@if( in_array('list_user', $user_permisions ) )

   <div class="content">
      <div class="container-fluid">
         <div class="row">
               <div class="offset-md-1 col-md-10"> 
                  <div class="card">
                     <div class="card-header card-header-primary bg-primary">
                           <h4 class="card-title text-white text-center" >{{ __('USER LIST') }}</h4>
                     </div>
                     <div class="card-body">
                           <div class="table-responsive"> 
                              <table id="table" class="table table-striped table-no-bordered table-hover">
                                    <thead class="text-primary">
                                       <tr>
                                          <th>Id</th>
                                          <th>Name</th>
                                          <th>email</th>
                                          <th>mobile no</th>
                                          <th>user occupation</th>
                                          @if( in_array('edit_user', $user_permisions ) || in_array('delete_user', $user_permisions ) )
                                             <th>Action</th>
                                          @endif   
                                       </tr>
                                    </thead>
                                    <tbody>
                                    @php $i = 0  @endphp
                                       @foreach($users as $user)
                                          @php $i++; @endphp
                                          <tr>
                                                <td> @php echo $i; @endphp</td>
                                                <td>{{ $user->name }}</td> 
                                                <td>{{ $user->email }}</td> 
                                                <td>{{ $user->mobile_no }}</td> 
                                                <td>{{ $user->user_occupation }}</td> 
                                                <td class="td-actions row">
                                                @if( in_array('edit_user', $user_permisions )  )
                                                   <a  href="{{route('user.edit',[$user->id])}}" type="button" class="btn btn-success btn-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                @endif
                                                @if(  in_array('delete_user', $user_permisions ) )
                                                   <form  method="post" action="{{route('user.destroy',[$user->id])}}"> 
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
@push('scripts')
<script>
function myfunction(){
            var show = document.getElementById('show');
            if (show.type== 'password'){
                show.type='text';
            }
            else{
                show.type='password';
            }
        }
        </script>
   <script> 
       jQuery('.lfm').filemanager('image', {prefix:'{{route("unisharp.lfm.show")}}'});
</script>
@endpush
                   
