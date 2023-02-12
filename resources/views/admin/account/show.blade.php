@extends('layouts.main-new')

@section('content')
<div class="tw-mt-10">
  <div class="tw-flex tw-flex-col tw-mt-8">

    <h4 class="sims-heading-3xl tw-ml-8">Detail Akun</h4>

    <div class="tw-flex tw-flex-col tw-ml-8 tw-mt-14">
        <div class="tw-flex tw-float-left tw-items-center">
            <i class="fa-solid fa-user tw-text-center text-9xl tw-bg-sims-new-500 tw-rounded-full tw-drop-shadow-xl tw-pt-10 tw-overflow-hidden tw-text-white tw-w-40 tw-h-40"></i>
            <div class="tw-ml-8">
                <div class="sims-text-gray-xl">
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
                <div class="sims-heading-3xl-black">
                    {{ $user->nama }} 
                    @if ($user->is_admin === 1)
                        <i title="User ini merupakan Admin" class="fa-solid fa-shield-check tw-text-sims-500 tw-text-2xl tw-ml-1"></i>
                    @endif
                </div>                 
            </div>
        </div>

        <div class="tw-float-right tw-mr-8 tw-flex tw-flex-col">

            {{-- klo user dan admin lebih dari 1, tampilin tombol delete --}}
            @if($usercount > 1 && $admincount > 1)
                <form action="/admin/account/{{ $user->id }}" method="POST" class="tw-float-right tw-text-right tw-mb-5 -tw-mt-20">
                    @csrf
                    @method('DELETE')

                    <button type="button" data-modal-toggle="popup-modal" class="tw-bg-red-400 hover:tw-bg-red-600 tw-transition-all tw-w-fit tw-px-4 tw-py-2 tw-rounded-xl tw-text-base tw-text-white tw-font-satoshi"><i class="fa-regular fa-trash-can tw-text-lg tw-mr-2"></i>Hapus Akun</button>

                    <div id="popup-modal" tabindex="-1"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                            <div class="tw-relative tw-bg-white tw-rounded-lg tw-shadow dark:tw-bg-slate-100">
                                <button type="button"
                                    class="tw-absolute tw-top-3 tw-right-2.5 tw-text-gray-400 tw-bg-transparent hover:tw-bg-gray-200 hover:tw-text-gray-900 tw-rounded-lg tw-text-sm tw-p-1.5 tw-ml-auto tw-inline-flex tw-items-center"
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
                                        Hapus akun?</div>
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
            @endif
            <div class="sims-text-gray-lg tw-text-right">
                <h5><span class="tw-font-bold">Created :</span> {{ $user->created_at }}</h5>
                <h5><span class="tw-font-bold">Updated :</span> {{ $user->updated_at }}</h5>
            </div>
        </div>
    </div>


    {{-- account details and history --}}
    <div class="tw-border-t-2 tw-border-indigo-100 tw-bg-white tw-grid tw-grid-cols-2 tw-mt-8">
        <div class="tw-grid tw-grid-cols-2 tw-px-14 tw-bg-white tw-border-r-2 tw-border-indigo-100 tw-pt-14">
            <ul class="sims-heading-xl tw-grid tw-gap-14 tw-pl-0">
                <li class="tw-text-gray-400 sims-heading-2xl">Detail</li>
                <li>NIP</li>
                <li>Email</li>
                <li>Bagian</li>
                <li>Nomor Telepon</li>
            </ul>
            <ul class="sims-text-gray-xl tw-text-right tw-pl-0 tw-grid tw-gap-14">
                <li>
                    <a href="/admin/account/{{ $user->id }}/edit" class="tw-text-sims-new-500 tw-transition-all hover:tw-text-sims-new-700 tw-text-2xl"><i class="fa-solid fa-pen-line"></i></a>
                </li>
                <li>{{ $user->nip }}</li>
                <li>{{ $user->email }}</li>
                <li>                
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
                    @if ($user->is_admin === 1)
                        Admin
                    @endif
                </li>
                <li>{{ $user->no_telp }}</li>
            </ul>
        </div>
        @if($history === [])
        <div class="tw-flex tw-flex-col tw-px-14 tw-pt-14">
            <img src="{{ URL::asset('assets/img/history-empty.jpg') }}" class="tw-mx-auto" alt="no_history" width="50%">
            <div class="tw-text-gray-400 tw-font-light sims-text-gray-sm tw-mt-5 tw-text-center">Anda belum memiliki aktifitas.</div>
        </div>
        @else
        <div class="tw-px-14 tw-pt-14 tw-grid tw-grid-rows-6">
            <div class="sims-heading-xl tw-pl-0 tw-flex tw-justify-between">
                <div class="tw-text-gray-400 sims-heading-2xl">Aktivitas</div>
                {{-- <a href="/history/my" class="tw-text-sims-new-500 hover:tw-text-sims-600 tw-underline tw-text-base">lihat semua histori</a> --}}
            </div>
            @foreach($history as $h)
            <div class="tw-pl-0 tw-flex tw-justify-between">
                <div class="sims-heading-xl">{{ $h->activityName }}</div>
                <div class="sims-text-gray-xl">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($h->createdAt))->diffForHumans() }}</div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
  </div>
</div>
@endsection