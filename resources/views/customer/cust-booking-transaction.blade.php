<x-guest-layout>
    @section('title','Laravel: Booking Details')
    <div>
        <h1 class="text-center my-5">Booking Details</h1>
    </div>
    <div class="sm:container mx-auto">
    	<div class="row">
    		<div class="col">
    			<div class="container">
    				<div class="row">
    					<div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            @php
                                $booking = $booking->first();
                            @endphp
                            <div class="bg-white border rounded-sm border-gray-400 transaction__wrapper">
                                <ul>
                                    
                                    <li class="flex flex-col md:flex-row md:justify-center bg-blue-100 pt-2 pb-1">
                                        <div class="mx-auto transaction_number__md_remove-margin">
                                            <span class="font-bold">Transaction number:&nbsp</span>
                                        </div>
                                        <div class="m-auto transaction_number__md_remove-margin">
                                            <span class="font-normal">{{$booking->transaction_no}}</span>
                                        </div>
                                    </li>
                                    <li class="flex flex-col md:flex-row md:justify-center bg-blue-100 pb-2 pt-1">
                                        <div class="mx-auto transaction_number__md_remove-margin">
                                            <span class="font-bold">Booking Status:&nbsp</span>
                                        </div>
                                        <div class="mx-auto transaction_number__md_remove-margin">
                                            <span class="font-bold">{{$booking->booking_status}}</span>
                                        </div>
                                    </li>
                                </ul>
                                @if(Session::has('successfully_cancelled'))
                                    <div class="text-center alert alert-success">
                                        {{Session::get("successfully_cancelled")}}
                                    </div>
                                @elseif(Session::has('successfully_deleted'))
                                    <div class="text-center alert alert-danger">
                                        {{Session::get("successfully_deleted")}}
                                    </div>
                                @endif
                                <div>
                                    <div class="flex flex-col md:flex-row transaction-image__wrapper px-3">
                                        <div class="">
                                            <img src="{{asset($booking->image_path)}}" style="display: inline-block;object-fit: cover; margin-top: 2px; margin-bottom: 2px; width: 200px; height: 200px;" class="rounded-sm shadow-md">
                                        </div>
                                        <div class="md:px-2 transaction-hotel_name__wrapper">
                                             <div class="mx-2">
                                                <h5 class="font-bold text-2xl">{{$booking->hotel_name}}</h5>
                                                <p class="text-sm">{{$booking->hotel_address}}</p>
                                                <p class="text-sm">Phone Number: <span>{{$booking->phone_number}}</span></p>
                                                <p class="text-sm">Email Address: <a href="mailto:hotel@hotel.com">hotel@hotel.com</a></p>
                                                <p class="text-sm">Time of Booking: {{$booking->created}}</p>
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
                                                            @if($booking->no_of_nights>1)
                                                            {{$booking->no_of_nights}} nights,
                                                            @else()
                                                            {{$booking->no_of_nights}} night,
                                                            @endif
                                                            @if($count_rooms_total>1)
                                                            {{$count_rooms_total}} rooms
                                                            @else
                                                            {{$count_rooms_total}} room
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">Check-in</td>
                                                        <td id="check_in" class="text-right">{{$booking->date_in}} <span>from 2PM-9PM</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold">Check-out</td>
                                                        <td id="check_out" class="text-right">{{$booking->date_out}} <span>from 6AM-12PM</span></td>
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

                                            <div class="bg-blue-100 p-2 transaction-rates__wrapper mb-4">
                                                <table style="margin:0;padding:0px;border:0px;width:100%;min-width:100%">
                                                    <tbody>
                                                        @if($count_standard_room)
                                                            @php
                                                            $standard = $standard_room_details->first();
                                                            @endphp
                                                            <tr>
                                                                <td>Standard Room</td>
                                                                <td class="text-right">{{$count_standard_room}} x ₱ {{$standard->rate}}</td>
                                                            </tr>
                                                        @endif
                                                        @if($count_deluxe_room)
                                                            @php
                                                            $deluxe = $deluxe_room_details->first();
                                                            @endphp
                                                            <tr>
                                                                <td>Deluxe Room</td>
                                                                <td class="text-right">{{$count_deluxe_room}} x ₱ {{$deluxe->rate}}</td>
                                                            </tr>
                                                        @endif
                                                        @if($count_queen_room)
                                                            @php
                                                            $queen = $queen_room_details->first();
                                                            @endphp
                                                            <tr>
                                                                <td>Queen Room</td>
                                                                <td class="text-right">{{$count_queen_room}} x ₱ {{$queen->rate}}</td>
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
                                                            <td class="text-lg font-bold">Final Price</td>
                                                            <td class="text-right text-lg font-bold" id="price">₱ {{$booking->total}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <hr>
                                                <table style="margin:0;padding:0px;border:0px;width:100%;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td>Payment Method</td>
                                                            <td class="text-right">{{$booking->payment_method}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="transaction-additional_notes__wrapper">
                                                <p class="mt-2 font-bold">Please Note:</p>
                                                <p class="font-bold">The final price shown is the amount you will pay to the property.</p>
                                                <p class="text-xs">Hotel.com does not charge guests any reservation, administration or other fees.</p>
                                                <p class="text-xs">{{$booking->hotel_name}} handles all payments.</p>
                                                <p class="text-xs">Your card issuer may charge you a foreign transaction fee.</p>
                                                <hr>
                                                <p class="font-bold">Additional information:</p>
                                                
                                                <p class="text-xs">For any questions related to the property, you can contact {{$booking->hotel_name}} on: {{$booking->phone_number}}.</p>
                                                @php
                                                    $now = new DateTime();
                                                    $date_now = $now->format('Y-m-d');
                                                @endphp

                                                @if(($booking->booking_status == "Confirmed") && ($date_now < $booking->date_in ))
                                                <p class="mt-4 mb-3">To make changes or cancel your booking, click a button below:</p>
                                                <div class="flex flex-col md:flex-row justify-evenly">
                                                    <div class="text-center">
                                                        <form action="{{route('customer.profile.bookings')}}" method="GET">
                                                            @csrf
                                                            <x-button class="mt-2 mb-4 mr-1">Back to bookings</x-button>
                                                        </form>
                                                    </div>
                                                    <div class="text-center">
                                                        <form action="/customer/profile/booking/update" method="GET">
                                                            @csrf
                                                            <input type="hidden" name="dates_frominput" value="{{$dates_frominput}}">
                                                            <input type="hidden" name="trans_no" value="{{$booking->transaction_no}}">
                                                            <x-button class="bg-blue-800 hover:bg-blue-700 active:bg-blue-900 focus:border-blue-900 ring-blue-300 mt-2 mb-4 mr-1">Make changes</x-button>
                                                        </form>
                                                    </div>
                                                    <div class="text-center">
                                                        <form method="POST" action="/customer/bookingcancel/{{$booking->transaction_no}}">
                                                            @csrf
                                                            @method('PUT')
                                                            <x-button class="mt-2 mb-4 bg-blue-800 hover:bg-blue-700 active:bg-blue-900 focus:border-blue-900 ring-blue-300" onclick="return confirm('Cancel this booking?')">Cancel booking</x-button>
                                                        </form>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="flex justify-evenly">
                                                    <div class="text-center mt-5 mb-4">
                                                        <form action="{{route('customer.profile.bookings')}}" method="GET">
                                                            @csrf
                                                            <x-button>Back to bookings</x-button>
                                                        </form>
                                                    </div>
                                                    <div class="text-center mt-5 mb-4">
                                                        <form action="/customer/bookingdelete/{{$booking->transaction_no}}/fromOne" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <x-button class="bg-red-800 hover:bg-red-700 active:bg-red-900 focus:border-red-900 ring-red-300" onclick="return confirm('Delete this transaction?')">Delete</x-button>
                                                        </form>
                                                    </div>
                                                </div>
                                                @endif
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

    var datein = new Date({!! json_encode($booking->date_in) !!});
    var dateout = new Date({!! json_encode($booking->date_out) !!});

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

    var price = {!! json_encode($booking->total) !!};
    var price_with_separator = (price).toLocaleString('en');
    document.getElementById("price").innerHTML = peso + price_with_separator;

</script>