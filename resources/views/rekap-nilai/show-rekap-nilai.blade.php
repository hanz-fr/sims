@extends('layouts.main')

@section('content')
    <div class="tw-mx-10">
        <div class="tw-flex tw-mt-8 tw-items-center">
            <a href="{{ URL::previous() }}" class=" tw-text-sims-400 tw-text-3xl hover:tw-text-sims-600"><i class="fa-regular fa-chevron-left"></i></a>
            <div class="tw-text-2xl tw-text-sims-400 tw-font-pop tw-font-semibold tw-flex tw-ml-4">Rekap Nilai Siswa</div>
        </div>
            <div class="tw-flex lg:tw-flex-row sm:tw-flex-col tw-justify-between tw-mb-5 tw-mt-8">
                <div class="tw-font-pop tw-font-medium tw-text-md tw-text-slate-400">
                    NIS : {{ $siswa->nis_siswa }}<br>Nama :  {{ $siswa->nama_siswa }}<br>Kelas : {{ $siswa->KelasId }}
                </div>
                <div class="tw-my-auto tw-flex tw-gap-5 sm:tw-mt-2 lg:tw-my-auto">
                    <a href="" class="tw-bg-sims-400 tw-text-white hover:tw-text-white tw-font-pop hover:tw-bg-sims-600 tw-px-5 tw-py-2 tw-rounded-lg">Export</a>
                    <a href="" class="tw-bg-sims-400 tw-text-white hover:tw-text-white tw-font-pop hover:tw-bg-sims-600 tw-px-5 tw-py-2 tw-rounded-lg">import</a>
                    <a href="/tambah-nilai/{{ $siswa->nis_siswa }}" class="tw-bg-sims-400 tw-text-white hover:tw-text-white  tw-font-pop hover:tw-bg-sims-600 tw-px-5 tw-py-2 tw-rounded-lg">Tambah Rekap Nilai +</a>
                </div>
            </div>
        <div x-data="{
          selected: 1,
          activeClasses: 'tw-bg-sims-400 tw-text-white',
          inactiveClasses: 'tw-bg-white tw-text-sims-400'
          }">
            <div x-show="selected === 1" class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
                <table class="tw-w-full tw-text-sm tw-text-center">
                    <thead class="tw-text-lg tw-bg-gray-100 tw-text-basic-700 tw-border-b tw-font-pop">
                        <tr class="tw-border">
                            <th scope="col" class="tw-py-3 tw-px-6">
                                Nama Mapel
                            </th>
                            <th scope="col" class="tw-py-3 tw-px-6">
                                Pengetahuan
                            </th>
                            <th scope="col" class="tw-py-3 tw-px-6">
                                Keterampilan
                            </th>
                            <th scope="col" class="tw-py-3 tw-px-6">
                                KKM
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tw-text-base text-center">
                        @foreach (collect($siswa->raport)->where('semester', 1) as $rp)
                        @foreach ($rp->NilaiMapel as $nm)
                            <tr class="tw-bg-white tw-border">
                                <th scope="row"
                                    class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                                    {{ $nm->MapelJurusan->MapelId }}
                                </th>
                                <td class="tw-py-4 tw-px-6">
                                {{ $nm->nilai_pengetahuan }}
                                </td>
                                <td class="tw-py-4 tw-px-6">
                                {{ $nm->nilai_keterampilan }}
                                </td>
                                <td class="tw-py-4 tw-px-6">
                                {{ $nm->kkm }}
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                            <th scope="row" rowspan="4" class="bg-white tw-py-2 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap tw-border">
                                Absen
                            </th>
                            <td class="tw-border">
                                Sakit (hari)
                            </td>
                            <td class="tw-border">
                                {{ $rp->sakit }}
                            </td>
                            </tr>
                            <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                                Ijin (hari)
                            </td>
                            <td class="tw-border">
                                {{ $rp->ijin }}
                            </td>
                            </tr>
                            <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                                Alpa (hari)
                            </td>
                            <td class="tw-border">
                                {{ $rp->alpa }}
                            </td>
                            </tr>
                            <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                                Jumlah (hari)
                            </td>
                            <td class="tw-border">
                                {{ $rp->sakit + $rp->ijin + $rp->alpa  }}
                            </td>
                            </tr>
                            <tr>
                            <th scope="row" rowspan="3" class="tw-bg-white tw-py-2 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap tw-border">
                                Status Akhir Tahun
                            </th>
                            <td class="tw-py-2 tw-px-6 tw-border">
                                Status Kenaikan
                            </td>
                            <td class="tw-border">
                                @if($rp->isNaik == true)
                                Naik
                                @elseif($rp->isNaik == false)
                                Tidak naik
                                @else
                                -
                                @endif
                            </td>
                            </tr>
                            <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                                Naik ke
                            </td>
                            <td class="tw-border">
                                {{ $rp->naikKelas }}
                            </td>
                            </tr>
                            <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                                Tanggal Kenaikan
                            </td>
                            <td class="tw-border">
                                {{ $rp->tgl_kenaikan }}
                            </td>
                            </tr>
                            <tr class="tw-bg-sims-500">
                            <td class="tw-py-10 tw-flex tw-justify-center tw-gap-10">
                                <div class="tw-flex tw-gap-5 tw-justify-center">
                                <a href="/edit-rekap-nilai/{{ $rp->id }}" class="tw-text-white tw-text-sm tw-bg-yellow-400 hover:tw-text-white hover:tw-bg-yellow-500 tw-rounded-lg tw-py-2 tw-px-3">
                                    <i class="fa-solid fa-pen-to-square mr-2"></i>Edit
                                </a>
                                <form action="/api/raport/delete/{{ $rp->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="show_confirm tw-text-white tw-text-sm tw-bg-red-400 hover:tw-bg-red-500 hover:tw-text-white tw-rounded-lg tw-py-2 tw-px-3">
                                    <i class="fa-solid fa-trash mr-2"></i> Delete
                                </button>
                                </form>
                                </div>
                                <div></div>
                            </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div x-show="selected === 2" class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
                <table class="tw-w-full tw-text-sm tw-text-center">
                    <thead class="tw-text-lg tw-bg-gray-100 tw-text-basic-700 tw-border-b tw-font-pop">
                        <tr class="tw-border">
                            <th scope="col" class="tw-py-3 tw-px-6">
                                Nama Mapel
                            </th>
                            <th scope="col" class="tw-py-3 tw-px-6">
                            Pengetahuan
                            </th>
                            <th scope="col" class="tw-py-3 tw-px-6">
                            Keterampilan
                            </th>
                            <th scope="col" class="tw-py-3 tw-px-6">
                            KKM
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tw-text-base text-center">
                    @foreach (collect($siswa->raport)->where('semester', 2) as $rp)
                    @foreach ($rp->NilaiMapel as $nm)
                    <tr class="tw-bg-white tw-border">
                        <th scope="row"
                            class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                            {{ $nm->MapelJurusan->MapelId }}
                        </th>
                        <td class="tw-py-4 tw-px-6">
                        {{ $nm->nilai_pengetahuan }}
                        </td>
                        <td class="tw-py-4 tw-px-6">
                        {{ $nm->nilai_keterampilan }}
                        </td>
                        <td class="tw-py-4 tw-px-6">
                        {{ $nm->kkm }}
                        </td>
                    </tr>
                    @endforeach
                        <tr>
                            <th scope="row" rowspan="4" class="bg-white tw-py-2 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap tw-border">
                            Absen
                            </th>
                            <td class="tw-border">
                            Sakit (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->sakit }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Ijin (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->ijin }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Alpa (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->alpa }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Jumlah (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->sakit + $rp->ijin + $rp->alpa  }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" rowspan="3" class="tw-bg-white tw-py-2 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap tw-border">
                            Status Akhir Tahun
                            </th>
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Status Kenaikan
                            </td>
                            <td class="tw-border">
                            @if($rp->isNaik == true)
                            Naik
                            @elseif($rp->isNaik == false)
                            Tidak naik
                            @else
                            -
                            @endif
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Naik ke
                            </td>
                            <td class="tw-border">
                            {{ $rp->naikKelas }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Tanggal Kenaikan
                            </td>
                            <td class="tw-border">
                            {{ $rp->tgl_kenaikan }}
                            </td>
                        </tr>
                        <tr class="tw-bg-sims-500">
                            <td class="tw-py-10 tw-flex tw-justify-center tw-gap-10">
                            <div class="tw-flex tw-gap-5 tw-justify-center">
                                <a href="/edit-rekap-nilai/{{ $rp->id }}" class="tw-text-white tw-text-sm tw-bg-yellow-400 hover:tw-text-white hover:tw-bg-yellow-500 tw-rounded-lg tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square mr-2"></i>Edit
                                </a>
                                <form action="/api/raport/delete/{{ $rp->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="show_confirm tw-text-white tw-text-sm tw-bg-red-400 hover:tw-bg-red-500 hover:tw-text-white tw-rounded-lg tw-py-2 tw-px-3">
                                    <i class="fa-solid fa-trash mr-2"></i> Delete
                                </button>
                            </form>
                            </div>
                            <div></div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div x-show="selected === 3" class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
                <table class="tw-w-full tw-text-sm tw-text-center">
                    <thead class="tw-text-lg tw-bg-gray-100 tw-text-basic-700 tw-border-b tw-font-pop">
                        <tr class="tw-border">
                            <th scope="col" class="tw-py-3 tw-px-6">
                                Nama Mapel
                            </th>
                            <th scope="col" class="tw-py-3 tw-px-6">
                            Pengetahuan
                            </th>
                            <th scope="col" class="tw-py-3 tw-px-6">
                            Keterampilan
                            </th>
                            <th scope="col" class="tw-py-3 tw-px-6">
                            KKM
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tw-text-base text-center">
                    @foreach (collect($siswa->raport)->where('semester', 3) as $rp)
                    @foreach ($rp->NilaiMapel as $nm)
                    <tr class="tw-bg-white tw-border">
                        <th scope="row"
                            class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                            {{ $nm->MapelJurusan->MapelId }}
                        </th>
                        <td class="tw-py-4 tw-px-6">
                        {{ $nm->nilai_pengetahuan }}
                        </td>
                        <td class="tw-py-4 tw-px-6">
                        {{ $nm->nilai_keterampilan }}
                        </td>
                        <td class="tw-py-4 tw-px-6">
                        {{ $nm->kkm }}
                        </td>
                    </tr>
                    @endforeach
                        <tr>
                            <th scope="row" rowspan="4" class="bg-white tw-py-2 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap tw-border">
                            Absen
                            </th>
                            <td class="tw-border">
                            Sakit (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->sakit }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Ijin (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->ijin }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Alpa (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->alpa }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Jumlah (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->sakit + $rp->ijin + $rp->alpa  }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" rowspan="3" class="tw-bg-white tw-py-2 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap tw-border">
                            Status Akhir Tahun
                            </th>
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Status Kenaikan
                            </td>
                            <td class="tw-border">
                            Naik
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Naik ke
                            </td>
                            <td class="tw-border">
                            {{ $rp->naikKelas }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Tanggal Kenaikan
                            </td>
                            <td class="tw-border">
                            {{ $rp->tgl_kenaikan }}
                            </td>
                        </tr>
                        <tr class="tw-bg-sims-500">
                            <td class="tw-py-10 tw-flex tw-justify-center tw-gap-10">
                            <div class="tw-flex tw-gap-5 tw-justify-center">
                                <a href="/edit-rekap-nilai/{{ $rp->id }}" class="tw-text-white tw-text-sm tw-bg-yellow-400 hover:tw-text-white hover:tw-bg-yellow-500 tw-rounded-lg tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square mr-2"></i>Edit
                                </a>
                                <form action="/api/raport/delete/{{ $rp->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="show_confirm tw-text-white tw-text-sm tw-bg-red-400 hover:tw-bg-red-500 hover:tw-text-white tw-rounded-lg tw-py-2 tw-px-3">
                                    <i class="fa-solid fa-trash mr-2"></i> Delete
                                </button>
                            </form>
                            </div>
                            <div></div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div x-show="selected === 4" class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
                <table class="tw-w-full tw-text-sm tw-text-center">
                    <thead class="tw-text-lg tw-bg-gray-100 tw-text-basic-700 tw-border-b tw-font-pop">
                        <tr class="tw-border">
                            <th scope="col" class="tw-py-3 tw-px-6">
                                Nama Mapel
                            </th>
                            <th scope="col" class="tw-py-3 tw-px-6">
                            Pengetahuan
                            </th>
                            <th scope="col" class="tw-py-3 tw-px-6">
                            Keterampilan
                            </th>
                            <th scope="col" class="tw-py-3 tw-px-6">
                            KKM
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tw-text-base text-center">
                    @foreach (collect($siswa->raport)->where('semester', 4) as $rp)
                    @foreach ($rp->NilaiMapel as $nm)
                    <tr class="tw-bg-white tw-border">
                        <th scope="row"
                            class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                            {{ $nm->MapelJurusan->MapelId }}
                        </th>
                        <td class="tw-py-4 tw-px-6">
                        {{ $nm->nilai_pengetahuan }}
                        </td>
                        <td class="tw-py-4 tw-px-6">
                        {{ $nm->nilai_keterampilan }}
                        </td>
                        <td class="tw-py-4 tw-px-6">
                        {{ $nm->kkm }}
                        </td>
                    </tr>
                    @endforeach
                        <tr>
                            <th scope="row" rowspan="4" class="bg-white tw-py-2 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap tw-border">
                            Absen
                            </th>
                            <td class="tw-border">
                            Sakit (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->sakit }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Ijin (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->ijin }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Alpa (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->alpa }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Jumlah (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->sakit + $rp->ijin + $rp->alpa  }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" rowspan="3" class="tw-bg-white tw-py-2 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap tw-border">
                            Status Akhir Tahun
                            </th>
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Status Kenaikan
                            </td>
                            <td class="tw-border">
                            @if($rp->isNaik == true)
                            Naik
                            @elseif($rp->isNaik == false)
                            Tidak naik
                            @else
                            -
                            @endif
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Naik ke
                            </td>
                            <td class="tw-border">
                            {{ $rp->naikKelas }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Tanggal Kenaikan
                            </td>
                            <td class="tw-border">
                            {{ $rp->tgl_kenaikan }}
                            </td>
                        </tr>
                        <tr class="tw-bg-sims-500">
                            <td class="tw-py-10 tw-flex tw-justify-center tw-gap-10">
                            <div class="tw-flex tw-gap-5 tw-justify-center">
                                <a href="/edit-rekap-nilai/{{ $rp->id }}" class="tw-text-white tw-text-sm tw-bg-yellow-400 hover:tw-text-white hover:tw-bg-yellow-500 tw-rounded-lg tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square mr-2"></i>Edit
                                </a>
                                <form action="/api/raport/delete/{{ $rp->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="show_confirm tw-text-white tw-text-sm tw-bg-red-400 hover:tw-bg-red-500 hover:tw-text-white tw-rounded-lg tw-py-2 tw-px-3">
                                    <i class="fa-solid fa-trash mr-2"></i> Delete
                                </button>
                            </form>
                            </div>
                            <div></div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div x-show="selected === 5" class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
                <table class="tw-w-full tw-text-sm tw-text-center">
                    <thead class="tw-text-lg tw-bg-gray-100 tw-text-basic-700 tw-border-b tw-font-pop">
                        <tr class="tw-border">
                            <th scope="col" class="tw-py-3 tw-px-6">
                                Nama Mapel
                            </th>
                            <th scope="col" class="tw-py-3 tw-px-6">
                            Pengetahuan
                            </th>
                            <th scope="col" class="tw-py-3 tw-px-6">
                            Keterampilan
                            </th>
                            <th scope="col" class="tw-py-3 tw-px-6">
                            KKM
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tw-text-base text-center">
                    @foreach (collect($siswa->raport)->where('semester', 5) as $rp)
                    @foreach ($rp->NilaiMapel as $nm)
                    <tr class="tw-bg-white tw-border">
                        <th scope="row"
                            class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                            {{ $nm->MapelJurusan->MapelId }}
                        </th>
                        <td class="tw-py-4 tw-px-6">
                        {{ $nm->nilai_pengetahuan }}
                        </td>
                        <td class="tw-py-4 tw-px-6">
                        {{ $nm->nilai_keterampilan }}
                        </td>
                        <td class="tw-py-4 tw-px-6">
                        {{ $nm->kkm }}
                        </td>
                    </tr>
                    @endforeach
                        <tr>
                            <th scope="row" rowspan="4" class="bg-white tw-py-2 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap tw-border">
                            Absen
                            </th>
                            <td class="tw-border">
                            Sakit (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->sakit }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Ijin (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->ijin }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Alpa (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->alpa }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Jumlah (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->sakit + $rp->ijin + $rp->alpa  }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" rowspan="3" class="tw-bg-white tw-py-2 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap tw-border">
                            Status Akhir Tahun
                            </th>
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Status Kenaikan
                            </td>
                            <td class="tw-border">
                            @if($rp->isNaik == true)
                            Naik
                            @elseif($rp->isNaik == false)
                            Tidak naik
                            @else
                            -
                            @endif
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Naik ke
                            </td>
                            <td class="tw-border">
                            {{ $rp->naikKelas }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Tanggal Kenaikan
                            </td>
                            <td class="tw-border">
                            {{ $rp->tgl_kenaikan }}
                            </td>
                        </tr>
                        <tr class="tw-bg-sims-500">
                            <td class="tw-py-10 tw-flex tw-justify-center tw-gap-10">
                            <div class="tw-flex tw-gap-5 tw-justify-center">
                                <a href="/edit-rekap-nilai/{{ $rp->id }}" class="tw-text-white tw-text-sm tw-bg-yellow-400 hover:tw-text-white hover:tw-bg-yellow-500 tw-rounded-lg tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square mr-2"></i>Edit
                                </a>
                                <form action="/api/raport/delete/{{ $rp->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="show_confirm tw-text-white tw-text-sm tw-bg-red-400 hover:tw-bg-red-500 hover:tw-text-white tw-rounded-lg tw-py-2 tw-px-3">
                                    <i class="fa-solid fa-trash mr-2"></i> Delete
                                </button>
                            </form>
                            </div>
                            <div></div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div x-show="selected === 6" class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
                <table class="tw-w-full tw-text-sm tw-text-center">
                    <thead class="tw-text-lg tw-bg-gray-100 tw-text-basic-700 tw-border-b tw-font-pop">
                        <tr class="tw-border">
                            <th scope="col" rowspan="2" class="tw-py-3 tw-px-6">
                                Nama Mapel
                            </th>
                            <th scope="col" rowspan="2" class="tw-py-3 tw-px-6">
                            Pengetahuan
                            </th>
                            <th scope="col" rowspan="2" class="tw-py-3 tw-px-6">
                            Keterampilan
                            </th>
                            <th scope="col" rowspan="2" class="tw-py-3 tw-px-6">
                            KKM
                            </th>
                            <th scope="col" colspan="2" class="tw-py-3 tw-px-6">
                            US
                            </th>
                            <th scope="col" colspan="2" class="tw-py-3 tw-px-6">
                            UKK
                            </th>
                        </tr>
                        <tr class="tw-border">
                        <th class="tw-border tw-py-3 tw-px-6">T</th>
                        <th class="tw-border tw-py-3 tw-px-6">P</th>
                        <th class="tw-border tw-py-3 tw-px-6">T</th>
                        <th class="tw-border tw-py-3 tw-px-6">P</th>
                        </tr>
                    </thead>
                    <tbody class="tw-text-base text-center">
                    @foreach (collect($siswa->raport)->where('semester', 6) as $rp)
                    @foreach ($rp->NilaiMapel as $nm)
                        <tr class="tw-bg-white tw-border">
                            <th scope="row"
                                class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                                {{ $nm->MapelJurusan->MapelId }}
                            </th>
                            <td class="tw-py-4 tw-px-6">
                                {{ $nm->kkm }}
                            </td>
                            <td class="tw-py-4 tw-px-6">
                                {{ $nm->nilai_pengetahuan }}
                            </td>
                            <td class="tw-py-4 tw-px-6">
                                {{ $nm->nilai_keterampilan }}
                            </td>
                            <td class="tw-py-4 tw-px-6">
                            {{ $nm->nilai_us_teori }}
                            </td>
                            <td class="tw-py-4 tw-px-6">
                            {{ $nm->nilai_us_praktek }}
                            </td>
                            <td class="tw-py-4 tw-px-6">
                            {{ $nm->nilai_ukk_teori }}
                            </td>
                            <td class="tw-py-4 tw-px-6">
                            {{ $nm->nilai_ukk_praktek }}
                            </td>
                        </tr>
                    @endforeach
                        <tr>
                            <th scope="row" rowspan="4" class="bg-white tw-py-2 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap tw-border">
                            Absen
                            </th>
                            <td class="tw-border">
                            Sakit (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->sakit }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Ijin (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->ijin }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Alpa (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->alpa }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Jumlah (hari)
                            </td>
                            <td class="tw-border">
                            {{ $rp->sakit + $rp->ijin + $rp->alpa  }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" rowspan="3" class="tw-bg-white tw-py-2 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap tw-border">
                            Status Akhir Tahun
                            </th>
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Status Kenaikan
                            </td>
                            <td class="tw-border">
                            @if($rp->isNaik == true)
                            Naik
                            @elseif($rp->isNaik == false)
                            Tidak naik
                            @else
                            -
                            @endif
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Naik ke
                            </td>
                            <td class="tw-border">
                            {{ $rp->naikKelas }}
                            </td>
                        </tr>
                        <tr class="tw-bg-gray-100">
                            <td class="tw-py-2 tw-px-6 tw-border">
                            Tanggal Kenaikan
                            </td>
                            <td class="tw-border">
                            {{ $rp->tgl_kenaikan }}
                            </td>
                        </tr>
                        <tr class="tw-bg-sims-500">
                            <td class="tw-py-10 tw-flex tw-justify-center tw-gap-10">
                            <div class="tw-flex tw-gap-5 tw-justify-center">
                                <a href="/edit-rekap-nilai/{{ $rp->id }}" class="tw-text-white tw-text-sm tw-bg-yellow-400 hover:tw-text-white hover:tw-bg-yellow-500 tw-rounded-lg tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square mr-2"></i>Edit
                                </a>
                                <form action="/api/raport/delete/{{ $rp->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="show_confirm tw-text-white tw-text-sm tw-bg-red-400 hover:tw-bg-red-500 hover:tw-text-white tw-rounded-lg tw-py-2 tw-px-3">
                                    <i class="fa-solid fa-trash mr-2"></i> Delete
                                </button>
                            </form>
                            </div>
                            <div></div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tw-text-center tw-font-medium tw-mt-8 tw-mb-3 tw-text-gray-500 tw-font-pop tw-text-xl">SEMESTER</div>
            <div class="tw-flex tw-justify-center tw-gap-4 tw-mb-8">
                <a x-on:click="selected = 1"
                    :class="selected === 1 ? activeClasses : inactiveClasses" href="#"
                    class="tw-rounded-lg tw-font-semibold tw-text-lg tw-py-2 tw-px-5 tw-shadow-md hover:tw-bg-sims-400 hover:tw-text-white">1</a>
                <a x-on:click="selected = 2"
                    :class="selected === 2 ? activeClasses : inactiveClasses" href="#"
                    class="tw-rounded-lg tw-font-semibold tw-text-lg tw-py-2 tw-px-5 tw-shadow-md hover:tw-bg-sims-400 hover:tw-text-white">2</a>
                <a x-on:click="selected = 3"
                    :class="selected === 3 ? activeClasses : inactiveClasses" href="#"
                    class="tw-rounded-lg tw-font-semibold tw-text-lg tw-py-2 tw-px-5 tw-shadow-md hover:tw-bg-sims-400 hover:tw-text-white">3</a>
                <a x-on:click="selected = 4"
                    :class="selected === 4 ? activeClasses : inactiveClasses" href="#"
                    class="tw-rounded-lg tw-font-semibold tw-text-lg tw-py-2 tw-px-5 tw-shadow-md hover:tw-bg-sims-400 hover:tw-text-white">4</a>
                <a x-on:click="selected = 5"
                    :class="selected === 5 ? activeClasses : inactiveClasses" href="#"
                    class="tw-rounded-lg tw-font-semibold tw-text-lg tw-py-2 tw-px-5 tw-shadow-md hover:tw-bg-sims-400 hover:tw-text-white">5</a>
                <a x-on:click="selected = 6"
                    :class="selected === 6 ? activeClasses : inactiveClasses" href="#"
                    class="tw-rounded-lg tw-font-semibold tw-text-lg tw-py-2 tw-px-5 tw-shadow-md hover:tw-bg-sims-400 hover:tw-text-white">6</a>
            </div>
        </div>
    </div>

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
 
      $('.show_confirm').click(function(event) {
           var form =  $(this).closest("form");
           var name = $(this).data("name");
           event.preventDefault();
           swal({
               title: `Hapus data rekap nilai?`,
               icon: "warning",
               buttons: true,
               dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
               form.submit();
             }
           });
       });
   
 </script>
@endsection