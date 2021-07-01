<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Hotel;

use Session;

class HotelController extends Controller
{

    public function addHotel(){
    	return view('superadmin.add_hotels');
    }

    public function saveHotel(Request $request){
    	$rules = array(
    		"hotel_name" => "required|string|max:255",
    		"hotel_address" => "required",
    		"phone_number" => "required|size:10",
    		"city" => "required|numeric",
    		"hotel_description" => "required",
            "hotel_intro" => "required|string|max:255",
    		"hotel_image" => "required|image|max:2048"
    	);

    	//validate $request from form
    	$this->validate($request,$rules);

    	$hotel = new Hotel;
    	$hotel->hotel_name = $request->hotel_name;
    	$hotel->hotel_address = $request->hotel_address;
    	$hotel->city_id = $request->city;
    	$hotel->hotel_description = $request->hotel_description;
        $hotel->hotel_intro = $request->hotel_intro;
    	$hotel->phone_number = $request->phone_number;

    	//replace space with underscore for hotel name
    	$renamed_hotelname = str_replace(' ', '_', $hotel->hotel_name);

    	//uploading the image
    	//check if directory exists
    	$path = public_path().'/images/hotels/'.$renamed_hotelname;

		if(!File::exists($path)) {
		    // path does not exist
		    File::makeDirectory($path);
		}

    	$image = $request->file('hotel_image');
    	$image_name = $renamed_hotelname.time().".".$image->getClientOriginalExtension();

    	$destination = "images/hotels/".$renamed_hotelname."/";
    	$image->move($destination, $image_name);

    	//saving the image path
    	$hotel->image_path = $destination.$image_name;
    	$hotel->save();

    	Session::flash("successmessage", "Item successfully added!");
    	return redirect('/dashboard');

    }
}
