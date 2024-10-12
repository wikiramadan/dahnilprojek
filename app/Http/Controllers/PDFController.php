<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;  // Mengimpor alias PDF 
use App\Models\Siswa;  // Asumsikan data berasal dari model siswa

class PDFController extends Controller
{
    //
    public function generatePDF()
    {
        // Mengambil data dari model
        $siswas = Siswa::all();

        // Data yang akan dikirim ke view
        $data = [
            'title' => 'Laporan Daftar Siswa',
            'date' => date('m/d/Y'),
            'siswas' => $siswas
        ];

        // Memuat view yang akan di render menjadi pdf
        $pdf = PDF::loadView('laporan-pdf', $data);

        // Mengunduh file PDF
        return $pdf->download('Laporan-data-pengguna.pdf');
    }
}

