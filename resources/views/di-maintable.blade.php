@extends('layouts.main')

@section('content')
<h4 class="tw-font-pop tw-font-bold tw-mx-6 tw-my-6">DATA INDUK SISWA</h4>

<div class="container">
<table id="example" class="table table-striped tw-border-2 tw-border-slate-300">
    <thead>
        <tr>
            <th class="tw-border-2 tw-border-slate-300">NO</th>
            <th class="tw-border-2 tw-border-slate-300">NIS</th>
            <th class="tw-border-2 tw-border-slate-300">NISN</th>
            <th class="tw-border-2 tw-border-slate-300">NAMA PESERTA DIDIK</th>
            <th class="tw-border-2 tw-border-slate-300">GENDER</th>
            <th class="tw-border-2 tw-border-slate-300">KELAS</th>
            <th class="tw-border-2 tw-border-slate-300">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="tw-border-2 tw-border-slate-300">01</td>
            <td class="tw-border-2 tw-border-slate-300">238113011</td>
            <td class="tw-border-2 tw-border-slate-300">2381130118811</td>
            <td class="tw-border-2 tw-border-slate-300">AGUS LOREM IPSUM</td>
            <td class="tw-border-2 tw-border-slate-300">L</td>
            <td class="tw-border-2 tw-border-slate-300">10 PPLG 1</td>
            <td class="tw-border-2 tw-border-slate-300">
                <button class="btn text-white" style="background-color: #4D9E9E;">
                    <i class="fa-solid fa-file-pen"></i>
                </button>
                <button class="btn text-white" style="background-color: #949494;">
                    <i class="fa-solid fa-eye"></i>
                </button>
            </td>
        </tr>

        <tr>
            <td class="tw-border-2 tw-border-slate-300">02</td>
            <td class="tw-border-2 tw-border-slate-300">200654845</td>
            <td class="tw-border-2 tw-border-slate-300">0178577600562</td>
            <td class="tw-border-2 tw-border-slate-300">MUBASHIR ALHAMDULILLAH</td>
            <td class="tw-border-2 tw-border-slate-300">L</td>
            <td class="tw-border-2 tw-border-slate-300">12 RPL 2</td>
            <td class="tw-border-2 tw-border-slate-300">
                <button class="btn text-white" style="background-color: #4D9E9E;">
                    <i class="fa-solid fa-file-pen"></i>
                </button>
                <button class="btn text-white" style="background-color: #949494;">
                    <i class="fa-solid fa-eye"></i>
                </button>
            </td>
        </tr>

        <tr>
            <td class="tw-border-2 tw-border-slate-300">03</td>
            <td class="tw-border-2 tw-border-slate-300">2001593482</td>
            <td class="tw-border-2 tw-border-slate-300">0178577600777</td>
            <td class="tw-border-2 tw-border-slate-300">SUKMA DIKA</td>
            <td class="tw-border-2 tw-border-slate-300">L</td>
            <td class="tw-border-2 tw-border-slate-300">11 PPLG 2</td>
            <td class="tw-border-2 tw-border-slate-300">
                <button class="btn text-white" style="background-color: #4D9E9E;">
                    <i class="fa-solid fa-file-pen"></i>
                </button>
                <button class="btn text-white" style="background-color: #949494;">
                    <i class="fa-solid fa-eye"></i>
                </button>
            </td>
        </tr>

    </tbody>
</table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"> </script>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
@endsection