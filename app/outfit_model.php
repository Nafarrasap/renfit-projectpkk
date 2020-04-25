<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class outfit_model extends Model
{
  protected $table="outfit";
  protected $primaryKey="id";
  public $timestamps= false;
  protected $fillable = [
    'foto' , 'nama_baju', 'kondisi_baju', 'jenis_baju', 'harga_sewa'
  ];
}
