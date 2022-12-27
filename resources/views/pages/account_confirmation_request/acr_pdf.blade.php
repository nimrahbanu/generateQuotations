<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
	<body>
		<div class="container" style= "max-width: 1024;">
        	<table border="0" cellpadding="5" cellspacing="0" >
				<tr>
					<td valign="top" width="20%">
						<table>
                     		<tr>
                        		<td>
									<table width="100%" border="0" align="left" >
										<tr>
											<td>
												<p style="margin-bottom:0px;">
													<span>Receipt No:</span>
													<span> {{$acrs->project_id}}</span>
												</p>  
												<p style="margin-top:0px;">
													<span>Date :</span>
													<span>  {{date('d/m/Y', time())}}</span>
												</p>
												<p style="margin:0px;">
													<b>Receipt</b>
												</p>
												<p>
                                                    <p style="margin:0px;" >
													    <span> Client: </span>
													    <span>{{$acrs->client_name}}</span>
												    </p>
												    <p style="margin:0px;">
                                                        <span> Location: </span>
														<span>{{$acrs->district}}</span>
													    <span>{{$acrs->state_id}}</span>
												    </p>
                                                </p>
											</td>
										</tr>
									</table>
									<table style="margin-top: 15px;  border-spacing: 0; width: 100%;" cellpadding="0" mc:edit="table-1">
										<thead>
											<tr>
												<th style="padding: 5px; border: 1px solid gray; background-color: gray; color: white;">SNo</th>
												<th style="padding: 5px; border: 1px solid gray; background-color: gray; color: white;">Designing/Rendering</th>
												<th style="padding: 5px; border: 1px solid gray; background-color: gray; color: white;">Project ID
                                                <th style="padding: 5px; border: 1px solid gray; background-color: gray; color: white;">Package</th>
                                                <th style="padding: 5px; border: 1px solid gray; background-color: gray; color: white;">Amount</th>
                                                <th style="padding: 5px; border: 1px solid gray; background-color: gray; color: white;">Amount Received</th>
                                                <th style="padding: 5px; border: 1px solid gray; background-color: gray; color: white;">Old Deposit</th>
                                                <th style="padding: 5px; border: 1px solid gray; background-color: gray; color: white;">Balance</th>
										</thead>
										<tbody style="padding-top: 5px;">
											<tr style="margin-bottom: 2px;"> 
															 @php $i=0; @endphp
															@php $i++; @endphp  
												<td style="padding: 2px; border: 1px solid gray;"> @php echo $i; @endphp</td>
												<td style="padding: 2px; border: 1px solid gray;">{{$acrs->package_id}}</td>
												<td style="padding: 2px; border: 1px solid gray;">{{$acrs->project_id}}</td>
												<td style="padding: 10px; border: 1px solid gray;">{{$acrs->package_id}}</td>
												<td style="padding: 2px; border: 1px solid gray;">{{$acrs->final_ammount}}</td>
												<td style="padding: 10px; border: 1px solid gray;">{{$acrs->amount}}</td>
												<td style="padding: 10px; border: 1px solid gray;">{{$acrs->advance_amount}}</td>
												<td style="padding: 10px; border: 1px solid gray;">{{$acrs->final_ammount}}</td>
											</tr>
                                            <tr style="margin-bottom: 2px;">
												<td style="padding: 2px; border: 1px solid gray;">Total</td>
												<td style="padding: 2px; border: 1px solid gray;"> </td>
												<td style="padding: 2px; border: 1px solid gray;"> </td>
												<td style="padding: 10px; border: 1px solid gray;"> </td>
												<td style="padding: 2px; border: 1px solid gray;">{{$acrs->final_ammount}}</td>
												<td style="padding: 2px; border: 1px solid gray;">{{$acrs->amount}}</td>
												<td style="padding: 10px; border: 1px solid gray;">{{$acrs->advance_amount}}</td>
												<td style="padding: 10px; border: 1px solid gray;">{{$acrs->final_ammount}}</td>
											</tr>
										</tbody>
									</table>
									<table style="margin-top: 15px;  border-spacing: 0; width: 100%;" cellpadding="0" mc:edit="table-1">
										<tbody style="padding-top: 15px;">
											<tr>
												<td>
													<p style="margin-top:15px;">
                                                        <span>Total of amount received in words : </span>
                                                        <span> {{ $amount_string}} Only</span>
													</p>  
													<p style="margin-top:0px;">
                                                        For
													</p>
                                                    	<p style="margin-top:0px;">
                                                        DesignLAB International, India
													</p>
													<p style="margin:0px;">
                                                        <p><i>Please note that this is a system generated proposal and does not require signature.</i></p>
                                                    </p>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
                     		</tr>
                  		</table>
					</td>
					<td  valign="top" style="width:10%; padding: 0px 17px; border-left: 4px solid #b33292; background: #e6e7e9">
						<img width="90px;" src="data:image/png;base64,{{ base64_encode( file_get_contents( storage_path('/app/public/files/1/contect-img.jpg') ))}}">
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>