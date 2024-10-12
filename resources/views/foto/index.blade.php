@extends('template')

@section('konten')
<div class="container">
    <h3>Daftar Foto</h3>

    <!-- Tombol untuk memunculkan modal -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#fotoModal">
        Tambah Foto
    </button>

    <!-- Modal untuk Tambah Foto -->
    <div class="modal fade" id="fotoModal" tabindex="-1" aria-labelledby="fotoModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-modal-lg"> <!-- Gunakan kelas kustom untuk memperbesar modal -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fotoModalLabel">Unggah Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('foto.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="namafile">Pilih gambar:</label>
                            <input type="file" name="namafile" id="namafile" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="ket">Keterangan:</label>
                            <input type="text" name="ket" id="ket" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tampilkan Pesan Sukses atau Error -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Tabel Daftar Foto -->
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        @foreach ($datafoto as $foto)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><img src="{{ asset($foto->lokasi) }}" width="150" height="100"></td>
            <td>{{ $foto->ket }}</td>
            <td>
                <!-- Tombol Edit -->
                <button class="btn btn-warning btn-sm edit-button" data-id="{{ $foto->id }}" data-ket="{{ $foto->ket }}" data-toggle="modal" data-target="#editFotoModal">Edit</button>
                
                <!-- Tombol Hapus -->
                <form action="{{ route('foto.destroy', $foto->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus foto ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

<!-- Modal untuk Edit Foto -->
<div class="modal fade" id="editFotoModal" tabindex="-1" aria-labelledby="editFotoModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal-lg"> <!-- Gunakan kelas kustom untuk memperbesar modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFotoModalLabel">Edit Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit_namafile">Pilih gambar baru (optional):</label>
                        <input type="file" name="namafile" id="edit_namafile" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit_ket">Keterangan:</label>
                        <input type="text" name="ket" id="edit_ket" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Script untuk mengisi data edit foto
    $('.edit-button').click(function() {
        var fotoId = $(this).data('id');
        var fotoKet = $(this).data('ket');
        $('#edit_ket').val(fotoKet);
        
        // Ubah action form untuk mengupdate data
        $('#editForm').attr('action', '/foto/' + fotoId);
    });
</script>

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Tambahkan JavaScript Bootstrap jika diperlukan -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection