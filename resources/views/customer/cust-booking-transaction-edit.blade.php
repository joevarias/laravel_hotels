<x-guest-layout>
    @section('title','Laravel: Change Booking Details')
    <div>
        <h1 class="text-center my-5">Change Booking Details</h1>
    </div>
    <div class="sm:container mx-auto">
    	<div class="row">
    		<div class="col">
    			<div class="container">
    				<div class="row">
    					<div class="col">
                            <div class="bordered p-2 bg-white">
                                <div>
                                    <div class="flex flex-col md:flex-row transaction-image__wrapper px-3">
                                        <div class="">
                                            <img src="{{asset($hotel->image_path)}}" style="display: inline-block;object-fit: cover; margin-top: 2px; margin-bottom: 2px; width: 200px; height: 200px;" class="rounded-sm shadow-md">
                                        </div>
                                        <div class="md:px-2 transaction-hotel_name__wrapper">
                                             <div class="mx-2">
                                                <h5 class="font-bold text-2xl">{{$hotel->hotel_name}}</h5>
                                                <p class="text-sm">{{$hotel->hotel_address}}</p>
                                                <p class="text-sm">Phone Number: <span>{{$hotel->phone_number}}</span></p>
                                                <p class="text-sm">Email Address: <a href="mailto:hotel@hotel.com">hotel@hotel.com</a></p>
                                                <p class="text-sm"><span class="font-bold">Check-in (original): </span>{{$booking_details->date_in}}</p>
                                                <p class="text-sm"><span class="font-bold">Check-out (original): </span>{{$booking_details->date_out}}</p>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-blue-100 py-3 mb-1">
                                    <header class="text-center">
                                        <h5><span class="font-bold">Transaction number: </span>{{$trans_no}}</h5>
                                    </header>
                                </div>
                                <div>
                            <div id="rooms-availability">
                                <div class="card shadow-md">
                                    <div class="card-body p-1">
                                        <div class="card-title pt-3">
                                            <h5 class="text-center font-semibold">Rooms Availability</h5>
                                        </div>
                                        <div>
                                            <div class="text-center">
                                            <!-- Validation Errors -->
                                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                            <form method="GET" action="{{route('customer.booking.updateform')}}">
                                                @csrf
                                                {{-- <input type="hidden" name="hotel_id" value="{{$hotel->id}}"> --}}
                                                <input type="hidden" name="trans_no" value="{{$trans_no}}">
                                                <input type="text" name="dates_frominput" id="dates" placeholder="Select Date" class="w-60 my-1" readonly value="{{$dates_frominput}}">
                                                <x-button class="p-3">Check Availability</x-button>
                                            </form>
                                            </div>
                                        </div>

                                {{--==================== Form for Rooms ====================--}}

                                        <form action="{{route('customer.booking.updatedetails')}}" method="GET" role="rooms-form">
                                            @csrf
                                            <div class="mt-5">
                                                @if(Session::has("selectroom"))
                                                    <div class="text-center alert alert-danger">
                                                        {{Session::get("selectroom")}}
                                                    </div>
                                                @elseif(Session::has('error_standard_room_availability_changed'))
                                                    <div class="text-center alert alert-danger">
                                                        {{Session::get("error_standard_room_availability_changed")}}
                                                    </div>
                                                @elseif(Session::has('error_deluxe_room_availability_changed'))
                                                    <div class="text-center alert alert-danger">
                                                        {{Session::get("error_deluxe_room_availability_changed")}}
                                                    </div>
                                                @elseif(Session::has('error_queen_room_availability_changed'))
                                                    <div class="text-center alert alert-danger">
                                                        {{Session::get("error_queen_room_availability_changed")}}
                                                    </div>
                                                @endif
                                                <input type="hidden" name="trans_no" value="{{$trans_no}}">
                                                <input type="hidden" name="datein" value="{{$datein}}">
                                                <input type="hidden" name="dateout" value="{{$dateout}}">
                                                <input type="hidden" name="hotel_id" value="{{$hotel->id}}">

                                                <table class="table table-bordered bg-gray-800 text-center">
                                                    <thead class="text-white bg-gray-800 ">
                                                        <th scope="col">Room Type</th>
                                                        <th scope="col">Today's Price</th>
                                                        <th scope="col">No. of Rooms</th>
                                                        <th scope="col">Sub-total</th>
                                                    </thead>
                                                    <tbody>

                                        {{--================= Standard Room =================--}}


                                                    @if($count_rooms_standard)
                                                        {{-- select options generator --}}
                                                        @php
                                                            $append_standard_options = "";
                                                            $count = 0;
                                                        @endphp
                                                        @while($count <= $count_rooms_standard)
                                                            @php
                                                            $append_standard_options .= '<option value='.$count.'>'.$count.'</option>';
                                                            $count++;
                                                            @endphp
                                                        @endwhile
                                                        {{-- end select options generator --}}

                                                        @php
                                                            $standard = $rooms_available_standard->first();
                                                        @endphp
                                                                <td><a href="{{asset($image_path_standard) }}" data-lightbox="{{$standard->room_type_name}}" data-title="{{$standard->room_type_name}}">{{$standard->room_type_name}}</a></td>

                                                                <td class="font-semibold" id="price{{$standard->room_type_id}}">{{$standard->rate}}</td>
                                                                <td><select name="quantity{{$standard->room_type_id}}" class="custom-select" id="selectid{{$standard->room_type_id}}" onchange="updatePrice({{$standard->room_type_id}}, (this))">@php echo $append_standard_options @endphp</select><span class="text-sm">(orig: {{$my_count_standard_room}})</span></td>
                                                                <td class="font-bold sub-total" id="totalprice{{$standard->room_type_id}}">0</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4"></td>
                                                            </tr>                                                            


                                                    {{--========== Standard Room IF NOT AVAILABLE ==========--}}

                                                    @elseif(!$count_rooms_standard)

                                                            <tr>
                                                                <td class="line-through">Standard Room</td>
                                                                <td class="text-red-600 font-semibold">Not available on your dates</td>
                                                                <td><select disabled class="custom-select"></select><input type="hidden" name="quantity1" value="0"></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4"></td>
                                                            </tr>

                                                    @endif

                                                    {{--================= end Standard Room =================--}}


                                                    {{--================= Deluxe Room =================--}}

                                                    @if($count_rooms_deluxe)

                                                        {{-- select options generator --}}
                                                        @php
                                                        $append_deluxe_options = "";
                                                        $count = 0;
                                                        @endphp
                                                        @while($count <= $count_rooms_deluxe)
                                                            @php
                                                            $append_deluxe_options .= '<option value='.$count.'>'.$count.'</option>';
                                                            $count++;
                                                            @endphp
                                                        @endwhile
                                                        {{-- end select options generator --}}

                                                        @php
                                                            $deluxe = $rooms_available_deluxe->first();
                                                        @endphp
                                                            <tr>
                                                                <td><a href="{{asset($image_path_deluxe) }}" data-lightbox="{{$deluxe->room_type_name}}" data-title="{{$deluxe->room_type_name}}">{{$deluxe->room_type_name}}</a></td>

                                                                <td class="font-semibold" id="price{{$deluxe->room_type_id}}">{{$deluxe->rate}}</td>
                                                                <td><select name="quantity{{$deluxe->room_type_id}}" class="custom-select" id="selectid{{$deluxe->room_type_id}}" onchange="updatePrice({{$deluxe->room_type_id}}, (this))">@php echo $append_deluxe_options @endphp</select><span class="text-sm">(orig: {{$my_count_deluxe_room}})</span></td>
                                                                <td class="font-bold sub-total" id="totalprice{{$deluxe->room_type_id}}">0</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4"></td>
                                                            </tr>

                                                    {{--========== Deluxe Room IF NOT AVAILABLE ==========--}}

                                                    @elseif(!$count_rooms_deluxe)
                                                            <tr>
                                                                <td class="line-through">Deluxe Room</td>
                                                                <td class="text-red-600 font-semibold">Not available on your dates</td>
                                                                <td><select disabled class="custom-select"></select><input type="hidden" name="quantity2" value="0"></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4"></td>
                                                            </tr>
                                                    @endif

                                                    {{--================= end Deluxe Room =================--}}


                                                    {{--================= Queen Room =================--}}
                                                    @if($count_rooms_queen)

                                                        {{-- select options generator --}}
                                                        @php
                                                        $append_queen_options = "";
                                                        $count = 0;
                                                        @endphp
                                                        @while($count <= $count_rooms_queen)
                                                            @php
                                                            $append_queen_options .= '<option value='.$count.'>'.$count.'</option>';
                                                            $count++;
                                                            @endphp
                                                        @endwhile
                                                        {{-- end select options generator --}}

                                                        @php
                                                            $queen = $rooms_available_queen->first();
                                                        @endphp
                                                            <tr>
                                                                <td><a href="{{asset($image_path_queen) }}" data-lightbox="{{$queen->room_type_name}}" data-title="{{$queen->room_type_name}}">{{$queen->room_type_name}}</a></td>

                                                                <td class="font-semibold" id="price{{$queen->room_type_id}}">{{$queen->rate}}</td>
                                                                <td><select name="quantity{{$queen->room_type_id}}" class="custom-select" id="selectid{{$queen->room_type_id}}" onchange="updatePrice({{$queen->room_type_id}}, (this))">@php echo $append_queen_options @endphp</select><span class="text-sm">(orig: {{$my_count_queen_room}})</span></td>
                                                                <td class="font-bold sub-total" id="totalprice{{$queen->room_type_id}}">0</td>
                                                            </tr>


                                                    {{--========== Qeen Room IF NOT AVAILABLE ==========--}}

                                                    @elseif(!$count_rooms_queen)
                                                                <td class="line-through">Queen Room</td>

                                                                <td class="text-red-600 font-semibold">Not available on your dates</td>
                                                                <td><select disabled class="custom-select"></select><input type="hidden" name="quantity3" value="0"></td>
                                                                <td></td>
                                                            </tr>

                                                    @endif

                                        {{--================= end Queen Room =================--}}
                                                            <tr>
                                                                <td class="text-lg font-extrabold" id="grandtotal" colspan="4">Grand Total = &#8369 0 </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4"><x-button class="px-5 bg-green-800 hover:bg-green-700 active:bg-green-900 focus:border-green-900 ring-green-300">Reserve</x-button></td>
                                                            </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </form>

                                {{--==================== end Form for Rooms ====================--}}

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
    </div>

