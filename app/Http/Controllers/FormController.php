<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index($id){

    	$hotel_main_image = 

        $hotelimages = \File::files(public_path('images/hotels/ascott'));

        $roomimages = \File::files(public_path('images/hotels/ascott/rooms'));
        // return View('pages.form')->with(array('images'=>$images));

        return View('pages.form', compact('hotelimages','roomimages'));

    }
}