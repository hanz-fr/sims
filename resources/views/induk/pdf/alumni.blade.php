<!DOCTYPE html>
<html>
<head>
  <style>
    * {
      font-family: Arial, sans-serif;
    }

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

  <h4 style="font-weight: 500; text-align: center;">DATA ALUMNI</h4>
  <h5 style="font-weight: 400">Periode: {{ $dibuatTglDari }} - {{ $dibuatTglKe }}</h5>

    <table id="data">
        <tr>
            <th>NO</th>
            <th>NIS</th>
            <th>NISN</th>
            <th>NAMA PESERTA DIDIK</th>
            <th>GENDER</th>
            <th>KELAS</th>
        </tr>
        @foreach ($alumni as $key => $a)

            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $a->nis_siswa }}</td>
                <td>{{ $a->nisn_siswa }}</td>
                <td>{{ $a->nama_siswa }}</td>
                <td>{{ $a->jenis_kelamin }}</td>
                <td>{{ $a->KelasId }}</td>
            </tr>
        @endforeach
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>