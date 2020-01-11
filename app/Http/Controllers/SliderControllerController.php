<?php

namespace App\Http\Controllers;

use App\SliderController;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderControllerController extends Controller
{

    public function index()
    {
        return view('admin.Web.add_new_slide');
    }


    public function create(Request $request)
    {
        $name = $request->get('image_name');
        if ($request->file('image') == null)
        {
            $imageUrl = null;

        }
        else
        {
            $image = $request->file('image');
            //return $request->file('image');
            $fileType    = $image->getClientOriginalExtension();
            $imageName   = rand().'.'.$fileType;
            $directory   = 'tafsir_image/';
            $imageUrl    = $directory.$imageName;
            Image::make($image)->resize(1920, 593)->save($imageUrl);
        }

        $res = SliderController::create(
            [
                'slider_name' => $name,
                'slider_image' => $imageUrl
            ]
        );
        if ($res)
        {
            return back()->with('message','Image Added Successfully');
        }
        else
        {
            return back()->with('message','Failed To Add Image');
        }

    }


    public function store(Request $request)
    {

    }


    public function show()
    {
        $all_Images = SliderController::paginate(5);
        return view('admin.Web.slider_list',compact('all_Images'));
    }


    public function edit(SliderController $sliderController)
    {

    }


    public function update(Request $request, SliderController $sliderController)
    {
        //
    }

    public function destroy($id)
    {
       $result  = SliderController::find($id)->delete();
       return back()->with('message','Slider Image Deleted Successfully');
    }
}
