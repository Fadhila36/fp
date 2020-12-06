<?php

namespace App\Http\Controllers;

use App\Kandidat;
use App\Kriteria;
use App\Nilai;
use App\WPGenerator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function calculate(){
        $data = WPGenerator::weight_product();
        $kriteria = Kriteria::all();
        $penerima = Kandidat::all();


        return view('perhitungan.calculate')->with([
            'kriteria' => $kriteria,
            'data' => $data,
            'penerima' => $penerima
        ]);
    }
}
   