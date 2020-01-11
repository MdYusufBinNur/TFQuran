<?php

namespace App\Http\Controllers;

use App\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        return view('admin.Publishers.add_publisher');
    }


    public function create(Request $request)
    {

        $publisher = '';
        if (!empty($request->get('publisher_name')))
        {
            $publisher = Publisher::create([
                'publisher_name' => $request->get('publisher_name'),
                'publisher_info' =>$request->get('publisher_info')
            ]);
        }

        if ($publisher)
        {
            return back()->with('message','publisher Name Added');
        }
        else
        {
            return back()->with('message','Failed TO Add publisher Name');
        }

    }


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        $publishers  = Publisher::paginate(5);
        return view('admin.Publishers.publisher_list',compact('publishers'));
    }


    public function edit(Publisher $author)
    {
        //
    }


    public function update(Request $request)
    {

        //return $request;

        $results = Publisher::where('id',$request->get('publisher_id'))->update([
            'publisher_name' => $request->get('name'),
            'publisher_info' => $request->get('info')
        ]);


        if ($results == 1)
        {
            return back()->with('message','Record update successfully');

        }
        else
        {
            return back()->with('message','Failed to update Records');

        }
    }


    public function destroy($id)
    {
        Publisher::find($id)->delete();
        return back()->with('message','Record Deleted');
    }

    public function publisher_info($id)
    {
        $editor = Publisher::query()->select('*')->where('id','=',$id)->first();
        return json_encode($editor);
    }
}
