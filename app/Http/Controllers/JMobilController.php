<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\JMobil;
use JWTAuth;
use Auth;
use Tymon\JWTAuth\Exceptions\JWTException;


class JMobilController extends Controller
{
    public function index(){
        if(Auth::user()->level=="admin"){
          $jm=JMobil::get();
          return response()->json($jm);
        } else {
          return response()->json(['status'=>'anda bukan admin']);
        }
      }
      public function store(Request $req){
        $validator = Validator::make($req->all(),
        [
          'nama_jenis' => 'required'
        ]);
        if($validator->fails()){
          return Response()->json($validator->errors());
        }
        $simpan = JMobil::create([
          'nama_jenis' => $req->nama_jenis
        ]);
        $status=1;
        $message="Yey Kamu Berhasil Menambahkan Jenis Cuci";
        if($simpan){
          return Response()->json(compact('status','message'));
        } else {
          return Response()->json(['status' => 0]);
        }        
      }
      public function update($id, Request $req){
        $validator = Validator::make($req->all(),
        [
            'nama_jenis' => 'required'
        ]);
        if($validator->fails()){
          return Response()->json($validator->errors());
        }
        $ubah = JMobil::where('id', $id)->update([
            'nama_jenis' => $req->nama_jenis
        ]);
        $status=1;
        $message="Yey Kamu Berhasil Mengubah";
        if($ubah){
          return Response()->json(compact('status','message'));
        } else {
          return Response()->json(['status' => 0]);
        }
      }
      public function tampil(){
        $jm=JMobil::get();
        $count=$jm->count();
        $arr_data=array();
        foreach ($jm as $jm){
          $arr_data[]=array(
            'id' => $jm->id,
            'nama_jenis' => $jm->nama_jenis,
            'harga_perkilo' => $jm->harga_perkilo
          );
        }
        $status=1;
        return Response()->json(compact('status','count','arr_data'));
      }
      public function destroy($id){
        $hapus = JMobil::where('id', $id)->delete();
        $status=1;
        $message="Yey Kamu Berhasil Menghapus";
        if($hapus){
          return Response()->json(compact('status','message'));
        } else {
          return Response()->json(['status' => 0]);
        }
      }
}
