@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'permission'
])
@section('content')
<div class="content">
   <div class="container-fluid">
      <div class="row">
        <div class="offset-md-1 col-md-10"> 
            <form  method="post" action="{{route('user.update',[$users->id])}}" enctype="multipart/form-data" > 
                  @csrf
                  @method('PATCH')
                  <div class="card">
                     <div class="card-header card-header-primary bg-primary">
                           <h4 class="card-title text-white text-center" >{{ __(' USER EDIT FORM') }}</h4>
                     </div>
                     <div class="card-body ml-3 mr-3">
                        <div class="row">
                           <div class="form-group col-md-6 ">
                              <label for="name" >Add User Name</label>
                                    <div class="input-container">
                                       <i class="fa fa-user icon" aria-hidden="true"></i>
                                       <input type="text" autocomplete="false" class="form-control" value="{{$users->name}}" name="name" id="name">
                                    </div>
                              @error('name')
                                    <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <div class="col-lg-6">
                              <label for="email" class=" col-form-label"> Email ID</label>
                              <div class="input-container">
                                 <i class="fa fa-envelope icon" aria-hidden="true"></i>
                                    <input type="text" autocomplete="false" class="form-control" value="{{$users->email}}" name="email" id="email">
                              </div>
                              @error('email')
                                    <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>   
                        <div class="row">
                           <div class="col-lg-6">
                              <label for="password" class=" col-form-label"> Password</label>
                              <div class="input-container">
                                    <i class="fa fa-key icon" aria-hidden="true"></i>
                                    <input  class="form-control" value="{{$users->password}}" type="password" name="password" id="show"  minlength="8">
                                 </div>
                                 <label for="password">Show Password</label>
                                 <input type="checkbox" name="password" onclick="myfunction()">
                                 @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                           </div>
                           <div class="col-lg-6">
                              <label for="mobile_no" class=" col-form-label"> mobile_no</label>
                              <div class="input-container">
                                    <i class="fa fa-phone icon" aria-hidden="true"></i>
                                    <input type="text" autocomplete="false" class="form-control" name="mobile_no" id="mobile_no"  value="{{$users->mobile_no}}">
                                 </div>
                                 @error('mobile_no')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6">
                              <label for="user_role" class=" col-form-label">User Role</label>
                              <div class="input-container">
                                 <i class="fa fa-users icon" aria-hidden="true"></i>
                                 <select name="user_role" class="form-control" style="height:39px;" id="user_role">
                                    <option  disabled selected>--Select User Role Type--</option>
                                    @foreach ($user_roles as $user_role)
                                    <option value="{{$user_role->id}}" {{ $user_role->id == $users->user_role ? 'selected' : ''}}>{{$user_role->user_name}}</option>
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
                                       <option value="Marketing" {{ $users->user_occupation == 'Marketing' ? 'selected' : ''}} > Marketing</option>
                                       <option value="Sales" @php echo $users->user_occupation == "Sales" ? "selected" : ""; @endphp > Sales</option>
                                       <option value="Designer" @php echo $users->user_occupation == "Designer" ? "selected" : ""; @endphp > Designer</option>
                                       <option value="Executive" @php echo $users->user_occupation == "Executive" ? "selected" : ""; @endphp >Executive</option>
                                 </select>
                              </div>
                              @error('user_occupation')
                                 <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12">
                                 <label for="id_proof" >ID Proof</label>
                                 <div class="input-container">
                                       <a data-input="thumbnail-id_proof" data-preview="preview-id_proof" class="lfm mt-0 mr-0 btn btn-md btn-primary text-white">CHOOSE</a>
                                       <input id="thumbnail-id_proof" class="choose_input choose_img_width" value="{{ $users->id_proof}}" type="text" name="id_proof" readonly>
                                 </div>
                                 <div id="preview-id_proof" style="margin-top:15px;max-height:100px;">
                                       <img src= "{{$users->id_proof}}" style="margin-top:15px;max-height:100px;" />
                                 </div>
                           <!-- @error('id_proof')
                              <span class="text-danger">{{$message}}</span>
                           @enderror -->
                           </div>
                        </div>
                        <div class="row mt-5 mb-5">
                           <div class="col-lg-12">
                              <button class="btn btn-primary ">Update</button>
                              <a class="btn btn-md fs-1 btn-light" href="/user" >Cancel</a>
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
@endpush
