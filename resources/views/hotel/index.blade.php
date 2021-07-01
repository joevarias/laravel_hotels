<x-guest-layout>
  @section('title','Laravel: Search Hotel')
    <div>
        <h1 class="text-center my-5">Search Hotel</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="text-center">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="GET" action="{{ route('search.hotels') }}">
                        @csrf
                        <input list="searchresult" type="search" name="city" id="search" placeholder="Type a city" class="my-1" autocomplete="off" required>
                        <datalist id="searchresult">
                          
                        </datalist>
                        <input type="text" name="dates_frominput" id="dates" placeholder="Click to open calendar" class="w-60 my-1" readonly autocomplete="off" required>
                        <x-button class="p-3" id="buttonforalert">Search Hotels</x-button>
                    </form>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="text-center mt-5">
                    <p><span class="font-semibold">Available for search:</span></p>
                    <p><i>Pasay, Manila, Makati, Quezon City, Taguig</i></p>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>

<script>

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
    }, 500));

</script>


{{--  hotel-date picker --}}

<script>

var input = document.getElementById('dates');
var dates = new HotelDatepicker(input, {});

</script>
