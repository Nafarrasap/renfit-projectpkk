<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi_model;
use App\penyewaan_model;
use Validator;
use Auth;


class transaksicontroller extends Controller
{
    public function store(Request $req)
    {
        if(Auth::user()->level=="admin"){
        $validator=Validator::make($req->all(),
            [
                'id_penyewaan'=>'required',

            ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $harga = penyewaan_model::where('id',$req->id_penyewaan)->first();
        $subtotal = @$harga->harga_sewa;
        // $subtotal = @$harga->harga_perkilo * $req->qty;

        $simpan=transaksi_model::create([
                'id_penyewaan'=>$req->id_penyewaan,
                'subtotal'=>$subtotal,
        ]);
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>'anda bukan admin']);
        }
    }

    public function update($id,Request $req)
    {
        if(Auth::user()->level=="admin"){
        $validator=Validator::make($req->all(),
        [
                'id_penyewaan'=>'required',
                'subtotal'=>'required',

        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $harga = penyewaan_model::where('id',$req->id_penyewaan)->first();
        $subtotal = $harga->harga_sewa;
        // $subtotal = $harga->harga_perkilo * $req->qty;

        $ubah=transaksi_model::where('id',$id)->update ([
            'id_penyewaan'=>$req->id_penyewaan,
            'subtotal'=>$subtotal,
        ]);
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>'anda bukan admin']);
        }
    }
    public function destroy($id)
    {
        if(Auth::user()->level=="admin"){
        $hapus=transaksi_model::where('id',$id)->delete();
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>'anda bukan admin']);
        }
    }


    public function tampil_transaksi()
    {
        $data_pelanggan=transaksi_model::count();
        $data_pelanggan1=transaksi_model::all();
        return Response()->json(['count'=> $data_pelanggan, 'pelanggan'=> $data_pelanggan1, 'status'=>1]);
    }
}
