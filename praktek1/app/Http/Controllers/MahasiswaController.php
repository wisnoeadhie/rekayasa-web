<?php

namespace App\Http\Controllers;
use App\Http\Controllers\MahasiswaController;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function read()
    {
        $model=new Mahasiswa();
        $datax=$model->all();
        foreach($datax as $dt) {
            $data[]=[
                'nim'=>$dt->nim,
                'umur'=>$dt->umur,
                'alamat'=>$dt->alamat,
                'kota'=>$dt->kota,
                'kelas'=>$dt->kelas,
                'jurusan'=>$dt->jurusan
            ];
        }
        if (!empty($data)) {
            $success = true;
            $message = "Data berhasil dibaca";
        } else
            {
                $success=false;
                $message="Data tidak ditemukan/kosong";
            }
        $balikan = [
            "success"=>$success,
            "message"=> $message,
            "data"=> @$data
        ];
        
        return response()->json($balikan);
    }

    public function create(Request $req)
    {
        $model=new Mahasiswa();
        $model->nim=$req->nim;
        $model->nama=$req->nama;
        $model->umur=$req->umur;
        $model->alamat=$req->alamat;
        $model->kota=$req->kota;
        $model->kelas=$req->kelas;
        $model->jurusan=$req->jurusan;
        if($model->save()) {
            $success=true;
            $message="Data berhasil disimpan";
        } else {
            $success=false;
            $message="Data gagal disimpan";
        }
        $balikan=[
            "success"=>$success,
            "message"=>$message,
            "data"=> @$req->all()
        ];
        return response()->json($balikan);
    }

    public function update(Request $req, $nim)
    {
        $model = Mahasiswa::where('nim', $nim)->first();

        if (!$model) {
            $success = false;
            $message = "Data tidak ditemukan";
        } else {
            $model->nama = $req->nama;
            $model->umur = $req->umur;
            $model->alamat = $req->alamat;
            $model->kota = $req->kota;
            $model->kelas = $req->kelas;
            $model->jurusan = $req->jurusan;

            if ($model->save()) {
                $success = true;
                $message = "Data berhasil diperbarui";
            } else {
                $success = false;
                $message = "Data gagal diperbarui";
            }
        }

        $balikan = [
            "success" => $success,
            "message" => $message,
            "data" => @$req->all()
        ];

        return response()->json($balikan);
    }
    
    public function delete($nim)
    {
        $model = Mahasiswa::where('nim', $nim)->first();

        if (!$model) {
            $success = false;
            $message = "Data tidak ditemukan";
        } else {
            if ($model->delete()) {
                $success = true;
                $message = "Data berhasil dihapus";
            } else {
                $success = false;
                $message = "Data gagal dihapus";
            }
        }

        $balikan = [
            "success" => $success,
            "message" => $message
        ];

        return response()->json($balikan);
    }
}

