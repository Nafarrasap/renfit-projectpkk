<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Auth;
use App\outfit_model;

class outfitcontroller extends Controller
{
    public function index($id)
    {
        if(Auth::user()->level=="admin"){
            $dt_outfit=outfit_model::get();
            return response()->json($dt_outfit);

    }else{
        return response()->json(['status'=>'anda bukan admin']);
    }
    }
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'foto'=>'required',
            'nama_baju'=>'required',
            'kondisi_baju'=>'required',
            'jenis_baju'=>'required',
            'harga_sewa'=>'required',
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=outfit_model::create([
            'foto'=>$req->foto,
            'nama_baju'=>$req->nama_baju,
            'kondisi_baju'=>$req->kondisi_baju,
            'jenis_baju'=>$req->jenis_baju,
            'harga_sewa'=>$req->harga_sewa,
        ]);
        if($simpan){
            return Response()->json(['status'=>1, 'message'=>"Data Outfit Berhasil Ditambahkan!"]);
        } else{
            return Response()->json(['status'=>0]);
        }
    }
    public function tampil_outfit()
    {
        $data_outfit=outfit_model::count();
        $data_outfit1=outfit_model::all();
        return Response()->json(['count'=> $data_outfit, 'outfit'=> $data_outfit1, 'status'=>1]);
    }

    public function update($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
          'foto'=>'required',
          'nama_baju'=>'required',
          'kondisi_baju'=>'required',
          'jenis_baju'=>'required',
          'harga_sewa'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=outfit_model::where('id',$id)->update([
          'foto'=>$req->foto,
          'nama_baju'=>$req->nama_baju,
          'kondisi_baju'=>$req->kondisi_baju,
          'jenis_baju'=>$req->jenis_baju,
          'harga_sewa'=>$req->harga_sewa,
        ]);
        if($ubah){
            return Response()->json(['status'=>1, 'message'=>"Data Outfit Berhasil Diubah!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
    public function destroy($id)
    {
        $hapus=outfit_model::where('id',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>1, 'message'=>"Data Outfit Berhasil Dihapus!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
