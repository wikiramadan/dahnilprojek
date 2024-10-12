<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjam;
use App\Models\Siswa;
use Alert;
use Illuminate\Support\Facades\Strorage;
use Illuminate\Support\Facades\DB;
 
class PeminjamController extends Controller
{
    //
    public function index()
    {
        $peminjams = Peminjam::with('siswa')->get();
        $siswas = Siswa::all();
        return view('peminjam.index', compact('peminjams', 'siswas'));
    }

    public function create()
    {
       return view('peminjam.create');
    }
    public function store(Request $request)
    {
       $this->validate($request,[
          'namapeminjam'=>'required',
          'tglpinjam'=>'required',
          'tglkembali'=>'required',
          'alamat'=>'nullable',
          'siswa_id' => 'required|exists:siswa,id',
       ]);

       DB::table('peminjams')->insert([
        'namapeminjam'=>$request->namapeminjam,
        'tglpinjam'=>$request->tglpinjam,
        'tglkembali'=>$request->tglkembali,
        'alamat'=>$request->alamat
       ]);
        if(DB::table('peminjams'))
        {
           return redirect()->route('peminjam.index')->with(['success'=>'Data 
            berhasil disimpan']);
         }else
         {
         return redirect()->route('peminjam.index')->with(['error'=>'Data gagal 
         disimpan']);
       } 
    }
       public function edit(peminjam $peminjam)
  { 
  return view('peminjam.edit', compact('peminjam')); 
  } 
  public function update(Request $request, peminjam $peminjam) 
  { 
  $this->validate($request, [ 
      'namapeminjam'     => 'required', 
      'tglpinjam'     => 'required',
      'tglkembali'     => 'required',
      'alamat'     => 'required',
  ]); 
  //get data peminjam by ID 
   
  $peminjam=peminjam::findOrFail($peminjam->id);           
  $peminjam->update([ 
      'namapeminjam'=>$request->namapeminjam, 
      'tglpinjam'=>$request->tglpinjam,
      'tglkembali'=>$request->tglkembali,
      'alamat'=>$request->alamat       
      ]);     

  if($peminjam){ 
      //redirect dengan pesan sukses 
      return 	redirect()->route('peminjam.index')->with(['success'=>'Data 	berhasil disimpan']);         }else{ 
          return redirect()->route('peminjam.index')->with(['error'=>'Data gagal disimpan']); 

  } 
 }
 public function destroy($id)
  {
      $peminjam = peminjam::findOrFail($id);

      $peminjam->delete();
      if($peminjam){
          //redirect dengan pesan sukses
          return redirect()->route('peminjam.index')->with(['success' => 'Data Berhasil Dihapus!']);
      }else{
          //redirect dengan pesan error
          return redirect()->route('peminjam.index')->with(['error' => 'Data Gagal Dihapus!']);
      }
    }
}