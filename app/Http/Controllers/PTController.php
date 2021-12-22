<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PTModel;
use App\Models\KabupatenModel;
use App\Models\JenjangModel;


class PTController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');
        $this->PTModel = new PTModel();
        $this->JenjangModel = new JenjangModel();
        $this->KabupatenModel = new KabupatenModel();
        
    }
    public function index()
    {
        $data = [
            'title' => 'Perguruan Tinggi',
            'perguruantinggi' => $this->PTModel->AllData(),          
        ];
        return view('admin.perguruantinggi/v_index', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Perguruan Tinggi',
            'jenjang' => $this->JenjangModel->AllData(),
            'kabupaten' => $this->KabupatenModel->AllData(),
        ];
        return view('admin.perguruantinggi/v_tambah', $data);
    }
    public function insert()
    {
        Request()->validate(
            [
                'alamat' => 'required',
                'nama_pt' => 'required',
                'status' => 'required',
                'id_jenjang' => 'required',
                'id_kabupaten' => 'required',
                'posisi' => 'required',
            ],
            [
                'alamat.required' => 'Wajib diisi !!!',
                'nama_pt.required' => 'Nama Perguruan Tingginya wasjib diisi !!!',
                'status.required' => 'Status Perguruan Tingginya?!!!',
                'id_jenjang.required' => 'Pilih jenjang Perguruan Tinggim!!!',
                'id_kabupaten.required' => 'Pilih dikabupaten mana?',
                'posisi.required' => 'Pilih posisi Perguruan Tingginya dimana?',
            ]
        );
        //jika validasinya tidak ada maka selanjutnya tersimpan di database

        $data = [
            'alamat' => request()->alamat,
            'nama_pt' => request()->nama_pt,
            'status' => request()->status,
            'posisi' => request()->posisi,
            'id_jenjang' => request()->id_jenjang,
            'id_kabupaten' => request()->id_kabupaten,           
        ];
        $this->PTModel->InsertData($data);
        return redirect()->route('perguruantinggi')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function edit($id_pt)
    {
        $data = [
            'title' => 'Edit Data Perguruan Tinggi',
            'jenjang' => $this->JenjangModel->AllData(),
            'kabupaten' => $this->KabupatenModel->AllData(),
            'perguruantinggi' => $this->PTModel->DetailData($id_pt),            
        ];
        return view('admin.perguruantinggi/v_edit', $data);
    }
    public function update($id_pt)
    {
        Request()->validate(
            [
                'alamat' => 'required',
                'nama_pt' => 'required',
                'status' => 'required',
                'id_jenjang' => 'required',
                'id_kabupaten' => 'required',
                'posisi' => 'required',
            ],
            [
                'alamat.required' => 'Wajib diisi !!!',
                'nama_pt.required' => 'Nama Perguruan Tingginya wasjib diisi !!!',
                'status.required' => 'Status Perguruan Tingginya?!!!',
                'id_jenjang.required' => 'Pilih jenjang Perguruan Tinggim!!!',
                'id_kabupaten.required' => 'Pilih dikabupaten mana?',
                'posisi.required' => 'Pilih posisi Perguruan Tingginya dimana?',
            ]
        );
        //jika validasinya tidak ada maka selanjutnya tersimpan di database
        $data = [
            'alamat' => request()->alamat,
            'nama_pt' => request()->nama_pt,
            'status' => request()->status,
            'posisi' => request()->posisi,
            'id_jenjang' => request()->id_jenjang,
            'id_kabupaten' => request()->id_kabupaten,           
        ];
        $this->PTModel->UpdateData($id_pt, $data);
        return redirect()->route('perguruantinggi')->with('pesan', 'Data Berhasil DiUbah.!');
    }

    public function delete($id_pt)
    {
        $this->PTModel->DeleteData($id_pt);
        return redirect()->route('perguruantinggi')->with('pesan', 'Data Berhasil Di Hapus.!');
    }
}
