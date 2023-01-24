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
                <div class="sims-heading-3xl-black">{{ $user->nama }}</div>
            </div>
        </div>
        <div class="tw-float-right tw-mr-8 tw-flex tw-flex-col">
            {{-- <div class="tw-bg-red-400 tw-right-0 tw-w-fit tw-px-4 tw-py-2 tw-rounded-xl tw-text-base tw-text-white tw-font-satoshi"><i class="fa-regular fa-trash-can tw-text-lg tw-mr-2"></i>Hapus Akun</div> --}}
            <div class="sims-text-gray-lg tw-text-right">
                <h5><span class="tw-font-bold">Created :</span> {{ $user->created_at }}</h5>
                <h5><span class="tw-font-bold">Updated :</span> {{ $user->updated_at }}</h5>
            </div>
        </div>
    </div>


    {{-- account action and history --}}

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
                    <a href="/account/{{ $user->id }}/edit" class="tw-text-sims-new-500 hover:tw-text-sims-new-700 tw-text-2xl"><i class="fa-solid fa-pen-line"></i></a>
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
                <li>Nomor Telepon</li>
            </ul>
        </div>
        <div class="tw-grid tw-grid-cols-2 tw-px-14 tw-pt-14">
            <ul class="sims-heading-xl tw-pl-0 tw-grid tw-gap-14">
                <li class="tw-text-gray-400 sims-heading-2xl">Aktifitas</li>
                <li>NIP</li>
                <li>Email</li>
                <li>Bagian</li>
                <li>Nomor Telepon</li>
            </ul>
            <ul class="sims-text-gray-xl tw-pl-0 tw-text-right tw-grid tw-gap-14">
                <li>
                    <a href="" class="tw-text-sims-new-500 tw-underline tw-text-base">lihat semua histori</a>
                </li>
                <li></li>
                <li></li>
                <li></li>
                <li>Nomor Telepon</li>
            </ul>
        </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
@endpush