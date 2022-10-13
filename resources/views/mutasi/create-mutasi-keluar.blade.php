@extends('layouts.main')

@section('content')

<div class="tw-flex tw-justify-center">
    @if(session()->has('error-mutasi'))
    <div id="popup-modal" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40">
        <div id="popup-modal" tabindex="-1" class="tw-absolute tw-top-1/2 tw-left-1/2 tw-transform -tw-translate-x-1/2 -tw-translate-y-1/2">
            <div class="tw-relative tw-p-4 tw-w-full tw-max-w-md tw-h-full md:tw-h-auto">
                <div class="tw-relative tw-bg-white tw-rounded-lg tw-shadow dark:tw-bg-slate-100">
                    <div class="tw-p-6">
                        <svg aria-hidden="true" class="tw-mx-auto tw-mb-4 tw-w-14 tw-h-14 tw-text-red-400 dark:tw-text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <div class="tw-mb-5 tw-flex tw-justify-center tw-text-md tw-font-normal tw-text-gray-500 dark:tw-text-gray-400">{{ session('error-mutasi') }}</div>
                        <div class="tw-flex tw-justify-center">
                            <button onclick="hidemodal();" id="okbtn" type="button" class="tw-text-gray-500 tw-bg-white hover:tw-bg-gray-100 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-gray-200 tw-rounded-lg tw-border tw-border-gray-200 tw-text-sm tw-font-medium tw-py-2.5 hover:tw-text-gray-900 focus:tw-z-10 dark:tw-bg-gray-700 dark:tw-text-gray-300 dark:tw-border-gray-500 dark:hover:tw-text-white dark:hover:tw-bg-gray-600 dark:focus:tw-ring-gray-600 tw-px-4">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @elseif(session()->has('error'))
   <div id="popup-modal" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40">
    <div id="popup-modal" tabindex="-1" class="tw-absolute tw-top-1/2 tw-left-1/2 tw-transform -tw-translate-x-1/2 -tw-translate-y-1/2">
        <div class="tw-relative tw-p-4 tw-w-full tw-max-w-md tw-h-full md:tw-h-auto">
            <div class="tw-relative tw-bg-white tw-rounded-lg tw-shadow dark:tw-bg-slate-100">
                <div class="tw-p-6">
                    <svg aria-hidden="true" class="tw-mx-auto tw-mb-4 tw-w-14 tw-h-14 tw-text-red-400 dark:tw-text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <div class="tw-mb-5 tw-flex tw-justify-center tw-text-md tw-font-normal tw-text-gray-500 dark:tw-text-gray-400">{{ session('error') }}</div>
                    <div class="tw-flex tw-justify-center">
                        <button onclick="hidemodal();" id="okbtn" type="button" class="tw-text-gray-500 tw-bg-white hover:tw-bg-gray-100 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-gray-200 tw-rounded-lg tw-border tw-border-gray-200 tw-text-sm tw-font-medium tw-py-2.5 hover:tw-text-gray-900 focus:tw-z-10 dark:tw-bg-gray-700 dark:tw-text-gray-300 dark:tw-border-gray-500 dark:hover:tw-text-white dark:hover:tw-bg-gray-600 dark:focus:tw-ring-gray-600 tw-px-4">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   @endif
    <div class="tw-flex tw-flex-col tw-rounded-[35px] tw-bg-white lg:tw-w-1/2 sm:tw-w-full sm:tw-mx-5 tw-p-8 tw-h-full tw-mx-auto tw-my-10 tw-shadow-lg">
        <a href="/siswa-keluar" class="tw-text-sims-400 sm:tw-text-md md:tw-text-3xl tw-w-min hover:tw-text-sims-500"><i class="fa-solid fa-chevron-left"></i></a>
        <h3 class="tw-font-pop tw-font-semibold tw-mt-6 tw-mb-14 tw-text-sims-400 tw-text-center">Tambah Data Mutasi Keluar</h3>
    <form action="/api/mutasi-keluar/store" method="POST">
    @csrf
    @method('POST')
    <div class="tw-flex tw-flex-col tw-space-y-6">
        <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
            <label class="label-input" for="nis_siswa">
                NIS
            </label>
            <input value="{{ old('nis_siswa') }}" class="input-data tw-w-full" id="nis_siswa" name="nis_siswa" type="text" maxlength="10" required>
            @error('nis')
            <small class="tw-text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
            <label class="label-input" for="nama_siswa">
                Nama Siswa
            </label>
            <input value="{{ old('nama_siswa') }}" class="input-data tw-w-full" id="nama_siswa" name="nama_siswa" type="text" required>
            @error('nama_siswa')
            <small class="tw-text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
            <label class="label-input" for="jenis_kelamin">
                Jenis Kelamin
              </label>
              <select class="input-data" id="jenis_kelamin" name="jenis_kelamin" required>
                @if(old('jenis_kelamin') == 'L')
                <option selected value="{{ old('jenis_kelamin') }}">Laki-laki</option>
                <option value="P">Perempuan</option>
                @elseif(old('jenis_kelamin' == 'P'))
                <option selected value="{{ old('jenis_kelamin') }}">Perempuan</option>
                <option value="L">Laki-laki</option>
                @else
                <option selected>Pilih</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
                @endif
              </select>
        </div>
        <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
            <label class="label-input" for="alasan_mutasi">
                Alasan Mutasi
            </label>
            <input value="{{ old('alasan_mutasi') }}" class="input-data tw-w-full" id="alasan_mutasi" name="alasan_mutasi" type="text">
            @error('alasan_mutasi')
            <small class="tw-text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
            <label class="label-input" for="keluar_di_kelas">
                Keluar di Kelas
            </label>
            <select class="input-data" id="keluar_di_kelas" name="keluar_di_kelas">
                <option value="">-</option>
                @if(old('kelas'))
                <option value="{{ old('kelas') }}">{{ old('kelas') }}</option>
                @endif
                @foreach ($kelas as $k)
                <option value="{{ $k->id }}">{{ $k->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
            <label class="label-input" for="pindah_ke">
                Pindah Ke
            </label>
            <input value="{{ old('pindah_ke') }}" class="input-data tw-w-full" id="pindah_ke" name="pindah_ke" type="text">
            @error('pindah_ke')
            <small class="tw-text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
            <label class="label-input" for="tgl_mutasi">
                Tanggal Mutasi
            </label>
            <input value="{{ old('tgl_mutasi') }}" class="input-data tw-w-full" id="tgl_mutasi" name="tgl_mutasi" type="date" required>
            @error('tgl_mutasi')
            <small class="tw-text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
            <label class="label-input" for="sk_mutasi">
                Surat Mutasi
            </label>
            <input value="{{ old('sk_mutasi') }}" class="input-data tw-w-full" id="sk_mutasi" name="sk_mutasi" type="text">
            @error('sk_mutasi')
            <small class="tw-text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="tw-mx-auto tw-text-center tw-mt-10">
            <button type="submit" class="tw-bg-sims-400 tw-font-medium tw-transition hover:tw-bg-sims-500 tw-text-white tw-py-3 tw-px-6 tw-rounded-lg">Kirim</button>
        </div>
    </div>
    </form>
    </div>
</div>
<script>
    let okbtn = document.getElementById("okbtn");

    const targetModal = document.getElementById("popup-modal");

    function hidemodal() {
        targetModal.style.display = "none";
    }
</script>

@endsection