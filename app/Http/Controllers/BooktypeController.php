<?php

namespace App\Http\Controllers;

use App\Booktype;
use Illuminate\Http\Request;

class BooktypeController extends Controller
{

    public function index()
    {
        $booktypes = Booktype::paginate(8);
        return view('admin.Book_Types.type_list',compact('booktypes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Booktype::create([
           'book_type' =>$request->get('book_type')
        ]);
        return back()->with('message','Book type Added');
    }


    public function show(Booktype $booktype)
    {
        return view('admin.Book_Types.add_book_types');
    }


    public function edit(Booktype $booktype)
    {
        //
    }

    public function update(Request $request)
    {

        if (!empty($request->get('book_type')))
        {
            Booktype::where('id',$request->get('book_type_id'))->update([
                'book_type' => $request->get('book_type'),

            ]);
            return back()->with('message','Record Updated');
        }
    }

    public function destroy($booktype)
    {
        Booktype::find($booktype)->delete();
        return back()->with('message','Record Deleted');
    }

    public function book_type_info($id)
    {
        $books = Booktype::query()->select('*')->where('id','=',$id)->first();
        return json_encode($books);
    }
}
