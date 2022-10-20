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
            <div class="tw-flex tw-bg-[#5A6C7C] ">
                <div class="tw-flex tw-text-slate-400 tw-mr-8 tw-m-0 tw-bg-none">
                    <img src="{{ asset('/foto/633abb3763a14nekopara.gif') }}" alt=""
                        class="tw-w-52 tw-object-contain">
                </div>
                <div class="tw-flex tw-flex-col tw-text-white tw-py-8 tw-px-8">
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
        </div>
        <div class="tw-my-2 tw-py-8 tw-px-8 tw-text-admin-600 tw-flex tw-justify-center tw-font-ubuntu tw-rounded-xl tw-shadow-md">
            <table class="tw-w-full tw-table-auto">
                <tbody>
                    <tr class="tw-border-b">
                        <td class="tw-p-2 tw-font-bold tw-text-2xl">
                            Semester
                        </td>
                        <td class="tw-text-xl">
                            :
                        </td>
                        <td class="tw-p-2 tw-text-xl tw-font-medium tw-text-right">
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
                        <td class="tw-p-2 tw-text-xl tw-font-medium tw-text-right">
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
                        <td class="tw-p-2 tw-text-xl tw-font-medium tw-text-right">
                            0
                        </td>
                    </tr>
                    <tr>
                        <td class="tw-p-2 tw-font-bold tw-text-2xl">
                            Izin
                        </td>
                        <td class="tw-text-xl">
                            :
                        </td>
                        <td class="tw-p-2 tw-text-xl tw-font-medium tw-text-right">
                            &infin;
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="tw-w-full tw-table-auto tw-ml-32">
                <tbody>
                    <tr class="tw-border-b">
                        <td class="tw-p-2 tw-font-bold tw-text-2xl">
                            Alpa
                        </td>
                        <td class="tw-text-xl">
                            :
                        </td>
                        <td class="tw-p-2 tw-text-xl tw-font-medium tw-text-right">
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
                        <td class="tw-p-2 tw-text-xl tw-font-medium tw-text-right">
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
                        <td class="tw-p-2 tw-text-xl tw-font-medium tw-text-right">
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
                        <td class="tw-p-2 tw-text-xl tw-font-medium tw-text-right">
                            16 Juli 2024
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tw-mt-5 tw-flex tw-gap-4 tw-justify-end tw-font-ubuntu tw-pb-10">
            <a href="/edit-rapor" class="tw-bg-[#FFCF86] hover:tw-bg-[#ffba51] tw-text-black tw-px-7 tw-py-3 tw-rounded-lg">
                Edit Rapor
            </a>
            <form action="post" class="tw-inline-flex">
                @method('delete')
                <a href=""
                    class="tw-bg-[#FF7575] hover:tw-bg-salmon-600 tw-px-7 tw-py-3  tw-text-white tw-rounded-lg">
                    Delete
                </a>
            </form>
        </div>
    </div>
@endsection
