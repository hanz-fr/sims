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
                <th scope="col" rowspan="3" colspan="3">
                    Nama Mapel
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
                <th colspan="2">
                    Semester: 
                </th>
                <th colspan="2">
                    Semester: 
                </th>
                <th colspan="2">
                    Semester: 
                </th>
                <th colspan="2">
                    Semester: 
                </th>
                <th colspan="2">
                    Semester: 
                </th>
                <th colspan="2">
                    Semester: 
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

                <tr>
                <th scope="row" rowspan="4" colspan="2">
                    Absen
                </th>
                <td>
                    Sakit (hari)
                </td>
                <td colspan="2">
                </td>
                </tr>
                <tr>
                <td>
                    Ijin (hari)
                </td>
                <td colspan="2">
                </td>
                </tr>
                <tr>
                <td>
                    Alpa (hari)
                </td>
                <td colspan="2">
                </td>
                </tr>
                <tr>
                <td>
                    Jumlah (hari)
                </td>
                <td colspan="2">
                </td>
                </tr>
                <tr>
                <th scope="row" rowspan="3" colspan="2">
                    Status Akhir Tahun
                </th>
                <td>
                    Status Kenaikan
                </td>
                <td colspan="2">
                </td>
                </tr>
                <tr>
                <td>
                    Naik ke
                </td>
                <td colspan="2">
                </td>
                </tr>
                <tr>
                <td>
                    Tanggal Kenaikan
                </td>
                <td colspan="2">
                </td> 
                </tr>
        </tbody>
    </table>
</body>
</html>