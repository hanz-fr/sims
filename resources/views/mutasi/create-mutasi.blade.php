@extends('layouts.main')

@section('content')

<div class="tw-flex tw-justify-center">
    <div class="tw-flex  tw-flex-col tw-rounded-[35px] tw-bg-white tw-w-4/5 tw-p-8 tw-h-full tw-mx-auto tw-my-10 tw-shadow-lg">
    <h3 class="tw-font-pop tw-font-semibold tw-mt-6 tw-text-sims-400 tw-text-center">Tambah Data Mutasi</h3>
    <form action="/api/mutasi/store" method="POST">
    @csrf
    @method('POST')
    <div class="tw-flex tw-flex-col tw-space-y-6">
        <div class="tw-mx-auto tw-w-1/2">
            <label class="label-input" for="nis_siswa">
                NIS
            </label>
            <input value="{{ old('nis_siswa') }}" class="input-data tw-w-full" id="nis_siswa" name="nis_siswa" type="text" maxlength="10" required>
            @error('nis')
            <small class="tw-text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="tw-mx-auto tw-w-1/2">
            <label class="label-input" for="nama_siswa">
                Nama Siswa
            </label>
            <input value="{{ old('nama_siswa') }}" class="input-data tw-w-full" id="nama_siswa" name="nama_siswa" type="text" required>
            @error('nama_siswa')
            <small class="tw-text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="tw-mx-auto tw-w-1/2">
            <label class="label-input" for="alasan_mutasi">
                Alasan Mutasi
            </label>
            <input value="{{ old('alasan_mutasi') }}" class="input-data tw-w-full" id="alasan_mutasi" name="alasan_mutasi" type="text">
            @error('alasan_mutasi')
            <small class="tw-text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="tw-mx-auto tw-w-1/2">
            <label class="label-input" for="keluar_di_kelas">
                Keluar di Kelas
            </label>
            <input value="{{ old('keluar_di_kelas') }}" class="input-data tw-w-full" id="keluar_di_kelas" name="keluar_di_kelas" type="text">
            @error('keluar_di_kelas')
            <small class="tw-text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="tw-mx-auto tw-w-1/2">
            <label class="label-input" for="pindah_di_kelas">
                Pindah di Kelas
            </label>
            <input value="{{ old('pindah_di_kelas') }}" class="input-data tw-w-full" id="pindah_di_kelas" name="pindah_di_kelas" type="text">
            @error('pindah_di_kelas')
            <small class="tw-text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="tw-mx-auto tw-w-1/2">
            <label class="label-input" for="pindah_ke">
                Pindah Ke
            </label>
            <input value="{{ old('pindah_ke') }}" class="input-data tw-w-full" id="pindah_ke" name="pindah_ke" type="text">
            @error('pindah_ke')
            <small class="tw-text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="tw-mx-auto tw-w-1/2">
            <label class="label-input" for="tgl_mutasi">
                Tanggal Mutasi
            </label>
            <input value="{{ old('tgl_mutasi') }}" class="input-data tw-w-full" id="tgl_mutasi" name="tgl_mutasi" type="date">
            @error('tgl_mutasi')
            <small class="tw-text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="tw-mx-auto tw-w-1/2">
            <label class="label-input" for="sk_mutasi">
                Surat Mutasi
            </label>
            <input value="{{ old('sk_mutasi') }}" class="input-data tw-w-full" id="sk_mutasi" name="sk_mutasi" type="text">
            @error('sk_mutasi')
            <small class="tw-text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div class="tw-mx-auto tw-text-center tw-mt-10">
            <button type="submit" class="tw-bg-sims-400 tw-font-medium tw-text-white tw-py-3 tw-px-6 tw-rounded-lg">Submit</button>
        </div>
    </div>
    </form>
    </div>
</div>

@endsection