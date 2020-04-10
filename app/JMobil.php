<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JMobil extends Model
{
    protected $table="jmobil";
    protected $primaryKey="id";
    protected $fillable = [
      'nama_jenis'
    ];
}
