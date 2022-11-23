<!DOCTYPE html>
<html>
<head>
  <style>

  #data {
    border-collapse: collapse;
    width: 100%;
    font-size: 12px
  }

  #data td, #data th {
    border: 1px solid black;
    padding: 10px 7px;
    color: black;
    text-align: center;
  }

  </style>
</head>
<body>
  <table style="margin: auto">
    <td><h4 style="font-weight: 500; text-align: center;">DATA SISWA KELUAR</h4></td>
  </table>
  {{-- <h5>Periode: </h5> --}}

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
                <td>{{ $m->sk_mutasi }}</td>
                <td>{{ $m->alasan_mutasi }}</td>
            </tr>
        @endforeach
    </table>

    <script type="text/javascript">
        window.print();
    </script>
    
</body>
</html>