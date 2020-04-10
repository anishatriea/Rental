<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $table="penyewa";
    protected $primaryKey="id";
    protected $fillable = [
      'nama', 'alamat', 'telp', 'no_ktp', 'foto'
    ];

    // public function petugas(){
    //     return $this->belongsTo('App/Petugas','id_petugas');
    //   }
    //   public $timestamps = false;
}
