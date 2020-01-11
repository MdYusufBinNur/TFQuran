<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;

use App\BookDetails;
use App\Booktype;
use App\Category;
use App\Publisher;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\Boolean;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();
        $book_types = Booktype::all();

        //$allbooks = Book::paginate(3);

        $books = Book::query()

            ->select('books.*','authors.*','publishers.*','categories.*','books.id as book_id')
            ->leftJoin('authors','authors.id','=','books.author_name')
            ->leftJoin('publishers','publishers.id','=','books.publisher_name')
            ->leftJoin('categories','categories.id','=','books.category_name')
            ->orderBy('books.id','DESC')
            ->paginate(5);

        //$books = Book::paginate(3);
        //return $books;
        return view('admin.Books.book_list',compact('books','categories','publishers','authors','book_types'));
    }


    public function create(Request $request)
    {



    }


    public function store(Request $request)
    {


        if (!empty( $request->get('category_name')))
        {
            $category_name = implode(",", $request->get('category_name'));
        }

        else
        {
            $category_name = 'Null';
        }
        $rules = [
            'book_name' => 'required',
            'author_name' => 'required',
            'image' =>'image|mimes:jpg,png,jpeg',
            'language_name' => 'required',
            'publisher_name' => 'required',



        ];

        $customMessages = [
            'book_name.required' => 'Book Name is required',
            'author_name.required' => 'Author Name is required',
            'image' =>'image|mimes:jpg,png,jpeg',
            'image.required' =>'Image Must be valid file',
            'language_name.required' =>'Language is required',

        ];

        $this->validate($request, $rules, $customMessages);





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
            $directory   = 'book_image/';
            $imageUrl    = $directory.$imageName;

            Image::make($image)->resize(130, 186)->save($imageUrl);
        }


        $results = Book::create(
            [
                'book_name' => $request->get('book_name'),
                'author_name' => $request->get('author_name'),
                'publisher_name' => $request->get('publisher_name'),
                'language' => $request->get('language_name'),
                'category_name' => $category_name,
                'topics' => $request->get('topics_name'),
                'book_image' => $imageUrl,
                'type' =>$request->get('book_type')

            ]
        );

        //return $results;
        if ($results)
        {
            return back()->with('message','New Book Info Successfully Added');
        }
        else
        {
            return back()->with('message','!! ERROR !!');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();
        $booktypes = Booktype::all();
        $allbooks = Book::paginate(3);
        return view('admin.Books.add_new_book',compact('categories','publishers','authors','allbooks','booktypes'));
    }


    public function get_single_book($id)
    {

        $book_info = Book::query()
            ->select('books.*','authors.*','publishers.*','categories.*','books.id as book_inc_id','authors.id as author_id','categories.id as category_id','publishers.id as publisher_id')
            ->leftJoin('authors','authors.id','=','books.author_name')
            ->leftJoin('publishers','publishers.id','=','books.publisher_name')
            ->leftJoin('categories','categories.id','=','books.category_name')
            ->where('books.id','=',$id)
            ->first();
        return json_encode($book_info);
    }

    public function update(Request $request)
    {
        //return $request->file('image');
        //return $request;
        if ($request->file('image') == null)
        {
            //return 'kk';
            if (!empty( $request->get('category_name')))
            {
                $category_name = implode(",", $request->get('category_name'));
                $result= Book::find($request->get('book_id'))->update(
                    [
                        'book_name' => $request->get('book_name'),
                        'author_name' => $request->get('author_name'),
                        'publisher_name' => $request->get('publisher_name'),
                        'language' => $request->get('language_name'),
                        'category_name' => $category_name,
                        'topics' => $request->get('topics_name'),
                        'type' =>$request->get('m_book_type')

                    ]
                );
            }

            else
            {
                $result= Book::find($request->get('book_id'))->update(
                    [
                        'book_name' => $request->get('book_name'),
                        'author_name' => $request->get('author_name'),
                        'publisher_name' => $request->get('publisher_name'),
                        'language' => $request->get('language_name'),

                        'topics' => $request->get('topics_name'),
                        'type' =>$request->get('m_book_type')

                    ]
                );
            }

        }
        else
        {

            //
            $image = $request->file('image');
            $fileType    = $image->getClientOriginalExtension();
            $imageName   = rand().'.'.$fileType;
            $directory   = 'book_image/';
            $imageUrl    = $directory.$imageName;
            //return $imageUrl;
            Image::make($image)->resize(130, 186)->save($imageUrl);

            if (!empty($request->get('category_name')))
            {
                $category_name = implode(",", $request->get('category_name'));
                $result=  Book::find($request->get('book_id'))->update(
                    [
                        'book_name' => $request->get('book_name'),
                        'author_name' => $request->get('author_name'),
                        'publisher_name' => $request->get('publisher_name'),
                        'language' => $request->get('language_name'),
                        'category_name' => $category_name,
                        'book_image' => $imageUrl,
                        'topics' => $request->get('topics_name'),
                        'type' =>$request->get('m_book_type')

                    ]
                );
            }

            else
            {
                $result= Book::find($request->get('book_id'))->update(
                    [
                        'book_name' => $request->get('book_name'),
                        'author_name' => $request->get('author_name'),
                        'publisher_name' => $request->get('publisher_name'),
                        'language' => $request->get('language_name'),
                        'book_image' => $imageUrl,
                        'topics' => $request->get('topics_name'),
                        'type' =>$request->get('m_book_type')

                    ]
                );
            }

        }


        if ($result == true)
        {
            return back()->with('message', 'Record Update Successfully');
        }
        else
        {
            return back()->with('message', 'Failed To  Update Record');
        }

    }

    public function destroy($id)
    {

        BookDetails::where('book_id',$id)->delete();

        Book::find($id)->delete();

        return back()->with('message', 'Record Deleted Successfully');

    }

    public function publish(Request $request)
    {
        $val = 1;
        $bookId = $request->get('book_id');
        //return $bookId;
        $res = Book::find($bookId)->update([
           'status' => $val
        ]);

        //return $res;
        if ($res == true)
        {
            return back()->with('message','New Book Published');
        }
        else
        {
            return back()->with('message','Failed to Published');
        }

    }

    public function unpublish($id)
    {
        $val = 0;
        $bookId = $id;
//      $bookId = $request->get('book_id');
        //return $bookId;
        $res = Book::find($bookId)->update([
           'status' => $val
        ]);

        //return $res;
        if ($res == true)
        {
            return back()->with('message','This Book Un-Published');
        }
        else
        {
            return back()->with('message','Failed to Unpublished');
        }

    }



}
