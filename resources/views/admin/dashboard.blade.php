@extends('layouts.admin')

@section('content')
<div class="tw-m-10 tw-w-screen tw-flex tw-flex-col tw-gap-8">

      {{-- title --}}
      <section class="tw-w-full tw-flex">
         <div class="tw-border-l-8 tw-border-admin-300 tw-h-16 tw-mr-5"></div>
         <div class="tw-flex tw-flex-col">
            <div class="tw-text-3xl tw-font-pop tw-font-bold tw-text-admin-300">Welcome Back, {{ auth()->user()->name }}</div>
            <div class="tw-text-xl tw-font-pop tw-font-normal tw-text-gray-300">what are you going to manage today?</div>
         </div>
      </section>

    {{-- total account information card --}}
    <section class="tw-bg-white tw-rounded-xl shadow-cs tw-w-full tw-flex tw-p-20 tw-justify-between tw-font-ubuntu tw-border-b-[13px] tw-border-admin-300">
      <div class="tw-flex tw-gap-8 tw-text-admin-300">
        <div class="tw-text-center">
          <i class="fa-solid fa-user tw-text-6xl"></i>
          <h5 class="tw-font-bold tw-mt-2">Staff TU</h5>
        </div>
        <div class="tw-items-center tw-flex">
        <h3 class="text-5xl tw-font-bold tw-mb-2">{{ $tatausaha }}</h3>
        </div>
      </div>
      <div class="tw-flex tw-gap-8 tw-text-salmon-400">
        <div class="tw-text-center">
          <i class="fa-solid fa-user tw-text-6xl"></i>
          <h5 class="tw-font-bold tw-mt-2">Kesiswaan</h5>
        </div>
        <div class="tw-items-center tw-flex">
        <h3 class="text-5xl tw-font-bold tw-mb-2">{{ $kesiswaan }}</h3>
        </div>
      </div>
      <div class="tw-flex tw-gap-8 tw-text-oren-400">
        <div class="tw-text-center">
          <i class="fa-solid fa-user tw-text-6xl"></i>
          <h5 class="tw-font-bold tw-mt-2">Walikelas</h5>
        </div>
        <div class="tw-items-center tw-flex">
        <h3 class="text-5xl tw-font-bold tw-mb-2">{{ $walikelas }}</h3>
        </div>
      </div>
      <div class="tw-flex tw-gap-8 tw-text-gray-400">
        <div class="tw-text-center">
          <i class="fa-solid fa-user tw-text-6xl"></i>
          <h5 class="tw-font-bold tw-mt-2">Kurikulum</h5>
        </div>
        <div class="tw-items-center tw-flex">
        <h3 class="text-5xl tw-font-bold tw-mb-2">{{ $kurikulum }}</h3>
        </div>
      </div>
      <div class="tw-flex tw-gap-8 tw-text-pixie-300">
        <div class="tw-text-center">
          <i class="fa-solid fa-user tw-text-6xl"></i>
          <h5 class="tw-font-bold tw-mt-2">Admin</h5>
        </div>
        <div class="tw-items-center tw-flex">
        <h3 class="text-5xl tw-font-bold tw-mb-2">{{ $admin }}</h3>
        </div>
      </div>
    </section>

    {{-- all account action --}}
    <section class="tw-flex tw-bg-white tw-rounded-xl shadow-cs tw-w-full tw-justify-between tw-py-10 tw-px-12">
      <div class="tw-text-gray-300 tw-text-2xl tw-font-semibold tw-font-pop tw-items-center tw-flex">All Account</div>
      <div class="tw-flex tw-gap-5 tw-font-ubuntu tw-text-white tw-font-medium">
        <form action="{{ route('manage.destroy-all') }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="button" data-modal-toggle="popup-modal"
              class="tw-py-4 tw-px-6 tw-bg-salmon-400 hover:tw-bg-salmon-500 tw-rounded-lg">
              <i class="fa-regular fa-trash-can tw-mr-4 tw-text-xl"></i> Delete all account
          </button>

          <div id="popup-modal" tabindex="-1"
              class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
              <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                  <div class="tw-relative tw-bg-white tw-rounded-lg tw-shadow dark:tw-bg-slate-100">
                      <button type="button"
                          class="tw-absolute tw-top-3 tw-right-2.5 tw-text-gray-400 tw-bg-transparent hover:tw-bg-gray-200 hover:tw-text-gray-900 tw-rounded-lg tw-text-sm tw-p-1.5 tw-ml-auto tw-inline-flex tw-items-center dark:hover:tw-bg-gray-800 dark:hover:tw-text-white"
                          data-modal-toggle="popup-modal">
                          <svg aria-hidden="true" class="tw-w-5 tw-h-5" fill="currentColor"
                              viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                          </svg>
                          <span class="sr-only">Close modal</span>
                      </button>
                      <div class="tw-p-6">
                          <svg aria-hidden="true"
                              class="tw-mx-auto tw-mb-4 tw-w-14 tw-h-14 tw-text-gray-400 dark:tw-text-gray-200"
                              fill="none" stroke="currentColor" viewBox="0 0 24 24"
                              xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                          </svg>
                          <div
                              class="tw-mb-5 tw-flex tw-justify-center tw-text-md tw-font-normal tw-text-gray-500 dark:tw-text-gray-400">
                              Delete All Account?</div>
                          <div class="tw-flex tw-justify-center">
                              <button type="submit" data-modal-toggle="popup-modal" type="button"
                                  class="tw-text-white tw-bg-red-600 hover:tw-bg-red-800 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-red-300 dark:focus:tw-ring-red-800 tw-font-medium tw-rounded-lg tw-text-sm tw-inline-flex tw-items-center tw-py-2.5 tw-text-center tw-mr-2 tw-px-6">
                                  Ya
                              </button>
                              <button data-modal-toggle="popup-modal" type="button"
                                  class="tw-text-gray-500 tw-bg-white hover:tw-bg-gray-100 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-gray-200 tw-rounded-lg tw-border tw-border-gray-200 tw-text-sm tw-font-medium tw-py-2.5 hover:tw-text-gray-900 focus:tw-z-10 dark:tw-bg-gray-700 dark:tw-text-gray-300 dark:tw-border-gray-500 dark:hover:tw-text-white dark:hover:tw-bg-gray-600 dark:focus:tw-ring-gray-600 tw-px-4">Tidak</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </form>

        <a href="/admin/manage/create" class="tw-bg-admin-300 tw-py-4 tw-px-6 tw-rounded-lg"><i class="fa-regular fa-square-plus tw-mr-4 tw-text-xl"></i>Create new account</a>
      </div>
    </section>

    {{-- account data table --}}
    <section class="tw-flex tw-flex-col tw-bg-white shadow-cs tw-py-8 tw-px-16 tw-rounded-xl tw-w-full">
      <div class="tw-flex tw-justify-end">
        {{-- search --}}
        <div class="tw-flex tw-mb-14">
            <input type="text" class="tw-px-4 tw-rounded-xl tw-border tw-border-gray-300 tw-py-2 tw-w-80">
            <button class="tw-px-5 -tw-ml-4 tw-rounded-xl tw-text-white tw-bg-admin-300">
              <i class="fa-regular fa-magnifying-glass"></i>
            </button>
        </div>
      </div>
      <div class="tw-overflow-y-scroll tw-h-[600px] tw-pr-4 tw-scrollbar-thumb-gray-300 tw-scrollbar-thumb-rounded-lg tw-scrollbar-thin tw-scrollbar-track-gray-100">
        <table class="tw-w-full tw-text-sm tw-text-center">
          <thead class="tw-text-lg tw-font-pop tw-text-white tw-bg-[#5A6C7C]">
              <tr>
                  <th scope="col" class="tw-py-3 tw-px-5">NIP</th>
                  <th scope="col" class="tw-py-3 tw-px-5">Name</th>
                  <th scope="col" class="tw-py-3 tw-px-5">Created</th>
                  <th scope="col" class="tw-py-3 tw-px-5">Role</th>
                  <th scope="col" class="tw-py-3 tw-px-5"></th>
              </tr>
          </thead>
          <tbody class="tw-text-[#B4B8BC] tw-bg-white tw-font-bold text-lg tw-font-ubuntu">     
            @foreach ($user as $u)
              <tr class="tw-border-b">
                <td class="tw-p-6">{{ $u->nip }}</td>
                <td class="tw-p-6">{{ $u->nama }}</td>
                <td class="tw-p-6">{{ \Carbon\Carbon::parse($u->created_at)->format('d F Y') }}</td>
                <td class="tw-p-6">
                @if ($u->role === 1)
                  Tata Usaha
                @endif
                @if ($u->role === 2)
                    Kesiswaan
                @endif
                @if ($u->role === 3)
                    Kurikulum
                @endif
                @if ($u->role === 4)
                    Wali Kelas
                @endif
                </td>
                <td class="tw-p-6">
                  <a href="/admin/manage/{{ $u->id }}" class="tw-text-white tw-bg-admin-300 hover:tw-bg-admin-600 tw-rounded-lg tw-text-xl tw-py-2 tw-px-7">
                      View
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>
    <div class=""></div>
      
      {{-- data management
      <section class="shadow-cs tw-bg-white tw-px-8 tw-py-7 tw-mt-8 tw-w-full">
         <div class="tw-flex">
            <i class="fa-regular fa-sliders tw-text-[#90C2C2] tw-text-xl"></i>
            <div class="tw-text-xl tw-ml-3 tw-font-pop tw-font-semibold tw-text-gray-400">Data Management</div>
         </div>
         <div class="tw-overflow-y-scroll tw-scrollbar-thumb-gray-300 tw-scrollbar-thumb-rounded-lg tw-scrollbar-thin tw-scrollbar-track-gray-100 tw-w-[1200px]">
            <ul class="tw-shadow-inner-r tw-h-fit tw-py-6 tw-mt-7 tw-list-none tw-grid tw-grid-flow-col tw-gap-8">
               <li class="card-data">
                  <div class="tw-flex tw-bg-[#90C2C2] tw-font-ubuntu tw-text-white tw-rounded-xl tw-gap-8 tw-py-16 tw-px-12">
                     <div class="tw-flex tw-flex-col">
                        <i class="fa-solid fa-shapes tw-text-5xl tw-mx-auto"></i>
                        <div class="tw-font-medium tw-text-xl tw-text-center">Siswa</div>
                     </div>
                     <div class="tw-flex tw-items-center">
                        <div class="tw-font-medium tw-text-4xl">20</div>
                        <div class="tw-text-sm tw-ml-2">total <br> data</div>
                     </div>
                  </div>
                  <div class="tw-flex tw-flex-col tw-px-7 tw-py-7">
                     <table>
                        <tbody class="tw-text-left tw-font-ubuntu tw-text-[#B4B8BC] tw-font-bold">
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">latest data created</th>
                           <td class="tw-text-white tw-text-right tw-pl-3">2 days ago</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">recent activity</th>
                           <td class="tw-text-white tw-text-right">create</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal">latest data</th>
                           <td class="tw-text-white tw-text-right">TKJ</td>
                        </tr>
                        </tbody>
                     </table>
                     <a href="/admin/siswa">
                        <div class="card-data-btn">Manage</div>
                     </a>
                  </div>
               </li>
               <li class="card-data">
                  <div class="tw-flex tw-bg-[#90C2C2] tw-font-ubuntu tw-text-white tw-rounded-xl tw-gap-8 tw-py-16 tw-px-12">
                     <div class="tw-flex tw-flex-col">
                        <i class="fa-solid fa-shapes tw-text-5xl tw-mx-auto"></i>
                        <div class="tw-font-medium tw-text-xl tw-text-center">Kelas</div>
                     </div>
                     <div class="tw-flex tw-items-center">
                        <div class="tw-font-medium tw-text-4xl">20</div>
                        <div class="tw-text-sm tw-ml-2">total <br> data</div>
                     </div>
                  </div>
                  <div class="tw-flex tw-flex-col tw-px-7 tw-py-7">
                     <table>
                        <tbody class="tw-text-left tw-font-ubuntu tw-text-[#B4B8BC] tw-font-bold">
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">latest data created</th>
                           <td class="tw-text-white tw-text-right tw-pl-3">2 days ago</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">recent activity</th>
                           <td class="tw-text-white tw-text-right">create</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal">latest data</th>
                           <td class="tw-text-white tw-text-right">TKJ</td>
                        </tr>
                        </tbody>
                     </table>
                     <a href="/admin/kelas">
                        <div class="card-data-btn">Manage</div>
                     </a>
                  </div>
               </li>
               <li class="card-data">
                  <div class="tw-flex tw-bg-[#90C2C2] tw-font-ubuntu tw-text-white tw-rounded-xl tw-gap-8 tw-py-16 tw-px-12">
                     <div class="tw-flex tw-flex-col">
                        <i class="fa-solid fa-shapes tw-text-5xl tw-mx-auto"></i>
                        <div class="tw-font-medium tw-text-xl tw-text-center">Jurusan</div>
                     </div>
                     <div class="tw-flex tw-items-center">
                        <div class="tw-font-medium tw-text-4xl">20</div>
                        <div class="tw-text-sm tw-ml-2">total <br> data</div>
                     </div>
                  </div>
                  <div class="tw-flex tw-flex-col tw-px-7 tw-py-7">
                     <table>
                        <tbody class="tw-text-left tw-font-ubuntu tw-text-[#B4B8BC] tw-font-bold">
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">latest data created</th>
                           <td class="tw-text-white tw-text-right tw-pl-3">2 days ago</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">recent activity</th>
                           <td class="tw-text-white tw-text-right">create</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal">latest data</th>
                           <td class="tw-text-white tw-text-right">TKJ</td>
                        </tr>
                        </tbody>
                     </table>
                     <a href="/admin/jurusan">
                        <div class="card-data-btn">Manage</div>
                     </a>
                  </div>
               </li>
               <li class="card-data">
                  <div class="tw-flex tw-bg-[#90C2C2] tw-font-ubuntu tw-text-white tw-rounded-xl tw-gap-8 tw-py-16 tw-px-12">
                     <div class="tw-flex tw-flex-col">
                        <i class="fa-solid fa-shapes tw-text-5xl tw-mx-auto"></i>
                        <div class="tw-font-medium tw-text-xl tw-text-center">MaPel</div>
                     </div>
                     <div class="tw-flex tw-items-center">
                        <div class="tw-font-medium tw-text-4xl">20</div>
                        <div class="tw-text-sm tw-ml-2">total <br> data</div>
                     </div>
                  </div>
                  <div class="tw-flex tw-flex-col tw-px-7 tw-py-7">
                     <table>
                        <tbody class="tw-text-left tw-font-ubuntu tw-text-[#B4B8BC] tw-font-bold">
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">latest data created</th>
                           <td class="tw-text-white tw-text-right tw-pl-3">2 days ago</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">recent activity</th>
                           <td class="tw-text-white tw-text-right">create</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal">latest data</th>
                           <td class="tw-text-white tw-text-right">TKJ</td>
                        </tr>
                        </tbody>
                     </table>
                     <a href="/admin/mata-pelajaran">
                        <div class="card-data-btn">Manage</div>
                     </a>
                  </div>
               </li>
               <li class="card-data">
                  <div class="tw-flex tw-bg-[#90C2C2] tw-font-ubuntu tw-text-white tw-rounded-xl tw-gap-8 tw-py-16 tw-px-12">
                     <div class="tw-flex tw-flex-col">
                        <i class="fa-solid fa-shapes tw-text-5xl tw-mx-auto"></i>
                        <div class="tw-font-medium tw-text-xl tw-text-center">MaPel Jurusan</div>
                     </div>
                     <div class="tw-flex tw-items-center">
                        <div class="tw-font-medium tw-text-4xl">20</div>
                        <div class="tw-text-sm tw-ml-2">total <br> data</div>
                     </div>
                  </div>
                  <div class="tw-flex tw-flex-col tw-px-7 tw-py-7">
                     <table>
                        <tbody class="tw-text-left tw-font-ubuntu tw-text-[#B4B8BC] tw-font-bold">
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">latest data created</th>
                           <td class="tw-text-white tw-text-right tw-pl-3">2 days ago</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">recent activity</th>
                           <td class="tw-text-white tw-text-right">create</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal">latest data</th>
                           <td class="tw-text-white tw-text-right">TKJ</td>
                        </tr>
                        </tbody>
                     </table>
                     <a href="/admin/mapel-jurusan">
                        <div class="card-data-btn">Manage</div>
                     </a>
                  </div>
               </li>
               <li class="card-data">
                  <div class="tw-flex tw-bg-[#90C2C2] tw-font-ubuntu tw-text-white tw-rounded-xl tw-gap-8 tw-py-16 tw-px-12">
                     <div class="tw-flex tw-flex-col">
                        <i class="fa-solid fa-shapes tw-text-5xl tw-mx-auto"></i>
                        <div class="tw-font-medium tw-text-xl tw-text-center">Mutasi</div>
                     </div>
                     <div class="tw-flex tw-items-center">
                        <div class="tw-font-medium tw-text-4xl">20</div>
                        <div class="tw-text-sm tw-ml-2">total <br> data</div>
                     </div>
                  </div>
                  <div class="tw-flex tw-flex-col tw-px-7 tw-py-7">
                     <table>
                        <tbody class="tw-text-left tw-font-ubuntu tw-text-[#B4B8BC] tw-font-bold">
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">latest data created</th>
                           <td class="tw-text-white tw-text-right tw-pl-3">2 days ago</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">recent activity</th>
                           <td class="tw-text-white tw-text-right">create</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal">latest data</th>
                           <td class="tw-text-white tw-text-right">TKJ</td>
                        </tr>
                        </tbody>
                     </table>
                     <a href="/admin/mutasi">
                        <div class="card-data-btn">Manage</div>
                     </a>
                  </div>
               </li>
               <li class="card-data">
                  <div class="tw-flex tw-bg-[#90C2C2] tw-font-ubuntu tw-text-white tw-rounded-xl tw-gap-8 tw-py-16 tw-px-12">
                     <div class="tw-flex tw-flex-col">
                        <i class="fa-solid fa-shapes tw-text-5xl tw-mx-auto"></i>
                        <div class="tw-font-medium tw-text-xl tw-text-center">Rapor</div>
                     </div>
                     <div class="tw-flex tw-items-center">
                        <div class="tw-font-medium tw-text-4xl">20</div>
                        <div class="tw-text-sm tw-ml-2">total <br> data</div>
                     </div>
                  </div>
                  <div class="tw-flex tw-flex-col tw-px-7 tw-py-7">
                     <table>
                        <tbody class="tw-text-left tw-font-ubuntu tw-text-[#B4B8BC] tw-font-bold">
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">latest data created</th>
                           <td class="tw-text-white tw-text-right tw-pl-3">2 days ago</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">recent activity</th>
                           <td class="tw-text-white tw-text-right">create</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal">latest data</th>
                           <td class="tw-text-white tw-text-right">TKJ</td>
                        </tr>
                        </tbody>
                     </table>
                     <a href="/admin/rapor">
                        <div class="card-data-btn">Manage</div>
                     </a>
                  </div>
               </li>
               <li class="card-data">
                  <div class="tw-flex tw-bg-[#90C2C2] tw-font-ubuntu tw-text-white tw-rounded-xl tw-gap-8 tw-py-16 tw-px-12">
                     <div class="tw-flex tw-flex-col">
                        <i class="fa-solid fa-shapes tw-text-5xl tw-mx-auto"></i>
                        <div class="tw-font-medium tw-text-xl tw-text-center">Nilai Mapel</div>
                     </div>
                     <div class="tw-flex tw-items-center">
                        <div class="tw-font-medium tw-text-4xl">20</div>
                        <div class="tw-text-sm tw-ml-2">total <br> data</div>
                     </div>
                  </div>
                  <div class="tw-flex tw-flex-col tw-px-7 tw-py-7">
                     <table>
                        <tbody class="tw-text-left tw-font-ubuntu tw-text-[#B4B8BC] tw-font-bold">
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">latest data created</th>
                           <td class="tw-text-white tw-text-right tw-pl-3">2 days ago</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">recent activity</th>
                           <td class="tw-text-white tw-text-right">create</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal">latest data</th>
                           <td class="tw-text-white tw-text-right">TKJ</td>
                        </tr>
                        </tbody>
                     </table>
                     <a href="/admin/nilai-mapel">
                        <div class="card-data-btn">Manage</div>
                     </a>
                  </div>
               </li>
            </ul>
         </div>
      </section> --}}
   </div>
</div>
@endsection