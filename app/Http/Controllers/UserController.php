<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->UserModel = new UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Pengguna/Admin',
            'user' => $this->UserModel->AllData(),          
        ];
        return view('admin.user/v_index', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Pengguna',              
        ];
        return view('admin.user/v_tambah', $data);
    }
    public function insert()
    {
        Request()->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:8',               
            ],
            [
                'name.required' => 'Wajib diisi !!!',
                'email.required' => 'Wajib diisi !!!',
                'email.unique' => 'Email Sudah Terdaftar, Silahkan Coba Yang lain!',
                'password.required' => 'Password Minimal 8 Karakter !!!',               
            ]
        );
        //jika validasinya tidak ada maka selanjutnya tersimpan di database

        $data = [
            'name' => request()->name,
            'email' => request()->email,
            'password' => Hash::make(request()->password),            
        ];
        $this->UserModel->InsertData($data);
        return redirect()->route('user')->with('pesan', 'Data Berhasil Ditambahkan');
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data User',
            'user' => $this->UserModel->DetailData($id),
        ];
        return view('admin.user/v_edit', $data);
    }
    public function update($id)
    {
        Request()->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required|min:8',               
            ],
            [
                'name.required' => 'Wajib diisi !!!',
                'email.required' => 'Wajib diisi !!!',
                'password.required' => 'Password Minimal 8 Karakter !!!',               
            ]
        );
        //jika validasinya tidak ada maka selanjutnya tersimpan di database
            $data = [
                'name' => request()->name,
                'email' => request()->email,
                'password' => Hash::make(request()->password),            
            ];        
        $this->UserModel->UpdateData($id, $data);
        return redirect()->route('user')->with('pesan', 'Data Berhasil DiUbah.!');
    }
    public function delete($id)
    {
        $this->UserModel->DeleteData($id);
        return redirect()->route('user')->with('pesan', 'Data Berhasil Di Hapus.!');
    }

}
