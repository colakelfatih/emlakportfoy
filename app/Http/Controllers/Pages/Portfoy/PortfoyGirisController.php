<?php

namespace App\Http\Controllers\Pages\Portfoy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Portfoy;


class PortfoyGirisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {   
        //$portfoys = DB::table('portfoys')
        //->select('id','used','code','end_date','created_at')
        //->get();
        $portfoys = Portfoy::all();   
         return view('pages.portfoy.Portfoyler',compact('portfoys'));

    }

    public function create(Request $request)
    { 
        return view('pages.portfoy.PortfoyGiris');

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
			'kategori' => 'required',
			'portfoytip' => 'required',
			'ilan_baslik' => 'required',
			'ilan_aciklama' => 'required',
		]);
		if ($validator->fails())
		{
			return response(['errors'=>$validator->errors()->all()], 422);
		}
		$save = DB::table('portfoys')->insert([
			'kategori' => $request->kategori,
			'portfoy_tip' => $request->portfoytip,
			'ilan_baslik' => $request->ilan_baslik,
			'ilan_aciklama' => $request->ilan_aciklama,
			'mahalle' => $request->mahalle,
			'ada' => $request->ada,
			'parsel' => $request->parsel,
			'fiyat' => $request->fiyat,
			'metrekare' => $request->metrekare,
			'oda' => $request->oda,
			'bina' => $request->bina,
			'kat' => $request->kat,
			'banyo' => $request->banyo,
			'balkon' => $request->balkon,
			'isinma' => $request->isinma,
			'isimsoyisim' => $request->isimsoyisim,
			'telefon' => $request->telefon,
			'not' => $request->not,
			'user_id' => $request->user_id
		]);
       // dd($request->telefon);
        
		
        if($save) flash('Yeni portföy eklendi.')->success();
        else flash('Hata oluştu! Lütfen tekrar deneyiniz.')->error();
        return redirect()->back();
    }
}
