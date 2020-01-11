<?php

namespace App\Http\Controllers;

use App\taf_ayah;
use App\taf_surah;
use App\taf_token;
use App\TafsirImage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use phpDocumentor\Reflection\Types\Boolean;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function editorCreate()
    {
        return view('admin.editors.editor');
    }

    public function editor_list()
    {
        $editor_lists = User::query()->select('*')->where('role_id','<',10)->paginate(5);
        //return $editor_lists;
        return view('admin.editors.editor_list',compact('editor_lists'));
    }

    public function editor_info($id)
    {
        $editor = User::query()->select('*')->where('id','=',$id)->first();
        return json_encode($editor);
    }

    public function update_editors(Request $request)
    {
       //$unique = User::query()->select('email')->where('email',$request->get('email'))->get();

       $results = User::where('id',$request->get('editor_id'))->update([
          'email' => $request->get('email'),
           'name' => $request->get('name')
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

    public function update_role(Request $request)
    {


        $results = User::where('id',$request->get('rol_id'))->update([
            'role_id' => $request->get('role'),
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

    public function delete_editor($id)
    {
        //return $id;
        $delete_editor=User::find($id)->delete();
        return back()->with('message','Record Successfully Deleted');
    }

    public function create(Request $data)
    {

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',

        ];

        //$this->validator($data->all());

        $customMessages = [
            'name.required' => 'Name is required',
            'email.required' => 'Email already exist',
            'password.required' => 'Password must Be in Valid Format [min 8 characters]'];

        $this->validate($data, $rules, $customMessages);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        //return is_bool($editors);

        return back()->with('confirm_message','Editor Has Been Added');
    }


    public function add_ayah()
    {
        $all_surahs = $this->sura_name();

        $all_images = TafsirImage::all();
//        return $all_images;
        return view('admin.Surah.add_ayah',compact('all_surahs','all_images'));
    }
    public function save_ayah(Request $request)
    {


        $flag = $request->get('key');
        //return $request;

        $token_no  = $request->get('token_no');
        $token_expl_no  = $request->get('token_expl_no');
        $token_trans  = $request->get('ayah_translation');
        $ayah_explanation  = $request->get('ayah_explanation');
        $image_token = $request->get('image');


        if ($flag == "new_ayah")
        {
            //return $request;
            $surah_no  = $request->get('surah_no');
            $ayah_no  = $request->get('ayah_no');
            $ayah_text  = $request->get('ayah_text');

            $save_ayah = new taf_ayah();
            $save_ayah->surah_no = $surah_no;
            $save_ayah->ayah_no = $ayah_no;
            $save_ayah->ayah_text = $ayah_text;
            $save_ayah->save();

            if ($save_ayah == true)
            {
                if ($token_no != null)
                {

                    $save_translation = new taf_token();
                    $save_translation->ayah_id =  $save_ayah->id;
                    $save_translation->token_no = $token_no;

                    if (!empty($token_trans))
                    {
                        $save_translation->token_trans = $token_trans;
                    }
                    if (!empty($token_expl_no))
                    {
                        $save_translation->token_expl_no = $token_expl_no;
                    }
                    if (!empty($ayah_explanation))
                    {
                        $save_translation->token_expl = $ayah_explanation;
                    }
                    if (!empty($image_token))
                    {
                        $save_translation->image_token = $image_token;
                    }
                    $save_translation->save();
                    return back()->with('message','New Ayah & Translation Saved Successfully');

                }
                else
                {
                    return back()->with('message','New Ayah Saved Successfully !! No Translation Added');
                }
            }
        }
        elseif($flag == "old_ayah")
        {
            $ex_ayah_id = $request->get('ex_ayah_id');

            $save_translation = new taf_token();
            $save_translation->ayah_id =  $ex_ayah_id;
            $save_translation->token_no = $token_no;

            if (!empty($token_trans))
            {
                $save_translation->token_trans = $token_trans;
            }
            if (!empty($token_expl_no))
            {
                $save_translation->token_expl_no = $token_expl_no;
            }
            if (!empty($ayah_explanation))
            {
                $save_translation->token_expl = $ayah_explanation;
            }
            if (!empty($image_token))
            {
                $save_translation->image_token = $image_token;
            }
            $save_translation->save();

            return back()->with('message','New Translation Saved Successfully');

        }
        else
        {
            return back()->with('message','Nothing Added');
        }


    }

    public function getExAyahNo(Request $request)
    {

        $id = $request->input('surah_id');
        $result = taf_ayah::query()->select('taf_ayahs.*')
            ->where('surah_no','=',$id)
            ->get();

        return json_encode($result);
    }


    public function sura_name()
    {
        $allSuras = taf_surah::query()->select( 'taf_surahs.id as taf_surah_id','taf_surahs.surah_name as taf_surah_name')->orderBy('id','ASC')->get();

        return $allSuras;
    }

    public function surah_intro($id)
    {
        $surah_intro = taf_surah::query()->select( 'taf_surahs.*')->where('id',$id)->first();

        return $surah_intro;
    }

    public function fetchAllRecord()
    {
        /*$allSuras = taf_ayah::query()
            ->select('taf_ayahs.ayah_id as taf_ayah_id','taf_ayahs.surah_no as taf_ayah_surah_no','taf_ayahs.ayah_no as taf_ayah_no',
                'taf_surahs.id as taf_surah_id','taf_surahs.surah_name as taf_surah_name',
                'taf_tokens.id as taf_token_id','taf_tokens.ayah_id as taf_token_ayah_id','taf_tokens.token_no as taf_token_no')
            ->leftJoin('taf_surahs','taf_surahs.id','=','taf_ayahs.surah_no')
            ->leftJoin('taf_tokens','taf_tokens.ayah_id','=','taf_ayahs.ayah_id')
            ->get();*/

        $sura_fatiha = taf_ayah::query()
            ->select('taf_ayahs.ayah_id as taf_ayah_id','taf_ayahs.*',
                'taf_surahs.id as taf_surah_id','taf_surahs.surah_name as taf_surah_name',
                'taf_tokens.id as taf_token_id','taf_tokens.ayah_id as taf_token_ayah_id','taf_tokens.token_no as taf_token_no','taf_tokens.token_trans')
            ->leftJoin('taf_surahs','taf_surahs.id','=','taf_ayahs.surah_no')
            ->leftJoin('taf_tokens','taf_tokens.ayah_id','=','taf_ayahs.ayah_id')
            ->where('taf_surahs.id',1)
            ->orderBy('taf_ayah_id','ASC')
            ->get();

        //return $sura_fatiha;

        $allSuras = $this->sura_name();
        $all_images = $this->token_image();
        $surah_fatiha_intro = $this->surah_intro(1);
        // $allSuras = taf_surah::query()->select( 'taf_surahs.id as taf_surah_id','taf_surahs.surah_name as taf_surah_name')->orderBy('id','ASC')->get();
//        return json_encode($allSuras,JSON_UNESCAPED_UNICODE);
        return view('admin.Surah.surah_list',compact('allSuras','sura_fatiha','surah_fatiha_intro','all_images'));
//        return view('admin.admin_dashboard',compact('allSuras','sura_fatiha','surah_fatiha_intro'));
    }

    public function token_image()
    {
        $all_images = TafsirImage::all();
        return $all_images;
    }
    public function fetchSIngleSuraRecord($id)
    {

        $sura_descriptions = taf_ayah::query()
            ->select('taf_ayahs.ayah_id as taf_ayah_id','taf_ayahs.*',
                'taf_surahs.id as taf_surah_id','taf_surahs.surah_name as taf_surah_name','taf_surahs.surah_intro',
                'taf_tokens.id as taf_token_id','taf_tokens.ayah_id as taf_token_ayah_id','taf_tokens.token_no as taf_token_no','taf_tokens.token_trans')
            ->leftJoin('taf_surahs','taf_surahs.id','=','taf_ayahs.surah_no')
            ->leftJoin('taf_tokens','taf_tokens.ayah_id','=','taf_ayahs.ayah_id')
            ->where('taf_surahs.id',$id)
            ->orderBy('taf_ayah_id','ASC')
            ->orderBy('taf_token_no','ASC')
            ->get();

        $surah_intro = $this->surah_intro($id);

//      $surah_intro = strip_tags($surah_intro->surah_intro);
//      return $surah_intro;

        $all_images = $this->token_image();
        $allSuras = $this->sura_name();
        $suras = taf_surah::query()->select('taf_surahs.*')->where('taf_surahs.id',$id)->first();

        return view('admin.Surah.surah_list',compact('suras','allSuras','sura_descriptions','surah_intro','all_images'));

//      return view('admin.admin_dashboard',compact('suras','allSuras','sura_descriptions','surah_intro'));

    }

    public function export_surah($id)
    {
        $sura_descriptions = taf_ayah::query()
            ->select('taf_ayahs.ayah_id as taf_ayah_id','taf_ayahs.*',
                'taf_surahs.id as taf_surah_id','taf_surahs.surah_name as taf_surah_name','taf_surahs.surah_intro',
                'taf_tokens.id as taf_token_id','taf_tokens.ayah_id as taf_token_ayah_id','taf_tokens.token_no as taf_token_no','taf_tokens.token_trans')
            ->leftJoin('taf_surahs','taf_surahs.id','=','taf_ayahs.surah_no')
            ->leftJoin('taf_tokens','taf_tokens.ayah_id','=','taf_ayahs.ayah_id')
            ->where('taf_surahs.id',$id)
            ->orderBy('taf_ayah_id','ASC')
            ->orderBy('taf_token_no','ASC')
            ->get();
        $suras = taf_surah::query()->select('taf_surahs.*')->where('taf_surahs.id',$id)->first();

        $name = strftime($suras->surah_name.'.xml');
        header('Content-Disposition: attachment;filename=' . $name);
        header('Content-Type: text/xml');

        $xml = new \DOMDocument('1.0','UTF-8');
        $xml->formatOutput= true;

        $surah = $xml->createElement('surah');
        $xml->appendChild($surah);

        foreach ($sura_descriptions as $sura_description)
        {
            $section  = $xml->createElement('section');
            $surah->appendChild($section);

            $section->appendChild($xml->createElement('surah_no',$sura_description->surah_no));
            $section->appendChild($xml->createElement('surah_name',$sura_description->taf_surah_name));
            $section->appendChild($xml->createElement('ayah_no',$sura_description->ayah_no));
            $section->appendChild($xml->createElement('taf_token_no',$sura_description->taf_token_no));
            $section->appendChild($xml->createElement('taf_token_id',$sura_description->taf_token_id));
            $section->appendChild($xml->createElement('ayah_text',$sura_description->ayah_text));
            $section->appendChild($xml->createElement('token_trans',$sura_description->token_trans));
        }
        return $xml->saveXML();
    }

    public function updateSura(Request $request)
    {
        $sura_no = $request->input('sura_no');
        $ayah_no = $request->input('ayah_no');
        $token_no = $request->input('token_no');

        $select_surah = taf_ayah::query()->select('*')->where('surah_no',$sura_no)->where('ayah_no',$ayah_no)->first();

        $all = taf_token::query()
            ->select('taf_tokens.*','taf_ayahs.ayah_text','taf_ayahs.ayah_no as taf_ayah_no','taf_tokens.token_no as taf_token_no')

            ->leftJoin('taf_ayahs','taf_ayahs.ayah_id','=','taf_tokens.ayah_id')
            ->where('taf_tokens.ayah_id','=',$select_surah->ayah_id)
            ->where('taf_tokens.token_no','=',$token_no)->get();

       /* $sura_descriptions = taf_ayah::query()
            ->select('taf_ayahs.ayah_id as taf_ayah_id','taf_ayahs.*',
                'taf_surahs.id as taf_surah_id','taf_surahs.surah_name as taf_surah_name',
                'taf_tokens.id as taf_token_id','taf_tokens.ayah_id as taf_token_ayah_id','taf_tokens.token_no as taf_token_no','taf_tokens.*')
            ->leftJoin('taf_surahs','taf_surahs.id','=','taf_ayahs.surah_no')
            ->leftJoin('taf_tokens','taf_tokens.ayah_id','=','taf_ayahs.ayah_id')
            ->where('taf_ayash.surah_no',$sura_no)
            ->where('taf_tokens.ayah_id','taf_ayahs.ayah_id')
            ->where('taf_tokens.token_no',$token_no)
            ->get();*/

        //dd($sura);

        return json_encode($all);
    }

    public function editSurah(Request $request)
    {

        //return $request;
        $ayah_id = $request->ayah_id;
        if (empty($ayah_id))
        {
            return back()->with('message','No Record Match to update');
        }
        else{

            if (!empty($request->get('image')))
            {
                if($request->get('image') == "null")
                {
                    $image = "";
                }
                else{
                    $image = $request->get('image');
                }
                $tafTokes = taf_token::where('ayah_id',$ayah_id)->where('token_no',$request->get('token_no'))->update(
                    [
                        'token_no' => $request->get('token_no'),
                        'token_trans' => $request->get('ayah_translation'),
                        'token_expl' => $request->get('ayah_explanation'),
                        'token_expl_no' => $request->get('token_expl_no'),
                        'image_token' => $image,

                    ]
                );
            }
            else
            {
                $tafTokes = taf_token::where('ayah_id',$ayah_id)->where('token_no',$request->get('token_no'))->update(
                    [
                        'token_no' => $request->get('token_no'),
                        'token_trans' => $request->get('ayah_translation'),
                        'token_expl' => $request->get('ayah_explanation'),
                        'token_expl_no' => $request->get('token_expl_no'),

                    ]
                );
            }


            $tafAyahs = taf_ayah::where('ayah_id',$ayah_id)->update(
                [
                    'ayah_no' => $request->get('ayah_no'),
                    'ayah_text'  => $request->get('ayah_text')
                ]
            );



            return back()->with('message','Record has been successfully updated');
        }
    }

    public function editSurahsItro(Request $request)
    {

        //return $request;
        $id = $request->get('surah_no');

        if (!empty($request->get('surah_intro')))
        {
            taf_surah::find($id)->update(
                [
                    'surah_intro'=>$request->get('surah_intro')
                ]
            );
            return back()->with('message','Record has Been Successfully Updated ');
        }
        else
        {
            return back()->with('message','Something Gonna Wrong !! Please Check Again');
        }

    }

    public function user_login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        return json_encode($email);
    }

    public function del_ayah($id)
    {

        $res = taf_ayah::where('ayah_id',$id)->delete();
        if ($res){

            taf_token::where('ayah_id',$id)->delete();
            return back()->with('message','Record Successfully Deleted');
        }
        else{
            return back()->with('message','Record Not Deleted');
        }

    }

    public function delete(Request $request)
    {
        $id = $request->get('ayah_id');
        $token = $request->get('token_no');

        if ($request->get('materialExampleRadios') == "all_ayah_trans")
        {
            taf_ayah::where('ayah_id',$id)->delete();
            taf_token::where('ayah_id',$id)->where('token_no',$token)->delete();
        }
        else{
            taf_token::where('ayah_id',$id)->where('token_no',$token)->delete();
        }
        return back()->with('message','Deleted Successfully');
    }
}
