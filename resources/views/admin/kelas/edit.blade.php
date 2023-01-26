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
                  <label class="label-input" for="kelas">
                      Kelas *
                  </label>
                  <input value="{{ old('kelas') }}" @error('kelas') is-invalid @enderror class="input-data-minimal tw-w-full" id="kelas" name="kelas" type="text" required>
                  @error('kelas')
                      <small class="tw-text-red-500">{{ $message }}</small>
                  @enderror
              </div>
              <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                <label class="label-input" for="rombel">
                    Rombel
                </label>
                <input value="{{ old('rombel') }}" @error('rombel') is-invalid @enderror class="input-data-minimal tw-w-full" id="rombel" name="rombel" type="text">
                @error('rombel')
                    <small class="tw-text-red-500">{{ $message }}</small>
                @enderror
            </div>
              <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                  <label class="label-input" for="jurusan">
                       Jurusan *
                  </label>
                  <select class="input-data-minimal" id="jurusan" name="jurusan" required>
                      {{-- @if(old('jurusan') == 'L')
                      <option selected value="{{ old('jurusan') }}">Laki-laki</option>
                      <option value="P">Perempuan</option>
                      @elseif(old('jurusan' == 'P'))
                      <option selected value="{{ old('jurusan') }}">Perempuan</option>
                      <option value="L">Laki-laki</option>
                      @else
                      <option selected>Pilih</option>
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
                      @endif --}}
                  </select>
              </div>
              <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                  <label class="label-input" for="JurusanId">
                      Id Jurusan
                  </label>
                  <select class="input-data-minimal" id="JurusanId" name="JurusanId">
                      {{-- <option value="">-</option>
                      @if(old('JurusanId'))
                      <option value="{{ old('kelas') }}">{{ old('kelas') }}</option>
                      @endif
                      @foreach ($kelas as $k)
                      <option value="{{ $k->JurusanId }}">{{ $k->JurusanId }}</option>
                      @endforeach --}}
                  </select>
              </div>
              <div class="tw-mx-auto tw-text-center tw-mt-10">
                  <button type="submit" class="tw-bg-sims-new-500 tw-font-sg tw-font-medium tw-transition hover:tw-bg-sims-new-600 tw-text-white tw-py-3 tw-px-6 tw-rounded-lg">Kirim</button>
              </div>
          </div>
      </form>
</div>

@endsection