<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title> {{date('d/m/Y', time())}}</title>
      <style>
          tbody.GQcal {
      border: 1px solid grey !important;
  
}
      </style>
   </head>
   <body>
      <div class="container" style= "max-width: 1024;">
         <table border="0" cellpadding="5" cellspacing="0" style = "width:1000 display: flex;">
            <tr>
               <td valign="top" width="36%" style="position: sticky;">
                  <table >
                     <tr>
                        <td>
                           <table width="100%" align="left" >
                              
                           </table>
                           <table style="margin-top: 15px; width: 100%;" >
                                <thead style="background: #808080; padding: 6px 0;color: #fff; ">
                                </thead>
                                <tbody>
                                    <tr align="left">
                                    <td>Date {{date('d/m/Y', time())}}</td> 
                                    </tr>
                                    <tr align="left">

                                        <td> @foreach($packages as $package) 
                                    
                                           Proposal for {{$package->work_name_info->work_name}} 
                                           @endforeach
                                        </td>
                                    </tr>
                                    <tr align="left">
                                        <td>To </td>
                                    </tr>
                                    <tr align="left">
                                        <td>
                                            Dear {{$prospects->name}}
                                         </td>
                                    </tr>
                                    <tr align="left">
                                        <td>
                                            {{$prospects->city}}, {{$prospects->state_info->state}}
                                       </td>
                                        <td></td>
                                    </tr>
                                    <tr align="left">
                                        <td>
                                            <br>
                                            DesignLAB International is pleased to offer you the most competitive proposal. We are<br>
                                            certain you will find the information in line, apt to your needs. The proposal covers<br>
                                            our various packages, offers, amount and deadlines:<br>
                                            </td>
                                    </tr>
                                </tbody>
                           </table>
                           <H4>Packages</H4>
                           <table  style="margin-top: 15px; width: 100%;border-spacing:0px;border: 1px solid grey; " align="left" class="table table-bordered">
                                <thead style="background-color: grey; color:white;">
                                  <tr>
                                    <th scope="col">What you provides</th>
                                    <th scope="col">What we deliver</th>
                                    <th scope="col">Rates/Sqft</th>
                                  </tr>
                                </thead>
                                <tbody class="GQcal" style="border: 1px solid grey;">
                                  <tr> 
                                    <td>
                                    <td> @foreach($packages as $package) 
                                        {{  $package->we_provide }}
                                        @endforeach
                                    </td>
                                    <td>
                                    <td> @foreach($packages as $package) 
                                        {{  $package->we_deliver }}
                                        @endforeach
                                    </td>
                                    <td >   @foreach($packages as $package)
                                         @php  $price =  json_decode($package->rate_id);
                                            @endphp
                                       
                                        @foreach($rates as $rate)
                                                    @if(in_array($rate->id, $price)  )
                                                        {{$rate->price}} {{'/'}} {{$rate->measurement_name_info['measurement_name']}} ( {{$rate->value}} {{$rate->condition}} {{$rate->measurement_name_info['measurement_name']}} )
                                                    @endif
                                        @endforeach
                                        @endforeach
                               
                                    </td>
                                </tbody>
                          </table>
                          <br>
                          <br>
                          <br>
                          <br>
                          <br>
                          <H4>Project Details</H4>

                          <table  style="margin-top: 15px; width:100%; border-spacing:0px;border: 1px solid grey; " align="left" class="table table-bordered">
                                <thead style="background-color: grey; color:white;">
                                <tr>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Project ID</th>
                                    <th scope="col">Area(SQFT)</th>
                                    <th scope="col">Amount</th>
                                </tr>
                                </thead>
                                <tbody class="GQcal" style="border: 1px solid grey;">
                                <tr>
                                    <td >{{$package->Plannig_package_name}}</td>
                                    <td >{{$package->id}}</td>
                                    <td >{{$area}}</td>
                                    <td >{{$amount}}</td>
                                </tbody>
                            </table>
                            <br><br><br><br>
                      <h4>Bank Details</h4>
                           <table style="margin-top: 15px; width: 100%;   border: 1px solid grey;">
                             <tbody style="border: 1px solid grey;">
                                 <tr align="left">
                                    <td>Bank  </td>
                                    <td>State Bank of India</td>
                                 </tr>
                                 <tr align="left">
                                    <td>Branch</td>
                                    <td>Old Palasia, Indore</td>
                                 </tr>
                                 <tr align="left">
                                    <td>Account</td>
                                    <td>holder name DesignLAB</td>
                                 </tr>
                                 <tr align="left">
                                     <td> Account number</td>
                                     <td> 316 079 321 62</td>
                                 </tr>
                                 <tr align="left">
                                    <td> IFS Code </td>
                                    <td>SBIN 000 3432</td>
                                 </tr>
                              </tbody>
                           </table>
                           <table style="margin-top: 15px; width: 100%;" >
                              <thead style="background: #808080; padding: 6px 0;color: #fff; ">
                              </thead>
                              <tbody>
                                    <tr align="left">
                                        <td>Deposit amount in the above mentioned bank.<br><br></td>
                                    </tr>
                                    <tr align="left">
                                        <td>Design LAB International is a service based company of ABS Group. We enable our <br>
                                            clients to address the challenging requirements of their customers‚ and build goodwill <br>
                                            by delivering creative solutions.<br><br></td>
                                    </tr>
                                    <tr align="left">
                                        <td>  Thank you for the opportunity to serve you. We look forward for further communication <br>
                                            with you, after you have reviewed the proposal.<br><br></td>
                                    </tr>
                                    <tr align="left">
                                        <td>  Best Regards<br><br></td>
                                        </tr>
                                    <tr align="left">
                                        <td>  DesignLAB International<br><br></td>
                                        </tr>
                                    <tr align="left">
                                        <td> <b>Terms:<br><br></td>
                                    </tr>
                                    <tr align="left">
                                        <td> 
                                            <small>
                                                <i>
                                                    1. GST will be charge on bill.<br> 
                                                    2. No other hidden charges are applicable on the above mentioned services.<br> 
                                                    3. E & OE.<br> 
                                                </i> 
                                            </small>
                                        </td>
                                    </tr>
                              </tbody>
                           </table>
                           <table width="100%">
                                <tr>
                                </tr>
                              
                              <tr>
                                 <td align="left"><small><b>
                                 </b></small>
                                    <br>Please note that this is a system generated proposal and does not require signature.<br>
                                 </td>
                                
                              </tr>
                           </table>
                        </td>
                     </tr>
                  </table>
               </td>
               <td valign="top"style="width: 15%; padding: 0px 17px; border-left: 4px solid #b33292; background: #e6e7e9;   position: static;
               ">
                  <img width="170px;" src="data:image/png;base64,{{ base64_encode( file_get_contents( storage_path('/app/public/files/1/contect-img.jpg') ))}}">
               </td>
            </tr>
         </table>
      </div>
   </body>
