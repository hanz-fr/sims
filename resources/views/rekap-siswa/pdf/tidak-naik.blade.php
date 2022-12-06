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
    border-collapse: collapse;
    width: 100%;
    font-size: 9px;
    font-family: 'Times New Roman', Times, serif;
  }

  table td, table th {
    border: 1px solid black;
    padding: 10px 5px;
    color: black;
    text-align: center;
  }

  </style>
</head>
<body>

  <h5 style="margin-bottom: -15px">LAPORAN DATA SISWA TIDAK NAIK KELAS</h5>
  <h5 style="margin-bottom: -15px">SMK NEGERI 11 BANDUNG</h5>
  <h5>TAHUN AJARAN {{ date('Y') }}/{{ date('Y') + 1 }}</h5>

  <h6 style="margin-bottom: -2px">Periode : {{ $dibuatTglDari }} - {{ $dibuatTglKe }}</h6>

  <hr style="margin-bottom: 25px; border: solid 1px black">

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