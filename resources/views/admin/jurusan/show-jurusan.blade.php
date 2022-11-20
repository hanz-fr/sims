@extends('layouts.admin')
@section('content')

<div class="tw-mx-10 tw-w-screen">
    <div class="tw-flex tw-mt-8">
        <i class="fa-solid fa-shapes tw-text-sims-300 tw-text-2xl"></i>
        <div class="tw-text-2xl tw-ml-3 tw-font-pop tw-font-semibold tw-text-gray-300">Jurusan</div>
    </div>
    <div class="tw-flex tw-flex-col tw-bg-white shadow-cs tw-py-8 tw-px-16 tw-rounded-xl tw-w-full tw-mb-8 tw-mt-14 ">
        <div class="tw-flex tw-justify-end">
          <div class="tw-flex tw-mb-14">
              <input type="text" class="tw-px-4 tw-rounded-xl tw-border tw-border-gray-300 tw-py-2 tw-w-80">
              <button class="tw-px-5 -tw-ml-4 tw-rounded-xl tw-text-white tw-bg-admin-300">
                <i class="fa-regular fa-magnifying-glass"></i>
              </button>
          </div>
        </div>
        <div class="tw-overflow-y-scroll tw-h-[500px] tw-scrollbar-thumb-gray-300 tw-scrollbar-thumb-rounded-lg tw-scrollbar-thin tw-scrollbar-track-gray-100">
          <table class="tw-mt-10 tw-w-full tw-text-sm tw-text-center">
            <thead class="tw-text-lg tw-font-pop tw-text-admin-300">
                <tr>
                    <th scope="col" class="tw-pb-9 tw-px-5">Id</th>
                    <th scope="col" class="tw-pb-9 tw-px-5">Nama Jurusan</th>
                    <th scope="col" class="tw-pb-9 tw-px-5">Konsentrasi</th>
                    <th scope="col" class="tw-pb-9 tw-px-5">Desc</th>
                    <th scope="col" class="tw-pb-9 tw-px-5">Created</th>
                    <th scope="col" class="tw-pb-9 tw-px-5"></th>
                </tr>
            </thead>
            <tbody>     
                <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">RPL</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">RPL</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b"></td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">Lorem ipsum, dolor sit....</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">12 February 2023</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">
                      <a href="/admin/detail-jurusan" class="tw-text-white tw-bg-admin-300 hover:tw-bg-admin-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-7 tw-mr-1">
                          View
                      </a>
                    </td>
                </tr>
                <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">RPL</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">RPL</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b"></td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">Lorem ipsum, dolor sit....</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">12 February 2023</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">
                      <a href="/admin/detail-jurusan" class="tw-text-white tw-bg-admin-300 hover:tw-bg-admin-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-7 tw-mr-1">
                          View
                      </a>
                    </td>
                </tr>
                <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">RPL</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">RPL</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b"></td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">Lorem ipsum, dolor sit....</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">12 February 2023</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">
                      <a href="/admin/detail-jurusan" class="tw-text-white tw-bg-admin-300 hover:tw-bg-admin-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-7 tw-mr-1">
                          View
                      </a>
                    </td>
                </tr>
                <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">RPL</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">RPL</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b"></td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">Lorem ipsum, dolor sit....</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">12 February 2023</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">
                      <a href="/admin/detail-jurusan" class="tw-text-white tw-bg-admin-300 hover:tw-bg-admin-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-7 tw-mr-1">
                          View
                      </a>
                    </td>
                </tr>
                <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">RPL</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">RPL</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b"></td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">Lorem ipsum, dolor sit....</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">12 February 2023</td>
                    <td class="tw-pb-6 tw-px-5 tw-py-7 tw-border-b">
                      <a href="/admin/detail-jurusan" class="tw-text-white tw-bg-admin-300 hover:tw-bg-admin-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-7 tw-mr-1">
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