<x-guest-layout>
    @section('title','Laravel: My Bookings')
    <div>
        <h1 class="text-center my-5">My Bookings</h1>
    </div>
    <div class="sm:container mx-auto">
    	<div class="row">
    		<div class="col">
    			<div class="container">
    				<div class="row">
    					<div class="col">
                            @if(!$bookings->count())
                                <div class="text-center">
                                    <h3>You don't have any bookings!</h3>
                                    <x-button class="text-base mt-4 bg-blue-800 hover:bg-blue-700 active:bg-blue-900 focus:border-blue-900 ring-blue-300" onclick="location.href='{{route('search.index')}}'">Search Hotel</x-button>
                                </div>
                            @else
                                @if(Session::has("successfully_deleted"))
                                    <div class="text-center alert alert-danger">
                                        {{Session::get("successfully_deleted")}}
                                    </div>
                                @endif

        						@foreach($bookings as $bookings)

        						@php
        						$total = $bookings->total;
        						$converted_datein = date("j F Y", strtotime($bookings->date_in));
        						$converted_dateout = date("j F Y", strtotime($bookings->date_out));
        						@endphp

        						<div class="bookings-card__wrapper border rounded border-gray-400 shadow-md p-3 mt-3 mb-5">
        							<div class="flex flex-col md:flex-row">
    	    							<div>
    	    								<a href="">
    	    									<img src="{{asset($bookings->image_path)}}" class="rounded rounded-sm" style="display: inline-block;object-fit: cover; margin-top: 2px; margin-bottom: 2px; width: 200px; height: 200px;">
    	    								</a>
    	    							</div>
    	    							<div class="md:ml-3 flex flex-col bookings-hotel_name__wrapper">
    	    								<h4 class="font-bold">{{$bookings->hotel_name}}</h4>
    	    								<p>{{$bookings->city_name}}</p>
    	    								<p><span>@php echo $converted_datein @endphp</span> - <span>@php echo $converted_dateout @endphp</span></p>
    	    								<p>{{$bookings->booking_status}}</p>
                                            <p>{{$bookings->transaction_no}}</p>
    	    							</div>
    	    							<div class="md:ml-auto p-3">
    	    								<p class="text-lg font-bold">₱ 
    	    									@php
    	    									echo number_format($total);
    	    									@endphp
    	    								</p>
    	    							</div>
        							</div>
                                    <div class="flex justify-between">
        								<div class="bookings-button__wrapper mb-3">
        									<form action="/customer/profile/viewbooking/{{$bookings->transaction_no}}">
                                                @csrf
        										<x-button>View Booking</x-button>
        									</form>
        								</div>
                                        <div>
                                            @if($bookings->booking_status_id != 1)
                                            <form action="/customer/bookingdelete/{{$bookings->transaction_no}}/fromAll" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-button class="bg-red-800 hover:bg-red-700 active:bg-red-900 focus:border-red-900 ring-red-300" onclick="return confirm('Delete this booking transaction?')">Delete</x-button>
                                            </form>

                                            @endif
                                        </div>
                                    </div>
        						</div>
        						@endforeach
                            @endif
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

</x-guest-layout>

