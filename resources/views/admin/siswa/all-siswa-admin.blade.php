@extends('layouts.admin')

@section('content')

<div class="tw-mx-10 tw-w-full">
    <div class="tw-flex tw-justify-between tw-gap-5 tw-mt-8">
        <div class="tw-flex">
            <i class="fa-solid fa-users tw-text-2xl tw-mt-3 tw-mb-6 tw-text-[#95BBE8]"></i>
            <h4 class="tw-font-pop tw-font-bold tw-mt-4 tw-mb-6 tw-ml-4 tw-text-[#DBDBDB]">Data All Siswa</h4>
        </div>
    </div>
    <div class="tw-flex tw-justify-between">
        <form action=""> 
            <div class="relative tw-border-2 tw-rounded-lg focus:tw-ring-sims-400">
                <input type="text" class="tw-px-5 tw-border-none tw-rounded-md">
                <a href="#"><i class="fa-solid fa-magnifying-glass tw-pr-3 tw-pl-3 tw-text-xl tw-rounded-md tw-text-white tw-bg-[#95BBE8]"></i></a> 
            </div>
        </form>
        <div class="">
                <a href="#" class="tw-text-lg tw-px-3 tw-py-1 tw-mx-2 tw-text-white tw-bg-sims-400 hover:tw-bg-[#3b7a7a] tw-border tw-rounded-lg tw-font-pop">Add New Siswa
                    <i class="tw-ml-1 fa-solid fa-square-plus" ></i>
                </a>
        </div>
    </div>

        <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl tw-mt-5">
            <table id="KelasTable" class="tw-w-full tw-text-sm tw-text-center">
                <thead class="tw-text-sm tw-bg-gray-100 tw-text-[#5A6C7C] tw-border tw-font-pop">
                    <tr>
                        <th scope="col" class="tw-py-2 tw-px-6 tw-border-r">NIS</th>
                        <th scope="col" class="tw-py-2 tw-px-6 tw-border-r">NISN</th>
                        <th scope="col" class="tw-py-2 tw-px-6 tw-border-r">NAMA</th>
                        <th scope="col" class="tw-py-2 tw-px-6 tw-border-r">KELAS</th>
                        <th scope="col" class="tw-py-2 tw-px-6 tw-border-r">NOMOR TELEPON</th>
                        <th scope="col" class="tw-py-2 tw-px-6 tw-border-r">AGAMA</th>
                        <th scope="col" class="tw-py-2 tw-px-6 tw-border-r">JENIS KELAMIN</th>
                        <th scope="col" class="tw-py-2 tw-px-6 tw-border-r">CREATED</th>
                        <th scope="col" class="tw-py-2 tw-px-6">ACTION</th>
                    </tr>
                </thead>
                <tbody class="tw-text-sm">
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">1234567890</td>
                        <td class="tw-py-4 tw-px-6 tw-border">1122334455</td>
                        <td class="tw-py-4 tw-px-6 tw-border">Robertinus Stalinus</td>
                        <td class="tw-py-4 tw-px-6 tw-border">X PPLG 1</td>
                        <td class="tw-py-4 tw-px-6 tw-border">088808880888</td>
                        <td class="tw-py-4 tw-px-6 tw-border">Hellenisme</td>
                        <td class="tw-py-4 tw-px-6 tw-border">L</td>
                        <td class="tw-py-4 tw-px-6 tw-border">32 Oktober 1999</td>
                        <td class="tw-py-2 tw-px-4 tw-border">
                            <a href="#"
                                class="tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square tw-text-yellow-400"></i>
                            </a>
                            <a href="#"
                                class="tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-trash-can-xmark tw-text-red-500"></i>
                            </a>
                            <a href="#"
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