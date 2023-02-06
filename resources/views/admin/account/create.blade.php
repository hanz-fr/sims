@extends('layouts.main-new')

@section('content')
<div class="tw-flex tw-justify-center">
    <div class="tw-flex tw-flex-col tw-rounded-[35px] tw-bg-white lg:tw-w-1/2 sm:tw-w-full sm:tw-mx-5 tw-p-8 tw-h-full tw-mx-auto tw-my-10 tw-shadow-lg">
        <a href="{{ $prevPage }}" class="tw-text-sims-new-500 sm:tw-text-md md:tw-text-3xl tw-w-min hover:tw-text-sims-new-600"><i class="fa-solid fa-chevron-left"></i></a>
        <h3 class="tw-font-satoshi tw-font-semibold tw-mt-6 tw-mb-14 tw-text-sims-new-500 tw-text-center">Tambah Akun</h3>
        <form action="/admin/account" method="POST">
          @csrf
          @method('POST')
    
          {{-- <input type="hidden" name="prevURL" id="prevURL" value="{{ $prevURL }}"> --}}
    
            <div class="tw-flex tw-flex-col tw-space-y-6">
                <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                    <label class="label-input" for="nip">
                        NIP *
                    </label>
                    <input @error('nip') is-invalid @enderror class="input-data-minimal tw-w-full" id="nip" name="nip" type="text" maxlength="10" required>
                    @error('nip')
                        <small class="tw-text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                    <label class="label-input" for="nama">
                        Nama *
                    </label>
                    <input @error('nama') is-invalid @enderror class="input-data-minimal tw-w-full" id="nama" name="nama" type="text" required>
                    @error('nama')
                        <small class="tw-text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                    <label class="label-input" for="email">
                        Email *
                    </label>
                    <input @error('email') is-invalid @enderror class="input-data-minimal tw-w-full" id="email" name="email" type="email">
                    @error('email')
                        <small class="tw-text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                    <label class="label-input" for="no_telp">
                        Nomor Telepon
                    </label>
                    <input @error('no_telp') is-invalid @enderror class="input-data-minimal tw-w-full" id="no_telp" name="no_telp" type="text">
                    @error('no_telp')
                        <small class="tw-text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                    <label class="label-input" for="password">
                        Password
                    </label>
                    <input @error('password') is-invalid @enderror class="input-data-minimal tw-w-full" id="password" name="password" type="password">
                    @error('password')
                        <small class="tw-text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                    <label class="label-input" for="role">
                        Role
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
                        Status Admin
                    </label>
                    <select class="input-data-minimal" id="status" name="is_admin" type="text" required>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
                <div class="tw-mx-auto tw-text-center tw-mt-10">
                    <button type="submit" class="tw-bg-sims-new-500 tw-font-sg tw-font-medium tw-transition hover:tw-bg-sims-new-600 tw-text-white tw-py-3 tw-px-6 tw-rounded-lg">Buat</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection