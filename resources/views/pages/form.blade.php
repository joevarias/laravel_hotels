<x-guest-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
                <h2>Show All Image from public folder using Laravel</h2>

                <ul>
                @foreach ($hotelimages as $hotelimage)
                        <a href="{{ asset('images/hotels/ascott/' . $hotelimage->getFilename()) }}" data-lightbox="Ascott" data-title="Ascott" class="img">
                            <img class="inline m-1" src="{{ asset('images/hotels/ascott/' . $hotelimage->getFilename()) }}" width="200" height="auto">
                        </a>
                @endforeach


                @foreach ($roomimages as $roomimage)

                        <a href="{{ asset('images/hotels/ascott/rooms/' . $roomimage->getFilename()) }}" data-lightbox="Ascott" data-title="Ascott">
                        </a>
                @endforeach
                <a href="{{ asset('images/hotels/ascott/' . $hotelimage->getFilename()) }}" data-lightbox="Ascott" data-title="Ascott">[See more]</a>
                </ul>
                
            
        </div>
    </div>
</div>


<script>
    lightbox.option({
      'resizeDuration': 200,
      'fadeDuration' : 200,
      'imageFadeDuration' : 0
    })
</script>
</x-guest-layout>