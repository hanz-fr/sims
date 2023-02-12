@extends('layouts.main-new')

@section('content')
<div class="tw-mt-10">
    <div x-data="{ openTab: 1, activeClasses: 'tw-text-sims-new-500', inactiveClasses: 'tw-text-gray-500'}" class="tw-flex tw-flex-col tw-gap-5">
        
        {{-- tab --}}
        <ul class="tw-flex sm:tw-flex-row mt-3 tw-border-b-2 tw-border-indigo-100">
            <li @click="openTab = 1" :class="{ 'tw-border-b-4 tw-border-sims-500': openTab === 1 }" class="tw-pb-2">
                <button :class="openTab === 1 ? activeClasses : inactiveClasses" class="sims-heading-lg tw-inline-block tw-py-2 tw-px-6">
                    <i class="fa-solid fa-address-card tw-mr-3 tw-text-lg"></i>Edit Profil
                </button>
            </li>
            <li @click="openTab = 2" :class="{ 'tw-border-b-4 tw-border-sims-500': openTab === 2 }" class="tw-pb-2">
                <button :class="openTab === 2 ? activeClasses : inactiveClasses" class="sims-heading-lg tw-inline-block tw-py-2 tw-px-6">
                    <i class="fa-solid fa-lock tw-mr-3 tw-text-lg"></i>Ubah Kata Sandi
                </button>
            </li>
            <li @click="openTab = 3" :class="{ 'tw-border-b-4 tw-border-sims-500': openTab === 3 }" class="tw-pb-2">
                <button :class="openTab === 3 ? activeClasses : inactiveClasses" class="sims-heading-lg tw-inline-block tw-py-2 tw-px-6">
                    <i class="fa-solid fa-badge-check tw-mr-3 tw-text-lg"></i>Verifikasi Akun
                </button>
            </li>
        </ul>
    
        {{-- edit profil --}}
        <div x-show.transition.in="openTab === 1" x-transition:enter.duration.300ms class="tw-mx-auto tw-w-2/5 tw-flex tw-flex-col tw-pb-16 tw-pt-10">
            <h4 class="sims-heading-2xl tw-mb-8">Edit Profil</h4>
            <div class="tw-flex tw-items-center">
                <i class="fa-solid fa-user tw-text-center tw-text-7xl tw-bg-sims-new-500 tw-rounded-full tw-drop-shadow-xl tw-pt-5 tw-overflow-hidden tw-text-white tw-w-20 tw-h-20 tw-mb-8"></i>
                <div class="tw-grid-rows-2 tw-ml-4 -tw-mt-3">
                    <h3 class="sims-heading-lg-black">{{ auth()->user()->nama }}</h3>
                    <h4 class="sims-text-gray-md -tw-mt-1">Kelola informasi pribadi anda, verifikasi akun, dan lainnya</h4>
                </div>
            </div>
            <form action="/profile/update/{{auth()->user()->id}}" method="POST">
                @csrf
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="nama">
                            Nama
                        </label>
                        <input class="input-data-minimal" id="nama" @error('nama') is-invalid @enderror type="text" name="nama" value="{{ auth()->user()->nama }}">
                        @error('nama')
                            <div class="tw-text-sm tw-text-pink-700 tw-mt-1 tw-font-sg">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="nip">
                            NIP
                        </label>
                        <input class="input-data-minimal" id="nip" @error('nip') is-invalid @enderror type="number" name="nip" value="{{ auth()->user()->nip }}">
                        @error('nip')
                            <div class="tw-text-sm tw-text-pink-700 tw-mt-1 tw-font-sg">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="no_telp">Nomor Telepon</label>
                        <input class="input-data-minimal" id="no_telp" @error('no_telp') is-invalid @enderror type="text" name="no_telp" value="{{ auth()->user()->no_telp }}">
                        @error('no_telp')
                            <div class="tw-text-sm tw-text-pink-700 tw-mt-1 tw-font-sg">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="tw-mx-auto tw-text-center tw-mt-10 ">
                    <button type="submit" class="tw-bg-sims-new-500 tw-font-medium tw-font-satoshi tw-text-white tw-py-3 tw-px-6 tw-rounded-lg">Simpan Perubahan</button>
                </div>
            </form>
        </div>

        {{-- change password --}}
        <div x-show.transition.in="openTab === 2" x-transition:enter.duration.300ms class="tw-mx-auto tw-w-2/5 tw-flex tw-flex-col tw-pb-16 tw-pt-10">
        <h4 class="sims-heading-2xl tw-mb-8">Ubah Kata Sandi</h4>
        <form action="/change-password" method="POST">
            @csrf
            <div x-data="{ show: true }" class="tw-flex tw-flex-wrap tw-mb-6">
                <div class="tw-relative tw-w-full">
                <label class="label-input" for="old_password">
                    Kata Sandi Lama
                </label>
                    <input class="input-data-minimal" id="old_password" type="password" name="old_password" :type="show ? 'password' : 'text'">
                    <div class="tw-absolute tw-inset-y-0 tw-right-0 tw-pt-7 tw-pr-3 tw-flex tw-items-center tw-text-sm tw-leading-5">
                        
                        <svg class="tw-h-5 tw-text-gray-500" fill="none" @click="show = !show"
                        :class="{'tw-hidden': !show, 'tw-block':show }" xmlns="http://www.w3.org/2000/svg"
                        viewbox="0 0 576 512">
                        <path fill="currentColor"
                            d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 
                            32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 
                            32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 
                            95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                        </path>
                        </svg>

                        <svg class="tw-h-5 tw-text-gray-500" fill="none" @click="show = !show"
                        :class="{'tw-block': !show, 'tw-hidden':show }" xmlns="http://www.w3.org/2000/svg"
                        viewbox="0 0 640 512">
                        <path fill="currentColor"
                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 
                            35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 
                            0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25
                            331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 
                            308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 
                            454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 
                            94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 
                            10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                        </path>
                        </svg>
                    </div>
                </div>
            </div>
            <div x-data="{ show: true }" class="tw-flex tw-flex-wrap tw-mb-6">
                <div class="tw-relative tw-w-full">
                <label class="label-input" for="old_password">
                    Kata Sandi Baru
                </label>
                    <input class="input-data-minimal" id="new_password" type="password" name="new_password" :type="show ? 'password' : 'text'">
                    <div class="tw-absolute tw-inset-y-0 tw-right-0 tw-pr-3 tw-pt-7 tw-flex tw-items-center tw-text-sm tw-leading-5">
                        
                        <svg class="tw-h-5 tw-text-gray-500" fill="none" @click="show = !show"
                        :class="{'tw-hidden': !show, 'tw-block':show }" xmlns="http://www.w3.org/2000/svg"
                        viewbox="0 0 576 512">
                        <path fill="currentColor"
                            d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 
                            32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 
                            32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 
                            95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                        </path>
                        </svg>

                        <svg class="tw-h-5 tw-text-gray-500" fill="none" @click="show = !show"
                        :class="{'tw-block': !show, 'tw-hidden':show }" xmlns="http://www.w3.org/2000/svg"
                        viewbox="0 0 640 512">
                        <path fill="currentColor"
                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 
                            35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 
                            0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25
                            331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 
                            308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 
                            454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 
                            94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 
                            10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                        </path>
                        </svg>
                    </div>
                </div>
            </div>
            <div x-data="{ show: true }" class="tw-flex tw-flex-wrap tw-mb-6">
                <div class="tw-relative tw-w-full">
                <label class="label-input" for="old_password">
                    Ulangi Kata Sandi Baru
                </label>
                    <input class="input-data-minimal" id="new_password_confirmation" type="password" name="new_password_confirmation" :type="show ? 'password' : 'text'">
                    <div class="tw-absolute tw-inset-y-0 tw-right-0 tw-pr-3 tw-pt-7 tw-flex tw-items-center tw-text-sm tw-leading-5">
                        
                        <svg class="tw-h-5 tw-text-gray-500" fill="none" @click="show = !show"
                        :class="{'tw-hidden': !show, 'tw-block':show }" xmlns="http://www.w3.org/2000/svg"
                        viewbox="0 0 576 512">
                        <path fill="currentColor"
                            d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 
                            32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 
                            32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 
                            95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                        </path>
                        </svg>

                        <svg class="tw-h-5 tw-text-gray-500" fill="none" @click="show = !show"
                        :class="{'tw-block': !show, 'tw-hidden':show }" xmlns="http://www.w3.org/2000/svg"
                        viewbox="0 0 640 512">
                        <path fill="currentColor"
                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 
                            35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 
                            0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25
                            331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 
                            308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 
                            454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 
                            94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 
                            10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                        </path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="tw-mx-auto tw-text-center tw-mt-10 ">
                <button type="submit" class="tw-bg-sims-new-500 tw-font-medium tw-font-satoshi tw-text-white tw-py-3 tw-px-6 tw-rounded-lg">Ubah Kata Sandi</button>
            </div>
        </form>
        </div>

        {{-- verify account --}}
        <div x-show.transition.in="openTab === 3" x-transition:enter.duration.300ms class="tw-mx-auto tw-w-2/5 tw-flex tw-flex-col tw-pb-16 tw-pt-10">
            <h4 class="sims-heading-2xl tw-mb-8">Verifikasi Akun</h4>
            <form action="/send-email/{{ auth()->user()->id }}" method="POST">
                @csrf
                <div class="tw-flex tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="email">Email</label>
                        <input class="input-data-minimal" id="email" @error('email') is-invalid @enderror type="email" name="email" value="{{ auth()->user()->email }}">
                        <div class="tw-text-sm tw-text-gray-400 tw-mt-1 tw-font-sg">Cek inbox email anda untuk verifikasi akun.</div>
                        @error('email')
                            <div class="tw-text-sm tw-text-pink-700 tw-mt-1 tw-font-sg">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="tw-mx-auto tw-text-center tw-mt-10 ">
                    <button type="submit" class="tw-bg-sims-new-500 tw-font-medium tw-font-satoshi tw-text-white tw-py-3 tw-px-6 tw-rounded-lg">Kirim Link Verifikasi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
