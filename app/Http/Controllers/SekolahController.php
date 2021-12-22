<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SekolahModel;
use App\Models\KabupatenModel;
use App\Models\JenjangModel;

class SekolahController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');
        $this->SekolahModel = new SekolahModel();
        $this->JenjangModel = new JenjangModel();
        $this->KabupatenModel = new KabupatenModel();
        
    }
    public function index()
    {
        $data = [
            'title' => 'Sekolah Menengah Atas',
            'sekolah' => $this->SekolahModel->AllData(),          
        ];
        return view('admin.sekolah/v_index', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Sekolah Menengah Atas',
            'jenjang' => $this->JenjangModel->AllData(),
            'kabupaten' => $this->KabupatenModel->AllData(),
        ];
        return view('admin.sekolah/v_tambah', $data);
    }
    public function insert()
    {
        Request()->validate(
            [
                'alamat' => 'required',
                'nama_sekolah' => 'required',
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
            'nama_sekolah' => request()->nama_sekolah,
            'status' => request()->status,
            'posisi' => request()->posisi,
            'id_jenjang' => request()->id_jenjang,
            'id_kabupaten' => request()->id_kabupaten,           
        ];
        $this->SekolahModel->InsertData($data);
        return redirect()->route('sekolah')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function edit($id_sekolah)
    {
        $data = [
            'title' => 'Edit Data Sekolah Menengah Atas',
            'jenjang' => $this->JenjangModel->AllData(),
            'kabupaten' => $this->KabupatenModel->AllData(),
            'sekolah' => $this->SekolahModel->DetailData($id_sekolah),            
        ];
        return view('admin.sekolah/v_edit', $data);
    }
    public function update($id_sekolah)
    {
        Request()->validate(
            [
                'alamat' => 'required',
                'nama_sekolah' => 'required',
                'status' => 'required',
                'id_jenjang' => 'required',
                'id_kabupaten' => 'required',
                'posisi' => 'required',
            ],
            [
                'alamat.required' => 'Wajib diisi !!!',
                'nama_sekolah.required' => 'Nama Perguruan Tingginya wasjib diisi !!!',
                'status.required' => 'Status Perguruan Tingginya?!!!',
                'id_jenjang.required' => 'Pilih jenjang Perguruan Tinggim!!!',
                'id_kabupaten.required' => 'Pilih dikabupaten mana?',
                'posisi.required' => 'Pilih posisi Perguruan Tingginya dimana?',
            ]
        );
        //jika validasinya tidak ada maka selanjutnya tersimpan di database
        $data = [
            'alamat' => request()->alamat,
            'nama_sekolah' => request()->nama_sekolah,
            'status' => request()->status,           
            'id_jenjang' => request()->id_jenjang,
            'id_kabupaten' => request()->id_kabupaten,           
            'posisi' => request()->posisi,
        ];
        $this->SekolahModel->UpdateData($id_sekolah, $data);
        return redirect()->route('sekolah')->with('pesan', 'Data Berhasil DiUbah.!');
    }

    public function delete($id_sekolah)
    {
        $this->SekolahModel->DeleteData($id_sekolah);
        return redirect()->route('sekolah')->with('pesan', 'Data Berhasil Di Hapus.!');
    }
}
