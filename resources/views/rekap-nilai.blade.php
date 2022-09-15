@extends('layouts.main')

@section('content')
    <div class="tw-container tw-mx-10">

        <a href="/detail" class=" tw-text-sims tw-text-5xl hover:tw-text-[#428888]"><i class="fa-regular fa-chevron-left tw-mt-5"></i></a>

        <div class="tw-text-3xl tw-text-sims tw-font-pop tw-font-semibold tw-flex tw-flex-row tw-mt-9">Data Raport</div>
        <div class="tw-flex tw-justify-end tw-mb-5">
            <a href="" class="tw-bg-sims tw-text-white hover:tw-text-white  tw-font-pop hover:tw-bg-[#428888] tw-px-5 tw-py-2 tw-rounded-lg tw-mr-5">Export</a>
            <a href="" class="tw-bg-sims tw-text-white hover:tw-text-white  tw-font-pop hover:tw-bg-[#428888] tw-px-5 tw-py-2 tw-rounded-lg">import</a>
        </div>
        <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
            <table class="tw-w-full tw-text-sm tw-text-center">
                <thead class="tw-text-lg tw-bg-gray-100 tw-text-basic tw-border-b tw-font-pop">
                    <tr class="tw-border">
                        <th scope="col" class="tw-py-3 tw-px-6">
                            Nama Mapel
                        </th>
                        <th scope="col" class="tw-py-3 tw-px-6">
                          Pengetahuan
                        </th>
                        <th scope="col" class="tw-py-3 tw-px-6">
                          Keterampilan
                        </th>
                        <th scope="col" class="tw-py-3 tw-px-6">
                          UAS
                        </th>
                        <th scope="col" class="tw-py-3 tw-px-6">
                          UKK
                        </th>
                        <th scope="col" class="tw-py-3 tw-px-6">
                          KKM
                        </th>
                    </tr>
                </thead>
                <tbody class="tw-text-base text-center">
                    <tr class="tw-bg-white tw-border">
                        <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic tw-whitespace-nowrap">
                          Bahasa Inggris
                        </th>
                        <td class="tw-py-4 tw-px-6">
                          72
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          75
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          75
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          75
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          75
                        </td>
                    </tr>
                    <tr class="tw-border tw-bg-gray-100">
                        <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic tw-whitespace-nowrap">
                          Bahasa Indonesia
                        </th>
                        <td class="tw-py-4 tw-px-6">
                          88
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          75
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          75
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          75
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          75
                        </td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic tw-whitespace-nowrap">
                          Agama
                        </th>
                        <td class="tw-py-4 tw-px-6">
                          98
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          72
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          72
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          72
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          72
                        </td>
                    </tr>
                    <tr class="tw-bg-gray-100 tw-border">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic tw-whitespace-nowrap">
                        PPKN 
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        77
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic tw-whitespace-nowrap">
                        Matematika
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                    </tr>
                    <tr class="tw-bg-gray-100 tw-border">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic tw-whitespace-nowrap">
                        Bahasa Jepang
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        87
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection