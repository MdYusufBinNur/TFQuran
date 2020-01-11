<?php

namespace App\Http\Controllers;

use App\Category;
use DemeterChain\C;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.Categories.add_category');
    }


    public function create(Request $request)
    {

        $category = '';
        if (!empty($request->get('category_name')))
        {
            $category = Category::create([
                'category_name' => $request->get('category_name'),

            ]);
        }

        if ($category)
        {
            return back()->with('message','Categories Name Added');
        }
        else
        {
            return back()->with('message','Failed TO Add Categories Name');
        }

    }


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        $categories  = Category::paginate(5);
        return view('admin.Categories.category_list',compact('categories'));
    }


    public function edit(Category $author)
    {
        //
    }


    public function update(Request $request)
    {

        //return $request;

        $results = Category::where('id',$request->get('category_id'))->update([
            'category_name' => $request->get('name'),

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
        Category::find($id)->delete();
        return back()->with('message','Record Deleted');
    }

    public function category_info($id)
    {
        $category = Category::query()->select('*')->where('id','=',$id)->first();
        return json_encode($category);
    }
}
