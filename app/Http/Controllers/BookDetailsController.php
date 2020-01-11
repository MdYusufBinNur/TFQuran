<?php

namespace App\Http\Controllers;


use App\Book;
use App\BookDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Xml;

class BookDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $book_id = $request->get('book_id');
        $sub_chapter_no = $request->get('sub_chapter_no');
        $sub_chapter_name = $request->get('sub_chapter_name');
        $chapter_no = $request->get('chapter_no');
        $chapter_name = $request->get('chapter_name');
        $meta_info = $request->get('meta_info');



        $check_chepter = BookDetails::where('book_id',$book_id)->where('chapter_no',$chapter_no)->where('sub_chapter_no',$sub_chapter_no)->first();

        //return $check_chepter;
//        if ($check_chepter->chapter_name != $chapter_name)
//        {
//            return back()->with('message','Errors !! Chapter Name mismatched');
//        }

        if ( $check_chepter === null )
        {
            BookDetails::create(
                [
                    'book_id' => $book_id,
                    'chapter_no' =>$chapter_no,
                    'chapter_name' => $chapter_name,
                    'sub_chapter_no' => $sub_chapter_no,
                    'sub_chapter_name' => $sub_chapter_name,
                    'meta_info' => $meta_info
                ]
            );
            return back()->with('message','Meta Info successfully Added');
        }
        else
        {

            return back()->with('message','Error !! Same Chapter and Sub Chapter No Already Exist !!');
            //return back()->with(compact('book_id','sub_chapter_name','sub_chapter_no','chapter_name','chapter_no','meta_info'));
        }


    }


    public function show($id)
    {

        $book_id = $id;

        $book_name = Book::query()->select('book_name')->where('id',$id)->first();
        $books = BookDetails::query()->select('id','book_id','chapter_no','chapter_name','sub_chapter_no','sub_chapter_name')->distinct('chapter_no')->where('book_id',$id)->get();


//        $books = DB::table('book_details')
//            ->select('chapter_no')
//            ->where('book_id',$id)
//            ->distinct()
//            ->count();

        $books_chapter = BookDetails::distinct()->where('book_id',$id)->get('chapter_no');
        //return $books;

        return view('admin.Books.add_meta_info',compact('book_id','books','books_chapter','book_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookDetails  $bookDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(BookDetails $bookDetails)
    {
        //
    }


    public function update(Request $request)
    {
        //return $request->get('chapter_name');
        $selected_book_id = $request->get('selected_book_id');
        $book_id = $request->get('book_id');
        $sub_chapter_no = $request->get('sub_chapter_no');
        $sub_chapter_name = $request->get('sub_chapter_name');
        $chapter_no = $request->get('chapter_no');
        $chapter_name = $request->get('chapter_name');
        $meta_info = $request->get('meta_info');

        $update = BookDetails::find($selected_book_id)->update([

            'chapter_name' => $chapter_name,

            'sub_chapter_name' => $sub_chapter_name,

            'meta_info' => $meta_info
        ]);

        return back()->with('message','Record Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookDetails  $bookDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookDetails $bookDetails)
    {
        //
    }


    public function getChapterDetails(Request $request)
    {

        $chapter_no = $request->input('chapter_no');
        $book_no = $request->input('book_id');

        $chapter_details = BookDetails::query()->select('*')->where('book_id',$book_no)->where('chapter_no',$chapter_no)->get();

        return json_encode($chapter_details);
    }

    public function getSubChapter(Request $request)
    {
        $chapter_no = $request->input('chapter_no');
        $book_no = $request->input('book_id');
        $sub_chapter_no = $request->input('sub_chapter_no');

        //return $sub_chapter_no;
        $sub_chapter_name = BookDetails::query()->select('*')->where('book_id',$book_no)->where('chapter_no',$chapter_no)->where('sub_chapter_no',$sub_chapter_no)->first();
        return json_encode($sub_chapter_name);
    }

    public function book_preview($id)
    {
        $preview = Book::query()->select('books.*','books.id as book_id','book_details.*')
        ->leftJoin('book_details','book_details.book_id','=','books.id')
        ->where('books.id',$id)
        ->orderBy('chapter_no','ASC')
        ->get();

//        $books = BookDetails::query()->select('book_details.sub_chapter_no')->where('book_id',$id)->get();
//
//        $category_name = [];
//        foreach ( $books as $book)
//        {
//            $category_name = implode(",", $book->sub_chapter_no);
//        }
//
//        $len = count($books);
//
//        for ($i = 0; $i <= $len; $i++)
//        {
//
//        }
        //return count($category_name);


        return json_encode($preview);


    }

    public function exportto($id)
    {
        $preview = Book::query()->select('books.*','books.id as book_id','book_details.*')
            ->leftJoin('book_details','book_details.book_id','=','books.id')
            ->where('books.id',$id)
            ->orderBy('chapter_no','ASC')
            ->get();

        $book_name_o = Book::query()->select('books.book_name')

            ->where('books.id',$id)
            ->first();

        //return $book_name_o;

        $name = strftime($book_name_o->book_name.'.xml');
        header('Content-Disposition: attachment;filename=' . $name);
        header('Content-Type: text/xml');
        //return $preview;
        $xml = new \DOMDocument("1.0",'UTF-8');
        $xml->formatOutput=true;
        $books = $xml->createElement('books');
        $xml->appendChild($books);

        //$xml->save("book.xml");

       // return count($preview);


        foreach ( $preview as  $pre)
        {
            $book_id = $xml->createElement('section');
            $books->appendChild($book_id);

            $id = $xml->createElement('id',$pre->id);
            $book_id->appendChild($id);
            $book_ids = $xml->createElement('book_id',$pre->book_id);
            $book_id->appendChild($book_ids);
            $book_name = $xml->createElement('book_name',$pre->book_name);
            $book_id->appendChild($book_name);

            $chapter = $xml->createElement('chapter_no',$pre->chapter_no);
            $book_id->appendChild($chapter);
            $chapter_name = $xml->createElement('chapter_name',$pre->chapter_name);
            $book_id->appendChild($chapter_name);
            $sub_chapter_no = $xml->createElement('sub_chapter_no',$pre->sub_chapter_no);
            $book_id->appendChild($sub_chapter_no);
            $sub_chapter_name= $xml->createElement('sub_chapter_name',$pre->sub_chapter_name);
            $book_id->appendChild($sub_chapter_name);
            $meta_info= $xml->createElement('meta_info',$pre->meta_info);
            $book_id->appendChild($meta_info);
        }

        return $xml->saveXML();
        //return "<xmp>".$xml->saveXML()."</xmp>";


//        $data = collect($preview)->map(function($x){ return (array) $x; })->toArray();
//        return XML::export($data)
//            ->toString();
        //return $preview;
       //return json_encode($preview);
    }
}
