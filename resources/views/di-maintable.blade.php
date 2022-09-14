@extends('layouts.main')

@section('content')


<h4 class="tw-font-pop tw-font-bold tw-mx-6 tw-my-6">DATA INDUK SISWA</h4>

<table id="example" class="table table-striped tw-container">
    <thead>
        <tr>
            <th>NO</th>
            <th>NIS</th>
            <th>NISN</th>
            <th>NAMA PESERTA DIDIK</th>
            <th>GENDER</th>
            <th>KELAS</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>01</td>
            <td>238113011</td>
            <td>2381130118811</td>
            <td>AGUS LOREM IPSUM</td>
            <td>L</td>
            <td>10 PPLG 1</td>
            <td>
                <button class="btn btn-primary">
                    <i class="fa-solid fa-file-pen"></i>
                </button>
                <button class="btn btn-primary">
                    <i class="fa-solid fa-eye"></i>
                </button>
            </td>
        </tr>
        <tr>
            <td>02</td>
            <td>200654845</td>
            <td>0178577600562</td>
            <td>MUBASHIR ALHAMDULILLAH</td>
            <td>L</td>
            <td>12 RPL 2</td>
            <td>
                <button class="btn btn-primary">
                    <i class="fa-solid fa-file-pen"></i>
                </button>
                <button class="btn btn-primary">
                    <i class="fa-solid fa-eye"></i>
                </button>
            </td>
        </tr>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"> </script>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
@endsection