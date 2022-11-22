@extends('layouts.admin')

@section('content')
<div class="tw-w-screen tw-mx-10">
    <section class="tw-flex tw-gap-4 mt-8">
        <a href="/admin/nilai-mapel">
          <i class="fa-solid fa-chevron-left tw-text-gray-400 tw-text-2xl"></i>
        </a>
        <i class="fa-solid fa-file-chart-column tw-text-admin-300 tw-text-3xl"></i>
        <div class="tw-text-2xl tw-font-pop tw-font-semibold tw-text-gray-300">Detail Nilai Mapel</div>
      </section>

    <div class="card-data-white tw-mt-8">
        <div class="tw-flex tw-bg-admin-400 tw-font-ubuntu tw-text-white tw-rounded-l-xl tw-gap-8 tw-py-16 tw-px-12">
           <div class="tw-flex tw-flex-col">
              <i class="fa-solid fa-user tw-text-7xl tw-mx-5"></i>
           </div>
        </div>
        <div class="tw-w-full tw-text-lg tw-font-ubuntu tw-text-silver-400 tw-font-semibold tw-justify-center tw-flex tw-flex-col tw-pl-16">
            <h1 class="tw-font-pop tw-text-2xl tw-py-4">Ibnu Asep Bin Budi</h2>
            <h3 class="">NIS : <span class="tw-font-medium">2009381728</span></h3>
            <h3 class="">ID RAPOR : <span class="tw-font-medium">RPT-1213</span></h3>
            <h3 class="">X RPL 2</h3>
            <div class="tw-flex tw-justify-end ">
              <h3 class="tw-mr-8">Updated: <span class="tw-font-medium">September 2023</span></h3>
            </div>
        </div>
    </div>
    
    <div x-data="{openTab: 1, activeClasses: 'tw-bg-[#5A6C7C] tw-text-white', inactiveClasses: 'tw-bg-white tw-text-admin-400'}">
        <ul class="tw-mt-8 tw-pt-4 tw-flex tw-font-ubuntu tw-text-xl">
            <li @click="openTab = 1" :class="{ 'tw--mb-px': openTab === 1 }">
                <button :class="openTab === 1 ? activeClasses : inactiveClasses"
                    class="tw-rounded-t-2xl tw-text-white tw-inline-block tw-py-3 tw-px-6 tw-mr-1 tw-shadow-sm tw-shadow-[#5a6c7c] tw-font-semibold"
                    href="#">
                    1
                </button>
            </li>
            <li @click="openTab = 2" :class="{ 'tw--mb-px': openTab === 2 }">
                <button :class="openTab === 2 ? activeClasses : inactiveClasses"
                    class="tw-rounded-t-2xl tw-text-white tw-inline-block tw-py-3 tw-px-6 tw-mx-1 tw-shadow-sm tw-shadow-[#5a6c7c] tw-font-semibold"
                    href="#">
                    2
                </button>
            </li>
            <li @click="openTab = 3" :class="{ 'tw--mb-px': openTab === 3 }">
                <button :class="openTab === 3 ? activeClasses : inactiveClasses"
                    class="tw-rounded-t-2xl tw-text-white tw-inline-block tw-py-3 tw-px-6 tw-mx-1 tw-shadow-sm tw-shadow-[#5a6c7c] tw-font-semibold"
                    href="#">
                    3
                </button>
            </li>
            <li @click="openTab = 4" :class="{ 'tw--mb-px': openTab === 4 }">
                <button :class="openTab === 4 ? activeClasses : inactiveClasses"
                    class="tw-rounded-t-2xl tw-text-white tw-inline-block tw-py-3 tw-px-6 tw-mx-1 tw-shadow-sm tw-shadow-[#5a6c7c] tw-font-semibold"
                    href="#">
                    4
                </button>
            </li>
            <li @click="openTab = 5" :class="{ 'tw--mb-px': openTab === 4 }">
                <button :class="openTab === 5 ? activeClasses : inactiveClasses"
                    class="tw-rounded-t-2xl tw-text-white tw-inline-block tw-py-3 tw-px-6 tw-mx-1 tw-shadow-sm tw-shadow-[#5a6c7c] tw-font-semibold"
                    href="#">
                    5
                </button>
            </li>
            <li @click="openTab = 6" :class="{ 'tw--mb-px': openTab === 4 }">
                <button :class="openTab === 6 ? activeClasses : inactiveClasses"
                    class="tw-rounded-t-2xl tw-text-white tw-inline-block tw-py-3 tw-px-6 tw-mx-1 tw-shadow-sm tw-shadow-[#5a6c7c] tw-font-semibold"
                    href="#">
                    6
                </button>
            </li>
        </ul>
        <div x-show="openTab === 1"
          class="tw-overflow-y-scroll tw-h-[450px] tw-scrollbar-thumb-gray-300 tw-scrollbar-thumb-rounded-lg tw-scrollbar-thin tw-scrollbar-track-gray-100">
            <table class=" tw-w-full tw-text-center">
                <thead class="tw-text-lg tw-font-pop tw-text-white tw-bg-[#5A6C7C]">
                    <tr>
                        <th scope="col" class="tw-py-3 tw-px-6">ID MAPEL</th>
                        <th scope="col" class="tw-py-3 tw-px-6">Nilai Keterampilan</th>
                        <th scope="col" class="tw-py-3 tw-px-6">Nilai Pengetahuan</th>
                        <th scope="col" class="tw-py-3 tw-px-6">Created</th>         
                    </tr>
                </thead>
                <tbody class="tw-text-sm">
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div x-show="openTab === 2"
          class="tw-overflow-y-scroll tw-h-[450px] tw-scrollbar-thumb-gray-300 tw-scrollbar-thumb-rounded-lg tw-scrollbar-thin tw-scrollbar-track-gray-100">
            <table class=" tw-w-full tw-text-center">
                <thead class="tw-text-lg tw-font-pop tw-text-white tw-bg-[#5A6C7C]">
                    <tr>
                        <th scope="col" class="tw-py-3 tw-px-6">ID MAPEL</th>
                        <th scope="col" class="tw-py-3 tw-px-6">Nilai Keterampilan</th>
                        <th scope="col" class="tw-py-3 tw-px-6">Nilai Pengetahuan</th>
                        <th scope="col" class="tw-py-3 tw-px-6">Created</th>         
                    </tr>
                </thead>
                <tbody class="tw-text-sm">
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div x-show="openTab === 3"
          class="tw-overflow-y-scroll tw-h-[450px] tw-scrollbar-thumb-gray-300 tw-scrollbar-thumb-rounded-lg tw-scrollbar-thin tw-scrollbar-track-gray-100">
            <table class=" tw-w-full tw-text-center">
                <thead class="tw-text-lg tw-font-pop tw-text-white tw-bg-[#5A6C7C]">
                    <tr>
                        <th scope="col" class="tw-py-3 tw-px-6">ID MAPEL</th>
                        <th scope="col" class="tw-py-3 tw-px-6">Nilai Keterampilan</th>
                        <th scope="col" class="tw-py-3 tw-px-6">Nilai Pengetahuan</th>
                        <th scope="col" class="tw-py-3 tw-px-6">Created</th>         
                    </tr>
                </thead>
                <tbody class="tw-text-sm">
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div x-show="openTab === 4"
          class="tw-overflow-y-scroll tw-h-[450px] tw-scrollbar-thumb-gray-300 tw-scrollbar-thumb-rounded-lg tw-scrollbar-thin tw-scrollbar-track-gray-100">
            <table class=" tw-w-full tw-text-center">
                <thead class="tw-text-lg tw-font-pop tw-text-white tw-bg-[#5A6C7C]">
                    <tr>
                        <th scope="col" class="tw-py-3 tw-px-6">ID MAPEL</th>
                        <th scope="col" class="tw-py-3 tw-px-6">Nilai Keterampilan</th>
                        <th scope="col" class="tw-py-3 tw-px-6">Nilai Pengetahuan</th>
                        <th scope="col" class="tw-py-3 tw-px-6">Created</th>         
                    </tr>
                </thead>
                <tbody class="tw-text-sm">
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div x-show="openTab === 5"
          class="tw-overflow-y-scroll tw-h-[450px] tw-scrollbar-thumb-gray-300 tw-scrollbar-thumb-rounded-lg tw-scrollbar-thin tw-scrollbar-track-gray-100">
            <table class=" tw-w-full tw-text-center">
                <thead class="tw-text-lg tw-font-pop tw-text-white tw-bg-[#5A6C7C]">
                    <tr>
                        <th scope="col" class="tw-py-3 tw-px-6">ID MAPEL</th>
                        <th scope="col" class="tw-py-3 tw-px-6">Nilai Keterampilan</th>
                        <th scope="col" class="tw-py-3 tw-px-6">Nilai Pengetahuan</th>
                        <th scope="col" class="tw-py-3 tw-px-6">Created</th>         
                    </tr>
                </thead>
                <tbody class="tw-text-sm">
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div x-show="openTab === 6"
          class="tw-overflow-y-scroll tw-h-[450px] tw-scrollbar-thumb-gray-300 tw-scrollbar-thumb-rounded-lg tw-scrollbar-thin tw-scrollbar-track-gray-100">
            <table class=" tw-w-full tw-text-center">
                <thead class="tw-text-lg tw-font-pop tw-text-white tw-bg-[#5A6C7C]">
                    <tr>
                        <th scope="col" class="tw-py-3 tw-px-6">ID MAPEL</th>
                        <th scope="col" class="tw-py-3 tw-px-6">Nilai Keterampilan</th>
                        <th scope="col" class="tw-py-3 tw-px-6">Nilai Pengetahuan</th>
                        <th scope="col" class="tw-py-3 tw-px-6">Created</th>         
                    </tr>
                </thead>
                <tbody class="tw-text-sm">
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                    <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                        <td class="tw-py-6 tw-px-5 tw-border-b">MTK</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">98</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">72</td>
                        <td class="tw-py-6 tw-px-5 tw-border-b">30 February 2023</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection