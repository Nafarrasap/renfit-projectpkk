<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Auth;
use App\penyewaan_model;

class penyewaancontroller extends Controller
{
    public function index($id)
    {
        if(Auth::user()->level=="admin"){
            $dt_penyewaan=penyewaan_model::get();
            return response()->json($dt_penyewaan);

    }else{
        return response()->json(['status'=>'anda bukan admin']);
    }
    }
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'foto'=>'required',
            'lokasi'=>'required',
            'tgl_book'=>'required',
            'tgl_mulai'=>'required',
            'tgl_selesai'=>'required',
            'harga_sewa'=>'required',
            'keterangan'=>'required',
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=penyewaan_model::create([
            'foto'=>$req->foto,
            'lokasi'=>$req->lokasi,
            'tgl_book'=>$req->tgl_book,
            'tgl_mulai'=>$req->tgl_mulai,
            'tgl_selesai'=>$req->tgl_selesai,
            'harga_sewa'=>$req->harga_sewa,
            'keterangan'=>$req->keterangan,
        ]);
        if($simpan){
            return Response()->json(['status'=>1, 'message'=>"Data penyewaan Berhasil Ditambahkan!"]);
        } else{
            return Response()->json(['status'=>0]);
        }
    }
    public function tampil_penyewaan()
    {
        $data_penyewaan=penyewaan_model::count();
        $data_penyewaan1=penyewaan_model::all();
        return Response()->json(['count'=> $data_penyewaan, 'penyewaan'=> $data_penyewaan1, 'status'=>1]);
    }

    public function update($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
          'foto'=>'required',
          'lokasi'=>'required',
          'tgl_book'=>'required',
          'tgl_mulai'=>'required',
          'tgl_selesai'=>'required',
          'harga_sewa'=>'required',
          'keterangan'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=penyewaan_model::where('id',$id)->update([
          'foto'=>$req->foto,
          'lokasi'=>$req->lokasi,
          'tgl_book'=>$req->tgl_book,
          'tgl_mulai'=>$req->tgl_mulai,
          'tgl_selesai'=>$req->tgl_selesai,
          'harga_sewa'=>$req->harga_sewa,
          'keterangan'=>$req->keterangan,
        ]);
        if($ubah){
            return Response()->json(['status'=>1, 'message'=>"Data penyewaan Berhasil Diubah!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
    public function destroy($id)
    {
        $hapus=penyewaan_model::where('id',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>1, 'message'=>"Data penyewaan Berhasil Dihapus!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
