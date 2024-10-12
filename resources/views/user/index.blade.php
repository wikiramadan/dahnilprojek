@extends('template')
@section('konten')

<div class="container">
    <h4>Daftar User</h4>
    <div class="row">    
    <a href="{{ route('user.create')}}" class="btn btn-md btn-success mb-3">Tambah User</a>
        <table class="table table-bordered">
            <tr class="text-center">
                <td>No</td>
            
                <td>Nama Lengkap</td>
                <td>Username</td>
                <td>Status</td>
                <td>action</td>
            </tr>
            @php
            $no=1;
            @endphp

            @forelse($datauser as $user)
            <tr class="text-center">
                <td>{{ $user->id}}</td>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email}}</td>
                <td>{{ $user->status}}</td>
                <td>
                    <a href="{{ route('user.edit', $user->id)}}">Edit</a>
                    <!-- Delete Button -->
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                </td>
            </tr>
            @empty
            Data User Belum Ada
            @endforelse
        </table>

    </div>

</div>





@endsection