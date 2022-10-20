@extends('layouts.admin')

@section('content')

<!-- {{-- <head>
    <link rel="stylesheet" href="DataTables/datatables.min.css"/>
</head> --}} -->

<!-- {{-- <body> --}} -->
    
<div class="tw-mx-10 tw-w-screen">
    <div class="tw-flex tw-justify-between tw-gap-5 tw-mt-8">
        <div class="tw-flex tw-flex-col">
            <h4 class="tw-font-pop tw-font-bold tw-mt-6 tw-mb-6 tw-text-sims-400">Data Semua Kelas</h4>
        </div>

        <div class="tw-flex tw-justify-center tw-items-center -tw-mb-8">
            <a href=""><i class="fa-solid fa-print btn-export"></i></a>
            <a href=""><i class="fa-solid fa-copy btn-export"></i></a>
            <a href=""><i class="fa-solid fa-file-excel btn-export"></i></a>
            <a href=""><i class="fa-solid fa-file-pdf btn-export"></i></a>
        </div>
    </div>
    <div class="tw-flex tw-justify-between">
        <form action=""> 
            <div class="relative tw-border-2 tw-rounded-lg focus:tw-ring-sims-400">
                <input type="text" class="tw-py-1 tw-px-5 tw-border-none tw-rounded-md">
                <i class="fa-solid fa-magnifying-glass tw-pr-5 tw-pl-3 tw-text-slate-600"></i>
            </div>
        </form>
        <div class="tw-flex tw-justify-end">
                <a href="/tambah-kelas-admin" class=" tw-text-white tw-bg-sims-400 hover:tw-bg-[#3b7a7a] tw-border tw-rounded-lg tw-px-4"><i class="fa-solid fa-circle-plus tw-text-xl tw-px-1 tw-py-1"></i>Add Kelas  </a>
            </div>
        <!-- <div class="tw-text-base pt-1 tw-text-basic-700 tw-ml-4 tw-mr-2 tw-font-normal tw-font-pop">Show</div>
        <div class="dropdown">
            <button class="dropdown-toggle tw-bg-gray-300 tw-font-bold tw-py-1 tw-px-3 tw-rounded-xl tw-text" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            10
            </button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">25</a></li>
            <li><a class="dropdown-item" href="#">50</a></li>
            <li><a class="dropdown-item" href="#">100</a></li>
            </ul>
        </div>
        <div class="tw-text-base pt-1 tw-mx-2 tw-font-pop tw-font-normal tw-text-basic-700">Entries</div> -->
    </div>

        <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl tw-mt-5">
            <table id="KelasTable" class="tw-w-full tw-text-sm tw-text-center">
                <thead class="tw-text-md tw-bg-gray-100 tw-text-basic-700 tw-border tw-font-pop">
                    <tr>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NO</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">KELAS</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">JURUSAN</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">ROMBEL</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">LENGKAP</th>
                        <th scope="col" class="tw-py-3 tw-px-6">ACTION</th>
                    </tr>
                </thead>
                <tbody class="tw-text-base">
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">01</td>
                        <td class="tw-py-4 tw-px-6 tw-border">X</td>
                        <td class="tw-py-4 tw-px-6 tw-border">PPLG</td>
                        <td class="tw-py-4 tw-px-6 tw-border">1</td>
                        <td class="tw-py-4 tw-px-6 tw-border">X PPLG 1</td>
                        <td class="tw-py-2 tw-px-4 tw-border">
                            <a href="/edit-kelas-admin"
                                class="tw-text-white tw-bg-yellow-400 hover:tw-bg-[#D3A007] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square"></i></a>
                            </a>
                            <a href="/detail-kelas"
                                class="tw-text-white tw-bg-gray-500 hover:tw-bg-gray-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-eye"></i>
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
                            <a href="/edit-kelas-admin"
                                class="tw-text-white tw-bg-yellow-400 hover:tw-bg-[#D3A007] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square"></i></a>
                            </a>
                            <a href="/detail-kelas"
                                class="tw-text-white tw-bg-gray-500 hover:tw-bg-gray-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-eye"></i>
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
                            <a href="/edit-kelas-admin"
                                class="tw-text-white tw-bg-yellow-400 hover:tw-bg-[#D3A007] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square"></i></a>
                            </a>
                            <a href="/detail-kelas"
                                class="tw-text-white tw-bg-gray-500 hover:tw-bg-gray-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-eye"></i>
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
                            <a href="/edit-kelas-admin"
                                class="tw-text-white tw-bg-yellow-400 hover:tw-bg-[#D3A007] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square"></i></a>
                            </a>
                            <a href="/detail-kelas"
                                class="tw-text-white tw-bg-gray-500 hover:tw-bg-gray-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-eye"></i>
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
                            <a href="/edit-kelas-admin"
                                class="tw-text-white tw-bg-yellow-400 hover:tw-bg-[#D3A007] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square"></i></a>
                            </a>
                            <a href="/detail-kelas"
                                class="tw-text-white tw-bg-gray-500 hover:tw-bg-gray-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-eye"></i>
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