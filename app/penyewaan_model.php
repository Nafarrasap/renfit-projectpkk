<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penyewaan_model extends Model
{
  protected $table="penyewaan";
  protected $primaryKey="id";
  public $timestamps= false;
  protected $fillable = [
    'foto', 'lokasi','tgl_book', 'tgl_mulai', 'tgl_selesai','harga_sewa','keterangan',
  ];
}
