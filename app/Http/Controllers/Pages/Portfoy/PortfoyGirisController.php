<?php

namespace App\Http\Controllers\Pages\Portfoy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;


class PortfoyGirisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('pages.portfoy.PortfoyGiris');
    }

    public function create(Request $request)
    { 
        return view('pages.portfoy.PortfoyGiris');

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
			'mahalle' => 'required',
			'ada' => 'required',
			'parsel' => 'required',
		]);
		if ($validator->fails())
		{
			return response(['errors'=>$validator->errors()->all()], 422);
		}
		$save = DB::table('portfoys')->insert([
			'street' => $request->mahalle,
			'block' => $request->ada,
			'plot' => $request->parsel,
			'user_id' => $request->user_id
		]);

        
		
        if($save) flash('Yeni portföy eklendi.')->success();
        else flash('Hata oluştu! Lütfen tekrar deneyiniz.')->error();
        return redirect()->back();
    }
}
