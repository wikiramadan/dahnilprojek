<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Strorage;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;
use Alert;

class SiswaController extends Controller
{
    //
    public function index()
    {
        $siswas=siswa::latest()->paginate(10);
        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
       return view('siswa.create');
    }
    public function store(Request $request)
    {
       $this->validate($request,[
          'namasiswa'=>'required',
          'nis'=>'required',
          'jurusan'=>'required'
       ]);
       DB::table('siswas')->insert([
        'namasiswa'=>$request->namasiswa,
        'nis'=>$request->nis,
        'jurusan'=>$request->jurusan
       ]);
       Alert::success ('Success', 'Data berhasil disimpan');
        if(DB::table('siswas'))
        {
           return redirect()->route('siswa.index')->with(['success'=>'Data 
            berhasil disimpan']);
         }else
         {
         return redirect()->route('siswa.index')->with(['error'=>'Data gagal 
         disimpan']);
       } 
       
    }
       public function edit(siswa $siswa)
  { 
  return view('siswa.edit', compact('siswa')); 
  } 
  public function update(Request $request, siswa $siswa) 
  { 
  $this->validate($request, [ 
      'namasiswa'     => 'required', 
      'nis'     => 'required',
      'jurusan'     => 'required'
  ]); 
  //get data siswa by ID 
   
  $siswa=siswa::findOrFail($siswa->id);           
  $siswa->update([ 
      'namasiswa'=>$request->namasiswa, 
      'nis'=>$request->nis,
      'jurusan'=>$request->jurusan       
      ]);     
      
      Alert::success ('Success', 'Data berhasil diedit');

  if($siswa){ 
      //redirect dengan pesan sukses 
      return redirect()->route('siswa.index')->with(['success'=>'Data berhasil disimpan']);         }else{ 
          return redirect()->route('siswa.index')->with(['error'=>'Data gagal disimpan']); 

  } 
 }
 public function destroy($id)
  {
      $siswa = siswa::findOrFail($id);

      $siswa->delete();
      Alert::success ('Success', 'Data berhasil dihapus');
      if($siswa){
          //redirect dengan pesan sukses
          return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
      }else{
          //redirect dengan pesan error
          return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Dihapus!']);
      }
    }
}