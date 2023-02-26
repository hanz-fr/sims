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

    #data {
        text-transform: capitalize;
        border-collapse: collapse;
        width: 100%;
        font-size: 9px;
    }
    #data td, th {
        border: 1px solid black;
        padding: 10px 5px;
        color: black;
        text-align: center;
    }

  </style>
</head>
<body>

  <h5 style="margin-bottom: -15px">LAPORAN DATA SISWA MUTASI KELUAR</h5>
  <h5 style="margin-bottom: -15px">SMK NEGERI 11 BANDUNG</h5>
  <h5>TAHUN AJARAN {{ date('Y') }}/{{ date('Y') + 1 }}</h5>

  <h6 style="margin-bottom: -2px">Periode : @if($keluar_dari == $keluar_ke) {{ $keluar_dari }} @else {{ $keluar_dari }} - {{ $keluar_ke }} @endif</h6>

  <hr style="margin-bottom: 25px; border: solid 1px black">
    
    <table id="data">
        <tr>
            <th>NO</th>
            <th>NAMA PESERTA DIDIK</th>
            <th>NOMOR INDUK</th>
            <th>KELUAR DI KELAS</th>
            <th>TANGGAL KELUAR</th>
            <th>SK MUTASI</th>
            <th>ALASAN</th>
        </tr>
        @foreach ($mutasi as $key => $m)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $m->nama_siswa }}</td>
                <td>{{ $m->nis_siswa }}</td>
                <td>{{ $m->keluar_di_kelas }}</td>
                <td>{{ $m->tgl_mutasi }}</td>
                <td>@if ($m->sk_mutasi) {{ $m->sk_mutasi }} @else - @endif</td>
                <td>@if ($m->alasan_mutasi) {{ $m->alasan_mutasi }} @else - @endif</td>
            </tr>
        @endforeach
    </table>
    <br>
    <br>
    <table class="footer">
        <tbody style="font-size: 12px;">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="padding-left: 70px"></td>
                <td ></td>
                <td style="padding-left: 70px"></td>
                <td style="padding-left: 70px"></td>
                <td ></td>
                <td style="padding-left: 70px"></td>
                <td style="padding-left: 160px">Bandung, {{ date('d F Y') }}</td>
            </tr>
            <tr style="color:white;">
                <td>.</td>
                <td></td>
                <td></td>
            </tr>
            <tr style="color:white;">
                <td>.</td>
                <td></td>
                <td></td>
            </tr>
            <tr style="color:white;">
                <td>.</td>
                <td></td>
                <td></td>
            </tr>
            <tr style="color:white;">
                <td></td>
                <td>.</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td ></td>
                <td style="padding-left: 70px"></td>
                <td style="padding-left: 70px"></td>
                <td ></td>
                <td style="padding-left: 70px"></td>
                <td style="padding-left: 70px"></td>
                <td ></td>
                <td style="padding-left: 70px"></td>
                <td style="padding-left: 180px; font-weight:700;">PARWANTO, S.Pd</td>
            </tr>
            <tr>
                <td></td>
                <td ></td>
                <td style="padding-left: 70px"></td>
                <td style="padding-left: 70px"></td>
                <td ></td>
                <td style="padding-left: 70px"></td>
                <td style="padding-left: 70px"></td>
                <td ></td>
                <td style="padding-left: 70px"></td>
                {{-- <td style="padding-left: 160px;">NIP. 19810521 201001 1 008</td> --}}
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="padding-left: 160px">_______________________</td>
            </tr>
            <tr>
                <td></td>
                <td ></td>
                <td style="padding-left: 70px"></td>
                <td style="padding-left: 70px"></td>
                <td ></td>
                <td style="padding-left: 70px"></td>
                <td style="padding-left: 70px"></td>
                <td ></td>
                <td style="padding-left: 70px"></td>
                <td style="padding-left: 160px">NIP. 19810521 201001 1 008</td>
            </tr>
        </tbody>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
    
</body>
</html>