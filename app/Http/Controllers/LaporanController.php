<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WPGenerator;
use App\Kandidat;
use PDF;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function karyawanterbaik()
    {

        $data = WPGenerator::weight_product();
        $penerima = Kandidat::all();
        arsort($data['v']);

        foreach ($penerima as $p) {
            if(array_key_exists($p->id, $data['v'])){
                $data['v'][$p->id] = $p->nama . "|" . $data['v'][$p->id];
            }
        }
        $pdf = PDF::loadView('laporan.index', compact('data','penerima'));
        return $pdf->stream('laporan_karyawan_terbaik_'.date('Y-m-d_H-i-s').'.pdf');
    }
}
