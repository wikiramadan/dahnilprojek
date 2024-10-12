@extends('template')
@section('konten')

<div class="container">
    <div class="row"> 
        <form action="{{route('user.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" name="namalengkap" id="">
            </div>
  
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" id="">
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="">
            </div>

            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="">
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