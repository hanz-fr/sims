<!DOCTYPE html>
<html>
<head>
  <style>
    * {
      font-family: Arial, sans-serif;
    }

  table {
    border-collapse: collapse;
    width: 100%;
    font-size: 12px
  }

  table td, table th {
    border: 1px solid black;
    padding: 10px 7px;
    color: black;
    text-align: center;
  }

  </style>
</head>
<body>

  <h4 style="font-weight: 500; text-align: center; font-family:Arial, Helvetica, sans-serif">DAFTAR NAMA PESERTA DIDIK TIDAK NAIK KELAS</h4>

    <table>
        <thead class="tw-bg-gray-100 tw-text-basic-700 tw-border tw-font-pop">
            <tr>
                <th>NO</th>
                <th>NAMA PESERTA DIDIK</th>
                <th>TEMPAT TANGGAL LAHIR</th>
                <th>TINGGAL DI KELAS</th>
                <th>ALASAN</th>
            </tr>
        </thead>
        <tbody>
          @foreach($raport as $key => $r)
          <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $r->siswa->nama_siswa }}</td>
              <td>{{ $r->siswa->tmp_lahir }}, {{ $r->siswa->tgl_lahir }}</td>
              <td>{{ $r->tinggal_di_Kelas }}</td>
              <td>{{ $r->alasan_tidak_naik }}</td>
          </tr>
          @endforeach
        </tbody>
    </table>
    
    <script type="text/javascript">
        window.print();
    </script>
    
</body>
</html>