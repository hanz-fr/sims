@extends('layouts.main-new')

@section('content')

<div class="tw-flex tw-justify-center">
    <div class="tw-flex tw-flex-col tw-rounded-[35px] tw-bg-white lg:tw-w-1/2 sm:tw-w-full sm:tw-mx-5 tw-p-8 tw-h-full tw-mx-auto tw-my-10 tw-shadow-lg">
        <a href="/kelas" class="tw-text-sims-new-500 sm:tw-text-md md:tw-text-3xl tw-w-min hover:tw-text-sims-new-600"><i class="fa-solid fa-chevron-left"></i></a>
        <h3 class="tw-font-satoshi tw-font-semibold tw-mt-6 tw-mb-14 tw-text-sims-new-500 tw-text-center">Edit Data Kelas</h3>

    <form action="/api/mutasi-keluar/store" method="POST">
        @csrf
        @method('POST')

        {{-- <input type="hidden" name="prevURL" id="prevURL" value="{{ $prevURL }}"> --}}

          <div class="tw-flex tw-flex-col tw-space-y-6">
              <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                  <label class="label-input" for="id">
                      Id *
                  </label>
                  <input value="{{ old('id') }}" @error('id') is-invalid @enderror class="input-data-minimal tw-w-full" id="id" name="id" type="text" maxlength="10" required>
                  @error('id')
                      <small class="tw-text-red-500">{{ $message }}</small>
                  @enderror
              </div>
              <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                  <label class="label-input" for="nama_siswa">
                      Kelas *
                  </label>
                  <input value="{{ old('nama_siswa') }}" @error('nama_siswa') is-invalid @enderror class="input-data-minimal tw-w-full" id="nama_siswa" name="nama_siswa" type="text" required>
                  @error('nama_siswa')
                      <small class="tw-text-red-500">{{ $message }}</small>
                  @enderror
              </div>
              <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                <label class="label-input" for="alasan_mutasi">
                    Rombel
                </label>
                <input value="{{ old('alasan_mutasi') }}" @error('alasan_mutasi') is-invalid @enderror class="input-data-minimal tw-w-full" id="alasan_mutasi" name="alasan_mutasi" type="text">
                @error('alasan_mutasi')
                    <small class="tw-text-red-500">{{ $message }}</small>
                @enderror
            </div>
              <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                  <label class="label-input" for="jenis_kelamin">
                       Jurusan *
                  </label>
                  <select class="input-data-minimal" id="jenis_kelamin" name="jenis_kelamin" required>
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
                  <label class="label-input" for="keluar_di_kelas">
                      Id Jurusan
                  </label>
                  <select class="input-data-minimal" id="keluar_di_kelas" name="keluar_di_kelas">
                      <option value="">-</option>
                      @if(old('kelas'))
                      <option value="{{ old('kelas') }}">{{ old('kelas') }}</option>
                      @endif
                      @foreach ($kelas as $k)
                      <option value="{{ $k->id }}">{{ $k->id }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="tw-mx-auto tw-text-center tw-mt-10">
                  <button type="submit" class="tw-bg-sims-new-500 tw-font-sg tw-font-medium tw-transition hover:tw-bg-sims-new-600 tw-text-white tw-py-3 tw-px-6 tw-rounded-lg">Kirim</button>
              </div>
          </div>
      </form>
</div>

@endsection