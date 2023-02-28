@extends('layouts.main-new')

@section('content')
    <div class="tw-flex tw-justify-center">
        <div
            class="tw-flex tw-flex-col tw-rounded-[35px] tw-bg-white lg:tw-w-1/2 sm:tw-w-full sm:tw-mx-5 tw-p-8 tw-h-full tw-mx-auto tw-my-10 tw-shadow-lg">
            <a href="{{ $prevPage }}"
                class="tw-text-sims-new-500 sm:tw-text-md md:tw-text-3xl tw-w-min hover:tw-text-sims-new-600"><i
                    class="fa-solid fa-chevron-left"></i></a>
            <h3 class="tw-font-satoshi tw-font-semibold tw-mt-6 tw-mb-14 tw-text-sims-new-500 tw-text-center">Tambah Akun
            </h3>
            <form action="/admin/account" method="POST">
                @csrf
                @method('POST')

                {{-- <input type="hidden" name="prevURL" id="prevURL" value="{{ $prevURL }}"> --}}

                <div class="tw-flex tw-flex-col tw-space-y-6">
                    <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                        <label class="label-input" for="nip">
                            NIP *
                        </label>
                        <input @error('nip') is-invalid @enderror class="input-data-minimal tw-w-full" id="nip"
                            name="nip" type="text" maxlength="10" required>
                        @error('nip')
                            <small class="tw-text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                        <label class="label-input" for="nama">
                            Nama *
                        </label>
                        <input @error('nama') is-invalid @enderror class="input-data-minimal tw-w-full" id="nama"
                            name="nama" type="text" required>
                        @error('nama')
                            <small class="tw-text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                        <label class="label-input" for="email">
                            Email *
                        </label>
                        <input @error('email') is-invalid @enderror class="input-data-minimal tw-w-full" id="email"
                            name="email" type="email">
                        @error('email')
                            <small class="tw-text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                        <label class="label-input" for="no_telp">
                            Nomor Telepon
                        </label>
                        <input @error('no_telp') is-invalid @enderror class="input-data-minimal tw-w-full" id="no_telp"
                            name="no_telp" type="text">
                        @error('no_telp')
                            <small class="tw-text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div x-data="{ show: true }" class="tw-relative tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                        <label class="label-input" for="password">
                            Password
                        </label>
                        <input @error('password') is-invalid @enderror class="input-data-minimal tw-w-full" id="password"
                            name="password" :type="show ? 'password' : 'text'">

                        <div
                            class="tw-absolute tw-inset-y-0 tw-right-0 tw-pt-7 tw-pr-3 tw-flex tw-items-center tw-text-sm tw-leading-5">

                            <svg class="tw-h-5 tw-text-gray-500" fill="none" @click="show = !show"
                                :class="{ 'tw-hidden': !show, 'tw-block': show }" xmlns="http://www.w3.org/2000/svg"
                                viewbox="0 0 576 512">
                                <path fill="currentColor"
                                    d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 
                            32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 
                            32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 
                            95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                </path>
                            </svg>

                            <svg class="tw-h-5 tw-text-gray-500" fill="none" @click="show = !show"
                                :class="{ 'tw-block': !show, 'tw-hidden': show }" xmlns="http://www.w3.org/2000/svg"
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

                        @error('password')
                            <small class="tw-text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                        <label class="label-input" for="role">
                            Role *
                        </label>
                        <select class="input-data-minimal" id="nip" name="role" type="text" required>
                            <option value="1">Tata Usaha</option>
                            <option value="2">Kesiswaan</option>
                            <option value="3">Kurikulum</option>
                            <option value="4">Wali Kelas</option>
                        </select>
                    </div>
                    <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                        <label class="label-input" for="status">
                            Status Admin *
                        </label>
                        <select class="input-data-minimal" id="status" name="is_admin" type="text" required>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                    <div class="tw-mx-auto tw-text-center tw-mt-10">
                        <button type="submit"
                            class="tw-bg-sims-new-500 tw-font-sg tw-font-medium tw-transition hover:tw-bg-sims-new-600 tw-text-white tw-py-3 tw-px-6 tw-rounded-lg">Buat</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
