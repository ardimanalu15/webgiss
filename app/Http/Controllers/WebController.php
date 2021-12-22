<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebModel;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{

    public function __construct()
    {
        
        $this->WebModel = new WebModel();        
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
        return view('v_userhome', $data);
    }
    public function web()
    {

        $data = [
            'title' => '',
            'kabupaten' => $this->WebModel->DataKabupaten(),
            'sekolah' => $this->WebModel->AllDataSekolah(),
            'jenjang' => $this->WebModel->DataJenjang(),
            'perguruantinggi' => $this->WebModel->AllDataPT(),
        ];
        return view('v_web', $data);
    }
    public function kabupaten($id_kabupaten)
    {   
        $kab = $this->WebModel->DetailKabupaten($id_kabupaten);

        $data = [
            'title' => 'kabupaten' . $kab->nama_kabupaten,
            'kabupaten' => $this->WebModel->DataKabupaten(),
            'sekolah' => $this->WebModel->DataSekolah($id_kabupaten),
            'jenjang' => $this->WebModel->DataJenjang(),
            'perguruantinggi' => $this->WebModel->DataPT($id_kabupaten),
            'kab' => $kab,
        ];
        return view('v_kabupaten', $data);
    }

    public function jenjang($id_jenjang)
    {
        $jen = $this->WebModel->DetailJenjang($id_jenjang);
        $data = [
            'title' => 'Jenjang' . $jen->jenjang,
            'kabupaten' => $this->WebModel->DataKabupaten(),
            'sekolah' => $this->WebModel->DataSekolahJenjang($id_jenjang),
            'perguruantinggi' => $this->WebModel->DataPTJenjang($id_jenjang),
            'jenjang' => $this->WebModel->DataJenjang(),            
        ];
        return view('v_jenjang', $data);
    }
    public function carisekolah()
    {

        $data = [
            'title' => 'Cari Sekolah',
            'kabupaten' => $this->WebModel->DataKabupaten(),
            'sekolah' => $this->WebModel->AllDataSekolah(),
            'jenjang' => $this->WebModel->DataJenjang(),
            'perguruantinggi' => $this->WebModel->AllDataPT(),
        ];
        return view('v_carisekolah', $data);
    }
    public function caript()
    {

        $data = [
            'title' => 'Cari Perguruan Tinggi',
            'kabupaten' => $this->WebModel->DataKabupaten(),
            'sekolah' => $this->WebModel->AllDataSekolah(),
            'jenjang' => $this->WebModel->DataJenjang(),
            'perguruantinggi' => $this->WebModel->AllDataPT(),
        ];
        return view('v_caript', $data);
    }
    
}
