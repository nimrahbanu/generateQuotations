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
