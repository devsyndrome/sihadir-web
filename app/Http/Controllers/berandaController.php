<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class berandaController extends Controller
{
    public function mahasiswa(){
        return view('mahasiswa');
    }
    public function dosen(){
        return view('dosen');
    }
    public function baak(){
        return view('baak');    
    }
    public function jadwal(){
        return view('jadwal');
    }
    public function kelas(){
        return view('kelas');
    }
    public function matkul(){
        return view('matkul');
    }
    public function presensi(){
        return view('presensi');
    }
    public function prodi(){
        return view('prodi');
    }
    public function ruang(){
        return view('ruang');
    }
}
