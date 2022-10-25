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

        <div x-data="{openTab: 1, activeClasses: 'tw-bg-white tw-border tw-border-b-white', inactiveClasses: 'tw-bg-gray-200 tw-border'}">
            <ul class="tw-my-2 tw-pt-4 tw-px-8 tw-flex tw-font-ubuntu tw-text-xl">
                <li @click="openTab = 1" :class="{ 'tw--mb-px': openTab === 1 }">
                    <button :class="openTab === 1 ? activeClasses : inactiveClasses"
                        class="tw-rounded-t-2xl tw-text-gray-500 hover:tw-text-admin-800 tw-inline-block tw-py-2 tw-px-10 tw-font-semibold"
                        href="#">
                        Semester 1
                    </button>
                </li>
                <li @click="openTab = 2" :class="{ 'tw--mb-px': openTab === 2 }">
                    <button :class="openTab === 2 ? activeClasses : inactiveClasses"
                        class="tw-rounded-t-2xl tw-text-gray-500 hover:tw-text-admin-800 tw-inline-block tw-py-2 tw-px-10 tw-font-semibold"
                        href="#">
                        Semester 2
                    </button>
                </li>
                <li @click="openTab = 3" :class="{ 'tw--mb-px': openTab === 3 }">
                    <button :class="openTab === 3 ? activeClasses : inactiveClasses"
                        class="tw-rounded-t-2xl tw-text-gray-500 hover:tw-text-admin-800 tw-inline-block tw-py-2 tw-px-10 tw-font-semibold"
                        href="#">
                        Semester 3
                    </button>
                </li>
                <li @click="openTab = 4" :class="{ 'tw--mb-px': openTab === 4 }">
                    <button :class="openTab === 4 ? activeClasses : inactiveClasses"
                        class="tw-rounded-t-2xl tw-text-gray-500 hover:tw-text-admin-800 tw-inline-block tw-py-2 tw-px-10 tw-font-semibold"
                        href="#">
                        Semester 4
                    </button>
                </li>
                <li @click="openTab = 5" :class="{ 'tw--mb-px': openTab === 4 }">
                    <button :class="openTab === 5 ? activeClasses : inactiveClasses"
                        class="tw-rounded-t-2xl tw-text-gray-500 hover:tw-text-admin-800 tw-inline-block tw-py-2 tw-px-10 tw-font-semibold"
                        href="#">
                        Semester 5
                    </button>
                </li>
                <li @click="openTab = 6" :class="{ 'tw--mb-px': openTab === 4 }">
                    <button :class="openTab === 6 ? activeClasses : inactiveClasses"
                        class="tw-rounded-t-2xl tw-text-gray-500 hover:tw-text-admin-800 tw-inline-block tw-py-2 tw-px-10 tw-font-semibold"
                        href="#">
                        Semester 6
                    </button>
                </li>
            </ul>
            <div x-show="openTab === 1"
                class="tw-my-2 tw-py-4 tw-px-8 tw-text-admin-600 tw-flex tw-justify-center tw-font-ubuntu tw-rounded-xl tw-shadow-md">
                <table class="tw-w-full tw-table-auto">
                    <tbody>
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
                        <tr  class="tw-border-b">
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
                        <tr>
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
                    </tbody>
                </table>
                <table class="tw-w-full tw-table-auto tw-ml-32">
                    <tbody>
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
            <div x-show="openTab === 2"
                class="tw-my-2 tw-py-4 tw-px-8 tw-text-admin-600 tw-flex tw-justify-center tw-font-ubuntu tw-rounded-xl tw-shadow-md">
                <table class="tw-w-full tw-table-auto">
                    <tbody>
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
                        <tr  class="tw-border-b">
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
                        <tr>
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
                    </tbody>
                </table>
                <table class="tw-w-full tw-table-auto tw-ml-32">
                    <tbody>
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
            <div x-show="openTab === 3"
                class="tw-my-2 tw-py-4 tw-px-8 tw-text-admin-600 tw-flex tw-justify-center tw-font-ubuntu tw-rounded-xl tw-shadow-md">
                <table class="tw-w-full tw-table-auto">
                    <tbody>
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
                        <tr  class="tw-border-b">
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
                        <tr>
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
                    </tbody>
                </table>
                <table class="tw-w-full tw-table-auto tw-ml-32">
                    <tbody>
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
            <div x-show="openTab === 4"
                class="tw-my-2 tw-py-4 tw-px-8 tw-text-admin-600 tw-flex tw-justify-center tw-font-ubuntu tw-rounded-xl tw-shadow-md">
                <table class="tw-w-full tw-table-auto">
                    <tbody>
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
                        <tr  class="tw-border-b">
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
                        <tr>
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
                    </tbody>
                </table>
                <table class="tw-w-full tw-table-auto tw-ml-32">
                    <tbody>
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
            <div x-show="openTab === 5"
                class="tw-my-2 tw-py-4 tw-px-8 tw-text-admin-600 tw-flex tw-justify-center tw-font-ubuntu tw-rounded-xl tw-shadow-md">
                <table class="tw-w-full tw-table-auto">
                    <tbody>
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
                        <tr  class="tw-border-b">
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
                        <tr>
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
                    </tbody>
                </table>
                <table class="tw-w-full tw-table-auto tw-ml-32">
                    <tbody>
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
            <div x-show="openTab === 6"
                class="tw-my-2 tw-py-4 tw-px-8 tw-text-admin-600 tw-flex tw-justify-center tw-font-ubuntu tw-rounded-xl tw-shadow-md">
                <table class="tw-w-full tw-table-auto">
                    <tbody>
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
                        <tr  class="tw-border-b">
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
                        <tr>
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
                    </tbody>
                </table>
                <table class="tw-w-full tw-table-auto tw-ml-32">
                    <tbody>
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
        </div>

        <div class="tw-mt-5 tw-flex tw-gap-4 tw-justify-end tw-font-ubuntu tw-pb-10">
            <a href="/edit-rapor"
                class="tw-bg-[#FFCF86] hover:tw-bg-[#ffba51] tw-text-black tw-px-7 tw-py-3 tw-rounded-lg">
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
