<?php

namespace App\Http\Controllers;

use App\Kandidat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class KandidatController extends Controller
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
        $kandidats = Kandidat::get();
        return view('kandidat.index', compact('kandidats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kandidat.create');
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
            "nama" => "required|min:3|max:30",
            "telp" => "required|digits_between:9,13",
            "jk" => "required",
            "alamat" => "required",
            "tanggal_lahir" => "required"
        ])->validate();
        $new_kandidat = new \App\Kandidat;
        $new_kandidat->nama = $request->get('nama');
        $new_kandidat->jk = $request->get('jk');
        $new_kandidat->alamat = $request->get('alamat');
        $new_kandidat->tanggal_lahir = $request->get('tanggal_lahir');
        $new_kandidat->telp = $request->get('telp');
        if($request->file('foto')){
            $file = $request->file('foto')->store('gambars', 'public');
        $new_kandidat->foto = $file;
        }
        $new_kandidat->save();
        Alert::success('BERHASIL','Data Berhasil Disimpan');
        return redirect()->Route('kandidat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kandidat = \App\Kandidat::findOrFail($id);
        return view('kandidat.show', ['kandidat' => $kandidat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        return view('kandidat.edit', compact('kandidat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(), [
            "nama" => "required|min:3|max:30",
            "telp" => "required|digits_between:9,13",
            "jk" => "required",
            "alamat" => "required",
            "tanggal_lahir" => "required"
        ])->validate();

        $ubah_kandidat = \App\Kandidat::findOrFail($id);
        $ubah_kandidat->nama = $request->get('nama');
        $ubah_kandidat->jk = $request->get('jk');
        $ubah_kandidat->alamat = $request->get('alamat');
        $ubah_kandidat->tanggal_lahir = $request->get('tanggal_lahir');
        $ubah_kandidat->telp = $request->get('telp');
        if($request->file('foto')){
            if($ubah_kandidat->foto && file_exists(storage_path('app/public/' . $ubah_kandidat->foto))){
                \Storage::delete('public/'.$ubah_kandidat->foto);
            }
            $file = $request->file('foto')->store('gambars', 'public');
            $ubah_kandidat->foto = $file;
        }
        $ubah_kandidat->save();
        Alert::success('BERHASIL','Data Berhasil di Ubah');
        return redirect()->route('kandidat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kandidat::find($id)->delete();
        Alert::success('BERHASIL','Data Berhasi di Hapus');
        return redirect()->Route('kandidat.index');
    }
}
