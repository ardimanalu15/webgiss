<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class KabupatenModel extends Model
{
    public function AllData()
    {
        return DB::table('tbl_kabupaten')->get();
    }
    public function InsertData($data)
    {
        DB::table('tbl_kabupaten')->insert($data);
    }
    public function DetailData($id_kabupaten)
    {
        return DB::table('tbl_kabupaten')
            ->where('id_kabupaten', $id_kabupaten)->first();
    }
    public function UpdateData($id_kabupaten, $data)
    {
        DB::table('tbl_kabupaten')
            ->where('id_kabupaten', $id_kabupaten)
            ->update($data);
    }
    public function DeleteData($id_kabupaten)
    {
        DB::table('tbl_kabupaten')
            ->where('id_kabupaten', $id_kabupaten)
            ->delete();
    }
}
