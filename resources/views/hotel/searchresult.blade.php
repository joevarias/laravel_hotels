<x-guest-layout>
  @section('title','Laravel: Hotel Search Results')
    <div>
        <h1 class="text-center my-5">Search Hotel</h1>
    </div>

    <div class="sm:container mx-auto">
        <div class="row">
            <div class="col">
                <div>
                	<div class="text-center">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                      <form method="GET" action="{{ route('search.hotels') }}">
                          <input list="searchresult" type="search" name="city" id="search" placeholder="Search for city" class="my-1" value="{{$city_name}}">
                          <datalist id="searchresult">
                            {{-- search results here --}}
                          </datalist>
                          <input type="text" name="dates_frominput" id="dates" placeholder="Select Date" class="w-60 my-1" readonly value="{{$dates_frominput}}">
                          <x-button class="p-3">Search Hotels</x-button>
                      </form>
                  </div>
                  <div class="text-center mt-3">
                    <h4>Properties found:</h4>
                  </div>
        					<div class="container">
        						@foreach($hotels_details_with_rate as $hotel)
        						<div class="row">
        							<div class="col">
        								<div class="hotel-wrapper mt-3 px-3 py-3 bg-white shadow-md overflow-hidden sm:rounded-lg">
        									<div class="row">
        										<div class="col-lg-4 mt-2">
      												<div>
      													<a href="/hotels/{{$hotel->id}}/{{$dates_frominput}}">
                                  <img width="500" src="/{{$hotel->image_path}}" class="mx-auto d-block" title="{{$hotel->hotel_name}}" alt="{{$hotel->hotel_name}}">
                                </a>
      												</div>
        										</div>
        										<div class="col-lg-8 mt-2">
        											<div>
        												<div class="card">
        													<div class="card-body">
        														<a href="/hotels/{{$hotel->id}}/{{$dates_frominput}}" class="text-gray-900 dark:text-white"><span class=" font-semibold text-lg">{{$hotel->hotel_name}}</span></a>
        														<p class="card-text text-sm mt-1">{{$hotel->hotel_address}}</p>
        														<p class="card-text">{{ substr($hotel->hotel_description, 0, 250)}} ...</p>
                                    {{-- if there is available room: --}}
                                    @if(isset($hotel->rate))
        														  <p class="card-text font-semibold d-inline">Starts at &#8369; {{$hotel->rate}}</p>
                                      <form method="GET" action="/hotels/{{$hotel->id}}/{{$dates_frominput}}">
          														  <x-button style="float: right;" class="mt-3 mt-md-0 bg-blue-800 hover:bg-blue-700 active:bg-blue-900 focus:border-blue-900 ring-blue-300">See Availability</x-button>
                                      </form>
                                    {{-- if no available room, do else: --}}
                                    @else
                                      <p class="card-text font-semibold d-inline text-red-500">No rooms available on your dates</p>
                                    @endif
        													</div>
        												</div>
        											</div>
        										</div>
        									</div>
        								</div>
        							</div>
        						</div>
        						@endforeach

        					</div>

                </div>

            </div>
        </div>
    </div>
</x-guest-layout>


<script>
    //search on keypress, delay 600ms before each search
    function debounce(callback, wait) {
          let timeout;
          return (...args) => {
              clearTimeout(timeout);
              timeout = setTimeout(function () { callback.apply(this, args); }, wait);
          };
    }
    document.getElementById("search").addEventListener('keypress', debounce( () => {
        function fetch_customer_data(query){
            $.ajax({
               url:"{{ route('search.city') }}",
               method:'GET',
               data:{query:query},
               dataType:'json',
               success: function(data){
                $('#searchresult').html(data.list_data);
               }
            });
        }

      let query = document.getElementById("search").value;
      fetch_customer_data(query);
    }, 600));

</script>

<script>
//initialize hotel-datepicker
var input = document.getElementById('dates');
var dates = new HotelDatepicker(input, {});

</script>