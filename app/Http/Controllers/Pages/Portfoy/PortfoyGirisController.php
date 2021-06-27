<?php

namespace App\Http\Controllers\Pages\Portfoy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
