@extends('template')
@section('judul_halaman','')
@section('konten')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('peminjam.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold"> NAMA PEMINJAM</label>
                                <input type="text" class="form-control @error('namapeminjam') is-invalid @enderror" name="namapeminjam" value="{{ old('namapeminjam') }}" placeholder="Masukkan namapeminjam">
                                <!-- error message untuk title -->
                                @error('namapeminjam')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">TGL PINJAM</label>
                                    <input type="date" class="form-control @error('tglpinjam') is-invalid @enderror" name="tglpinjam" value="{{ old('tglpinjam') }}" placeholder="Masukkan Tujuan">
                                    <!-- error message untuk title -->
                                    @error('tglpinjam')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">TGL KEMBALI</label>
                                    <input type="date" class="form-control @error('tglkembali') is-invalid @enderror" name="tglkembali" value="{{old('tglkembali') }}" placeholder="Masukkan jamberangkat">
                                    <!-- error message untuk title -->
                                    @error('tglkembali')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">ALAMAT</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan alamat">
                                    <!-- error message untuk title -->
                                    @error('alamat')
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