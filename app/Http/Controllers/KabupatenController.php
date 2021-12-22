<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KabupatenModel;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Contracts\Service\Attribute\Required;

class KabupatenController extends Controller
{
    public function __construct()
    { 
        $this->middleware('auth');
        $this->KabupatenModel = new KabupatenModel();        
    }
    public function index()
    {
        $data = [
            'title' => 'Kabupaten',
            'kabupaten' => $this->KabupatenModel->AllData(),
        ];
        return view('admin.kabupaten/v_index', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Kabupaten',
        ];
        return view('admin.kabupaten/v_tambah', $data);
    }

    public function insert()
    {
        Request()->validate(
            [
                'kode' => 'required',
                'nama_kabupaten' => 'required',
                'geojson' => 'required',
                'warna' => 'required',
            ],
            [
                'kode.required' => 'Wajib diisi !!!',
                'nama_kabupaten.required' => 'Nama kabupaten kelupaan !!!',
                'geojson.required' => 'ini geojsonnya mana!!!',
                'warna.required' => 'Pilih Warna dulu eys!!!',
            ]
        );
        //jika validasinya tidak ada maka selanjutnya tersimpan di database

        $data = [
            'kode' => request()->kode,
            'nama_kabupaten' => request()->nama_kabupaten,
            'geojson' => request()->geojson,
            'warna' => request()->warna,
        ];
        $this->KabupatenModel->InsertData($data);
        return redirect()->route('kabupaten')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function edit($id_kabupaten)
    {
        $data = [
            'title' => 'Edit Data Kabupaten',
            'kabupaten' => $this->KabupatenModel->DetailData($id_kabupaten),
        ];
        return view('admin.kabupaten/v_edit', $data);
    }
    public function update($id_kabupaten)
    {
        Request()->validate(
            [
                'kode' => 'required',
                'nama_kabupaten' => 'required',
                'geojson' => 'required',
                'warna' => 'required',
            ],
            [
                'kode.required' => 'Wajib diisi !!!',
                'nama_kabupaten.required' => 'Nama kabupaten kelupaan !!!',
                'geojson.required' => 'ini geojsonnya mana!!!',
                'warna.required' => 'Pilih Warna dulu eys!!!',
            ]
        );
        //jika validasinya tidak ada maka selanjutnya tersimpan di database

        $data = [
            'kode' => request()->kode,
            'nama_kabupaten' => request()->nama_kabupaten,
            'geojson' => request()->geojson,
            'warna' => request()->warna,
        ];
        $this->KabupatenModel->UpdateData($id_kabupaten, $data);
        return redirect()->route('kabupaten')->with('pesan', 'Data Berhasil DiUbah.!');
    }

    public function delete($id_kabupaten)
    {
        $this->KabupatenModel->DeleteData($id_kabupaten);
        return redirect()->route('kabupaten')->with('pesan', 'Data Berhasil Di Hapus.!');
    }
}
