@extends('template')
@section('konten')

<div class="container">
    <div class="row"> 
        <form action="{{route('user.update', $user->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" name="namalengkap" id="" value="{{($user->name)}}">
            </div>

            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" id="" value="{{($user->email)}}">
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="">
            </div>

            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="">
                <option value="{{ $user->status}}">{{ $user->status}}</option>
                    <option value="admin">admin</option>
                    <option value="pengunjung">pengunjung</option>
                    <option value="operator">operator</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Simpan</button>
                <button type="submit">Reset</button>
            </div>
        </form>   
    
    </div>

</div>


@endsection