<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenjangModel;

class JenjangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->JenjangModel = new JenjangModel();        
    }
    public function index()
    {
        $data = [
            'title' => 'Jenjang Pendidikan',
            'jenjang' => $this->JenjangModel->AllData(),
        ];
        return view('admin.jenjang/v_index', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Jenjang Pendidikan',
        ];
        return view('admin.jenjang/v_tambah', $data);
    }

    public function insert()
    {
        Request()->validate(
            [
                'jenjang' => 'required',               
            ],
            [
                'jenjang.required' => 'Wajib diisi !!!',               
            ]
        );
        //jika validasinya tidak ada maka selanjutnya tersimpan di database

        $data = [
            'jenjang' => request()->jenjang,            
        ];
        $this->JenjangModel->InsertData($data);
        return redirect()->route('jenjang')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function edit($id_jenjang)
    {
        $data = [
            'title' => 'Edit Data Jenjang Pendidikan',
            'jenjang' => $this->JenjangModel->DetailData($id_jenjang),
        ];
        return view('admin.jenjang/v_edit', $data);
    }
    public function update($id_jenjang)
    {
        Request()->validate(
            [
                'jenjang' => 'required',              
            ],
            [
                'jenjang.required' => 'Wajib diisi !!!',             
            ]
        );
        //jika validasinya tidak ada maka selanjutnya tersimpan di database

        $data = [
            'jenjang' => request()->jenjang,           
        ];
        $this->JenjangModel->UpdateData($id_jenjang, $data);
        return redirect()->route('jenjang')->with('pesan', 'Data Berhasil DiUbah.!');
    }

    public function delete($id_jenjang)
    {
        $this->JenjangModel->DeleteData($id_jenjang);
        return redirect()->route('jenjang')->with('pesan', 'Data Berhasil Di Hapus.!');
    }

}