{{-- for room images --}}
<div>

    {{-- standard --}}

    @if($count_rooms_standard)
        @foreach($collection_room_images_standard as $images_standard)
            <a href="{{asset($images_standard) }}" data-lightbox="{{$standard->room_type_name}}" data-title="{{$standard->room_type_name}}">
            </a>
        @endforeach

    @endif

    {{-- deluxe --}}
    @if($count_rooms_deluxe)
        @foreach($collection_room_images_deluxe as $images_deluxe)
            <a href="{{asset($images_deluxe) }}" data-lightbox="{{$deluxe->room_type_name}}" data-title="{{$deluxe->room_type_name}}">
            </a>
        @endforeach
    @endif

    {{-- queen --}}

    @if($count_rooms_queen)
        @foreach($collection_room_images_queen as $images_queen)
            <a href="{{asset($images_queen) }}" data-lightbox="{{$queen->room_type_name}}" data-title="{{$queen->room_type_name}}">
            </a>
        @endforeach
    @endif

</div>

</x-guest-layout>

<script type="text/javascript">
//human readable price
    function updatePrice(room_type_id, select){

        var price = document.getElementById("price"+room_type_id).innerHTML;
        var grandtotal = 0
        var pricetimesroom = price * select.value;


        document.getElementById("totalprice"+room_type_id).innerHTML = pricetimesroom;

        $(".sub-total").each(function(){
            grandtotal += parseFloat($(this).text());
        });

        document.getElementById('grandtotal').innerHTML = "Grand Total = ₱ " + grandtotal;

    }

</script>


<script>
//initialize hotel-datepicker
    var input = document.getElementById('dates');
    var dates = new HotelDatepicker(input, {});

</script>

<script>

//lightbox gallery
    lightbox.option({
      'resizeDuration': 200,
      'fadeDuration' : 200,
      'imageFadeDuration' : 0
    })
</script>