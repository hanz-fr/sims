@extends('layouts.admin')

@section('content')

<!-- {{-- <head>
    <link rel="stylesheet" href="DataTables/datatables.min.css"/>
</head> --}} -->

<!-- {{-- <body> --}} -->
    
<div class="tw-mx-10 tw-w-screen">
    <section class="tw-flex tw-gap-4 tw-mt-8 tw-mb-14">
        <a href="/admin/database">
          <i class="fa-solid fa-chevron-left tw-text-gray-400 tw-text-2xl"></i>
        </a>
        <i class="fa-solid fa-user-group tw-text-admin-300 tw-text-2xl"></i>
        <div class="tw-text-2xl tw-font-pop tw-font-semibold tw-text-gray-300">Data Kelas</div>
    </section>
    <div class="tw-flex tw-justify-between">
        <div class="tw-flex tw-mb-5">
            <input type="text" class="tw-px-4 tw-rounded-xl tw-border tw-border-gray-300 focus:tw-shadow-sm focus:tw-shadow-admin-300 focus:tw-border-admin-300 focus:tw-outline-none tw-py-2 tw-w-80">
            <button class="tw-px-5 -tw-ml-4 tw-rounded-xl tw-text-white tw-bg-admin-300">
              <i class="fa-regular fa-magnifying-glass"></i>
            </button>
         </div>
         <div class="">
            <a href="/admin/mutasi/create" class="tw-bg-admin-300 hover:tw-bg-admin-400 tw-text-white tw-font-ubuntu tw-py-2.5 tw-text-sm tw-px-6 tw-rounded-lg tw-h-fit tw-items-center tw-flex"><i class="fa-regular fa-square-plus tw-mr-4 tw-text-xl"></i>Add New Kelas</a>
        </div>
    </div>

        <div class="tw-overflow-x-auto tw-relative tw-mt-5">
            <table id="KelasTable" class="tw-w-full tw-text-sm tw-text-center">
                <thead class="tw-text-md tw-bg-[#5A6C7C] tw-text-white tw-font-pop">
                    <tr>
                        <th scope="col" class="tw-py-3 tw-px-6">NO</th>
                        <th scope="col" class="tw-py-3 tw-px-6">KELAS</th>
                        <th scope="col" class="tw-py-3 tw-px-6">JURUSAN</th>
                        <th scope="col" class="tw-py-3 tw-px-6">ROMBEL</th>
                        <th scope="col" class="tw-py-3 tw-px-6">LENGKAP</th>
                        <th scope="col" class="tw-py-3 tw-px-6">ACTION</th>
                    </tr>
                </thead>
                <tbody class="tw-text-base tw-text-silver-500">
                    <tr class="tw-bg-white">
                        <td class="tw-py-4 tw-px-6">01</td>
                        <td class="tw-py-4 tw-px-6">X</td>
                        <td class="tw-py-4 tw-px-6">PPLG</td>
                        <td class="tw-py-4 tw-px-6">1</td>
                        <td class="tw-py-4 tw-px-6">X PPLG 1</td>
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
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">02</td>
                        <td class="tw-py-4 tw-px-6 tw-border">XI</td>
                        <td class="tw-py-4 tw-px-6 tw-border">PPLG</td>
                        <td class="tw-py-4 tw-px-6 tw-border">1</td>
                        <td class="tw-py-4 tw-px-6 tw-border">XI PPLG 1</td>
                        <td class="tw-py-2 tw-px-4 tw-border">
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
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">03</td>
                        <td class="tw-py-4 tw-px-6 tw-border">XI</td>
                        <td class="tw-py-4 tw-px-6 tw-border">PPLG</td>
                        <td class="tw-py-4 tw-px-6 tw-border">2</td>
                        <td class="tw-py-4 tw-px-6 tw-border">XI PPLG 2</td>
                        <td class="tw-py-2 tw-px-4 tw-border">
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
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">04</td>
                        <td class="tw-py-4 tw-px-6 tw-border">XII</td>
                        <td class="tw-py-4 tw-px-6 tw-border">RPL</td>
                        <td class="tw-py-4 tw-px-6 tw-border">1</td>
                        <td class="tw-py-4 tw-px-6 tw-border">XII RPL 1</td>
                        <td class="tw-py-2 tw-px-4 tw-border">
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
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">05</td>
                        <td class="tw-py-4 tw-px-6 tw-border">XII</td>
                        <td class="tw-py-4 tw-px-6 tw-border">RPL</td>
                        <td class="tw-py-4 tw-px-6 tw-border">2</td>
                        <td class="tw-py-4 tw-px-6 tw-border">XII RPL 2</td>
                        <td class="tw-py-2 tw-px-4 tw-border">
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
    </div>
    <!-- {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
    <script src="DataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
        $('#KelasTable').DataTable();
        });
    </script> --}} -->

<!-- {{-- </body> --}} -->

@endsection