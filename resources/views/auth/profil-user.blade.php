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
                    @if (auth()->user()->role == 1)
                        Tata Usaha
                    @endif
                    @if (auth()->user()->role == 2)
                        Kesiswaan
                    @endif
                    @if (auth()->user()->role == 3)
                        Kurikulum
                    @endif
                    @if (auth()->user()->role == 4)
                        Wali Kelas
                    @endif

                </div>
                <div class="sims-heading-3xl-black">
                    {{ auth()->user()->nama }}
                @can('admin-only')
                    <i title="User ini merupakan Admin" class="fa-solid fa-shield-check tw-text-sims-500 tw-text-2xl tw-ml-1"></i>
                @endcan
                </div>
            </div>
        </div>
        <div class="tw-float-right tw-mr-8 tw-flex tw-flex-col">
            <div class="sims-text-gray-lg tw-text-right">
                <h5><span class="tw-font-bold">Created :</span> {{ auth()->user()->created_at }}</h5>
                <h5><span class="tw-font-bold">Updated :</span> {{ auth()->user()->updated_at }}</h5>
            </div>
        </div>
    </div>


    {{-- account details and history --}}
    <div class="tw-border-t-2 tw-border-indigo-100 tw-bg-white tw-grid tw-grid-cols-2 tw-mt-8">
        <div class="tw-grid tw-grid-cols-2 tw-px-14 tw-bg-white tw-border-r-2 tw-border-indigo-100 tw-pt-14">
            <ul class="sims-heading-xl tw-grid tw-gap-14 tw-pl-0">
                <li class="tw-text-gray-400 sims-heading-2xl">Detail</li>
                <li>NIP</li>
                <li class="tw-flex">
                    Email
                    @if (auth()->user()->email_verified_at)
                        <span class="tw-text-xs tw-flex tw-ml-3 tw-py-1 tw-px-2.5 tw-text-center tw-whitespace-nowrap tw-items-center tw-justify-center tw-font-bold tw-bg-ijo-400 tw-text-white tw-rounded-full">Terverifikasi</span>
                    @else
                        <a href="/profile/edit"><span class="tw-text-xs tw-flex tw-ml-3 tw-py-1 tw-px-2.5 tw-text-center tw-whitespace-nowrap tw-items-center tw-justify-center tw-font-bold tw-bg-gray-400 hover:tw-bg-gray-600 tw-text-white tw-rounded-full">Belum Terverifikasi</span></a>
                    @endif
                </li>
                <li>Bagian</li>
                <li>Nomor Telepon</li>
                @if(auth()->user()->role == 4)
                <li>Walikelas</li>
                @endif
            </ul>
            <ul class="sims-text-gray-xl tw-text-right tw-pl-0 tw-grid tw-gap-14">
                <li>
                    <a href="/profile/edit" class="tw-text-sims-new-500 hover:tw-text-sims-new-700 tw-text-2xl"><i class="fa-solid fa-pen-line"></i></a>
                </li>
                <li>{{ auth()->user()->nip }}</li>
                <li>{{ auth()->user()->email }}</li>
                <li>                
                    @if (auth()->user()->role == 1)
                        Tata Usaha
                    @endif
                    @if (auth()->user()->role == 2)
                        Kesiswaan
                    @endif
                    @if (auth()->user()->role == 3)
                        Kurikulum
                    @endif
                    @if (auth()->user()->role == 4)
                        Wali Kelas
                    @endif
                    @if (auth()->user()->is_admin == 1)
                        Admin
                    @endif
                </li>
                <li>{{ auth()->user()->no_telp }}</li>
                @if(auth()->user()->role == 4)
                <li>
                    @if(!empty($kelas_walkel))
                        {{ $kelas_walkel }}
                    @else
                        Kelas belum ditentukan.
                    @endif
                </li>
                @endif
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
                <a href="/history/my" class="hover:tw-text-sims-new-400 tw-text-sims-new-500 tw-h-fit tw-underline tw-text-base">lihat semua histori</a>
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