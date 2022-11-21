@extends('layouts.admin')

@section('content')

<div class="tw-mx-10 tw-w-full">
    <div class="tw-flex tw-justify-between tw-gap-5 tw-mt-8">
        <section class="tw-flex tw-gap-4 tw-mb-14">
            <a href="/admin/database">
              <i class="fa-solid fa-chevron-left tw-text-gray-400 tw-text-2xl"></i>
            </a>
            <i class="fa-solid fa-user-group tw-text-admin-300 tw-text-2xl"></i>
            <div class="tw-text-2xl tw-font-pop tw-font-semibold tw-text-gray-300">Siswa</div>
        </section>
    </div>
    <div class="tw-flex tw-justify-between">
        <div class="tw-flex tw-mb-5">
            <input type="text" class="tw-px-4 tw-rounded-xl tw-border tw-border-gray-300 focus:tw-shadow-sm focus:tw-shadow-admin-300 focus:tw-border-admin-300 focus:tw-outline-none tw-py-2 tw-w-80">
            <button class="tw-px-5 -tw-ml-4 tw-rounded-xl tw-text-white tw-bg-admin-300">
              <i class="fa-regular fa-magnifying-glass"></i>
            </button>
         </div>
        <a href="/admin/mutasi/create" class="tw-bg-admin-300 hover:tw-bg-admin-400 tw-text-white tw-font-ubuntu tw-py-2.5 tw-text-sm tw-px-6 tw-rounded-lg tw-h-fit tw-items-center tw-flex"><i class="fa-regular fa-square-plus tw-mr-4 tw-text-xl"></i>Add New Siswa</a>
    </div>

        <div class="tw-overflow-x-auto tw-relative tw-mt-5">
            <table id="KelasTable" class="tw-w-full tw-text-sm tw-text-center">
                <thead class="tw-text-sm tw-bg-[#5A6C7C] tw-text-white tw-font-ubuntu">
                    <tr>
                        <th scope="col" class="tw-py-3 tw-px-6">NIS</th>
                        <th scope="col" class="tw-py-3 tw-px-6">NISN</th>
                        <th scope="col" class="tw-py-3 tw-px-6">NAMA</th>
                        <th scope="col" class="tw-py-3 tw-px-6">KELAS</th>
                        <th scope="col" class="tw-py-3 tw-px-6">NOMOR TELEPON</th>
                        <th scope="col" class="tw-py-3 tw-px-6">AGAMA</th>
                        <th scope="col" class="tw-py-3 tw-px-6">JENIS KELAMIN</th>
                        <th scope="col" class="tw-py-3 tw-px-6">CREATED</th>
                        <th scope="col" class="tw-py-3 tw-px-6">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="tw-bg-white tw-text-silver-500">
                        <td class="tw-py-5 tw-px-6">1234567890</td>
                        <td class="tw-py-5 tw-px-6">1122334455</td>
                        <td class="tw-py-5 tw-px-6">Robertinus Stalinus</td>
                        <td class="tw-py-5 tw-px-6">X PPLG 1</td>
                        <td class="tw-py-5 tw-px-6">088808880888</td>
                        <td class="tw-py-5 tw-px-6">Hellenisme</td>
                        <td class="tw-py-5 tw-px-6">L</td>
                        <td class="tw-py-5 tw-px-6">32 Oktober 1999</td>
                        <td class="tw-py-2 tw-px-4">
                            <a href="#"
                                class="tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square tw-text-yellow-400"></i>
                            </a>
                            <a href="#"
                                class="tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-trash-can-xmark tw-text-red-500"></i>
                            </a>
                            <a href="/admin/siswa-detail"
                                class="tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-eye tw-text-[#95BBE8]"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="tw-bg-white tw-text-silver-500">
                        <td class="tw-py-5 tw-px-6">1234567890</td>
                        <td class="tw-py-5 tw-px-6">1122334455</td>
                        <td class="tw-py-5 tw-px-6">Robertinus Stalinus</td>
                        <td class="tw-py-5 tw-px-6">X PPLG 1</td>
                        <td class="tw-py-5 tw-px-6">088808880888</td>
                        <td class="tw-py-5 tw-px-6">Hellenisme</td>
                        <td class="tw-py-5 tw-px-6">L</td>
                        <td class="tw-py-5 tw-px-6">32 Oktober 1999</td>
                        <td class="tw-py-2 tw-px-4">
                            <a href="#"
                                class="tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square tw-text-yellow-400"></i>
                            </a>
                            <a href="#"
                                class="tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-trash-can-xmark tw-text-red-500"></i>
                            </a>
                            <a href="/admin/siswa-detail"
                                class="tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-eye tw-text-[#95BBE8]"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tw-justify-end tw-flex tw-mt-4">
            <a href="" class="tw-text-white tw-bg-[#95BBE8] hover:tw-bg-[#4a85cd] tw-text-center tw-text-md tw-font-pop tw-font-semibold tw-rounded-md tw-text-md tw-py-2 tw-px-6">Prev</a>
            <a href="" class="tw-text-white tw-bg-[#95BBE8] hover:tw-bg-[#4a85cd] tw-text-center tw-text-md tw-font-pop tw-font-semibold tw-rounded-md tw-text-md tw-py-2 tw-px-6 tw-ml-5">Next</a>
        </div>
    </div>

@endsection