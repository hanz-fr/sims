@extends('layouts.admin')

@section('content')
    <div class="tw-mx-10 tw-w-screen">
        <section class="tw-flex tw-gap-4 mt-8">
            <a href="/admin/database">
              <i class="fa-solid fa-chevron-left tw-text-gray-400 tw-text-2xl"></i>
            </a>
            <i class="fa-solid fa-file-chart-column tw-text-admin-300 tw-text-3xl"></i>
            <div class="tw-text-2xl tw-font-pop tw-font-semibold tw-text-gray-300">Nilai Mapel</div>
          </section>
        <div class="tw-flex tw-flex-col tw-bg-white tw-py-8 tw-px-5 tw-rounded-xl tw-w-full tw-mb-8 tw-mt-10">
            <div class="tw-flex tw-justify-between tw-mb-8">
                <div class="tw-flex">
                    <input type="text" class="tw-px-4 tw-rounded-xl tw-border tw-border-gray-300 tw-py-2 tw-w-80">
                    <button class="tw-px-5 -tw-ml-4 tw-rounded-xl tw-text-white tw-bg-admin-300">
                        <i class="fa-regular fa-magnifying-glass"></i>
                    </button>
                </div>
                <div class="tw-flex ">
                    <a href="/admin/nilai-mapel/create" class="tw-bg-admin-300 hover:tw-bg-admin-400 tw-text-white tw-font-ubuntu tw-py-2.5 tw-text-sm tw-px-6 tw-rounded-lg tw-h-fit tw-items-center tw-flex">
                        <i class="fa-regular fa-square-plus tw-mr-4 tw-text-xl"></i>
                            Add New Nilai Mapel
                    </a>
                </div>
            </div>
            <div
                class="tw-overflow-y-scroll tw-mt-8 tw-h-[500px] tw-scrollbar-thumb-gray-300 tw-scrollbar-thumb-rounded-lg tw-scrollbar-thin tw-scrollbar-track-gray-100">
                <table class=" tw-w-full tw-text-center">
                    <thead class="tw-text-lg tw-font-pop tw-text-white tw-bg-[#5A6C7C]">
                        <tr>
                            <th scope="col" class="tw-py-3 tw-px-6">NIS</th>
                            <th scope="col" class="tw-py-3 tw-px-6">Nama Siswa</th>
                            <th scope="col" class="tw-py-3 tw-px-6">ID KELAS</th>
                            <th scope="col" class="tw-py-3 tw-px-6">ID RAPOR</th>
                            <th scope="col" class="tw-py-3 tw-px-6">Created</th>         
                            <th scope="col" class="tw-py-3 tw-px-6"></th>
                        </tr>
                    </thead>
                    <tbody class="tw-text-sm">
                        <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                            <td class="tw-py-6 tw-px-5 tw-border-b">201019210391</td>
                            <td class="tw-py-6 tw-px-5 tw-border-b">Baharudin Sharon</td>
                            <td class="tw-py-6 tw-px-5 tw-border-b">XIRPL2</td>
                            <td class="tw-py-6 tw-px-5 tw-border-b">RPR981</td>
                            <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                            <td class="tw-py-6 tw-px-5 tw-border-b">
                                <a href="/admin/detail-nilai-mapel"
                                    class="tw-bg-admin-300 hover:tw-bg-admin-600 tw-text-white tw-px-7 tw-py-3 tw-rounded-lg">
                                    View
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
