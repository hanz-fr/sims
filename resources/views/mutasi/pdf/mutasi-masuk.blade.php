<!DOCTYPE html>
<html>

<head>
    <style>
        @font-face {
            font-family: 'Times New Roman', Times, serif;
        }

        h5 {
            font-weight: bold;
            text-align: center;
        }

        table {
            text-transform: capitalize;
            border-collapse: collapse;
            width: 100%;
            font-size: 9px;
        }

        td,
        th {
            border: 1px solid black;
            padding: 10px 5px;
            color: black;
            text-align: center;
        }
    </style>
</head>

<body>
    <h5 style="margin-bottom: -15px">LAPORAN DATA SISWA MUTASI MASUK</h5>
    <h5 style="margin-bottom: -15px">SMK NEGERI 11 BANDUNG</h5>
    <h5>TAHUN AJARAN {{ date('Y') }}/{{ date('Y') + 1 }}</h5>

    <h6 style="margin-bottom: -2px">Periode : @if ($masuk_dari == $masuk_ke)
            {{ $masuk_dari }}
        @else
            {{ $masuk_dari }} - {{ $masuk_ke }}
        @endif
    </h6>

    <hr style="margin-bottom: 25px; border: solid 1px black">

    <table>
        <tr>
            <th>NO</th>
            <th>NAMA PESERTA DIDIK</th>
            <th>NOMOR INDUK</th>
            <th>GENDER</th>
            <th>TANGGAL MASUK</th>
            <th>DITERIMA DI KELAS</th>
            <th>PINDAH DARI/ALASAN</th>
        </tr>
        @foreach ($mutasi as $key => $m)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $m->nama_siswa }}</td>
                <td>{{ $m->nis_siswa }}</td>
                <td>{{ $m->jenis_kelamin }}</td>
                <td>{{ $m->tgl_mutasi }}</td>
                <td>{{ $m->diterima_di_kelas }}</td>
                <td>{{ $m->pindah_dari }}, {{ $m->alasan_mutasi }}</td>
            </tr>
        @endforeach
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
