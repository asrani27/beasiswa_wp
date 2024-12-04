<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>

<body>

    <table width="100%">
        <tr>
            {{-- <td width="15%">
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('logo/dprd.png'))) }}" width="80px"> &nbsp;&nbsp;
            </td> --}}
            <td style="text-align: center;" width="100%">
                <h2>APLIKASI SELEKSI PENERIMAAN BEASISWA<BR />
                MTS AL-ISLAMIYAH "SMIP" 1946<br /></h2>
            </td>
            {{-- <td width="15%">
            </td> --}}

        </tr>
    </table>
    <hr>
    <h3 style="text-align: center">LAPORAN PENYERAHAN BEASISWA KURANG MAMPU
        
    </h3>
    
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nomor</th>
            <th>Tanggal</th>
            <th>Penerima</th>
          </tr>
        @php
        $no =1;
        @endphp
        @foreach ($data as $key => $item)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$item->nomor}}</td>
            <td>{{\Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y')}}</td>
            <td>{{$item->siswa == null ? null : $item->siswa->nama}}</td>
        </tr>
        @endforeach
    </table>

    <table width="100%">
        <tr>
            <td width="60%"></td>
            <td></td>
            <td><br /> {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}<br />
                <br /><br /><br /><br />

                <u>Masliansyah S.Pd</u><br />
                Kepala Madrasah
            </td>
        </tr>
    </table>
</body>

</html>