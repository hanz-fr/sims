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

    <div style="display:flex; flex-direction: row; justify-content: space-between;">
        <div></div>
        <h4 style="font-weight: bold; text-align: center; font-family:Arial, Helvetica, sans-serif">HASIL PENCAPAIAN KOMPETENSI PESERTA DIDIK</h4>
        <h4 style="font-weight: bold; text-align: center; font-family:Arial, Helvetica, sans-serif">Program Kompetensi Keahlian: </h4>
    </div>


    <table>
        <thead>
            <tr>
                <th scope="col" rowspan="3" colspan="3">
                    Nama Mapel
                </th>
                @foreach ($siswa->raport as $rp)
                <th colspan="2">
                    Tahun Pelajaran: {{ $rp->thn_ajaran }}
                </th>
                @endforeach
                <th colspan="2">
                    Tahun Pelajaran: 
                </th>
                <th colspan="2">
                    Tahun Pelajaran: 
                </th>
                <th colspan="2">
                    Tahun Pelajaran: 
                </th>
                <th colspan="2">
                    Tahun Pelajaran: 
                </th>
                <th colspan="2">
                    Tahun Pelajaran: 
                </th>
                <th scope="col" rowspan="2" colspan="2">
                    US
                </th>
                <th scope="col" rowspan="2" colspan="2">
                    UKK
                </th>
            </tr>
            <tr>
                @foreach ($siswa->raport as $rp)
                <th colspan="2">
                    Semester: {{ $rp->semester }}
                </th>
                @endforeach
                <th colspan="2">
                    Semester: 2
                </th>
                <th colspan="2">
                    Semester: 3
                </th>
                <th colspan="2">
                    Semester: 4
                </th>
                <th colspan="2">
                    Semester: 5
                </th>
                <th colspan="2">
                    Semester: 6
                </th>
            </tr>
            <tr>
                <th scope="col">
                    Pengetahuan
                </th>
                <th scope="col">
                    Keterampilan
                </th>
                <th scope="col">
                    Pengetahuan
                </th>
                <th scope="col">
                    Keterampilan
                </th>
                <th scope="col">
                    Pengetahuan
                </th>
                <th scope="col">
                    Keterampilan
                </th>
                <th scope="col">
                    Pengetahuan
                </th>
                <th scope="col">
                    Keterampilan
                </th>
                <th scope="col">
                    Pengetahuan
                </th>
                <th scope="col">
                    Keterampilan
                </th>
                <th scope="col">
                    Pengetahuan
                </th>
                <th scope="col">
                    Keterampilan
                </th>
                <th>T</th>
                <th>P</th>
                <th>T</th>
                <th>P</th>
            </tr>
        </thead>
            <tbody>
                @foreach ($mapel as $m)
                <tr>
                    <th scope="row" colspan="3">
                            {{ $m->MapelId }}
                    </th>

                    <!-- SEMESTER 1 -->
                    @foreach (collect($siswa->raport)->where('semester', 1) as $rp)
                    @foreach (collect($rp->NilaiMapel)->where('idMapelJurusan', $m->mapelJurusanId) as $nm)
                    <td>
                    {{ $nm->nilai_pengetahuan }}
                    </td>
                    <td>
                    {{ $nm->nilai_keterampilan }}
                    </td>
                    @endforeach
                    @endforeach

                    @if(collect($siswa->raport)->where('semester', 1)->isEmpty())
                    <td></td>
                    <td></td>
                    @endif

                    <!-- SEMESTER 2 -->
                    @foreach (collect($siswa->raport)->where('semester', 2) as $rp)
                    @foreach (collect($rp->NilaiMapel)->where('idMapelJurusan', $m->mapelJurusanId) as $nm)
                    <td>
                    {{ $nm->nilai_pengetahuan }}
                    </td>
                    <td>
                    {{ $nm->nilai_keterampilan }}
                    </td>
                    @endforeach
                    @endforeach

                    @if(collect($siswa->raport)->where('semester', 2)->isEmpty())
                    <td></td>
                    <td></td>
                    @endif

                    <!-- SEMESTER 3 -->
                    @foreach (collect($siswa->raport)->where('semester', 3) as $rp)
                    @foreach (collect($rp->NilaiMapel)->where('idMapelJurusan', $m->mapelJurusanId) as $nm)
                    <td>
                    {{ $nm->nilai_pengetahuan }}
                    </td>
                    <td>
                    {{ $nm->nilai_keterampilan }}
                    </td>
                    @endforeach
                    @endforeach

                    @if(collect($siswa->raport)->where('semester', 3)->isEmpty())
                    <td></td>
                    <td></td>
                    @endif

                    <!-- SEMESTER 4 -->
                    @foreach (collect($siswa->raport)->where('semester', 4) as $rp)
                    @foreach (collect($rp->NilaiMapel)->where('idMapelJurusan', $m->mapelJurusanId) as $nm)
                    <td>
                    {{ $nm->nilai_pengetahuan }}
                    </td>
                    <td>
                    {{ $nm->nilai_keterampilan }}
                    </td>
                    @endforeach
                    @endforeach

                    @if(collect($siswa->raport)->where('semester', 4)->isEmpty())
                    <td></td>
                    <td></td>
                    @endif

                    <!-- SEMESTER 5 -->
                    @foreach (collect($siswa->raport)->where('semester', 5) as $rp)
                    @foreach (collect($rp->NilaiMapel)->where('idMapelJurusan', $m->mapelJurusanId) as $nm)
                    <td>
                    {{ $nm->nilai_pengetahuan }}
                    </td>
                    <td>
                    {{ $nm->nilai_keterampilan }}
                    </td>
                    @endforeach
                    @endforeach

                    @if(collect($siswa->raport)->where('semester', 5)->isEmpty())
                    <td></td>
                    <td></td>
                    @endif

                    <!-- SEMESTER 6 -->
                    @foreach (collect($siswa->raport)->where('semester', 6) as $rp)
                    @foreach (collect($rp->NilaiMapel)->where('idMapelJurusan', $m->mapelJurusanId) as $nm)
                    <td>
                    {{ $nm->nilai_pengetahuan }}
                    </td>
                    <td>
                    {{ $nm->nilai_keterampilan }}
                    </td>
                    @endforeach
                    @endforeach

                    @if(collect($siswa->raport)->where('semester', 6)->isEmpty())
                    <td></td>
                    <td></td>
                    @endif

                    <!-- US -->
                    @foreach (collect($siswa->raport)->where('semester', 6) as $rp)
                    @foreach (collect($rp->NilaiMapel)->where('idMapelJurusan', $m->mapelJurusanId) as $nm)
                    <td>
                    {{ $nm->nilai_us_teori }}
                    </td>
                    <td>
                    {{ $nm->nilai_us_praktek }}
                    </td>
                    @endforeach
                    @endforeach

                    @if(collect($siswa->raport)->where('semester', 6)->isEmpty())
                    <td></td>
                    <td></td>
                    @endif

                    <!-- UKK -->
                    @foreach (collect($siswa->raport)->where('semester', 6) as $rp)
                    @foreach (collect($rp->NilaiMapel)->where('idMapelJurusan', $m->mapelJurusanId) as $nm)
                    <td>
                    {{ $nm->nilai_ukk_teori }}
                    </td>
                    <td>
                    {{ $nm->nilai_ukk_praktek }}
                    </td>
                    @endforeach
                    @endforeach

                    @if(collect($siswa->raport)->where('semester', 6)->isEmpty())
                    <td></td>
                    <td></td>
                    @endif
                </tr>
                @endforeach

                {{-- end nilai --}}
                
                {{-- absen --}}
                <tr>
                    <th scope="row" rowspan="4" colspan="2">
                        Absen
                    </th>
                    <td>
                        Sakit (hari)
                    </td>

                    <!-- Semester 1 -->
                    @foreach (collect($siswa->raport)->where('semester', 1) as $rp)
                    <td colspan="2">
                        {{ $rp->sakit }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 1)->isEmpty())
                    <td colspan="2"></td>
                    @endif


                    <!-- Semester 2 -->
                    @foreach (collect($siswa->raport)->where('semester', 2) as $rp)
                    <td colspan="2">
                        {{ $rp->sakit }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 2)->isEmpty())
                    <td colspan="2"></td>
                    @endif


                    <!-- Semester 3 -->
                    @foreach (collect($siswa->raport)->where('semester', 3) as $rp)
                    <td colspan="2">
                        {{ $rp->sakit }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 3)->isEmpty())
                    <td colspan="2"></td>
                    @endif

                    
                    <!-- Semester 4 -->
                    @foreach (collect($siswa->raport)->where('semester', 4) as $rp)
                    <td colspan="2">
                        {{ $rp->sakit }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 4)->isEmpty())
                    <td colspan="2"></td>
                    @endif


                    <!-- Semester 5 -->
                    @foreach (collect($siswa->raport)->where('semester', 5) as $rp)
                    <td colspan="2">
                        {{ $rp->sakit }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 5)->isEmpty())
                    <td colspan="2"></td>
                    @endif


                    <!-- Semester 6 -->
                    @foreach (collect($siswa->raport)->where('semester', 6) as $rp)
                    <td colspan="2">
                        {{ $rp->sakit }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 6)->isEmpty())
                    <td colspan="2"></td>
                    @endif

                    <!-- Catatan -->
                    <td rowspan="7" colspan="4">

                    </td>
                </tr>

                <tr>
                    <td>
                        Ijin (hari)
                    </td>
                    <!-- Semester 1 -->
                    @foreach (collect($siswa->raport)->where('semester', 1) as $rp)
                    <td colspan="2">
                        {{ $rp->ijin }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 1)->isEmpty())
                    <td colspan="2"></td>
                    @endif


                    <!-- Semester 2 -->
                    @foreach (collect($siswa->raport)->where('semester', 2) as $rp)
                    <td colspan="2">
                        {{ $rp->ijin }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 2)->isEmpty())
                    <td colspan="2"></td>
                    @endif


                    <!-- Semester 3 -->
                    @foreach (collect($siswa->raport)->where('semester', 3) as $rp)
                    <td colspan="2">
                        {{ $rp->ijin }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 3)->isEmpty())
                    <td colspan="2"></td>
                    @endif

                    
                    <!-- Semester 4 -->
                    @foreach (collect($siswa->raport)->where('semester', 4) as $rp)
                    <td colspan="2">
                        {{ $rp->ijin }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 4)->isEmpty())
                    <td colspan="2"></td>
                    @endif


                    <!-- Semester 5 -->
                    @foreach (collect($siswa->raport)->where('semester', 5) as $rp)
                    <td colspan="2">
                        {{ $rp->ijin }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 5)->isEmpty())
                    <td colspan="2"></td>
                    @endif


                    <!-- Semester 6 -->
                    @foreach (collect($siswa->raport)->where('semester', 6) as $rp)
                    <td colspan="2">
                        {{ $rp->ijin }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 6)->isEmpty())
                    <td colspan="2"></td>
                    @endif
                </tr>

                <tr>
                    <td>
                        Alpa (hari)
                    </td>
                    <!-- Semester 1 -->
                    @foreach (collect($siswa->raport)->where('semester', 1) as $rp)
                    <td colspan="2">
                        {{ $rp->alpa }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 1)->isEmpty())
                    <td colspan="2"></td>
                    @endif


                    <!-- Semester 2 -->
                    @foreach (collect($siswa->raport)->where('semester', 2) as $rp)
                    <td colspan="2">
                        {{ $rp->alpa }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 2)->isEmpty())
                    <td colspan="2"></td>
                    @endif


                    <!-- Semester 3 -->
                    @foreach (collect($siswa->raport)->where('semester', 3) as $rp)
                    <td colspan="2">
                        {{ $rp->alpa }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 3)->isEmpty())
                    <td colspan="2"></td>
                    @endif

                    
                    <!-- Semester 4 -->
                    @foreach (collect($siswa->raport)->where('semester', 4) as $rp)
                    <td colspan="2">
                        {{ $rp->alpa }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 4)->isEmpty())
                    <td colspan="2"></td>
                    @endif


                    <!-- Semester 5 -->
                    @foreach (collect($siswa->raport)->where('semester', 5) as $rp)
                    <td colspan="2">
                        {{ $rp->alpa }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 5)->isEmpty())
                    <td colspan="2"></td>
                    @endif


                    <!-- Semester 6 -->
                    @foreach (collect($siswa->raport)->where('semester', 6) as $rp)
                    <td colspan="2">
                        {{ $rp->alpa }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 6)->isEmpty())
                    <td colspan="2"></td>
                    @endif
                </tr>

                <tr>
                    <td>
                        Jumlah (hari)
                    </td>
                    <!-- Semester 1 -->
                    @foreach (collect($siswa->raport)->where('semester', 1) as $rp)
                    <td colspan="2">
                        {{ $rp->sakit + $rp->ijin + $rp->alpa }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 1)->isEmpty())
                    <td colspan="2"></td>
                    @endif


                    <!-- Semester 2 -->
                    @foreach (collect($siswa->raport)->where('semester', 2) as $rp)
                    <td colspan="2">
                        {{ $rp->sakit + $rp->ijin + $rp->alpa }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 2)->isEmpty())
                    <td colspan="2"></td>
                    @endif


                    <!-- Semester 3 -->
                    @foreach (collect($siswa->raport)->where('semester', 3) as $rp)
                    <td colspan="2">
                        {{ $rp->sakit + $rp->ijin + $rp->alpa }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 3)->isEmpty())
                    <td colspan="2"></td>
                    @endif

                    
                    <!-- Semester 4 -->
                    @foreach (collect($siswa->raport)->where('semester', 4) as $rp)
                    <td colspan="2">
                        {{ $rp->sakit + $rp->ijin + $rp->alpa }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 4)->isEmpty())
                    <td colspan="2"></td>
                    @endif


                    <!-- Semester 5 -->
                    @foreach (collect($siswa->raport)->where('semester', 5) as $rp)
                    <td colspan="2">
                        {{ $rp->sakit + $rp->ijin + $rp->alpa }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 5)->isEmpty())
                    <td colspan="2"></td>
                    @endif


                    <!-- Semester 6 -->
                    @foreach (collect($siswa->raport)->where('semester', 6) as $rp)
                    <td colspan="2">
                        {{ $rp->sakit + $rp->ijin + $rp->alpa }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 6)->isEmpty())
                    <td colspan="2"></td>
                    @endif
                </tr>
                {{-- end absen --}}

                {{-- status akhir tahun --}}
                <tr>
                    <th scope="row" rowspan="3" colspan="2">
                        Status Akhir Tahun
                    </th>
                    <td>
                        Status Kenaikan
                    </td>

                    <!-- per semester 2 -->
                    @foreach (collect($siswa->raport)->where('semester', 2) as $rp)
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

                    @if (collect($siswa->raport)->where('semester', 2)->isEmpty())
                    <td colspan="4"></td>
                    @endif

                    <!-- per semester 4 -->
                    @foreach (collect($siswa->raport)->where('semester', 4) as $rp)
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

                    @if (collect($siswa->raport)->where('semester', 4)->isEmpty())
                    <td colspan="4"></td>
                    @endif

                    <!-- per semester 6 -->
                    @foreach (collect($siswa->raport)->where('semester', 6) as $rp)
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

                    @if (collect($siswa->raport)->where('semester', 6)->isEmpty())
                    <td colspan="4"></td>
                    @endif
                </tr>

                <tr>
                    <td>
                        Naik ke
                    </td>
                    <!-- per semester 2 -->
                    @foreach (collect($siswa->raport)->where('semester', 2) as $rp)
                    <td colspan="4">
                        {{ $rp->naikKelas }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 2)->isEmpty())
                    <td colspan="4"></td>
                    @endif

                    <!-- per semester 4 -->
                    @foreach (collect($siswa->raport)->where('semester', 4) as $rp)
                    <td colspan="4">
                        {{ $rp->naikKelas }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 4)->isEmpty())
                    <td colspan="4"></td>
                    @endif

                    <!-- per semester 6 -->
                    @foreach (collect($siswa->raport)->where('semester', 6) as $rp)
                    <td colspan="4">
                        {{ $rp->naikKelas }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 6)->isEmpty())
                    <td colspan="4"></td>
                    @endif
                </tr>
                
                <tr>
                    <td>
                        Tanggal Kenaikan
                    </td>
                    <!-- per semester 2 -->
                    @foreach (collect($siswa->raport)->where('semester', 2) as $rp)
                    <td colspan="4">
                        {{ $rp->tgl_kenaikan }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 2)->isEmpty())
                    <td colspan="4"></td>
                    @endif

                    <!-- per semester 4 -->
                    @foreach (collect($siswa->raport)->where('semester', 4) as $rp)
                    <td colspan="4">
                        {{ $rp->tgl_kenaikan }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 4)->isEmpty())
                    <td colspan="4"></td>
                    @endif

                    <!-- per semester 6 -->
                    @foreach (collect($siswa->raport)->where('semester', 6) as $rp)
                    <td colspan="4">
                        {{ $rp->tgl_kenaikan }}
                    </td>
                    @endforeach

                    @if (collect($siswa->raport)->where('semester', 6)->isEmpty())
                    <td colspan="4"></td>
                    @endif
                </tr>
            </tbody>
    </table>
</body>
</html>