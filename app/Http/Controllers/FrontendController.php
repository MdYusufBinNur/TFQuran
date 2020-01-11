<?php

namespace App\Http\Controllers;

use App\AboutController;
use App\Author;
use App\Book;
use App\Booktype;
use App\Comment;
use App\Publisher;
use App\SliderController;
use App\taf_ayah;
use App\taf_surah;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class FrontendController extends Controller
{

    public function utilities()
    {
        $books = Book::query()
            ->select('books.*','authors.*','publishers.*','categories.*','books.id as book_id')
            ->leftJoin('authors','authors.id','=','books.author_name')
            ->leftJoin('publishers','publishers.id','=','books.publisher_name')
            ->leftJoin('categories','categories.id','=','books.category_name')
            ->where('books.status','=',1)
            ->get();
        return $books;
    }

    public function surah_name_first()
    {
        $surah_names_first = taf_surah::query()->select('id', 'surah_name')->orderBy('id','ASC')->skip(0)->take(29)->get();

        return $surah_names_first;
    }

    public function surah_name_second()
    {

        $surah_name_second = taf_surah::query()->select('id', 'surah_name')->orderBy('id','ASC')->skip(29)->take(29)->get();

        return $surah_name_second;
    }

    public function surah_name_third()
    {

        $surah_name_third = taf_surah::query()->select('id', 'surah_name')->orderBy('id','ASC')->skip(58)->take(28)->get();

        return $surah_name_third;
    }

    public function surah_name_fourth()
    {

        $surah_name_fourth = taf_surah::query()->select('id', 'surah_name')->orderBy('id','ASC')->skip(86)->take(28)->get();

        return $surah_name_fourth;
    }


    public function about_info()
    {
        $information = AboutController::query()
            ->select('*')
            ->orderBy('id','DESC')
            ->limit(1)
            ->first();
        return $information;
    }
    public function index()
    {

        $surah_names_first = $this->surah_name_first();
        $surah_name_second = $this->surah_name_second();
        $surah_name_third = $this->surah_name_third();
        $surah_name_fourth = $this->surah_name_fourth();

        $slider_image_second = SliderController::query()->select('*')
            ->orderBy('id','DESC')
            ->skip(1)
            ->take(1)
            ->first();
        $slider_image_first = SliderController::query()->select('*')
            ->orderBy('id','DESC')
            ->limit(1)
            ->first();

        $information = $this->about_info();
        $books = $this->utilities();

        //return $surah_name_fourth;

        $publishers = Publisher::all();
        $authors = Author::all();
        $book_types = Booktype::all();
        $newbooks = Book::query()
            ->select('books.*','authors.*','publishers.*','categories.*','books.id as book_id')
            ->leftJoin('authors','authors.id','=','books.author_name')
            ->leftJoin('publishers','publishers.id','=','books.publisher_name')
            ->leftJoin('categories','categories.id','=','books.category_name')
            ->where('books.status','=',1)
            ->orderBy('books.id','DESC')
            ->limit(5)
            ->get();

        return  view('front_end.front_end_dashboard',compact('books','newbooks','book_types','authors','publishers','surah_names_first','surah_name_second','surah_name_third','surah_name_fourth','slider_image_first','slider_image_second','information'));
    }

    public function book_preview($id)
    {
        $information = $this->about_info();
        //return $id;
        $book_name_autors = Book::query()
            ->select('books.*','authors.*','publishers.*','categories.*','books.id as book_id')
            ->leftJoin('authors','authors.id','=','books.author_name')
            ->leftJoin('publishers','publishers.id','=','books.publisher_name')
            ->leftJoin('categories','categories.id','=','books.category_name')
            ->where('books.id',$id)
            ->first();
        //return $book_name_autors;
        $preview = Book::query()
            ->select('books.*','books.id as book_id','book_details.*','authors.*','publishers.*','categories.*')
            ->leftJoin('book_details','book_details.book_id','=','books.id')
            ->leftJoin('authors','authors.id','=','books.author_name')
            ->leftJoin('publishers','publishers.id','=','books.publisher_name')
            ->leftJoin('categories','categories.id','=','books.category_name')
            ->where('books.id',$id)
            ->orderBy('chapter_no','ASC')
            ->get();
//return $preview;
        return view('front_end.Books.book_details',compact('preview','book_name_autors','information'));
    }

    public function categorical_book_view($type)
    {

        $surah_names_first = $this->surah_name_first();
        $surah_name_second = $this->surah_name_second();
        $surah_name_third = $this->surah_name_third();
        $surah_name_fourth = $this->surah_name_fourth();

        $preview = Book::query()
            ->select('books.*','authors.*','publishers.*','categories.*','books.id as book_id')
            ->leftJoin('authors','authors.id','=','books.author_name')
            ->leftJoin('publishers','publishers.id','=','books.publisher_name')
            ->leftJoin('categories','categories.id','=','books.category_name')
            ->where('books.status','=',1)
            ->where('books.type',$type)
            ->paginate(4);
        //return $type;


        $books = Book::query()
            ->select('books.*','authors.*','publishers.*','categories.*','books.id as book_id')
            ->leftJoin('authors','authors.id','=','books.author_name')
            ->leftJoin('publishers','publishers.id','=','books.publisher_name')
            ->leftJoin('categories','categories.id','=','books.category_name')
            ->where('books.status','=',1)
            ->get();

        $publishers = Publisher::all();
        $authors = Author::all();
        $book_types = Booktype::all();

        $information = $this->about_info();
        return view('front_end.Books.categorical_book',compact('publishers','type','book_types','preview','authors','surah_names_first','surah_name_second','surah_name_third','surah_name_fourth','information'));
    }

    public function search(Request $request)
    {
//        return $request->search;

        if (!empty($request->search))
        {
            if ($request->ajax())
            {
                $output = "";
                $authors = DB::table('authors')
                    ->where('author_name','LIKE','%'.$request->search.'%')
                    ->get();


                //return Response($authors);
                if (count($authors)>0)
                {
                    foreach ($authors as $author)
                    {
                        $output .='<tr><td><a href="book_by_author/'.$author->author_name.'"><strong style="font-size: 20px" >'.$author->author_name.'</strong></a></td></tr>';
                    }
                    return Response($output);
                }
            }
        }

    }

    public function book_by_author($author)
    {



        $author_books = Book::query()
            ->select('books.*','authors.*','publishers.*','categories.*','books.id as book_id')
            ->leftJoin('authors','authors.id','=','books.author_name')
            ->leftJoin('publishers','publishers.id','=','books.publisher_name')
            ->leftJoin('categories','categories.id','=','books.category_name')
            ->where('books.status','=',1)
            ->where('authors.author_name',$author)
            ->paginate(4);

        $surah_names_first = $this->surah_name_first();

        $surah_name_second = $this->surah_name_second();

        $surah_name_third = $this->surah_name_third();

        $surah_name_fourth = $this->surah_name_fourth();

        $book_types = Booktype::all();

        $publishers = Publisher::all();

        $authors = Author::all();
        $information = $this->about_info();

        return view('front_end.Books.book_by_authors',compact('author','book_types','author_books','authors','publishers','surah_names_first','surah_name_second','surah_name_third','surah_name_fourth','information'));
    }

    public function comments(Request $request)
    {
        Comment::create([
           'book_name' => $request->get('book_name'),
            'author_name' => $request->get('author_name'),
            'chapter_sub' => $request->get('chapter_sub'),
            'comments' => $request->get('comments')
        ]);

        return back()->with('message','Comments forwarded to admin!! Thank for your valuable feedback');
    }

    public function surah_info($id)
    {
        $surah_names_first = $this->surah_name_first();
        $surah_name_second = $this->surah_name_second();
        $surah_name_third = $this->surah_name_third();
        $surah_name_fourth = $this->surah_name_fourth();

        $book_types = Booktype::all();

        $publishers = Publisher::all();

        $authors = Author::all();

        $sura_descriptions = taf_ayah::query()
            ->select('taf_ayahs.ayah_id as taf_ayah_id','taf_ayahs.*',
                'taf_surahs.id as taf_surah_id','taf_surahs.surah_name as taf_surah_name',
                'taf_tokens.id as taf_token_id','taf_tokens.ayah_id as taf_token_ayah_id','taf_tokens.token_no as taf_token_no','taf_tokens.token_trans','taf_tokens.token_expl_no','taf_tokens.token_expl','taf_tokens.image_token')
            ->leftJoin('taf_surahs','taf_surahs.id','=','taf_ayahs.surah_no')
            ->leftJoin('taf_tokens','taf_tokens.ayah_id','=','taf_ayahs.ayah_id')
            ->where('taf_surahs.id',$id)
            ->orderBy('taf_ayah_id','ASC')
            ->orderBy('taf_token_no','ASC')
            ->get();

        $surah_intro = taf_surah::query()->select('surah_intro')->where('id','=',$id)->first();
        //return $surah_intro;
        $name = taf_surah::query()->select('taf_surahs.*')->where('taf_surahs.id',$id)->first();
        $information = $this->about_info();


        //return $sura_descriptions;
        return view('front_end.Surah.surah_details',compact('name','book_types','authors','publishers','surah_names_first','surah_name_second','surah_name_third','surah_name_fourth','sura_descriptions','surah_intro','information'));
    }


    public function bookmark_list($sura,$ayah)
    {
        $information = $this->about_info();
        $surah_names_first = $this->surah_name_first();
        $surah_name_second = $this->surah_name_second();
        $surah_name_third = $this->surah_name_third();
        $surah_name_fourth = $this->surah_name_fourth();

        $book_types = Booktype::all();

        $publishers = Publisher::all();

        $authors = Author::all();

        $sura_descriptions = taf_ayah::query()
            ->select('taf_ayahs.ayah_id as taf_ayah_id','taf_ayahs.*',
                'taf_surahs.id as taf_surah_id','taf_surahs.surah_name as taf_surah_name','taf_surahs.surah_intro',
                'taf_tokens.id as taf_token_id','taf_tokens.ayah_id as taf_token_ayah_id','taf_tokens.token_no as taf_token_no','taf_tokens.token_trans','taf_tokens.token_expl_no','taf_tokens.token_expl')
            ->leftJoin('taf_surahs','taf_surahs.id','=','taf_ayahs.surah_no')
            ->leftJoin('taf_tokens','taf_tokens.ayah_id','=','taf_ayahs.ayah_id')
            ->where('taf_surahs.id',$sura)
            ->where('taf_ayahs.ayah_no',$ayah)
            ->orderBy('taf_ayah_id','ASC')
            ->orderBy('taf_token_no','ASC')
            ->get();

        //return $sura_descriptions;
        $name = taf_surah::query()->select('taf_surahs.*')->where('taf_surahs.id',$sura)->first();


        return view('front_end.Surah.bookmarked',compact('name','book_types','authors','publishers','surah_names_first','surah_name_second','surah_name_third','surah_name_fourth','sura_descriptions','ayah','information'));



    }

}
