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

  .foto {
    border: 1px solid black;
    text-align: center;
    justify-content: center;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 177px;
    height: 236px;
  }

  .pas-foto {
    text-align: center;
    justify-content: center;
    align-items: center;
    display: flex;
    flex-direction: column;
  }

  .foto-foto {
    display: flex;
    flex-direction: row;
    margin-bottom: 30px;
    gap: 80px;
    justify-content: center;
    align-items: center;
  }

  </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                {{-- @foreach (collect($siswa->raport)->where('semester', 1) as $rp) --}}
                <th scope="col" rowspan="4" colspan="3">
                    Nama Mapel
                </th>
            </tr>

            @foreach ($siswa->raport as $rp)
            <tr>
                <th scope="col" colspan="2">
                    Tahun Pelajaran: {{ $rp->thn_ajaran }}
                </th>
            </tr>
            <tr>
                <th colspan="2">
                    Semester: {{ $rp->semester }}   
                </th>
            </tr>
            <tr>
                <th scope="col">
                    Pengetahuan
                </th>
                <th scope="col">
                    Keterampilan
                </th>
            </tr>
            @endforeach
        </thead>
            <tbody>
                @foreach ($siswa->raport as $rp)
                @foreach ($rp->NilaiMapel as $nm)
                <tr>
                    <th scope="row" colspan="3">
                        {{ $nm->MapelJurusan->MapelId }}
                    </th>
                    <td>
                        {{ $nm->nilai_pengetahuan }}
                    </td>
                    <td>
                        {{ $nm->nilai_keterampilan }}
                    </td>
                </tr>
                @endforeach
                @endforeach

                @foreach (collect($siswa->raport)->where('semester', 2) as $rp)
                @foreach ($rp->NilaiMapel as $nm)
                <tr>
                    {{-- <th scope="row" colspan="3">
                        {{ $nm->MapelJurusan->MapelId }}
                    </th> --}}
                    <td>
                        {{ $nm->nilai_pengetahuan }}
                    </td>
                    <td>
                        {{ $nm->nilai_keterampilan }}
                    </td>
                </tr>
                @endforeach
                @endforeach
                <tr>
                <th scope="row" rowspan="4" colspan="2">
                    Absen
                </th>
                <td>
                    Sakit (hari)
                </td>
                @foreach ($siswa->raport as $rp)
                <td colspan="2">
                    {{ $rp->sakit }}
                </td>
                @endforeach
                </tr>
                <tr>
                    <td>
                        Ijin (hari)
                    </td>
                    <td colspan="2">
                        {{ $rp->ijin }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Alpa (hari)
                    </td>
                    @foreach ($siswa->raport as $rp)
                    <td colspan="2">
                        {{ $rp->alpa }}
                    </td>
                    @endforeach
                </tr>
                <tr>
                    <td>
                        Jumlah (hari)
                    </td>
                    @foreach ($siswa->raport as $rp)
                    <td colspan="2">
                        {{ $rp->sakit + $rp->ijin + $rp->alpa  }}
                    </td>
                    @endforeach
                </tr>
                <tr>
                    <th scope="row" rowspan="3" colspan="2">
                        Status Akhir Tahun
                    </th>
                    <td>
                        Status Kenaikan
                    </td>
                    @foreach ($siswa->raport as $rp)
                    <td colspan="4">
                        @if($rp->isNaik == true)
                        Naik
                        @elseif($rp->isNaik == false)
                        Tidak naik
                        @else
                        -
                        @endif
                    </td>
                    @endforeach
                </tr>
                <tr>
                    <td>
                        Naik ke
                    </td>
                    @foreach ($siswa->raport as $rp)
                    <td colspan="4">
                        {{ $rp->naikKelas }}
                    </td>
                    @endforeach
                </tr>
                <tr>
                    <td>
                        Tanggal Kenaikan
                    </td>
                    @foreach ($siswa->raport as $rp)
                    <td colspan="4">
                        {{ $rp->tgl_kenaikan }}
                    </td> 
                @endforeach

                </tr>
        </tbody>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>