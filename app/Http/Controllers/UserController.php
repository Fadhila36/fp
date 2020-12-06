<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
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
        $users = User::get();
        return view ('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            "name" => "required|min:3|max:30",
            "email" => "required|email|unique:users",
            "password" => "required",
            "konfirmasi_password" => "required|same:password"
        ])->validate();
        $new_user = new \App\User;
        $new_user->name = $request->get('name');
        $new_user->email = $request->get('email');
        $new_user->password = bcrypt($request->get('password'));
        if($request->file('foto')){
            $file = $request->file('foto')->store('gambars', 'public');
        $new_user->foto = $file;
        }
        $new_user->save();
        Alert::success('BERHASIL','Data Berhasil Disimpan');
        return redirect()->Route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(), [
            "name" => "required|min:3|max:30",
            "email" => "required|email",
        ])->validate();

        $ubah_user = \App\User::findOrFail($id);
        $ubah_user->name = $request->get('name');
        $ubah_user->email = $request->get('email');
        if($request->input('password')) {
            $ubah_user->password= bcrypt(($request->input('password')));
        }
        if($request->file('foto')){
            if($ubah_user->foto && file_exists(storage_path('app/public/' . $ubah_user->foto))){
                \Storage::delete('public/'.$ubah_user->foto);
            }
            $file = $request->file('foto')->store('gambars', 'public');
            $ubah_user->foto = $file;
        }
        $ubah_user->save();
        Alert::success('BERHASIL','Data Berhasil di Ubah');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        Alert::success('BERHASIL','User Berhasi di Hapus');
        return redirect()->Route('user.index');
    }
}
