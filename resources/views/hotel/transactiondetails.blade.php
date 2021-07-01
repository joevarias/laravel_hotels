<x-guest-layout>
	@section('title','Laravel: Transaction Detail')
    <div>
        <h1 class="text-center my-5">Transaction Details</h1>
    </div>

    <div class="sm:container mx-auto">
    	<div class="row">
    		<div class="col">
    			<div class="container">
    				<div class="row">
    					<div class="col-lg-1"></div>
    					<div class="col-lg-10">
    						<div class="bg-white md:p-3">
	    						<div class="border rounded-sm border-gray-400 transaction__wrapper">
	    							<div class="text-center text-lg alert alert-success transaction__alert-success">
	    								<h5 class="font-semibold">Reservation completed successfully!</h5>
	    							</div>
                                    <div class="px-2">
                                    	<table style="width:100%;min-width:100%">
                                    		<tbody>
                                    			<tr>
                                    				<td><img src="{{asset('/images/green_check_main.png')}}" style="width:20px;min-width:20px;height:20px"></td>
                                    				<td class="font-bold">Thanks {{Auth::user()->first_name}}! Your booking in {{$city_details->city_name}} is confirmed.</td>
                                    			</tr>
                                    			<tr>
                                    				<td><img src="{{asset('/images/green_check.png')}}" style="width:16px;min-width:16px;height:13px"></td>
                                    				<td><span><span class="font-bold">{{$hotel_details->hotel_name}}</span> is expecting you on <span id="expecting_datein" class="font-bold"></span>.</span></td>
                                    			</tr>
                                    			<tr>
                                    				<td><img src="{{asset('/images/green_check.png')}}" style="width:16px;min-width:16px;height:13px"></td>
                                    				<td><span>{{$hotel_details->hotel_name}} handles all payments, so please check below for more information:</span></td>
                                    			</tr>
                                    		</tbody>
                                    	</table>
                                    	<ul class="my-2 transaction_number__wrapper">
                                    		<li class="flex flex-col md:flex-row md:justify-center bg-blue-100 p-2">
                                    			<div class="mx-auto transaction_number__md_remove-margin">
                                    				<span class="font-bold">Your transaction number:&nbsp</span>
                                    			</div>
                                    			<div class="m-auto transaction_number__md_remove-margin">
                                    				<span class="font-normal">{{$transno}}</span>
                                    			</div>
                                    		</li>
                                    	</ul>
			    					</div>
			    					<hr>
			    					<div class="flex flex-col md:flex-row transaction-image__wrapper">
			    						<div>
			    							<img src="{{asset($hotel_details->image_path)}}" style="display: inline-block;object-fit: cover; margin-top: 2px; margin-bottom: 2px; width: 200px; height: 200px;" class="rounded-sm">
			    						</div>
				    					<div class="md:px-2 mt-4">
				    						 <div class="mx-2">
				    						 	<h5 class="font-bold text-2xl">{{$hotel_details->hotel_name}}</h5>
				    						 	<p class="text-sm">{{$hotel_details->hotel_address}}</p>
				    						 	<p class="text-sm">Phone Number: <span>{{$hotel_details->phone_number}}</span></p>
				    						 	<p class="text-sm">Email Address: <a href="mailto:hotel@hotel.com">hotel@hotel.com</a></p>
				    						 </div>
				    					</div>
			    					</div>
			    					<hr>
		    						<div class="px-2">
		    							<h6 class="font-bold text-lg">Reservation details:</h6>
		    						</div>

			    					<div class="md:px-2">
			    						<div class="m-2">
				    						<table class="mb-2" style="width:100%;min-width:100%;table-layout: fixed">
				    							<tbody class="reservation__tbody">
				    								<tr>
					    								<td class="font-bold">Your reservation</td>
					    								
					    								<td class="text-right">
						    								@if($no_of_nights>1)
						    								{{$no_of_nights}} nights,
						    								@else()
						    								{{$no_of_nights}} night,
						    								@endif
					    									@if($reserve_countrooms_total>1)
					    									{{$reserve_countrooms_total}} rooms
					    									@else
					    									{{$reserve_countrooms_total}} room
					    									@endif
					    								</td>
				    								</tr>
				    								<tr>
					    								<td class="font-bold">Check-in</td>
					    								<td id="check_in" class="text-right">{{$datein}} <span>from 2PM-9PM</span></td>
				    								</tr>
				    								<tr>
					    								<td class="font-bold">Check-out</td>
					    								<td id="check_out" class="text-right">{{$dateout}} <span>from 6AM-12PM</span></td>
				    								</tr>
				    								<tr>
					    								<td class="font-bold">Guest Name</td>
					    								<td id="check_out" class="text-right">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</td>
				    								</tr>
				    								<tr>
					    								<td class="font-bold">Contact No.</td>
					    								<td id="check_out" class="text-right">1111111111</td>
				    								</tr>
				    								<tr>
					    								<td class="font-bold">Guest Email</td>
					    								<td id="check_out" class="text-right">{{Auth::user()->email}}</td>
				    								</tr>
				    							</tbody>
				    						</table>

				    						<div class="bg-blue-100 p-2 transaction-rates__wrapper">
				    							<table style="margin:0;padding:0px;border:0px;width:100%;min-width:100%">
				    								<tbody>
				    									@if($room_standard_rate)
				    										<tr>
				    											<td>Standard Room</td>
				    											<td class="text-right">{{$reserve_countrooms_standard}} x ₱ {{$room_standard_rate}}</td>
				    										</tr>
				    									@endif
				    									@if($room_deluxe_rate)
				    										<tr>
				    											<td>Deluxe Room</td>
				    											<td class="text-right">{{$reserve_countrooms_deluxe}} x ₱ {{$room_deluxe_rate}}</td>
				    										</tr>
				    									@endif
				    									@if($room_queen_rate)
				    										<tr>
				    											<td>Queen Room</td>
				    											<td class="text-right">{{$reserve_countrooms_queen}} x ₱ {{$room_queen_rate}}</td>
				    										</tr>
				    									@endif
				    								</tbody>
				    							</table>
				    							<hr>
				    							<table style="margin:0;padding:0px;border:0px;width:100%;min-width:100%">
				    								<tbody>
				    									<tr>
				    										<td class="text-sm text-muted">Company Discount (8%)</td>
				    										<td class="text-right" id="comp_disc">₱ {{$company_discount_price}}</td>
				    									</tr>
				    								</tbody>
				    							</table>
				    							<hr>
				    							<table style="margin:0;padding:0px;border:0px;width:100%;min-width:100%">
				    								<tbody>
				    									<tr>
				    										<td class="text-lg font-bold">Price</td>
				    										<td class="text-right text-lg font-bold" id="price">₱ {{$price}}</td>
				    									</tr>
				    								</tbody>
				    							</table>
				    							<hr>
				    							<table style="margin:0;padding:0px;border:0px;width:100%;min-width:100%">
				    								<tbody>
				    									<tr>
				    										<td>Payment Method</td>
				    										<td class="text-right">{{$payment_method_name}}</td>
				    									</tr>
				    								</tbody>
				    							</table>
				    						</div>
                                            <div class="transaction-additional_notes__wrapper">
                                                <p class="mt-2 font-bold">Please Note:</p>
                                                <p class="font-bold">The final price shown is the amount you will pay to the property.</p>
                                                <p class="text-xs">Hotel.com does not charge guests any reservation, administration or other fees.</p>
                                                <p class="text-xs">{{$hotel_details->hotel_name}} handles all payments.</p>
                                                <p class="text-xs">Your card issuer may charge you a foreign transaction fee.</p>
                                                <hr>
                                                <p class="font-bold">Additional information:</p>
                                                
                                                <p class="text-xs">For any questions related to the property, you can contact {{$hotel_details->hotel_name}} on: {{$hotel_details->phone_number}}.</p>
                                                
                                                <p class="mt-4 mb-3">To make changes or cancel your booking, click the button below:</p>
                                                <div class="text-center">
                                                	<form action="/customer/profile/viewbooking/{{$transno}}" method="GET">
                                                		@csrf
                                                		<input type="hidden" name="trans_no" value="{{$transno}}">
                                                		<input type="hidden" name="dates_frominput" value="{{$dates_frominput}}">
                                                    	<x-button class="bg-blue-800 hover:bg-blue-700 active:bg-blue-900 focus:border-blue-900 ring-blue-300 mt-2 mb-4">Make changes to your booking</x-button>
                                                    </form>
                                                </div>
                                                <div class="mb-4"></div>
                                            </div>
			    						</div>
			    					</div>
	    						</div>
                            </div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>




</x-guest-layout>

<script>

    var datein = new Date({!! json_encode($datein) !!});
    var dateout = new Date({!! json_encode($dateout) !!});
    var datein_string = datein.toDateString().split(' ').slice(1).join(' ');
    document.getElementById("expecting_datein").innerHTML = datein_string;

    var datein_checkin_string = datein.toDateString();
    var dateout_checkout_string = dateout.toDateString();

    var dateintimes = " <span class='text-sm text-muted'>(from 2:00 PM - 9:00 PM)</span>";
    var dateouttimes = " <span class='text-sm text-muted'>(from 6:00 AM - 12:00 PM)</span>";

    document.getElementById("check_in").innerHTML = datein_checkin_string + dateintimes;
    document.getElementById("check_out").innerHTML = dateout_checkout_string + dateouttimes;


    var peso = "₱ ";

    var comp_disc = {!! json_encode($company_discount_price) !!};
    var comp_disc_with_separator = (comp_disc).toLocaleString('en');
    document.getElementById("comp_disc").innerHTML = peso + comp_disc_with_separator;

    var price = {!! json_encode($price) !!};
    var price_with_separator = (price).toLocaleString('en');
    document.getElementById("price").innerHTML = peso + price_with_separator;

</script>