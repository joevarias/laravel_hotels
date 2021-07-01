<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{



    public function index(){

        $hotelimages = \File::files(public_path('images/hotels/ascott'));

        $roomimages = \File::files(public_path('images/hotels/ascott/rooms'));
        // return View('pages.form')->with(array('images'=>$images));

        return View('pages.form', compact('hotelimages','roomimages'));

    }
}