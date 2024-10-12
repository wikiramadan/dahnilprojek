<!DOCTYPE html>
<html>
<head>
    <title class="text-center">{{$title}}</title>
    <style>
        body {font-family: Arial, sans-serif; }
        table {width: 100%;, border-collapse:collapse;}
        table {border: 1px solid black;}
        th {padding: 8px;}
        td {text-align:center;}
        th {background-color: #f2f2f2;}
    </style>
</head>
<body>
    <h1 class="text-center">{{$title}}</h1>
    <p>Tanggal: {{$date}}</p>

    <table>
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Nis</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
        @foreach($siswas as $no => $siswa)
        <tr>
            <td class="text-center">{{$no +1}}</td>
            <td class="text-center">{{$siswa->namasiswa}}</td>
            <td class="text-center">{{$siswa->nis}}</td>
            <td class="text-center">{{$siswa->jurusan}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</body>

</html>