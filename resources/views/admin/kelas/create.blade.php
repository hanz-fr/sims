@extends('layouts.main-new')

@section('content')

<div class="tw-flex tw-justify-center">
    <div class="tw-flex tw-flex-col tw-rounded-[35px] tw-bg-white lg:tw-w-1/2 sm:tw-w-full sm:tw-mx-5 tw-p-8 tw-h-full tw-mx-auto tw-my-10 tw-shadow-lg">
        <a href="/kelas" class="tw-text-sims-new-500 sm:tw-text-md md:tw-text-3xl tw-w-min hover:tw-text-sims-new-600"><i class="fa-solid fa-chevron-left"></i></a>
        <h3 class="tw-font-satoshi tw-font-semibold tw-mt-6 tw-mb-14 tw-text-sims-new-500 tw-text-center">Tambah Data Kelas</h3>

    <form action="/admin/kelas/store" method="POST">
        @csrf
        @method('POST')

        <input type="hidden" name="prevURL" id="prevURL" value="{{ $prevURL }}">

          <div class="tw-flex tw-flex-col tw-space-y-6">
              <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                  <label class="label-input" for="id">
                      Id *
                  </label>
                  <input @error('id') is-invalid @enderror class="input-data-minimal tw-w-full" id="id" name="id" type="text" maxlength="10" required>
                  @error('id')
                      <small class="tw-text-red-500">{{ $message }}</small>
                  @enderror
              </div>
              <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                  <label class="label-input" for="kelas">
                      Kelas *
                  </label>
                  <input @error('kelas') is-invalid @enderror class="input-data-minimal tw-w-full" id="kelas" name="kelas" type="text" required>
                  @error('kelas')
                      <small class="tw-text-red-500">{{ $message }}</small>
                  @enderror
              </div>
              <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                <label class="label-input" for="rombel">
                    Rombel
                </label>
                <input @error('rombel') is-invalid @enderror class="input-data-minimal tw-w-full" id="rombel" name="rombel" type="text">
                @error('rombel')
                    <small class="tw-text-red-500">{{ $message }}</small>
                @enderror
            </div>
              <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                  <label class="label-input" for="jurusan">
                       Jurusan *
                  </label>
                  <input @error('jurusan') is-invalid @enderror class="input-data-minimal tw-w-full" id="jurusan" name="jurusan" type="text">
                  @error('jurusan')
                      <small class="tw-text-red-500">{{ $message }}</small>
                  @enderror
              </div>
              <div class="tw-mx-auto md:tw-w-2/3 sm:tw-w-1/2">
                  <label class="label-input" for="JurusanId">
                      Id Jurusan
                  </label>
                  <select class="input-data-minimal" id="JurusanId" name="JurusanId">
                      <option value="">-</option>
                      @foreach ($jurusan as $j)
                      <option value="{{ $j->id }}">{{ $j->id }}</option>
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