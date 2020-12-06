<?php

namespace App\Http\Controllers;

use App\Kriteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kriterias = Kriteria::get();
        return view('kriteria.index', compact('kriterias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(), [
            "nama" => "required|min:3|max:20",
            "bobot" => "required",
            "atribut" => "required"
        ])->validate();
        $new_kriteria = new \App\Kriteria;
        $new_kriteria->nama = $request->get('nama');
        $new_kriteria->atribut = $request->get('atribut');
        $new_kriteria->bobot = $request->get('bobot');
        $new_kriteria->keterangan = $request->get('keterangan');
        $new_kriteria->save();
        Alert::success('BERHASIL','Data Berhasil Disimpan');
        return redirect()->Route('kriteria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kriteria = \App\Kriteria::findOrFail($id);
        return view('kriteria.show', ['kriteria' => $kriteria]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kriteria = Kriteria::find($id);
        return view('kriteria.edit', compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(), [
            "nama" => "required|min:3|max:20",
            "bobot" => "required",
            "atribut" => "required"
        ])->validate();

        $ubah_kriteria = \App\Kriteria::find($id);
        $ubah_kriteria->nama = $request->get('nama');
        $ubah_kriteria->atribut = $request->get('atribut');
        $ubah_kriteria->bobot = $request->get('bobot');
        $ubah_kriteria->keterangan = $request->get('keterangan');
        $ubah_kriteria->save();
        Alert::success('BERHASIL','Data Berhasil Diubah');
        return redirect()->Route('kriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kriteria::find($id)->delete();
        Alert::success('BERHASIL','Data Berhasi di Hapus');
        return redirect()->Route('kriteria.index');
    }
}
