<x-guest-layout>
    @section('title','Laravel: Confirm Change Details')
    <div>
        <h1 class="text-center my-5">Confirm Change Details</h1>
    </div>

    <div class="sm:container mx-auto booking-page__main-container">
        <div class="row">
            <div class="col">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <img src="{{ asset($hotel->image_path) }}">
                            </div>
                        </div>


                        <div class="col-lg-7">
                            <div class="svg-container">
                                <span class="align-text-top">Hotel&nbsp </span>
                                <img src="{{ asset('/images/star.svg') }}" width="120" class="align-top d-inline">
                            </div>
                            <div>
                                <h4 class="font-bold">{{$hotel->hotel_name}}</h4>
                                <p class="text-sm">{{$hotel->hotel_address}}</p>
                            </div>

                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div class="bg-white p-3">

                                <div class="row">
                                    <div class="col-lg-5 mb-3">
                                        <header>
                                            <h4 class="py-2 font-semibold">Your Booking Details</h4>
                                        </header>
                                        <div class="border rounded-sm border-gray-400">
                                            <div class="p-3">
                                                <div class="flex-container cust-booking-confirmchanges-flex-container-__wrapper bg-blue-50 p-3">
                                                    <div class="flex-item">
                                                        <p>New Check-in</p>
                                                        <div class="border-right border-gray-400 pr-2">
                                                            <time id="time_checkin" class="font-bold"></time>
                                                            <p class="text-sm">2:00 PM - 9:00 PM</p>
                                                        </div>
                                                    </div>
                                                    <div class="pl-2 flex-item">
                                                        <p>New Check-out</p>
                                                        <div>
                                                            <time id="time_checkout" class="font-bold"></time>
                                                            <p class="text-sm">6:00 AM - 12:00 PM</p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <hr>
                                                <div class="flex-container">
                                                    <div class="flex-item">
                                                        <p>Total length of stay</p>
                                                        <div>
                                                            <time class="font-bold">
                                                                @if($no_of_nights>1)
                                                                    {{$no_of_nights}} nights
                                                                @else
                                                                    {{$no_of_nights}} night
                                                                @endif
                                                            </time>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="flex-container">
                                                    <div class="flex-item">
                                                        <p class="font-bold">You Selected:</p>
                                                        @if($reserve_countrooms_standard>0)
                                                            <p>{{$reserve_countrooms_standard}} x Standard Room</p>
                                                        @endif
                                                        @if($reserve_countrooms_deluxe>0)
                                                            <p>{{$reserve_countrooms_deluxe}} x Deluxe Room</p>
                                                        @endif
                                                        @if($reserve_countrooms_queen>0)
                                                            <p>{{$reserve_countrooms_queen}} x Queen Room</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="text-center pb-3">
                                                    <form method="GET" action="{{route('customer.booking.updateform')}}">
                                                    	<input type="hidden" name="trans_no" value="{{$trans_no}}">
                                                    	<input type="hidden" name="dates_frominput" value="{{$dates_frominput}}">
                                                        <x-button class="bg-blue-800 hover:bg-blue-700 active:bg-blue-900 focus:border-blue-900 ring-blue-300">Change your selection</x-button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <header>
                                            <h4 class="py-2 font-semibold">Your Price Summary</h4>
                                        </header>
                                        <form method="POST" action="{{route('customer.booking.submitchanges')}}">
                                            @csrf
                                            @method('PUT')
                                            <div class="border rounded-sm border-gray-400">
                                                <div class="px-3 pt-3">
                                                    <div>
                                                        <ul>
                                                            <li class="flex justify-between font-semibold">
                                                                <div>
                                                                    {{$reserve_countrooms_total}} Rooms
                                                                </div>
                                                                <div class="text-right" id="rooms_total_price">₱ 
                                                                    {{$rooms_total_price}}
                                                                </div>
                                                            </li>
                                                            <li class="flex justify-between text-sm">
                                                                <div>
                                                                    Discount 8% (Company Disc)
                                                                </div>
                                                                <div class="text-right" id="company_discount_price">₱ 
                                                                    {{$company_discount_price}}
                                                                </div>
                                                            </li>
                                                            <hr>
                                                            <li class="flex justify-between pt-2 bg-blue-100 font-bold booking-details__price p-3">
                                                                <div>
                                                                    Price
                                                                </div>
                                                                <div class="text-right" id="price">₱ 
                                                                    {{$price}}
                                                                </div>
                                                            </li>
                                                            <hr>
                                                            <li class="flex justify-between mb-2">
                                                                <div class="mb-3">
                                                                    <label>Payment Method:</label>
                                                                    <select class="custom-select" required name="payment_method">
                                                                        <option selected hidden value="" placeholder="">Choose payment method</option>
                                                                        <option value="1">Cash</option>
                                                                        <option value="2">Credit Card</option>
                                                                        <option value="3">Paypal</option>
                                                                        <option value="4">Bank Transfer</option>
                                                                    </select>
                                                                <!-- Validation Errors -->
                                                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div>
                                                        </div>
                                                        <hr>
                                                        <div class="text-left">
                                                        	<p class="mt-2 font-bold mb-0">Important Note:</p>
                                                        	<ul class="list-disc ml-3">
                                                        		<li>Upon completion, <span class="font-semibold italic">previous Transaction number: <span class="not-italic">{{$trans_no}}</span> will be <span class="underline">cancelled</span> and a new booking transaction will be generated.</span></li>
                                                        		<li>Rooms will be updated based from your selection.</li>
                                                        		<li>The previous payment made will be refunded depending on which payment method was used.</li>
                                                        	</ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <div class="flex justify-end">
                                                    <x-button class="bg-green-800 font-bold text-sm hover:bg-green-700 active:bg-green-900 focus:border-green-900 ring-green-300 py-3py-3" onclick="return confirm('Submit changes?')">Submit Changes</x-button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-guest-layout>

<script>

    var datein = new Date({!! json_encode($datein) !!});
    var datein_string = datein.toDateString();
    var dateout = new Date({!! json_encode($dateout) !!});
    var dateout_string = dateout.toDateString();

    document.getElementById("time_checkin").innerHTML = datein_string;
    document.getElementById("time_checkout").innerHTML = dateout_string;



    var peso = "₱ ";

    var rooms_total_price = {!! json_encode($rooms_total_price) !!};
    var rooms_total_price_with_separator = (rooms_total_price).toLocaleString('en');
    document.getElementById("rooms_total_price").innerHTML = peso + rooms_total_price_with_separator;

    var comp_disc = {!! json_encode($company_discount_price) !!};
    var comp_disc_with_separator = (comp_disc).toLocaleString('en');
    document.getElementById("company_discount_price").innerHTML = peso + comp_disc_with_separator;

    var price = {!! json_encode($price) !!};
    var price_with_separator = (price).toLocaleString('en');
    document.getElementById("price").innerHTML = peso + price_with_separator;

</script>