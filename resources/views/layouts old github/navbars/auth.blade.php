<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="http://abssoftech.com" class="simple-text logo-mini">
		    <img  src="data:image/png;base64,{{ base64_encode( file_get_contents( storage_path('/app/public/files/1/absit_black_logo_.png') ))}}">
            <a href="http://abssoftech.com/" class="simple-text creative-text logo-normal">
            {{ __('Dsuit Admin') }}
            </a>
    </div>
    @php 
    $user_permisions = App\Http\Controllers\SlugController::get_user_permissions(Auth()->user()->id);
    //print_r($user_permisions);
  @endphp
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'file_manager' ? ' active' : '' }}">
                <a href="{{ route('media', 'media') }}">
                <i class="fa fa-file" aria-hidden="true"></i>
                    <p>{{ __('File Manager') }} </p>
                </a>
            </li>
            @if( in_array('sidebar_prospect', $user_permisions ) ||  in_array('sidebar_country', $user_permisions ) || in_array('sidebar_state', $user_permisions )  )
                <li class="{{ $elementActive == 'prospect' || $elementActive == 'country' ||  $elementActive == 'state' ? 'active' : '' }}">
                    <a data-toggle="collapse" aria-expanded="true" href="#prospect_c_s">
                        <p> {{ __('prospect,country,state') }} <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse hide" id="prospect_c_s">
                        <ul class="nav">
                            @if( in_array('sidebar_prospect', $user_permisions ) )
                            <li class="{{ $elementActive == 'prospect' ? 'active' : '' }}">
                                <a href="{{ route('prospect.index', 'prospect') }}">
                                <i class="fa fa-user"></i>
                                    <p>{{ __('Prospect') }}</p>
                                </a>
                            </li> 
                            @endif
                            @if( in_array('sidebar_country', $user_permisions ) )
                            <li class="{{ $elementActive == 'country' ? 'active' : '' }}">
                                <a href="{{ route('country.index', 'country') }}">
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                    <p>{{ __('Country') }}</p>
                                </a>
                            </li> 
                            @endif
                            @if( in_array('sidebar_state', $user_permisions ) )
                            <li class="{{ $elementActive == 'state' ? 'active' : '' }}">
                                <a href="{{ route('state.index', 'state') }}">
                                <i class="fa fa-building-o" aria-hidden="true"></i>
                                    <p>{{ __('State') }}</p>
                                </a>
                            </li> 
                            @endif
                        </ul>
                    </div>
                </li>
            @endif       
            @if( in_array('sidebar_upload_quotation', $user_permisions ) ||  in_array('sidebar_discount', $user_permisions ) )
                <li class="{{ $elementActive == 'generate_quotation' ||  $elementActive == 'discount' ? 'active' : '' }}">
                    <a data-toggle="collapse" aria-expanded="true" href="#generate_quotation_discount">
                        <p> {{ __('Quotation,Discount') }} <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse hide" id="generate_quotation_discount">
                        <ul class="nav">
                            @if( in_array('sidebar_upload_quotation', $user_permisions ) )
                            <li class="{{ $elementActive == 'generate_quotation' ? 'active' : '' }}">
                                <a href="{{ route('generate-quotation.index', 'generate_quotation') }}">
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                                    <p>{{ __('Upload Quotation') }}</p>
                                </a>
                            </li>
                            @endif
                            @if( in_array('sidebar_discount', $user_permisions ) )
                            <li class="{{ $elementActive == 'discount' ? 'active' : '' }}">
                                <a href="{{ route('discount.index', 'discount') }}">
                                <i class="fa fa-percent " aria-hidden="true"></i>
                                    <p>{{ __('Discount') }}</p>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif   
            
           
            @if( in_array('sidebar_measurement', $user_permisions ) )
            <li class="{{ $elementActive == 'measurement' ? 'active' : '' }}">
                <a href="{{ route('measurement.index', 'measurement') }}">
                <i class="fa fa-bars" aria-hidden="true"></i>
                    <p>{{ __('Measurement') }}</p>
                </a>
            </li>
            @endif
            @if( in_array('sidebar_wok_name', $user_permisions ) )
            <li class="{{ $elementActive == 'work_name' ? 'active' : '' }}">
                <a href="{{ route('work-name.index', 'work_name') }}">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
                    <p>{{ __('Work Name') }}</p>
                </a>
            </li>
            @endif
            @if( in_array('sidebar_rate', $user_permisions ) )
            <li class="{{ $elementActive == 'rate' ? 'active' : '' }}">
                <a href="{{ route('rate.index', 'rate') }}">
                <i class="fa fa-usd" aria-hidden="true"></i>
                    <p>{{ __('Rate') }}</p>
                </a>
            </li>
            @endif
            @if( in_array('sidebar_package', $user_permisions ) )
            <li class="{{ $elementActive == 'package' ? 'active' : '' }}">
            @php
                $work_name_id = '1';
              @endphp 
              <a href="{{ route('package', [$work_name_id]) }}">
                <i class="fa fa-square" aria-hidden="true"></i>
                    <p>{{ __('Package') }}</p>
                </a>
            </li>
            @endif
            @if( in_array('sidebar_service', $user_permisions ) )
            <li class="{{ $elementActive == 'service' ? 'active' : '' }}">
                <a href="{{ route('service.index') }}">
                <i class="fa fa-cog" aria-hidden="true"></i>
                    <p>{{ __('Service') }}</p>
                </a>
            </li>
            @endif
            @if( in_array('sidebar_generate_quotation', $user_permisions ) )
            <li class="{{ $elementActive == 'generateQuotation' ? 'active' : '' }}">
                @php
                    $work_name_id = '1';
              @endphp   
              <a href="{{ route('genquotationCalculation.index') }}">
              <i class="fa fa-check-square-o" aria-hidden="true"></i>
                    <p>{{ __('generate Quotation') }}</p>
                </a>
            </li>
            @endif
           
            
            @if( in_array('sidebar_account', $user_permisions ) ||  in_array('sidebar_account_list', $user_permisions ) || in_array('sidebar_bank', $user_permisions )  )
            <li class="{{ $elementActive == 'add' || $elementActive == 'list' ||  $elementActive == 'bank' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#account_l_b">
                    <p>
                            {{ __('account,account list,bank') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse hide" id="account_l_b">
                    <ul class="nav">
                    @if( in_array('sidebar_account', $user_permisions ) )
                    <li class="{{ $elementActive == 'add' ? 'active' : '' }}">
                        <a href="{{ route('acr.index') }}">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            <p>{{ __('Account') }}</p>
                        </a>
                    </li>
                    @endif
                    @if( in_array('sidebar_account_list', $user_permisions ) )
                    <li class="{{ $elementActive == 'list' ? 'active' : '' }}">
                        <a href="{{ route('acr.create') }}">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            <p>{{ __('Account List') }}</p>
                        </a>
                    </li>
                    @endif
                    @if( in_array('sidebar_bank', $user_permisions ) )
                    <li class="{{ $elementActive == 'bank' ? 'active' : ''}}">
                        <a href="{{route('bank.index')}}">
                        <i class="fa fa-university" aria-hidden="true"></i>
                            <p>{{ __('Bank') }}</p>
                        </a>
                    </li>
                    @endif
                    </ul>
                </div>
            </li>
        @endif  
            
        @if( in_array('sidebar_user', $user_permisions ) ||  in_array('sidebar_user_role', $user_permisions ) || in_array('sidebar_slug', $user_permisions )  )
            <li class="{{ $elementActive == 'user_role' || $elementActive == 'permission' ||  $elementActive == 'user_slug' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#user_r_p">
                <i class="fa fa-users" aria-hidden="true"></i>

                    <p>
                            {{ __('User,Role,Permisssion') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse hide" id="user_r_p">
                    <ul class="nav">
                    @if( in_array('sidebar_user', $user_permisions ) )
                    <li class="{{ $elementActive == 'permission' ? 'active' : ''}}">
                        <a href="{{route('user.index')}}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                            <p>{{ __(' User') }}</p>
                        </a>
                    </li>
                    @endif
                    @if( in_array('sidebar_user_role', $user_permisions ) )
                    <li class="{{ $elementActive == 'user_role' ? 'active' : ''}}">
                        <a href="{{route('user-role.index')}}">
                        <i class="fa fa-users" aria-hidden="true"></i>
                            <p>{{ __('User Role') }}</p>
                        </a>
                    </li>
                    @endif
                    @if( in_array('sidebar_slug', $user_permisions ) )
                    <li class="{{ $elementActive == 'user_slug' ? 'active' : ''}}">
                        <a href="{{route('slug.index')}}">
                        <i class="fa-duotone fa-pen-field"></i>
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            <p>{{ __('Slug') }}</p>
                        </a>
                    </li>  
                    @endif
                    </ul>
                </div>
            </li>
        @endif            
     <!--    <li>
            <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i>
                    <p>
                            {{ __('Laravel examples') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini-icon">{{ __('UP') }}</span>
                                <span class="sidebar-normal">{{ __(' User Profile ') }}</span>
                            </a>
                        </li>
                      <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'user') }}">
                                <span class="sidebar-mini-icon">{{ __('U') }}</span>
                                <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                            </a>
                        </li> -->
                    <!-- </ul>
                </div>
            </li> --> 
            <!-- <li class="{{ $elementActive == 'icons' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'icons') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li> -->
            <!-- <li class="{{ $elementActive == 'map' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'map') }}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li> -->
            <!-- <li class="{{ $elementActive == 'notifications' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'notifications') }}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'tables' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'tables') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'typography' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'typography') }}">
                    <i class="nc-icon nc-caps-small"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            <li class="active-pro {{ $elementActive == 'upgrade' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'upgrade') }}" class="bg-danger">
                    <i class="nc-icon nc-spaceship text-white"></i>
                    <p class="text-white">{{ __('Upgrade to PRO') }}</p>
                </a>
            </li> 
        </li>-->
        </ul>
    </div>
</div>
