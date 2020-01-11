<?php

namespace App\Http\Controllers;

use App\TafsirImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TafsirImageController extends Controller
{
    public function save_image(Request $request)
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
            Image::make($image)->resize(130, 186)->save($imageUrl);
        }

        $res = TafsirImage::create(
            [
                'image_name' => $name,
                'image' => $imageUrl
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
    public function index()
    {
        $all_Images = TafsirImage::paginate(5);
        return view('admin.Surah.image_list',compact('all_Images'));
    }


    public function create()
    {
        return view('admin.Surah.add_image');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(TafsirImage $tafsirImage)
    {
        //
    }


    public function edit($id)
    {

        $res = TafsirImage::query()->select('tafsir_images.*')->where('id',$id)->get();
        return json_encode($res);
    }


    public function update(Request $request)
    {
        $id = $request->get('id');
        $name = $request->get('image_name');
        if ($request->file('image') == null)
        {
            $imageUrl = null;
            $res = TafsirImage::where('id',$id)->update(
                [
                    'image_name' => $name
                ]
            );

        }
        else
        {
            $image = $request->file('image');
            //return $request->file('image');
            $fileType    = $image->getClientOriginalExtension();
            $imageName   = rand().'.'.$fileType;
            $directory   = 'tafsir_image/';
            $imageUrl    = $directory.$imageName;
            Image::make($image)->resize(130, 186)->save($imageUrl);

            $res =TafsirImage::where('id',$id)->update(
                [
                    'image_name' => $name,
                    'image'=>$imageUrl
                ]
            );
        }
        if($res)
        {
            return back()->with('message','Data Has Been Updated');
        }
        else
        {
            return back()->with('message','Failed To Update');
        }

    }


    public function destroy($id)
    {
        $res = TafsirImage::find($id)->delete();
        if ($res)
        {
            return back()->with('message','Record Deleted');
        }
        else
        {
            return back()->with('message','Failed to delete');
        }
    }
}