</html>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
	<body>
		<div class="container" style= "max-width: 1024;">
        	<table border="0" cellpadding="5" cellspacing="0" style = "width:1024 display:flex !important;">
				<tr>
					<td valign="top" width="70%">
						<table>
                     		<tr>
                        		<td>
									<table width="100%" border="0" align="left" >
										<tr>
											<td>
												<p style="margin-bottom:0px;">
													<span>Date</span>
													<span> {{date('d/m/Y', time())}}</span>
												</p>  
												<p style="margin-top:0px;">
													<span>Proposal for</span>
													<span> @foreach($packages as $package) 
																@if($package->id == $work_name_id )
																	{{$package->work_name_info->work_name }} 
																@endif
															@endforeach
													</span>
												</p>
												<p style="margin:0px;">
													To
												</p>
												<p style="margin:0px;">
													<span>Dear </span>
													<span> {{$prospects->name}}</span>
												</p>
												<p style="margin:0px;">
													<span> {{$prospects->city}}, {{$prospects->state_info->state}}</span>
												</p>
												<p>
													DesignLAB International is pleased to offer you the most competitive proposal. We are
														certain you will find the information in line, apt to your needs. The proposal covers
														our various packages, offers, amount and deadlines
												</p>
											</td>
										</tr>
									</table>
										<p style="text-align: left;"><b>Packages</b></p>
									<table style="margin-top: 15px;  border-spacing: 0; width: 100%;" cellpadding="0" mc:edit="table-1">
										<thead>
											<tr>
												<th style="padding: 10px; border: 1px solid gray; background-color: gray; color: white;">What you provides</th>
												<th style="padding: 10px; border: 1px solid gray; background-color: gray; color: white;">What we deliver</th>
												<th style="padding: 10px; border: 1px solid gray; background-color: gray; color: white;">Rates/
													@foreach($measurements as $measurement) 
														{{ $measurement->measurement_name }} 
													@endforeach
												</th>
											</tr>
										</thead>
										<tbody style="padding-top: 15px;">
											<tr style="margin-bottom: 7px;">
												<td style="padding: 10px; border: 1px solid gray;">
													@foreach($packages as $package) 
														{{ preg_replace('/\r?\n|\r/', '<br/>', $package->we_provide);	}}
													@endforeach
												</td>
												<td style="padding: 10px; border: 1px solid gray;">
													@foreach($packages as $package) 
													{{	str_replace(array("\r\n", "\r", "\n"), "<br/>", $package->we_deliver) }}
													@endforeach
												</td>
												<td style="padding: 10px; border: 1px solid gray;">
												@foreach($packages as $package)
														@php  $price =  json_decode($package->rate_id); @endphp
														@foreach($rates as $rate)
															@if(in_array($rate->id, $price)  )
																{{$rate->price}} {{'/'}} {{$rate->measurement_name_info['measurement_name']}} ( {{$rate->value}} {{$rate->condition}} {{$rate->measurement_name_info['measurement_name']}} )
															@endif
														@endforeach
													@endforeach
												</td>                                                        	 			
											</tr>
										</tbody>
									</table>
										<p style="text-align: left;"><b>Project Details</b></p>
									<table style="margin-top: 15px; border-spacing: 0; width: 100%;" cellpadding="0" mc:edit="table-1">
										<thead>
											<tr>
												<th style="padding: 10px; border: 1px solid gray; background-color: gray; color: white;">Project Name</th>
												<th style="padding: 10px; border: 1px solid gray; background-color: gray; color: white;">Project ID</th>
												<th style="padding: 10px; border: 1px solid gray; background-color: gray; color: white;">Rates</th>
												<th style="padding: 10px; border: 1px solid gray; background-color: gray; color: white;">Area 
													@foreach($measurements as $measurement) 
														{{ $measurement->measurement_name }} 
													@endforeach
												</th>
												<th style="padding: 10px; border: 1px solid gray; background-color: gray; color: white;">Amount</th>
												<th style="padding: 10px; border: 1px solid gray; background-color: gray; color: white;">Deadline</th>
											</tr>
										</thead>
										<tbody style="padding-top: 15px;">
											<tr style="margin-bottom: 7px;">	
												<td style="padding: 10px; border: 1px solid gray;">	
													@php $data =  json_encode($Plannig_package_name); @endphp
														@foreach($packages as $package) 
															@if( in_array($package->id, $Plannig_package_name) )
																{!! nl2br($package->Plannig_package_name) !!} 
															@endif
														@endforeach

												</td>
												<td style="padding: 10px; border: 1px solid gray;">{{$package->id}}</td>
												<td style="padding: 10px; border: 1px solid gray;">
													@foreach($rates as $rate)
														@foreach($measurements as $measurement) 
													(INR  {{ $rate->price }}/ {{ $measurement->measurement_name }})
														@endforeach
													@endforeach
												</td>  
												<td style="padding: 10px; border: 1px solid gray;">{{$area}}</td>
												<td style="padding: 10px; border: 1px solid gray;">
													@foreach($packages as $package)
														@foreach($measurements as $measurement)
																@php $pcg_rate =  json_decode($package->rate_id); @endphp
															@foreach($rates as $key=>$rate)
																@if($area >= $rate['value']  && $measurement->id == $rate['measurement_id'])
																	@php $amount = $area * $rate['price']; @endphp 
																	INR{!! nl2br($amount) !!}
																@else
																	@php  @endphp
																@endif	
															@endforeach
														@endforeach 
													@endforeach 
												                                                     	 			
													
												<td style="padding: 10px; border: 1px solid gray;">
													@php	
														$deadline_day = implode(',', $deadline); 
													@endphp
													{{$deadline_day}}
														
											 </td>                                                       	 			
												                                                       	 			
											</tr>
										</tbody>
									</table>
										<p style="text-align: left;"><b>Bank Details</b> </p>
									<table style="margin-top: 15px; width: 60%; border-spacing: 0;" mc:edit="table-2">
										<tbody style="padding-top: 15px;">
											<tr style="margin-bottom: 7px;">
												<td style="width: 190px; border: 1px solid gray;">Bank</td>
												<td style="width: 190px; border: 1px solid gray;">State Bank of India</td>
											</tr>
											<tr style="margin-bottom: 7px;">
												<td style="width: 190px; border: 1px solid gray;">Branch </td>
												<td style="width: 190px; border: 1px solid gray;">Old Palasia, Indore</td>
											</tr>
											<tr style="margin-bottom: 7px;">
												<td style="width: 190px; border: 1px solid gray;">Account holder name</td>
												<td style="width: 190px; border: 1px solid gray;">DesignLAB</td>
											</tr>
											<tr style="margin-bottom: 7px;">
												<td style="width: 190px; border: 1px solid gray;">Account type</td>
												<td style="width: 190px; border: 1px solid gray;">Current</td>
											</tr>
											<tr style="margin-bottom: 7px;">
												<td style="width: 190px; border: 1px solid gray;">Account number </td>
												<td style="width: 190px; border: 1px solid gray;">316 079 321 62</td>
											</tr>
											<tr style="margin-bottom: 7px;">
												<td style="width: 190px; border: 1px solid gray;">IFS Code</td>
												<td style="width: 190px; border: 1px solid gray;">SBIN 000 3432</td>
											</tr>
										</tbody>
									</table>
									<table style="margin-top: 15px;  border-spacing: 0; width: 100%;" cellpadding="0" mc:edit="table-1">
										<tbody style="padding-top: 15px;">
											<tr>
												<td>
													<p style="margin-top:15px;">
														Deposit amount in the above mentioned bank.
													</p>  
													<p style="margin-top:0px;">
														Design LAB International is a service based company of ABS Group. We enable our
														clients to address the challenging requirements of their customers‚ and build goodwill
														by delivering creative solutions
													</p>
													<p style="margin:0px;">
														Thank you for the opportunity to serve you. We look forward for further communication with you, after you have reviewed the proposal. 
													</p>
													<p style="margin-top:15px;">
														Best Regards
													</p>
													<p style="margin:0px;">
														DesignLAB International
													</p>
													<p>
														Terms:
													</p>
													<p><small> <i>1. GST will be charge on bill.</i>   </small></p>
													<p><small> <i>2. No other hidden charges are applicable on the above mentioned services.</i>   </small></p>
													<p><small> <i>3. E & OE.</i></small></p>
												</td>
											</tr>
										</tbody>
									</table>
										<p><i>Please note that this is a system generated proposal and does not require signature.</i></p>
								</td>
                     		</tr>
                  		</table>
					</td>
					<td  valign="top" style="width:10%; padding: 0px 17px; border-left: 4px solid #b33292; background: #e6e7e9">
						<img width="170px;" src="data:image/png;base64,{{ base64_encode( file_get_contents( storage_path('/app/public/files/1/contect-img.jpg') ))}}">
					</td>
				</tr>
			</table>
		</div>
	</body>
</html> -->