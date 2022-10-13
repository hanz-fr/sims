@extends('layouts.admin')

@section('content')
    <div class="tw-mx-10 tw-w-screen">
        <div class="tw-flex tw-mt-8">
            <a href="/mata-pelajaran-jurusan">
                <i class="fa-solid fa-chevron-left tw-text-2xl tw-text-gray-300 hover:tw-text-gray-600"></i>
            </a>
            <div class="tw-text-2xl tw-ml-3 tw-font-pop tw-font-semibold tw-text-gray-300">Detail Mata Pelajaran Jurusan
            </div>
        </div>

        <div class="tw-rounded-xl tw-font-ubuntu tw-overflow-hidden tw-shadow-md tw-mt-14">
            <div class="tw-flex tw-bg-[#5A6C7C] tw-py-8 tw-pl-8">
                <div class="tw-flex tw-text-slate-400 tw-mr-8 tw-p-5 tw-bg-white tw-rounded-xl">
                    <img src="{{ url('https://www.smkn11bdg.sch.id/src/images/11.png') }}" alt=""
                        class="tw-w-32 tw-rounded-xl">
                </div>
                <div class="tw-flex tw-flex-col tw-text-white">
                    <span class="tw-font-thin">
                        Nama Mapel:
                    </span>
                    <span class="tw-font-bold tw-text-2xl">
                        Pemrograman Berorientasi Objek
                    </span>
                    <span class="tw-font-thin tw-mt-3">
                        Jurusan:
                    </span>
                    <span class="tw-font-bold tw-text-2xl">
                        Pengembangan Perangkat Lunak dan Gim
                    </span>
                </div>
            </div>
            <div class="tw-text-admin-400 tw-flex-col tw-bg-white tw-px-10 tw-py-12">
                {{-- <h1 class="tw-flex tw-font-bold tw-mb-4 tw-text-2xl">Deskripsi</h1>
                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis quam vitae commodo accumsan.
                    Maecenas iaculis faucibus ligula, id dignissim ipsum hendrerit eget. Sed sit amet pharetra dolor. Donec
                    eget luctus ante, et finibus augue. Nullam elit leo, accumsan et eros nec, scelerisque sollicitudin
                    lectus. Aliquam erat volutpat. Fusce dignissim nisi velit, quis egestas nunc tincidunt ut. Phasellus
                    consectetur massa et quam hendrerit porta sit amet eu turpis. Duis sollicitudin massa ullamcorper nunc
                    cursus, nec sodales arcu euismod. Nunc sodales velit vitae massa fringilla euismod sed sed tellus.
                    Suspendisse vulputate felis velit, in iaculis neque semper nec.
                </span> --}}
                <div class="tw-mt-20">
                    <p class="tw-font-bold">Created: <span class="tw-font-thin">10 Oktober 2023, 09:00</span> </p>
                    <p class="tw-font-bold">Updated: <span class="tw-font-thin">27 January 2024, 23:44</span> </p>
                </div>
            </div>
        </div>

        <div class="tw-my-10 tw-flex tw-gap-4 tw-justify-end tw-font-ubuntu">
            <a href="/edit-mata-pelajaran-jurusan"
                class="tw-bg-[#FFCF86] hover:tw-bg-[#ffba51] tw-text-white tw-px-7 tw-py-3 tw-rounded-lg">
                Edit Mapel Jurusan
            </a>
            <form action="" class="tw-inline-flex">
                <a href="" class="tw-bg-[#FF7575] hover:tw-bg-salmon-600 tw-px-7 tw-py-3  tw-text-white tw-rounded-lg">
                    Delete Mapel Jurusan
                </a>
            </form>
        </div>
    </div>
@endsection
