@extends('layouts.admin')

@section('content')
<div class="tw-m-10 tw-w-screen">
  <div class="tw-flex tw-flex-col tw-gap-5">
    <div class="tw-flex">
      <i class="fa-solid fa-user-group tw-text-admin-300 tw-text-xl"></i>
      <div class="tw-text-xl tw-ml-3 tw-font-pop tw-font-semibold tw-text-gray-300">Account Management</div>
    </div>
    <div class="tw-bg-white tw-mt-12 tw-rounded-xl shadow-cs tw-w-full tw-flex tw-py-20 tw-px-36 tw-justify-between tw-font-ubuntu tw-gap-40 tw-border-b-[13px] tw-border-admin-300">
      <div class="tw-flex tw-gap-8 tw-text-admin-300">
        <div class="tw-text-center">
          <i class="fa-solid fa-user tw-text-6xl"></i>
          <h5 class="tw-font-bold tw-mt-2">Staff TU</h5>
        </div>
        <div class="tw-items-center tw-flex">
        <h3 class="text-5xl tw-font-bold tw-mb-2">4</h3>
        </div>
      </div>
      <div class="tw-flex tw-gap-8 tw-text-salmon-400">
        <div class="tw-text-center">
          <i class="fa-solid fa-user tw-text-6xl"></i>
          <h5 class="tw-font-bold tw-mt-2">Kesiswaan</h5>
        </div>
        <div class="tw-items-center tw-flex">
        <h3 class="text-5xl tw-font-bold tw-mb-2">2</h3>
        </div>
      </div>
      <div class="tw-flex tw-gap-8 tw-text-oren-400">
        <div class="tw-text-center">
          <i class="fa-solid fa-user tw-text-6xl"></i>
          <h5 class="tw-font-bold tw-mt-2">Walikelas</h5>
        </div>
        <div class="tw-items-center tw-flex">
        <h3 class="text-5xl tw-font-bold tw-mb-2">6</h3>
        </div>
      </div>
      <div class="tw-flex tw-gap-8 tw-text-gray-400">
        <div class="tw-text-center">
          <i class="fa-solid fa-user tw-text-6xl"></i>
          <h5 class="tw-font-bold tw-mt-2">Kurikulum</h5>
        </div>
        <div class="tw-items-center tw-flex">
        <h3 class="text-5xl tw-font-bold tw-mb-2">1</h3>
        </div>
      </div>
      <div class="tw-flex tw-gap-8 tw-text-pixie-300">
        <div class="tw-text-center">
          <i class="fa-solid fa-user tw-text-6xl"></i>
          <h5 class="tw-font-bold tw-mt-2">Admin</h5>
        </div>
        <div class="tw-items-center tw-flex">
        <h3 class="text-5xl tw-font-bold tw-mb-2">1</h3>
        </div>
      </div>
    
    </div>
    <div class="tw-flex tw-bg-white tw-rounded-xl shadow-cs tw-w-full tw-justify-between tw-py-10 tw-px-12">
      <div class="tw-text-gray-300 tw-text-2xl tw-font-semibold tw-font-pop tw-items-center tw-flex">All Account</div>
      <div class="tw-flex tw-gap-5 tw-font-ubuntu tw-text-white tw-font-medium">
        <form action="" method="POST" class="tw-bg-salmon-400 tw-rounded-lg">
          {{-- @csrf
          @method('DELETE') --}}
          <button type="submit" class="tw-py-4 tw-px-6"><i class="fa-regular fa-trash-can tw-mr-4 tw-text-xl"></i>Delete all account</button>
        </form>
        <a href="" class="tw-bg-admin-300 tw-py-4 tw-px-6 tw-rounded-lg"><i class="fa-regular fa-square-plus tw-mr-4 tw-text-xl"></i>Create new account</a>
      </div>
    </div>

    <div class="tw-flex tw-flex-col tw-bg-white shadow-cs tw-py-8 tw-px-16 tw-rounded-xl tw-w-full tw-mb-8">
      <div class="tw-flex tw-justify-end">
        <div class="tw-flex tw-mb-14">
            <input type="text" class="tw-px-4 tw-rounded-xl tw-border tw-border-gray-300 tw-py-2 tw-w-80">
            <button class="tw-px-5 -tw-ml-4 tw-rounded-xl tw-text-white tw-bg-admin-300">
              <i class="fa-regular fa-magnifying-glass"></i>
            </button>
        </div>
      </div>
      <div class="tw-overflow-y-scroll tw-h-[600px] tw-scrollbar-thumb-gray-300 tw-scrollbar-thumb-rounded-lg tw-scrollbar-thin tw-scrollbar-track-gray-100">
        <table class="tw-w-full tw-mt-10 tw-text-sm tw-text-center">
          <thead class="tw-text-lg tw-font-pop tw-text-admin-300">
              <tr>
                  <th scope="col" class="tw-pb-9"></th>
                  <th scope="col" class="tw-pb-9">NIP</th>
                  <th scope="col" class="tw-pb-9">Nama</th>
                  <th scope="col" class="tw-pb-9">Created</th>
                  <th scope="col" class="tw-pb-9">Role</th>
                  <th scope="col" class="tw-pb-9"></th>
              </tr>
          </thead>
          <tbody>     
              <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                  <td class="tw-pb-6 tw-pl-6 tw-border-b">
                    <div class="tw-bg-admin-300 tw-p-2 tw-rounded-2xl tw-text-white tw-w-14 tw-h-14 tw-items-center tw-flex tw-justify-center"><i class="fa-solid fa-user tw-text-2xl"></i></div>
                  </td>
                  <td class="tw-pb-6 tw-border-b">192871837268361728</td>
                  <td class="tw-pb-6 tw-border-b">Ibnu Asep bin Budi</td>
                  <td class="tw-pb-6 tw-border-b">12 February 2023</td>
                  <td class="tw-pb-6 tw-border-b">Tata Usaha</td>
                  <td class="tw-pb-6 tw-border-b">
                    <a href="#" class="tw-text-white tw-bg-admin-300 hover:tw-bg-admin-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-7 tw-mr-1">
                        View
                    </a>
                  </td>
              </tr>
              <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                <td class="tw-py-6 tw-pl-6 tw-border-b">
                  <div class="tw-bg-admin-300 tw-p-2 tw-rounded-2xl tw-text-white tw-w-14 tw-h-14 tw-items-center tw-flex tw-justify-center"><i class="fa-solid fa-user tw-text-2xl"></i></div>
                </td>
                <td class="tw-py-6 tw-border-b">192871837268361728</td>
                <td class="tw-py-6 tw-border-b">Maria Saint Joseph</td>
                <td class="tw-py-6 tw-border-b">12 February 2023</td>
                <td class="tw-py-6 tw-border-b">Tata Usaha</td>
                <td class="tw-py-6 tw-border-b">
                  <a href="#" class="tw-text-white tw-bg-admin-300 hover:tw-bg-admin-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-7 tw-mr-1">
                      View
                  </a>
                </td>
              </tr>
              <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                <td class="tw-py-6 tw-pl-6 tw-border-b">
                  {{-- nanti ganti sama img --}}
                  <div class="tw-bg-admin-300 tw-p-2 tw-rounded-2xl tw-text-white tw-w-14 tw-h-14 tw-items-center tw-flex tw-justify-center"><i class="fa-solid fa-user tw-text-2xl"></i></div>
                </td>
                <td class="tw-py-6 tw-border-b">192871837268361728</td>
                <td class="tw-py-6 tw-border-b">Lucifer Mattius</td>
                <td class="tw-py-6 tw-border-b">12 February 2023</td>
                <td class="tw-py-6 tw-border-b">Tata Usaha</td>
                <td class="tw-py-6 tw-border-b">
                  <a href="#" class="tw-text-white tw-bg-admin-300 hover:tw-bg-admin-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-7 tw-mr-1">
                      View
                  </a>
                </td>
              </tr>
              <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                <td class="tw-py-6 tw-pl-6 tw-border-b">
                  <div class="tw-bg-admin-300 tw-p-2 tw-rounded-2xl tw-text-white tw-w-14 tw-h-14 tw-items-center tw-flex tw-justify-center"><i class="fa-solid fa-user tw-text-2xl"></i></div>
                </td>
                <td class="tw-py-6 tw-border-b">192871837268361728</td>
                <td class="tw-py-6 tw-border-b">Farhan Ibn Umar</td>
                <td class="tw-py-6 tw-border-b">12 February 2023</td>
                <td class="tw-py-6 tw-border-b">Tata Usaha</td>
                <td class="tw-py-6 tw-border-b">
                  <a href="#" class="tw-text-white tw-bg-admin-300 hover:tw-bg-admin-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-7 tw-mr-1">
                      View
                  </a>
                </td>
              </tr>
              <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                <td class="tw-py-6 tw-pl-6 tw-border-b">
                  <div class="tw-bg-salmon-400 tw-p-2 tw-rounded-2xl tw-text-white tw-w-14 tw-h-14 tw-items-center tw-flex tw-justify-center"><i class="fa-solid fa-user tw-text-2xl"></i></div>
                </td>
                <td class="tw-py-6 tw-border-b">192871837268361728</td>
                <td class="tw-py-6 tw-border-b">Trevor Jonas</td>
                <td class="tw-py-6 tw-border-b">12 February 2023</td>
                <td class="tw-py-6 tw-border-b">Kesiswaan</td>
                <td class="tw-py-6 tw-border-b">
                  <a href="#" class="tw-text-white tw-bg-salmon-400 hover:tw-bg-salmon-500 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-7 tw-mr-1">
                      View
                  </a>
                </td>
              </tr>
              <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                <td class="tw-py-6 tw-pl-6 tw-border-b">
                  <div class="tw-bg-salmon-400 tw-p-2 tw-rounded-2xl tw-text-white tw-w-14 tw-h-14 tw-items-center tw-flex tw-justify-center"><i class="fa-solid fa-user tw-text-2xl"></i></div>
                </td>
                <td class="tw-py-6 tw-border-b">192871837268361728</td>
                <td class="tw-py-6 tw-border-b">Joni Kesbor</td>
                <td class="tw-py-6 tw-border-b">12 February 2023</td>
                <td class="tw-py-6 tw-border-b">Kesiswaan</td>
                <td class="tw-py-6 tw-border-b">
                  <a href="#" class="tw-text-white tw-bg-salmon-400 hover:tw-bg-salmon-500 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-7 tw-mr-1">
                      View
                  </a>
                </td>
              </tr>
              <tr class="tw-bg-white tw-text-[#B4B8BC] tw-font-bold text-lg tw-font-ubuntu">
                <td class="tw-py-6 tw-pl-6 tw-border-b">
                  <div class="tw-bg-salmon-400 tw-p-2 tw-rounded-2xl tw-text-white tw-w-14 tw-h-14 tw-items-center tw-flex tw-justify-center"><i class="fa-solid fa-user tw-text-2xl"></i></div>
                </td>
                <td class="tw-py-6 tw-border-b">192871837268361728</td>
                <td class="tw-py-6 tw-border-b">Asep Slebew</td>
                <td class="tw-py-6 tw-border-b">12 February 2023</td>
                <td class="tw-py-6 tw-border-b">Kesiswaan</td>
                <td class="tw-py-6 tw-border-b">
                  <a href="#" class="tw-text-white tw-bg-salmon-400 hover:tw-bg-salmon-500 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-7 tw-mr-1">
                      View
                  </a>
                </td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection