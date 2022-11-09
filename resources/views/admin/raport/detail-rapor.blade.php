@extends('layouts.admin')

@section('content')
    <div class="tw-mx-10 tw-w-screen">
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
                    <img src="{{ asset('/foto/63359448821a7pp.jpg') }}" alt=""
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
            <ul class="tw-mt-2 tw-pt-4 tw-px-8 tw-flex tw-font-ubuntu tw-text-xl">
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
                class="tw-py-6 tw-px-8 tw-text-admin-600 tw-grid tw-gap-x-2 tw-gap-y-4 tw-grid-cols-2 tw-justify-center tw-font-ubuntu tw-rounded-xl tw-shadow-md">
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Tahun Ajaran:</p>
                    <p class="tw-font-medium tw-text-xl">2023-2024</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Sakit:</p>
                    <p class="tw-font-medium tw-text-xl">0</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Izin:</p>
                    <p class="tw-font-medium tw-text-xl">&infin;</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Alpa:</p>
                    <p class="tw-font-medium tw-text-xl">2</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Status Kenaikan:</p>
                    <p class="tw-font-medium tw-text-xl">Naik Kelas</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Naik ke Kelas:</p>
                    <p class="tw-font-medium tw-text-xl">XIV PPLG 7</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Tanggal Kenaikan:</p>
                    <p class="tw-font-medium tw-text-xl">16 Juli 2077</p>
                </div>
            </div>
            <div x-show="openTab === 2"
                class="tw-py-6 tw-px-8 tw-text-admin-600 tw-grid tw-gap-x-2 tw-gap-y-4 tw-grid-cols-2 tw-justify-center tw-font-ubuntu tw-rounded-xl tw-shadow-md">
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Tahun Ajaran:</p>
                    <p class="tw-font-medium tw-text-xl">2023-2024</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Sakit:</p>
                    <p class="tw-font-medium tw-text-xl">0</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Izin:</p>
                    <p class="tw-font-medium tw-text-xl">&infin;</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Alpa:</p>
                    <p class="tw-font-medium tw-text-xl">2</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Status Kenaikan:</p>
                    <p class="tw-font-medium tw-text-xl">Naik Kelas</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Naik ke Kelas:</p>
                    <p class="tw-font-medium tw-text-xl">XIV PPLG 7</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Tanggal Kenaikan:</p>
                    <p class="tw-font-medium tw-text-xl">16 Juli 2077</p>
                </div>
            </div>
            <div x-show="openTab === 3"
                class="tw-py-6 tw-px-8 tw-text-admin-600 tw-grid tw-gap-x-2 tw-gap-y-4 tw-grid-cols-2 tw-justify-center tw-font-ubuntu tw-rounded-xl tw-shadow-md">
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Tahun Ajaran:</p>
                    <p class="tw-font-medium tw-text-xl">2023-2024</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Sakit:</p>
                    <p class="tw-font-medium tw-text-xl">0</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Izin:</p>
                    <p class="tw-font-medium tw-text-xl">&infin;</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Alpa:</p>
                    <p class="tw-font-medium tw-text-xl">2</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Status Kenaikan:</p>
                    <p class="tw-font-medium tw-text-xl">Naik Kelas</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Naik ke Kelas:</p>
                    <p class="tw-font-medium tw-text-xl">XIV PPLG 7</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Tanggal Kenaikan:</p>
                    <p class="tw-font-medium tw-text-xl">16 Juli 2077</p>
                </div>
            </div>
            <div x-show="openTab === 4"
                class="tw-py-6 tw-px-8 tw-text-admin-600 tw-grid tw-gap-x-2 tw-gap-y-4 tw-grid-cols-2 tw-justify-center tw-font-ubuntu tw-rounded-xl tw-shadow-md">
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Tahun Ajaran:</p>
                    <p class="tw-font-medium tw-text-xl">2023-2024</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Sakit:</p>
                    <p class="tw-font-medium tw-text-xl">0</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Izin:</p>
                    <p class="tw-font-medium tw-text-xl">&infin;</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Alpa:</p>
                    <p class="tw-font-medium tw-text-xl">2</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Status Kenaikan:</p>
                    <p class="tw-font-medium tw-text-xl">Naik Kelas</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Naik ke Kelas:</p>
                    <p class="tw-font-medium tw-text-xl">XIV PPLG 7</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Tanggal Kenaikan:</p>
                    <p class="tw-font-medium tw-text-xl">16 Juli 2077</p>
                </div>
            </div>
            <div x-show="openTab === 5"
                class="tw-py-6 tw-px-8 tw-text-admin-600 tw-grid tw-gap-x-2 tw-gap-y-4 tw-grid-cols-2 tw-justify-center tw-font-ubuntu tw-rounded-xl tw-shadow-md">
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Tahun Ajaran:</p>
                    <p class="tw-font-medium tw-text-xl">2023-2024</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Sakit:</p>
                    <p class="tw-font-medium tw-text-xl">0</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Izin:</p>
                    <p class="tw-font-medium tw-text-xl">&infin;</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Alpa:</p>
                    <p class="tw-font-medium tw-text-xl">2</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Status Kenaikan:</p>
                    <p class="tw-font-medium tw-text-xl">Naik Kelas</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Naik ke Kelas:</p>
                    <p class="tw-font-medium tw-text-xl">XIV PPLG 7</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Tanggal Kenaikan:</p>
                    <p class="tw-font-medium tw-text-xl">16 Juli 2077</p>
                </div>
            </div>
            <div x-show="openTab === 6"
                class="tw-py-6 tw-px-8 tw-text-admin-600 tw-grid tw-gap-x-2 tw-gap-y-4 tw-grid-cols-2 tw-justify-center tw-font-ubuntu tw-rounded-xl tw-shadow-md">
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Tahun Ajaran:</p>
                    <p class="tw-font-medium tw-text-xl">2023-2024</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Sakit:</p>
                    <p class="tw-font-medium tw-text-xl">0</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Izin:</p>
                    <p class="tw-font-medium tw-text-xl">&infin;</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Alpa:</p>
                    <p class="tw-font-medium tw-text-xl">2</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Status Kenaikan:</p>
                    <p class="tw-font-medium tw-text-xl">Naik Kelas</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Naik ke Kelas:</p>
                    <p class="tw-font-medium tw-text-xl">XIV PPLG 7</p>
                </div>
                <div class="report-card-pills">
                    <p class="tw-font-bold tw-text-2xl">Tanggal Kenaikan:</p>
                    <p class="tw-font-medium tw-text-xl">16 Juli 2077</p>
                </div>
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
