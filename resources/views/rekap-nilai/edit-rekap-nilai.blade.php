@extends('layouts.main')

@section('content')

<div class="tw-m-10 tw-w-screen tw-flex">
   <div class="tw-flex tw-flex-col tw-gap-8 tw-w-full">
        <div class="tw-flex">
            <a href="/"><i class="fa-solid fa-chevron-left tw-text-2xl tw-text-gray-400 hover:tw-text-gray-600"></i></a>
            <i class="fa-solid fa-users tw-text-2xl tw-ml-2 tw-text-sims-500"></i>
            <h4 class="tw-font-pop tw-font-bold tw-ml-2 tw-text-gray-500">Edit Rekap Nilai Siswa</h4>
        </div>

        <li class="card-data-bright tw-justify-center">
            <div class="tw-flex-col tw-flex tw-px-7 tw-py-7 tw-mb-5 tw-mt-5 tw-ml-10">
                <span class="tw-font-pop tw-mx-3 tw-font-medium tw-text-slate-400">NIS</span>
                <input type="text" placeholder="NIS..." class="input-account tw-mr-32">

                <span class="tw-font-pop tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Semester</span>
                <select name="Semester" id="" class="input-account tw-px-28">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
                <option value="">4</option>
                <option value="">5</option>
                <option value="">6</option>
                </select>

                <span class="tw-font-pop tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Tahun Ajaran</span>
                <input type="text" placeholder="Tahun Ajaram..." class="input-account">
            </div>

            <div class="tw-flex-col tw-flex tw-px-7 tw-py-7 tw-mb-5 tw-mt-5 tw-ml-4">
                <span class="tw-font-pop tw-mx-3 tw-font-medium tw-text-slate-400">Sakit</span>
                <input type="text" placeholder="Jumlah Sakit..." class="input-account tw-mr-32">

                <span class="tw-font-pop tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Izin</span>
                <input type="text" placeholder="Jumlah Izin..." class="input-account">

                <span class="tw-font-pop tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Alpha</span>
                <input type="text" placeholder="Jumlah Alpha..." class="input-account">
            </div>

            <div class="tw-flex-col tw-flex tw-px-7 tw-py-7 tw-mb-5 tw-mt-5 tw-ml-4">
                <span class="tw-font-pop tw-mx-3 tw-font-lg tw-font-bold tw-text-sims-500">Apakah Siswa Naik Kelas?</span>
                <input type="text" placeholder="Naik atau Tidak Naik..." class="input-account tw-mr-32">

                <span class="tw-font-pop tw-mx-3 tw-font-lg tw-font-bold tw-mt-5 tw-text-sims-500">Naik ke Kelas</span>
                <input type="text" placeholder="Kelas..." class="input-account">

                <span class="tw-font-pop tw-mx-3 tw-font-lg tw-font-bold tw-mt-5 tw-text-sims-500">Tanggal Kenaikan</span>
                <input type="text" placeholder="Tanggal..." class="input-account">
            </div>
        </li>

        <li class="card-data-bright tw-mt-10">
            <div class="tw-flex-col tw-flex tw-px-7 tw-py-7 tw-mb-5 tw-ml-10">
                <span class="tw-font-pop tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Mapel</span>
                <select name="Mapel" id="" class="input-account tw-px-28">
                <option value="">Basis Data</option>
                <option value="">PPL</option>
                <option value="">PWPB</option>
                <option value="">PBO</option>
                <option value="">Agama</option>
                <option value="">B.Jepang</option>
                </select>
            </div>

            <div class="tw-flex-col tw-flex tw-px-7 tw-py-7 tw-mb-5 tw-mt-5 tw-ml-4">
                <span class="tw-font-pop tw-mx-3 tw-font-medium tw-text-slate-400">Nilai Pengetahuan</span>
                <input type="text" placeholder="Pengetahuan..." class="input-account tw-mr-32">

                <span class="tw-font-pop tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Nilai Keterampilan</span>
                <input type="text" placeholder="Keterampilan..." class="input-account">

                <span class="tw-font-pop tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">KKM</span>
                <input type="text" placeholder="KKM..." class="input-account">
            </div>

            <div class="tw-flex-col tw-flex tw-px-7 tw-py-7 tw-mb-5 tw-mt-5 tw-ml-4">
                <span class="tw-font-pop tw-mx-3 tw-font-medium tw-text-slate-400">Nilai US Teori</span>
                <input type="text" placeholder="Jumlah Sakit..." class="input-account tw-mr-32">

                <span class="tw-font-pop tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Nilai US Praktek</span>
                <input type="text" placeholder="Jumlah Izin..." class="input-account">

                <span class="tw-font-pop tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">AKM</span>
                <input type="text" placeholder="AKM..." class="input-account">
            </div>

            <div class="tw-flex-col tw-flex tw-px-7 tw-py-7 tw-mb-5 tw-mt-5 tw-ml-4">
                <span class="tw-font-pop tw-mx-3 tw-font-medium tw-text-slate-400">Nilai UKK Teori</span>
                <input type="text" placeholder="Nilai Teori..." class="input-account tw-mr-32">

                <span class="tw-font-pop tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Nilai UKK Praktek</span>
                <input type="text" placeholder="Nilai Praktek..." class="input-account">
            </div>
        </li>
            <div class="tw-text-end tw-mb-7">
                <a href="#" class="tw-mx-7 tw-my-3 tw-bg-green-400 hover:tw-bg-green-600 tw-rounded-xl tw-border tw-px-7 tw-py-3 tw-font-pop tw-text-slate-100 tw-font-4xl">Edit Nilai</a>
            </div>
   </div>
</div>
@endsection