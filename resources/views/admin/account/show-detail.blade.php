@extends('layouts.admin')

@section('content')
<div class="tw-mx-10 tw-w-screen">
  <div class="tw-flex tw-flex-col tw-mt-8 tw-gap-8">

    {{-- title --}}
    <section class="tw-flex tw-items-center">
      <a href="/manage-user">
        <i class="fa-solid fa-chevron-left tw-text-gray-400 tw-text-2xl"></i>
      </a>
      <i class="fa-solid fa-user tw-text-admin-300 tw-text-3xl tw-ml-5"></i>
      <div class="tw-text-2xl tw-ml-4 tw-font-pop tw-font-semibold tw-text-gray-300">Account Details</div>
    </section>

    {{-- account details information --}}
    <section class="tw-bg-white tw-rounded-xl tw-border-l-[17px] tw-border-admin-300 tw-pb-28 tw-pl-10 tw-font-pop shadow-cs">
      <div class="tw-flex tw-flex-col">
        <div>
          <div class="tw-bg-admin-300 tw-mt-5 tw-mb-10 tw-rounded-l-[20px] tw-px-10 tw-py-2 tw-flex tw-float-right tw-text-white tw-font-light tw-text-2xl">
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
        </div>
        <div class="tw-flex tw-ml-10">
          {{-- <div class="tw-bg-admin-300 tw-p-2 tw-rounded-2xl tw-text-white tw-w-44 tw-h-44 tw-items-center tw-flex tw-justify-center"><i class="fa-solid fa-user tw-text-8xl"></i></div> --}}
          <div class="tw-flex tw-flex-col tw-ml-14 tw-justify-center">
            <div class="tw-text-admin-300 tw-font-bold tw-flex tw-flex-col">
              <div class="tw-text-3xl">{{ $user->nama }}</div>
              <div class="tw-font-ubuntu tw-text-xl tw-mt-2"></div>
            </div>
            <div class="tw-text-gray-400 tw-font-light tw-mt-3">
              <div class="tw-text-xl">{{ $user->email }}</div>
              <div class="tw-text-xl tw-mt-2">{{ $user->password }}</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- account action and history --}}
    <section class="tw-flex tw-bg-white tw-rounded-xl shadow-cs tw-w-full tw-justify-between tw-py-10 tw-px-12">
      <div class="tw-text-gray-300 tw-text-2xl tw-font-semibold tw-font-pop tw-items-center tw-flex tw-gap-8">
        <div class="tw-text-gray-400">Created : <span class="tw-font-light">12 February 2023</span></div>
        <div class="tw-text-gray-400">Updated : <span class="tw-font-light">February 2023</span></div>
      </div>
      <div class="tw-flex tw-gap-5 tw-font-ubuntu tw-text-white tw-font-medium">
        <form action="/delete-account/{{ $user->id }}" method="POST" class="tw-bg-[#FF7575] tw-rounded-lg">
          @csrf
          @method('DELETE')
          <button type="submit" class="tw-py-4 tw-pl-6 tw-pr-14"><i class="fa-regular fa-trash-can tw-mr-4 tw-text-xl"></i>Delete Account</button>
        </form>
        <a href="/edit-account/{{ $user->id }}" class="tw-bg-[#FFCF86] tw-py-4 tw-pl-6 tw-pr-14 tw-rounded-lg"><i class="fa-regular fa-pen-to-square tw-mr-4 tw-text-xl"></i>Edit Account</a>
      </div>
    </section>
  </div>
</div>
@endsection