<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    const BENEFIT = 'benefit';
    const COST = 'cost';
    protected $table = 'kriterias';
    protected $fillable = [
        'nama',
        'atribut',
        'bobot',
        'keterangan'
    ];
    
    public function nilai(){
        return $this->hasMany('App\Nilai','kriteria_id','id');
    }
}
