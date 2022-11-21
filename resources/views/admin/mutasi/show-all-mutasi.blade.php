@extends('layouts.admin')

@section('content')
<div class="tw-mx-10 tw-w-screen">
  <div class="tw-mt-8 tw-gap-8 tw-flex tw-flex-col tw-w-full">

    {{-- title --}}
    <section class="tw-flex tw-gap-4">
      <a href="/admin/database">
        <i class="fa-solid fa-chevron-left tw-text-gray-400 tw-text-2xl"></i>
      </a>
      <i class="fa-solid fa-user-group tw-text-admin-300 tw-text-2xl"></i>
      <div class="tw-text-2xl tw-font-pop tw-font-semibold tw-text-gray-300">Data Mutasi</div>
    </section>

    {{-- data siswa keluar table --}}
    <section class="tw-bg-white tw-rounded-xl tw-w-full shadow-cs tw-p-7 tw-flex tw-flex-col">

     <div class="tw-mx-3">
      <div class="tw-flex tw-justify-between tw-mt-10 tw-w-full">
        <div class="tw-flex tw-mb-5">
          <input type="text" class="tw-px-4 tw-rounded-xl tw-border tw-border-gray-300 focus:tw-shadow-sm focus:tw-shadow-admin-300 focus:tw-border-admin-300 focus:tw-outline-none tw-py-2 tw-w-80">
          <button class="tw-px-5 -tw-ml-4 tw-rounded-xl tw-text-white tw-bg-admin-300">
            <i class="fa-regular fa-magnifying-glass"></i>
          </button>
       </div>
        <a href="/admin/mutasi/create" class="tw-bg-admin-300 hover:tw-bg-admin-400 tw-text-white tw-font-ubuntu tw-py-2.5 tw-text-sm tw-px-6 tw-rounded-lg tw-h-fit tw-items-center tw-flex"><i class="fa-regular fa-square-plus tw-mr-4 tw-text-xl"></i>Add new Mutasi</a>
       </div>
  
      <div class="tw-overflow-x-auto tw-relative tw-mt-5">
        <table class="tw-w-full tw-font-medium tw-text-center tw-font-ubuntu">
            <thead class="tw-text-md tw-bg-[#5A6C7C] tw-text-white tw-font-medium">
                <tr>
                    <th scope="col" class="tw-py-3 tw-px-6">Nama</th>
                    <th scope="col" class="tw-py-3 tw-px-6">Nomor Induk</th>
                    <th scope="col" class="tw-py-3 tw-px-6">Gender</th>
                    <th scope="col" class="tw-py-3 tw-px-6">Alasan</th>
                    <th scope="col" class="tw-py-3 tw-px-6">Tanggal Mutasi</th>
                    <th scope="col" class="tw-py-3 tw-px-6">Created</th>
                    <th scope="col" class="tw-py-3 tw-px-6">Action</th>
                </tr>
            </thead>
            <tbody class="tw-bg-white tw-text-silver-400">   
                <tr>
                    <td class="tw-py-4 tw-px-4">Jonathan Doe</td>
                    <td class="tw-py-4 tw-px-4">2009381728</td>
                    <td class="tw-py-4 tw-px-4">L</td>
                    <td class="tw-py-4 tw-px-4">Cape naik tangga</td>
                    <td class="tw-py-4 tw-px-4">14 September 2022</td>
                    <td class="tw-py-4 tw-px-4">17 September 2022</td>
                    <td class="tw-py-4 tw-justify-center tw-items-center tw-text-xl tw-flex tw-gap-3">
                      <a href="/admin/mutasi/edit" class="tw-text-warning-300 hover:tw-text-warning-400"><i class="fa-solid fa-pen-to-square"></i></a>
                      <a href="" class="tw-text-danger-400 hover:tw-text-danger-500"><i class="fa-regular fa-trash-can"></i></a>
                      <a href="/admin/detail-mutasi" class="tw-text-admin-300 hover:tw-text-admin-400"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                <tr>
                  <td class="tw-py-4 tw-px-4">Jonathan Doe</td>
                  <td class="tw-py-4 tw-px-4">2009381728</td>
                  <td class="tw-py-4 tw-px-4">L</td>
                  <td class="tw-py-4 tw-px-4">Cape naik tangga</td>
                  <td class="tw-py-4 tw-px-4">14 September 2022</td>
                  <td class="tw-py-4 tw-px-4">17 September 2022</td>
                  <td class="tw-py-4 tw-justify-center tw-items-center tw-text-xl tw-flex tw-gap-3">
                    <a href="/admin/mutasi/edit" class="tw-text-warning-300 hover:tw-text-warning-400"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="" class="tw-text-danger-400 hover:tw-text-danger-500"><i class="fa-regular fa-trash-can"></i></a>
                    <a href="/admin/detail-mutasi" class="tw-text-admin-300 hover:tw-text-admin-400"><i class="fa-solid fa-eye"></i></a>
                  </td>
                </tr>
                <tr>
                    <td class="tw-py-4 tw-px-4">Jonathan Doe</td>
                    <td class="tw-py-4 tw-px-4">2009381728</td>
                    <td class="tw-py-4 tw-px-4">L</td>
                    <td class="tw-py-4 tw-px-4">Cape naik tangga</td>
                    <td class="tw-py-4 tw-px-4">14 September 2022</td>
                    <td class="tw-py-4 tw-px-4">17 September 2022</td>
                    <td class="tw-py-4 tw-justify-center tw-items-center tw-text-xl tw-flex tw-gap-3">
                    <a href="/admin/mutasi/edit" class="tw-text-warning-300 hover:tw-text-warning-400"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="" class="tw-text-danger-400 hover:tw-text-danger-500"><i class="fa-regular fa-trash-can"></i></a>
                    <a href="/admin/detail-mutasi" class="tw-text-admin-300 hover:tw-text-admin-400"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                <tr>
                    <td class="tw-py-4 tw-px-4">Jonathan Doe</td>
                    <td class="tw-py-4 tw-px-4">2009381728</td>
                    <td class="tw-py-4 tw-px-4">L</td>
                    <td class="tw-py-4 tw-px-4">Cape naik tangga</td>
                    <td class="tw-py-4 tw-px-4">14 September 2022</td>
                    <td class="tw-py-4 tw-px-4">17 September 2022</td>
                    <td class="tw-py-4 tw-justify-center tw-items-center tw-text-xl tw-flex tw-gap-3">
                      <a href="/admin/mutasi/edit" class="tw-text-warning-300 hover:tw-text-warning-400"><i class="fa-solid fa-pen-to-square"></i></a>
                      <a href="" class="tw-text-danger-400 hover:tw-text-danger-500"><i class="fa-regular fa-trash-can"></i></a>
                      <a href="/admin/detail-mutasi" class="tw-text-admin-300 hover:tw-text-admin-400"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                <tr>
                    <td class="tw-py-4 tw-px-4">Jonathan Doe</td>
                    <td class="tw-py-4 tw-px-4">2009381728</td>
                    <td class="tw-py-4 tw-px-4">L</td>
                    <td class="tw-py-4 tw-px-4">Cape naik tangga</td>
                    <td class="tw-py-4 tw-px-4">14 September 2022</td>
                    <td class="tw-py-4 tw-px-4">17 September 2022</td>
                    <td class="tw-py-4 tw-justify-center tw-items-center tw-text-xl tw-flex tw-gap-3">
                      <a href="/admin/mutasi/edit" class="tw-text-warning-300 hover:tw-text-warning-400"><i class="fa-solid fa-pen-to-square"></i></a>
                      <a href="" class="tw-text-danger-400 hover:tw-text-danger-500"><i class="fa-regular fa-trash-can"></i></a>
                      <a href="/admin/detail-mutasi" class="tw-text-admin-300 hover:tw-text-admin-400"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                <tr>
                    <td class="tw-py-4 tw-px-4">Jonathan Doe</td>
                    <td class="tw-py-4 tw-px-4">2009381728</td>
                    <td class="tw-py-4 tw-px-4">L</td>
                    <td class="tw-py-4 tw-px-4">Cape naik tangga</td>
                    <td class="tw-py-4 tw-px-4">14 September 2022</td>
                    <td class="tw-py-4 tw-px-4">17 September 2022</td>
                    <td class="tw-py-4 tw-justify-center tw-items-center tw-text-xl tw-flex tw-gap-3">
                      <a href="/admin/mutasi/edit" class="tw-text-warning-300 hover:tw-text-warning-400"><i class="fa-solid fa-pen-to-square"></i></a>
                      <a href="" class="tw-text-danger-400 hover:tw-text-danger-500"><i class="fa-regular fa-trash-can"></i></a>
                      <a href="/admin/detail-mutasi" class="tw-text-admin-300 hover:tw-text-admin-400"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                <tr>
                    <td class="tw-py-4 tw-px-4">Jonathan Doe</td>
                    <td class="tw-py-4 tw-px-4">2009381728</td>
                    <td class="tw-py-4 tw-px-4">L</td>
                    <td class="tw-py-4 tw-px-4">Cape naik tangga</td>
                    <td class="tw-py-4 tw-px-4">14 September 2022</td>
                    <td class="tw-py-4 tw-px-4">17 September 2022</td>
                    <td class="tw-py-4 tw-justify-center tw-items-center tw-text-xl tw-flex tw-gap-3">
                      <a href="/admin/mutasi/edit" class="tw-text-warning-300 hover:tw-text-warning-400"><i class="fa-solid fa-pen-to-square"></i></a>
                      <a href="" class="tw-text-danger-400 hover:tw-text-danger-500"><i class="fa-regular fa-trash-can"></i></a>
                      <a href="/admin/detail-mutasi" class="tw-text-admin-300 hover:tw-text-admin-400"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                <tr>
                    <td class="tw-py-4 tw-px-4">Jonathan Doe</td>
                    <td class="tw-py-4 tw-px-4">2009381728</td>
                    <td class="tw-py-4 tw-px-4">L</td>
                    <td class="tw-py-4 tw-px-4">Cape naik tangga</td>
                    <td class="tw-py-4 tw-px-4">14 September 2022</td>
                    <td class="tw-py-4 tw-px-4">17 September 2022</td>
                    <td class="tw-py-4 tw-justify-center tw-items-center tw-text-xl tw-flex tw-gap-3">
                      <a href="/admin/mutasi/edit" class="tw-text-warning-300 hover:tw-text-warning-400"><i class="fa-solid fa-pen-to-square"></i></a>
                      <a href="" class="tw-text-danger-400 hover:tw-text-danger-500"><i class="fa-regular fa-trash-can"></i></a>
                      <a href="/admin/detail-mutasi" class="tw-text-admin-300 hover:tw-text-admin-400"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                <tr>
                    <td class="tw-py-4 tw-px-4">Jonathan Doe</td>
                    <td class="tw-py-4 tw-px-4">2009381728</td>
                    <td class="tw-py-4 tw-px-4">L</td>
                    <td class="tw-py-4 tw-px-4">Cape naik tangga</td>
                    <td class="tw-py-4 tw-px-4">14 September 2022</td>
                    <td class="tw-py-4 tw-px-4">17 September 2022</td>
                    <td class="tw-py-4 tw-justify-center tw-items-center tw-text-xl tw-flex tw-gap-3">
                      <a href="/admin/mutasi/edit" class="tw-text-warning-300 hover:tw-text-warning-400"><i class="fa-solid fa-pen-to-square"></i></a>
                      <a href="" class="tw-text-danger-400 hover:tw-text-danger-500"><i class="fa-regular fa-trash-can"></i></a>
                      <a href="/admin/detail-mutasi" class="tw-text-admin-300 hover:tw-text-admin-400"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                <tr>
                    <td class="tw-py-4 tw-px-4">Jonathan Doe</td>
                    <td class="tw-py-4 tw-px-4">2009381728</td>
                    <td class="tw-py-4 tw-px-4">L</td>
                    <td class="tw-py-4 tw-px-4">Cape naik tangga</td>
                    <td class="tw-py-4 tw-px-4">14 September 2022</td>
                    <td class="tw-py-4 tw-px-4">17 September 2022</td>
                    <td class="tw-py-4 tw-justify-center tw-items-center tw-text-xl tw-flex tw-gap-3">
                      <a href="/admin/mutasi/edit" class="tw-text-warning-300 hover:tw-text-warning-400"><i class="fa-solid fa-pen-to-square"></i></a>
                      <a href="" class="tw-text-danger-400 hover:tw-text-danger-500"><i class="fa-regular fa-trash-can"></i></a>
                      <a href="/admin/detail-mutasi" class="tw-text-admin-300 hover:tw-text-admin-400"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
      </div>

      <div class="tw-flex tw-justify-end tw-gap-5 tw-mt-5">
        <a href="" class="tw-bg-admin-300 hover:tw-bg-admin-400 tw-py-2 tw-px-6 tw-text-white tw-rounded-lg">Prev</a>
        <a href="" class="tw-bg-admin-300 hover:tw-bg-admin-400 tw-py-2 tw-px-6 tw-text-white tw-rounded-lg">Next</a>
      </div>
     </div>
    </section>
  </div>
</div>
@endsection