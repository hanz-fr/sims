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

  <h4 style="font-weight: 500; text-align: center; font-family:Arial, Helvetica, sans-serif">DAFTAR NAMA PESERTA DIDIK TIDAK NAIK KELAS</h4>

    <table id="data">
        <thead class="tw-bg-gray-100 tw-text-basic-700 tw-border tw-font-pop">
            <tr>
                <th>NO</th>
                <th>NAMA PESERTA DIDIK</th>
                <th>TEMPAT TANGGAL LAHIR</th>
                <th>TINGGAL DI KELAS</th>
                <th>ALASAN</th>
            </tr>
        </thead>
        <tbody class="tw-text-base">
        @foreach ($siswa as $key =>$s)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $s->nama_siswa }}</td>
                <td>{{ $s->tmp_lahir }}, {{ $s->tgl_lahir }}</td>
                {{-- @foreach ($s->raport as $r)
                <td>{{ $r->tinggal_di_kelas }}</td>
                <td>{{ $r->alasan_tidak_naik }}</td>
                @endforeach --}}
            </tr>
        @endforeach
        </tbody>
    </table>
    
    <script type="text/javascript">
        window.print();
    </script>
    
</body>
</html>