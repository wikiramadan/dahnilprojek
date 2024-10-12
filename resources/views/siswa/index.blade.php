@extends('template')
@section('judul_halaman','')
@section('konten')
<h2>Siswa</h2>
<body style="background: lightgray">
  <div class="container mt-5">
     <div class="row">
       <div class="col-md-12">
         <div class="card border-0 shadow rounded">
           <div class="card-body">
            <a href="{{ route('siswa.create')}}" class="btn btn-md btn-success mb-3">TAMBAH BLOG</a>
            <a href="generate-pdf" class="btn btn-md btn-success mb-3">CETAK</a>
              <table class="table table-bordered">
                <thead>
                 <tr class="text-center">
                 <th scope="col">ID</th>
                  <th scope="col">NAMA SISWA</th>
                  <th scope="col">NIS</th>
                  <th scope="col">JURUSAN</th>
                  <th scope="col"></th>
                  <th scope="col">AKSI</th>
                </tr>
            </thead>
        <tbody>
         @forelse ($siswas as $siswa)
         <tr class="text-center">
            <td class="text-center">{{ $siswa->id }}</td>
            <td>{{ $siswa->namasiswa }}</td>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->jurusan }}</td>
            <td></td>
            <td class="text-center">
              <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                 <a href="{{ route('siswa.edit', $siswa->id) }}"
                   class="btn btn-sm btn-primary">EDIT</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                </form>
            </td>
        </tr>
         @empty
        <div class="alert alert-danger">
          Data Blog belum Tersedia.
        </div>
          @endforelse
        </tbody>
    </table>
     {{ $siswas->links() }}
    </div>
   </div>
  </div>
 </div>
</div>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script
src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
</script>
<script
src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
//message with toastr
@if(session()-> has('success'))
toastr.success('{{ session('success') }}', 'BERHASIL!');
@elseif(session()-> has('error'))
toastr.error('{{ session('error') }}', 'GAGAL!');
@endif
</script>
@endsection