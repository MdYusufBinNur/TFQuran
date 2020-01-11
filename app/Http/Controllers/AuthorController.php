<?php

namespace App\Http\Controllers;

use App\Author;
use foo\bar;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function index()
    {
        return view('admin.Authors.add_author');
    }


    public function create(Request $request)
    {

        if (!empty($request->get('author_name')))
        {
            $author = Author::create([
                'author_name' => $request->get('author_name'),
                'author_info' =>$request->get('author_info')
            ]);
        }

        if ($author)
        {
            return back()->with('message','Author Name Added');
        }
        else
        {
            return back()->with('message','Failed TO Add Author Name');
        }

    }


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        $authors  = Author::paginate(5);
        return view('admin.Authors.author_list',compact('authors'));
    }


    public function edit(Author $author)
    {
        //
    }


    public function update(Request $request)
    {

        //return $request;

        $results = Author::where('id',$request->get('author_id'))->update([
            'author_name' => $request->get('name'),
            'author_info' => $request->get('info')
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
        Author::find($id)->delete();
        return back()->with('message','Record Deleted');
    }

    public function author_info($id)
    {
        $editor = Author::query()->select('*')->where('id','=',$id)->first();
        return json_encode($editor);
    }

}
