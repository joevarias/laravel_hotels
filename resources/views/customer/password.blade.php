<x-guest-layout>
	@section('title','Laravel: Change Password')
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
				    			</ul>
			    			</div>
			    		</div>
			    		<div class="col-lg-8">
			    			<div class="p-3 bg-white border rounded-md border-gray-400">
								<div>
									<header>
										<h5 class="font-bold">Change Password</h5>
									</header>
									<p>Change your password</p>
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
									<form method='POST' action="{{route('customer.password.update')}}">
										@method('PUT')
										@csrf
										<div class='row my-2'>
											<div class='col-lg-3 col-md-3 col-sm-3 md:text-right'>
	                							<x-label for="old_password" :value="__('Current Password')" class="col-form-label"/>
											</div>
											<div class='col-lg-7 col-md-9 col-sm-9'>
								                <x-input id="old_password" class="form-control"
								                                type="password"
								                                name="old_password"
								                                required/>
											</div>
											
										</div>
										<div class='row my-2'>
											<div class='col-lg-3 col-md-3 col-sm-3 md:text-right'>
	                							<x-label for="password" :value="__('New Password')" class="col-form-label"/>
											</div>
											<div class='col-lg-7 col-md-9 col-sm-9'>
								                <x-input id="password" class="form-control"
								                                type="password"
								                                name="password"
								                                required autocomplete="new-password" />
											</div>
											
										</div>
										<div class='row my-2'>
											<div class='col-lg-3 col-md-3 col-sm-3 md:text-right'>
                								<x-label for="password_confirmation" :value="__('Confirm Password')" class="col-form-label"/>
											</div>
											<div class='col-lg-7 col-md-9 col-sm-9 mb-3'>
								                <x-input id="password_confirmation" class="form-control"
								                                type="password"
								                                name="password_confirmation" required />
											</div>

										</div>
										<div class="row mt-4 mb-2">
											<div class="col-lg-3 col-md-3 col-sm-3"></div>
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
