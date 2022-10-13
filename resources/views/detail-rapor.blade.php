@extends('layouts.admin')

@section('content')
    <div class="tw-mx-10 tw-w-screen tw-pb-4">
        <div class="tw-flex tw-mt-8">
            <a href="/rapor">
                <i class="fa-solid fa-chevron-left tw-text-2xl tw-text-gray-300 hover:tw-text-gray-600"></i>
            </a>
            <div class="tw-text-2xl tw-ml-3 tw-font-pop tw-font-semibold tw-text-gray-300">Detail Rapor
            </div>
        </div>

        <div class="tw-rounded-xl tw-font-ubuntu tw-overflow-hidden tw-shadow-md tw-mt-14">
            <div class="tw-flex tw-bg-[#5A6C7C] tw-py-8 tw-pl-8">
                <div class="tw-flex tw-text-slate-400 tw-mr-8 tw-p-2 tw-bg-none tw-rounded-lg">
                    <img src="{{ asset('/foto/633abb3763a14nekopara.gif') }}" alt=""
                        class="tw-w-44 tw-object-contain tw-rounded-lg">
                </div>
                <div class="tw-flex tw-flex-col tw-text-white">
                    <span class="tw-font-thin">
                        Nama Siswa:
                    </span>
                    <span class="tw-font-bold tw-text-3xl">
                        Mudasir Alhamdulilah
                    </span>
                    <span class="tw-font-thin tw-mt-3">
                        NIS:
                    </span>
                    <span class="tw-font-bold tw-text-3xl">
                        20093838
                    </span>
                </div>
            </div>
            {{-- <div class="tw-mt-1">
                    <p class="tw-font-bold tw-text-xl tw-mb-4">Semester: <span class="tw-font-normal">7</span>
                    </p>
                    <p class="tw-font-bold tw-text-xl tw-mb-4">Tahun Ajaran: <span class="tw-font-normal">2023-2024</span>
                    </p>
                    <p class="tw-font-bold tw-text-xl tw-mb-4">Sakit: <span class="tw-font-normal">0</span> </p>
                    <p class="tw-font-bold tw-text-xl tw-mb-4">Izin: <span class="tw-font-normal">&infin;</span> </p>
                    <p class="tw-font-bold tw-text-xl tw-mb-4">Alpa: <span class="tw-font-normal">2</span> </p>
                    <p class="tw-font-bold tw-text-xl tw-mb-4">Status Kenaikan: <span class="tw-font-normal">Naik Kelas</span>
                    </p>
                    <p class="tw-font-bold tw-text-xl tw-mb-4">Naik ke Kelas: <span class="tw-font-normal">XIV PPLG 1</span>
                    </p>
                    <p class="tw-font-bold tw-text-xl tw-mb-4">Tanggal Kenaikan: <span class="tw-font-normal">16 Juli 2024</span>
                    </p>
                </div> --}}

        </div>
        <div class="tw-my-2 tw-p-8 tw-text-admin-600 tw-font-ubuntu tw-rounded-xl tw-shadow-md">
            <table class="tw-w-full  table-auto">
                <tbody>
                    <tr class="tw-border-b">
                        <td class="tw-p-2 tw-font-bold tw-text-2xl">
                            Semester
                        </td>
                        <td class="tw-text-xl">
                            :
                        </td>
                        <td class="tw-py-2 tw-px-0 tw-text-xl tw-font-medium">
                            7
                        </td>
                    </tr>
                    <tr class="tw-border-b">
                        <td class="tw-p-2 tw-font-bold tw-text-2xl">
                            Tahun Ajaran
                        </td>
                        <td class="tw-text-xl">
                            :
                        </td>
                        <td class="tw-py-2 tw-px-0 tw-text-xl tw-font-medium">
                            2023-2024
                        </td>
                    </tr>
                    <tr class="tw-border-b">
                        <td class="tw-p-2 tw-font-bold tw-text-2xl">
                            Sakit
                        </td>
                        <td class="tw-text-xl">
                            :
                        </td>
                        <td class="tw-py-2 tw-px-0 tw-text-xl tw-font-medium">
                            0
                        </td>
                    </tr>
                    <tr class="tw-border-b">
                        <td class="tw-p-2 tw-font-bold tw-text-2xl">
                            Izin
                        </td>
                        <td class="tw-text-xl">
                            :
                        </td>
                        <td class="tw-py-2 tw-px-0 tw-text-xl tw-font-medium">
                            &infin;
                        </td>
                    </tr>
                    <tr class="tw-border-b">
                        <td class="tw-p-2 tw-font-bold tw-text-2xl">
                            Alpa
                        </td>
                        <td class="tw-text-xl">
                            :
                        </td>
                        <td class="tw-py-2 tw-px-0 tw-text-xl tw-font-medium">
                            2
                        </td>
                    </tr>
                    <tr class="tw-border-b">
                        <td class="tw-p-2 tw-font-bold tw-text-2xl">
                            Status Kenaikan
                        </td>
                        <td class="tw-text-xl">
                            :
                        </td>
                        <td class="tw-py-2 tw-px-0 tw-text-xl tw-font-medium">
                            Naik Kelas
                        </td>
                    </tr>
                    <tr class="tw-border-b">
                        <td class="tw-p-2 tw-font-bold tw-text-2xl">
                            Naik ke Kelas
                        </td>
                        <td class="tw-text-xl">
                            :
                        </td>
                        <td class="tw-py-2 tw-px-0 tw-text-xl tw-font-medium">
                            XIV PPLG 2
                        </td>
                    </tr>
                    <tr>
                        <td class="tw-p-2 tw-font-bold tw-text-2xl">
                            Tanggal Kenaikan
                        </td>
                        <td class="tw-text-xl">
                            :
                        </td>
                        <td class="tw-py-2 tw-px-0 tw-text-xl tw-font-medium">
                            16 Juli 2024
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tw-my-10 tw-flex tw-gap-4 tw-justify-end tw-font-ubuntu tw-pb-5">
            <a href="#" class="tw-bg-[#FFCF86] hover:tw-bg-[#ffba51] tw-text-black tw-px-7 tw-py-3 tw-rounded-lg">
                Edit
            </a>
            <form action="" class="tw-inline-flex">
                <a href=""
                    class="tw-bg-[#FF7575] hover:tw-bg-salmon-600 tw-px-7 tw-py-3  tw-text-white tw-rounded-lg">
                    Hapus
                </a>
            </form>
        </div>
    </div>
@endsection
