@extends('template')
@section('judul_halaman','')
@section('konten')
<h2>PEMINJAMAN BUKU</h2>
<body style="background: lightgray">
  <div class="container mt-5">
     <div class="row">
       <div class="col-md-12">
         <div class="card border-0 shadow rounded">
           <div class="card-body">
            <a href="{{ route('peminjam.create')}}" class="btn btn-md btn-success mb-3">TAMBAH BLOG</a>
              <table class="table table-bordered">
                <thead>
                 <tr>
                 <th scope="col">ID</th>
                  <th scope="col">NAMA PEMINJAM</th>
                  <th scope="col">TGL PINJAM</th>
                  <th scope="col">TGL KEMBALI</th>
                  <th scope="col">ALAMAT</th>
                  <th scope="col"></th>
                  <th scope="col">AKSI</th>
                </tr>
            </thead>
        <tbody>
         @forelse ($peminjams as $peminjam)
         <tr>
            <td class="text-center">
            {{ $peminjam->id }}
            </td>
            <td>{{ $peminjam->namapeminjam }}</td>
            <td>{{ $peminjam->tglpinjam }}</td>
            <td>{{ $peminjam->tglkembali }}</td>
            <td>{{ $peminjam->alamat }}</td>
            <td></td>
            <td class="text-center">
              <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('peminjam.destroy', $peminjam->id) }}" method="POST">
                 <a href="{{ route('peminjam.edit', $peminjam->id) }}"
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
     {{ $peminjams->links() }}
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