<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

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
    
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'kabupaten' => DB::table('tbl_kabupaten')->count(),
            'perguruantinggi' => DB::table('tbl_perguruantinggi')->count(),
            'sekolah' => DB::table('tbl_sekolah')->count(),
            'jenjang' => DB::table('tbl_jenjang')->count(),
        ];
        return view('v_home', $data);
    }
}
