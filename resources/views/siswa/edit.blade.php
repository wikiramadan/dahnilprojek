@extends('template')
@section('judul_halaman','')
@section('konten')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('siswa.update', $siswa->id) }}" 
                        method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT') 
                        <div class="form-group">
                            <label class="font-weight-bold">NAMA SISWA</label>
                            <input type="text" class="form-control @error('namasiswa') is-invalid @enderror" name="namasiswa" value="{{ old('namasiswa', $siswa->namasiswa) }}" placeholder="Masukkan namasiswa">
                            @error('namasiswa')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">NIS</label>
                            <input type="number" class="form-control @error('nis') is-++invalid @enderror" name="nis" value="{{ old('nis', $siswa->nis ) 
                            }}" placeholder="Masukkan nama nis">
                             @error('nis')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        <div class="form-group">
                            <label class="font-weight-bold">JURUSAN</label>
                            <input type="text" class="form-control @error('jurusan') is-++invalid @enderror" name="jurusan" value="{{ old('jurusan', $siswa->jurusan ) 
                            }}" placeholder="Masukkan jurusan">
                             @error('jurusan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div> 
                    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                </form> 
            </div>
        </div>
    </div>
</div>
</div>
                
@endsection