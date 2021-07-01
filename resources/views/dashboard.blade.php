<x-guest-layout>
    @section('title','Laravel: Dashboard')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    {{-- Alert messages --}}
                    @if(Session::has("successmessage"))
                    <div class="alert alert-success">
                        {{Session::get("successmessage")}}
                    </div>

                    @elseif(Session::has("deletemessage"))
                    <div class="alert alert-danger">
                        {{Session::get("deletemessage")}}
                    </div>
                    @endif
                    @if(Session::has("nopermission"))
                    <div class="alert alert-danger">
                        {{Session::get("nopermission")}}
                    </div>
                    @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>You're logged in as {{ Auth::user()->role->role_name }}</span>!</p>
                @if(Auth::user()->role->role_name == "Super Admin")
                    
                    <x-button class="mt-4" onclick="location.href='{{route('superadmin.add_hotels')}}'">Add Hotels</x-button>
                @elseif(Auth::user()->role->role_name == "Customer")
                    <x-button class="mt-4 mr-2" onclick="location.href='{{route('search.index')}}'">Hotel Search</x-button>
                    <x-button class="mt-4 mr-2" onclick="location.href='{{route('customer.profile.bookings')}}'">My Bookings</x-button>
                @endif
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
