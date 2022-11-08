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
  <h4 style="font-weight: 500; text-align: center;">DATA SISWA MASUK</h4>


    <table id="data">
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