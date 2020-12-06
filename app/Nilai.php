<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $fillable = [
        'kandidat_id',
        'kriteria_id',
        'nilai'
    ];
    public function kriteria(){
        return $this->belongsTo('App\Kriteria','kriteria_id','id');
    }
    public function kandidat(){
        return $this->belongsTo('App\Kandidat','kandidat_id','id');
    }
}
