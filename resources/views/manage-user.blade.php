@extends('layouts.admin')

@section('content')
<div class="tw-m-10">
  <div class="tw-flex tw-flex-col tw-gap-5">
    <div class="tw-flex">
      <i class="fa-solid fa-user-group tw-text-admin-300 tw-text-xl"></i>
      <div class="tw-text-xl tw-ml-3 tw-font-pop tw-font-semibold tw-text-gray-300">Account Management</div>
    </div>
    <div class="tw-bg-white tw-mt-12 tw-rounded-xl shadow-cs tw-w-full tw-flex tw-py-20 tw-px-40 tw-font-ubuntu tw-gap-32 tw-border-b-[13px] tw-border-admin-300">
      <div class="tw-flex tw-gap-8 tw-text-admin-300">
        <div class="tw-text-center">
          <i class="fa-solid fa-user tw-text-6xl"></i>
          <h5 class="tw-font-bold tw-mt-2">Staff TU</h5>
        </div>
        <div class="tw-items-center tw-flex">
        <h3 class="text-5xl tw-font-bold tw-mb-2">4</h3>
        </div>
      </div>
      <div class="tw-flex tw-gap-8 tw-text-salmon-400">
        <div class="tw-text-center">
          <i class="fa-solid fa-user tw-text-6xl"></i>
          <h5 class="tw-font-bold tw-mt-2">Kesiswaan</h5>
        </div>
        <div class="tw-items-center tw-flex">
        <h3 class="text-5xl tw-font-bold tw-mb-2">2</h3>
        </div>
      </div>
      <div class="tw-flex tw-gap-8 tw-text-oren-400">
        <div class="tw-text-center">
          <i class="fa-solid fa-user tw-text-6xl"></i>
          <h5 class="tw-font-bold tw-mt-2">Walikelas</h5>
        </div>
        <div class="tw-items-center tw-flex">
        <h3 class="text-5xl tw-font-bold tw-mb-2">6</h3>
        </div>
      </div>
      <div class="tw-flex tw-gap-8 tw-text-gray-400">
        <div class="tw-text-center">
          <i class="fa-solid fa-user tw-text-6xl"></i>
          <h5 class="tw-font-bold tw-mt-2">Kurikulum</h5>
        </div>
        <div class="tw-items-center tw-flex">
        <h3 class="text-5xl tw-font-bold tw-mb-2">1</h3>
        </div>
      </div>
      <div class="tw-flex tw-gap-8 tw-text-pixie-300">
        <div class="tw-text-center">
          <i class="fa-solid fa-user tw-text-6xl"></i>
          <h5 class="tw-font-bold tw-mt-2">Admin</h5>
        </div>
        <div class="tw-items-center tw-flex">
        <h3 class="text-5xl tw-font-bold tw-mb-2">1</h3>
        </div>
      </div>
    
    </div>
    <div class="tw-flex tw-bg-white tw-rounded-xl shadow-cs tw-w-full tw-justify-between tw-py-10 tw-px-12">
      <div class="tw-text-gray-300 tw-text-2xl tw-font-semibold tw-font-pop tw-items-center tw-flex">All Account</div>
      <div class="tw-flex tw-gap-5 tw-font-ubuntu tw-text-white tw-font-medium">
        <form action="" method="POST" class="tw-bg-salmon-400 tw-rounded-lg">
          {{-- @csrf
          @method('DELETE') --}}
          <button type="submit" class="tw-py-4 tw-px-6"><i class="fa-regular fa-trash-can tw-mr-4 tw-text-xl"></i>Delete all account</button>
        </form>
        <a href="" class="tw-bg-admin-300 tw-py-4 tw-px-6 tw-rounded-lg"><i class="fa-regular fa-square-plus tw-mr-4 tw-text-xl"></i>Create new account</a>
      </div>
    </div>
    <div class="tw-bg-white shadow-cs tw-py-8 tw-px-12 tw-rounded-xl tw-w-full">

      <div class="tw-flex tw-float-right">
        <div class="tw-flex tw-rounded-xl tw-border tw-border-gray-400">
            <input type="text" class="tw-px-4 tw-rounded-xl tw-border tw-border-gray-300 tw-py-2 tw-w-80" placeholder="Search...">
            <button class="tw-px-4 -tw-ml-4 tw-rounded-xl tw-text-white tw-bg-admin-400">
              <i class="fa-regular fa-magnifying-glass"></i>
            </button>
        </div>
      </div>
      
    
    </div>
  </div>
</div>
@endsection