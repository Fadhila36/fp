<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    protected $table = 'kandidats';
    protected $fillable = [
        'nama',
        'alamat',
        'jk',
        'tanggal_lahir',
        'telp',
        'foto'
    ];

    public function nilai(){
        return $this->hasMany('App\Nilai','kandidat_id','id');
    }
}
