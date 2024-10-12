<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;
    protected $fillable =[
        'namapeminjam',
        'tglpinjam',
        'tglkembali',
        'alamat',
        'siswa_id',
    ];

    public function menu()
    {
        return $this->belongsTo(Siswa::class);
    }
}
