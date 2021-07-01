<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Hotels') }}
        </h2>
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            {{-- <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a> --}}
        </x-slot>

        <div>
            <p class="text-center m-2 font-semibold">Add Hotel</p>
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="/superadmin/menu/add_hotel" enctype="multipart/form-data">
            @csrf

            <!-- Hotel Name -->
            <div>
                <x-label for="hotel_name" :value="__('Hotel Name')" />

                <x-input id="hotel_name" class="block mt-1 w-full" type="text" name="hotel_name" :value="old('hotel_name')" required autofocus />
            </div>

            <!-- Hotel Address -->

            <div class="mt-4">
                <x-label for="hotel_address" :value="__('Hotel Address')" />

                <x-input id="hotel_address" class="block mt-1 w-full" type="text" name="hotel_address" :value="old('hotel_address')" required />
            </div>

            <!-- Belongs to City -->

            <div class="mt-4">
                <x-label for="city" :value="__('City')" />

                <select id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required>
                	<option disabled selected value hidden> -- select a city -- </option>
				    <option value="1">Makati</option>
				    <option value="2">Manila</option>
				    <option value="3">Quezon City</option>
				    <option value="4">Pasay</option>
				    <option value="5">Taguig</option>
                </select>
            </div>

            <!-- Hotel Description -->

            <div class="mt-4">
                <x-label for="hotel_description" :value="__('Hotel Description')" />

                <textarea id="hotel_description" class="block mt-1 w-full" type="text" name="hotel_description" :value="old('hotel_description')" required></textarea>
            </div>

            <!-- Phone Number -->

            <div class="mt-4">
                <x-label for="phone_number" :value="__('Phone Number')" />

                <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required />
            </div>


            <!-- Hotel Image -->

            <div class="mt-4">
                <x-label for="hotel_image" :value="__('Uploaded Image:')" />

                <x-input id="hotel_image" class="block mt-1 w-full" type="file" name="hotel_image" :value="old('hotel_image')" required />
            </div>



            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>


</x-app-layout>