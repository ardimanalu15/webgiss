<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PTModel extends Model
{
    public function AllData()
    {
        return DB::table('tbl_perguruantinggi')
        ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang', '=', 'tbl_perguruantinggi.id_jenjang')
        ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten', '=', 'tbl_perguruantinggi.id_kabupaten')
        ->get();
    }
    public function InsertData($data)
    {
        DB::table('tbl_perguruantinggi')->insert($data);
    }
    public function DetailData($id_pt)
    {
        return DB::table('tbl_perguruantinggi')
        ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang', '=', 'tbl_perguruantinggi.id_jenjang')
        ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten', '=', 'tbl_perguruantinggi.id_kabupaten')
        ->where('id_pt', $id_pt)->first();
    }
    public function UpdateData($id_pt, $data)
    {
        DB::table('tbl_perguruantinggi')
            ->where('id_pt', $id_pt)
            ->update($data);
    }
    public function DeleteData($id_pt)
    {
        DB::table('tbl_perguruantinggi')
            ->where('id_pt', $id_pt)
            ->delete();
    }
}
