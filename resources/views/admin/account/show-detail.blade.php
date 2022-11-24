@extends('layouts.admin')

@section('content')
<div class="tw-mx-10 tw-w-screen">
  <div class="tw-flex tw-flex-col tw-mt-8 tw-gap-8">

    {{-- title --}}
    <section class="tw-flex tw-items-center">
      <a href="/admin/account">
        <i class="fa-solid fa-chevron-left tw-text-gray-400 tw-text-2xl"></i>
      </a>
      <i class="fa-solid fa-user tw-text-admin-300 tw-text-3xl tw-ml-5"></i>
      <div class="tw-text-2xl tw-ml-4 tw-font-pop tw-font-semibold tw-text-gray-300">Account Details</div>
    </section>

    {{-- account details information --}}
    <section class="tw-bg-white tw-rounded-xl tw-border-l-[17px] tw-border-admin-300 tw-pb-28 tw-pl-10 tw-font-pop shadow-cs">
      <div class="tw-flex tw-flex-col">
        <div>
          <div class="tw-bg-admin-300 tw-mt-5 tw-mb-10 tw-rounded-l-[20px] tw-px-10 tw-py-2 tw-flex tw-float-right tw-text-white tw-font-light tw-text-2xl">
            @if ($user->role === 1)
            Tata Usaha
          @endif
          @if ($user->role === 2)
              Kesiswaan
          @endif
          @if ($user->role === 3)
              Kurikulum
          @endif
          @if ($user->role === 4)
              Wali Kelas
          @endif
          </div>
        </div>
        <div class="tw-flex tw-ml-10">
          {{-- <div class="tw-bg-admin-300 tw-p-2 tw-rounded-2xl tw-text-white tw-w-44 tw-h-44 tw-items-center tw-flex tw-justify-center"><i class="fa-solid fa-user tw-text-8xl"></i></div> --}}
          <div class="tw-flex tw-flex-col tw-ml-14 tw-justify-center">
            <div class="tw-text-admin-300 tw-font-bold tw-flex tw-flex-col">
              <div class="tw-text-3xl">{{ $user->nama }}</div>
              <div class="tw-font-ubuntu tw-text-xl tw-mt-2"></div>
            </div>
            <div class="tw-text-gray-400 tw-font-light tw-mt-3">
              <div class="tw-text-xl">{{ $user->email }}</div>
              <div class="tw-text-xl tw-mt-2">{{ $user->no_telp }}</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- account action and history --}}
    <section class="tw-flex tw-bg-white tw-rounded-xl shadow-cs tw-w-full tw-justify-between tw-py-10 tw-px-12">
      <div class="tw-text-gray-300 tw-text-2xl tw-font-semibold tw-font-pop tw-items-center tw-flex tw-gap-8">
        <div class="tw-text-gray-400">Created : <span class="tw-font-light">{{ $user->created_at }}</span></div>
        <div class="tw-text-gray-400">Updated : <span class="tw-font-light">{{ $user->updated_at }}</span></div>
      </div>
      <div class="tw-flex tw-gap-5 tw-font-ubuntu tw-text-white tw-font-medium">
        <form action="/admin/account/{{ $user->id }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="button" data-modal-toggle="popup-modal" class="tw-text-white tw-rounded-lg tw-bg-red-400 hover:tw-bg-red-500 hover:tw-text-white tw-py-4 tw-pl-6 tw-pr-14"><i class="fa-regular fa-trash-can tw-mr-4 tw-text-xl"></i>Delete Account</button>

          <div id="popup-modal" tabindex="-1"
              class="hidden overflow-y-auto overflow-x-hidden fixed  z-50 md:tw-inset-0 h-modal md:h-full">
              <div class="tw-relative tw-p-4 tw-w-full tw-max-w-md tw-h-full md:tw-h-auto">
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
                          <span class="tw-sr-only">Close modal</span>
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
                              Delete Account?</div>
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
        <a href="/admin/account/{{ $user->id }}/edit" class="tw-bg-[#FFCF86] tw-py-4 tw-pl-6 tw-pr-14 tw-rounded-lg"><i class="fa-regular fa-pen-to-square tw-mr-4 tw-text-xl"></i>Edit Account</a>
      </div>
    </section>
  </div>
</div>
@endsection

@push('scripts')
  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
@endpush