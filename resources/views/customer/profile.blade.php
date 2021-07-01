<x-guest-layout>
	@section('title','Laravel: My Profile')
    <div>
        <h1 class="text-center my-5">My Account</h1>
    </div>
    <div class="sm:container mx-auto">
    	<div class="row">
    		<div class="col">
    			<div class="container">
    				<div class="row">
			    		<div class="col-lg-3">
			    			<div class="text-center">
				    			<ul class="list-group">
									<a href="{{route('customer.profile')}}" class="list-group-item">Profile</a>
									<a href="{{route('customer.profile.password')}}" class="list-group-item">Change Password</a>
									<a href="{{route('customer.profile.bookings')}}" class="list-group-item">My Bookings</a>
				    			</ul>
			    			</div>
			    		</div>
			    		<div class="col-lg-8">
			    			<div class="p-3 bg-white border rounded-md border-gray-400">
								<div>
									<header>
										<h5 class="font-bold">My Profile</h5>
									</header>
									<p>Manage your account</p>
									<hr>
								</div>
                                <div class="text-center">
                                <!-- Validation Errors -->
		                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
									@if(Session::has('successfully_updated'))
		                                <div class="text-center alert alert-success">
		                                    {{Session::get("successfully_updated")}}
		                                </div>
									@endif
								</div>
								<div class="text-sm">
									<!-- Form for save profile Start -->
									<form method='POST' action="{{route('customer.profile.update')}}">
										@method('PUT')
										@csrf
										<div class='row my-2'>
											<div class='col-lg-2 col-md-3 col-sm-3 md:text-right'>
												<label class='col-form-label'>Username</label>
											</div>
											<div class='col-lg-7 col-md-9 col-sm-9'>
												<input class='form-control shadow-sm border-gray-300 focus:border-indigo-300' placeholder='{{$cust_details->username}}' readonly>
											</div>
										</div>
										<div class='row my-2'>
											<div class='col-lg-2 col-md-3 col-sm-3 md:text-right'>
												<label class='col-form-label' for='profile_firstname'>First Name</label>
											</div>
											<div class='col-lg-7 col-md-9 col-sm-9'>
												<input class='form-control shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50' type='text' name='profile_firstname' id='profile_firstname' value='{{$cust_details->first_name}}'>
											</div>
										</div>
										<div class='row my-2'>
											<div class='col-lg-2 col-md-3 col-sm-3 md:text-right'>
												<label class='col-form-label' for='profile_lastname'>Last Name</label>
											</div>
											<div class='col-lg-7 col-md-9 col-sm-9'>
												<input class='form-control shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50' type='text' name='profile_lastname' id='profile_lastname' value='{{$cust_details->last_name}}'>
											</div>
										</div>
										<div class='row my-2'>
											<div class='col-lg-2 col-md-3 col-sm-3 md:text-right'>
												<label class='col-form-label' for='email'>Email</label>
											</div>
											<div class='col-lg-7 col-md-9 col-sm-9 mb-3'>
												<input class='form-control shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50' type='email' name='email' id='email' value='{{$cust_details->email}}'>
											</div>
										</div>
										<div class="row mt-4 mb-2">
											<div class="col-lg-2 col-md-3 col-sm-3"></div>
											<div class="col-lg-7 col-md-9 col-sm-9 text-right">
												<x-button>Save Changes</x-button>
											</div>
										</div>
									</form>

									<!-- Form for save profile End -->
								</div>
							</div>
			    		</div>
    				</div>
    			</div>
    		</div>

    	</div>
    </div>
</x-guest-layout>
