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
            border-collapse: collapse;
            width: 100%;
            font-size: 10px
        }

        #data td,
        #data th {
            border: 1px solid black;
            padding: 10px 7px;
            color: black;
            text-align: center;
        }
    </style>
</head>

<body>

    <h5 style="margin-bottom: -15px">DATA ALUMNI</h5>
    <h5>SMK NEGERI 11 BANDUNG</h5>
    @if ($angkatan)
    <h5 style="margin-top: -15px">ANGKATAN
            {{ $angkatan }}
    </h5>
    @endif

    <hr style="margin-bottom: 25px; border: solid 1px black">

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
