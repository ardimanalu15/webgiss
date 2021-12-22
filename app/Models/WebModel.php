<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class WebModel extends Model
{
    public function DataKabupaten()
    {
        return DB::table('tbl_kabupaten')->get();
    }

    public function DataJenjang()
    {
        return DB::table('tbl_jenjang')->get();
    }

    public function DataSekolahJenjang($id_jenjang)
    {   
        return DB::table('tbl_sekolah')
        ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang', '=', 'tbl_sekolah.id_jenjang')
        ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten', '=', 'tbl_sekolah.id_kabupaten')
        ->where('tbl_sekolah.id_jenjang', $id_jenjang)
        ->get();
    }
    public function DetailJenjang($id_jenjang)
    {
        return DB::table('tbl_jenjang')
        ->where('id_jenjang', $id_jenjang)->first();
    }
    public function DataPTJenjang($id_jenjang)
    {
        return DB::table('tbl_perguruantinggi')
        ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang', '=', 'tbl_perguruantinggi.id_jenjang')
        ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten', '=', 'tbl_perguruantinggi.id_kabupaten')
        ->where('tbl_perguruantinggi.id_jenjang', $id_jenjang)
        ->get();
    }

    public function DetailKabupaten($id_kabupaten)
    {
        return DB::table('tbl_kabupaten')
        ->where('id_kabupaten', $id_kabupaten)->first();
    }

    public function DataPT($id_kabupaten)
    {
        return DB::table('tbl_perguruantinggi')
        ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang', '=', 'tbl_perguruantinggi.id_jenjang')
        ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten', '=', 'tbl_perguruantinggi.id_kabupaten')
        ->where('tbl_perguruantinggi.id_kabupaten', $id_kabupaten)
        ->get();
    }
    public function AllDataPT()
    {
        return DB::table('tbl_perguruantinggi')
        ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang', '=', 'tbl_perguruantinggi.id_jenjang')
        ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten', '=', 'tbl_perguruantinggi.id_kabupaten')
        ->get();
    }
    

    public function DataSekolah($id_kabupaten)
   {
        return DB::table('tbl_sekolah')
        ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang', '=', 'tbl_sekolah.id_jenjang')
        ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten', '=', 'tbl_sekolah.id_kabupaten')
        ->where('tbl_sekolah.id_kabupaten', $id_kabupaten)
        ->get();
   }
   public function AllDataSekolah()
   {
        return DB::table('tbl_sekolah')
        ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang', '=', 'tbl_sekolah.id_jenjang')
        ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten', '=', 'tbl_sekolah.id_kabupaten')
        ->get();
   }  
}
