@extends('layouts.main')

@section('content')
<div class="tw-m-10">
  <div class="tw-flex tw-gap-5">
    <div class="tw-w-1/5 tw-bg-white tw-p-20 tw-shadow-md"></div>
    <div class="tw-w-3/5 tw-flex tw-flex-col tw-bg-white tw-shadow-md tw-px-20 tw-py-16">
      <h4 class="title-main tw-mb-8">Edit Profil</h4>
      <form action="/update-profile" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- <div class="tw-mx-auto tw-w-64 tw-text-center ">
          <div class="tw-w-64"> 
          <img class="tw-w-64 tw-h-64 tw-rounded-xl tw-border tw-border-slate-300" src="https://images.pexels.com/photos/2690323/pexels-photo-2690323.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="" />
          <div class="tw-w-64 tw-h-64 group hover:tw-bg-gray-200 tw-opacity-60 tw-rounded-xl tw-flex tw-justify-center tw-items-center tw-cursor-pointer tw-transition tw-duration-500">
            <i class="fa-regular fa-arrow-up-from-bracket tw-text-4xl tw-hidden group-hover:tw-block tw-w-12" alt=""></i>
          </div>
        </div>
        </div> --}}
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="foto">
              Foto Profil
            </label>
            <input type="file" id="foto" name="foto" value="{{ auth()->user()->foto }}"/>
          </div>
        </div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="nama">
              Nama
            </label>
            <input class="input-data" id="nama" type="text" name="nama" value="{{ auth()->user()->nama }}">
          </div>
        </div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="nip">
              NIP
            </label>
            <input class="input-data" id="nip" type="number" name="nip" value="{{ auth()->user()->nip }}">
          </div>
        </div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="email">
              Email
            </label>
            <input class="input-data" id="email" type="email" name="email" value="{{ auth()->user()->email }}">
          </div>
        </div>
        <div class="tw-mx-auto tw-text-center tw-mt-10 ">
          <button type="submit" class="tw-bg-sims-400 tw-font-medium tw-font-pop tw-text-white tw-py-3 tw-px-6 tw-rounded-lg">Update Profil</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection