<?php

namespace App\Http\Controllers;

use App\AboutController;
use foo\bar;
use Illuminate\Http\Request;

class AboutControllerController extends Controller
{

    public function index()
    {

        return view('admin.Web.about_info');
    }


    public function create(Request $request)
    {

        $address = "";
        $mobile = "";
        $email = "";
        if (!empty($request->get('address')))
        {
            $address = $request->get('address');
        }
        if (!empty($request->get('email')))
        {
            $email = $request->get('email');
        }

        if (!empty($request->get('mobile')))
        {
            $mobile = $request->get('mobile');
        }


       $res = AboutController::create([
           'address'=>$address,
           'email'=> $email,
           'mobile' => $mobile
       ]);

       if ($res)
       {
           return back()->with('message','Info Added Successfully');

       }
       else
       {
           return back()->with('message','Failed to insert info');
       }
    }


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        $all_infos = AboutController::paginate(5);
        return view('admin.Web.info_list',compact('all_infos'));
    }


    public function edit(AboutController $aboutController)
    {
        //
    }


    public function update(Request $request, AboutController $aboutController)
    {
        //
    }


    public function destroy($id)
    {
        $reult = AboutController::find($id)->delete();
        return back()->with('message','Info Deleted Successfully');
    }
}
