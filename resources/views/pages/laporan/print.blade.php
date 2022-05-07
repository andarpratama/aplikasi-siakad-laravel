<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laporan Order</title>
    <style>
        .title-container {
            text-align: center;
            margin-bottom: 40px;
        }

        hr {
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <div class="title-container" >
        <h1>Data Laporan Kunjungan</h1>
    </div>
    <hr>
    <table width="100%" border="1" cellpadding="10" cellspacing="0" >
        <tr>
            <th scope="col" class="text-center" >No</th>
            <th scope="col">No. Kunungann</th>
            <th scope="col">Paket</th>
            <th scope="col">Pasien</th>
            <th scope="col">Antrian</th>
            <th scope="col">Dokter</th>
            <th scope="col">Harga</th>
            <th scope="col">Status</th>
        </tr>
        @foreach ($data as $laporan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $laporan->no_kunjungan }}</td>
            <td>{{ $laporan->paket->nama }}</td>
            <td>{{ $laporan->user->name }}</td>
            <td class="text-center" >{{ $laporan->antrian->no_antrian }}</td>
            @if (!$laporan->dokter)
                <td class="fst-italic">Belum ditentukan</td>
            @else
                <td>{{ $laporan->dokter->nama }}</td>
                @endif
            <td>Rp {{ number_format($laporan->paket->harga, 0, ",", ".") }}</td>
            <td class="text-capitalize" >{{ $laporan->status }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
