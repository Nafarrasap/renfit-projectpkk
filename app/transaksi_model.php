<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi_model extends Model
{
    protected $table="transaksi";
  protected $primaryKey="id";
  protected $fillable = [
    'id_penyewaan', 'subtotal' ,
  ];

  public function jenis_cuci_model(){
        return $this->belongsTo('App\penyewaan_model', 'id_penyewaan');
    }
}
