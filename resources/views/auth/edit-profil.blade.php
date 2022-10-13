@extends('layouts.main')

@section('content')
<div class="tw-m-10">
  <div x-data="{ openTab: 1, activeClasses: 'tw-text-sims-400', inactiveClasses: 'tw-text-gray-500'}" class="tw-flex tw-gap-5">
    <div class="tw-w-1/5 tw-bg-white tw-py-20 tw-px-10 tw-shadow-md tw-flex tw-flex-col">
      <ul class="tw-flex tw-flex-col tw-text-left mb-0 mt-3 tw--ml-6">
        <li @click="openTab = 1" :class="{ 'tw--mb-px': openTab === 1 }" class="tw--mb-px tw-mr-1">
          <button :class="openTab === 1 ? activeClasses : inactiveClasses" class="hover:tw-text-sims-400 tw-text-lg tw-inline-block tw-py-2 tw-px-4 tw-font-semibold tw-font-pop" href="#">
            <i class="fa-solid fa-address-card tw-mr-3 tw-text-lg"></i>Edit Profile
          </button>
        </li>
        <li @click="openTab = 2" :class="{ 'tw--mb-px': openTab === 2 }" class="tw--mb-px tw-mr-1">
          <button :class="openTab === 2 ? activeClasses : inactiveClasses" class="tw-text-left tw-text-lg hover:tw-text-sims-400 tw-inline-block tw-py-2 tw-px-4 tw-font-semibold tw-font-pop" href="#">
            <i class="fa-solid fa-shield-check tw-mr-3 tw-text-lg"></i>Change Password
          </button>
        </li>
      </ul>
    </div>

    <div x-show="openTab === 1" class="tw-w-3/5 tw-flex tw-flex-col tw-bg-white tw-shadow-md tw-px-20 tw-py-16">
      <h4 class="title-main tw-mb-8">Edit Profil</h4>
      <form action="/update-profile/{{$user->id}}" method="POST">
        @csrf
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="nama">
              Nama
            </label>
            <input class="input-data" id="nama" @error('nama') is-invalid @enderror type="text" name="nama" value="{{ auth()->user()->nama }}">
            @error('nama')
              <div class="tw-text-sm tw-text-pink-700 tw-mt-1 tw-font-ubuntu">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="nip">
              NIP
            </label>
            <input class="input-data" id="nip" @error('nip') is-invalid @enderror type="number" name="nip" value="{{ auth()->user()->nip }}">
            @error('nip')
              <div class="tw-text-sm tw-text-pink-700 tw-mt-1 tw-font-ubuntu">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="email">
              Email
            </label>
            <input class="input-data" id="email" @error('email') is-invalid @enderror type="email" name="email" value="{{ auth()->user()->email }}">
            @error('email')
              <div class="tw-text-sm tw-text-pink-700 tw-mt-1 tw-font-ubuntu">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="tw-mx-auto tw-text-center tw-mt-10 ">
          <button type="submit" class="tw-bg-sims-400 tw-font-medium tw-font-pop tw-text-white tw-py-3 tw-px-6 tw-rounded-lg">Update Profile</button>
        </div>
      </form>
    </div>

    <div x-show="openTab === 2" class="tw-w-3/5 tw-flex tw-flex-col tw-bg-white tw-shadow-md tw-px-20 tw-py-16">
      <h4 class="title-main tw-mb-8">Change Password</h4>
      <form action="/change-password" method="POST">
        @csrf
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="old_password">
              Current Password
            </label>
            <input class="input-data" id="old_password" type="password" name="old_password">
          </div>
        </div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="new_password">
              New Password
            </label>
            <input class="input-data" id="new_password" type="password" name="new_password">
          </div>
        </div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="new_password_confirmation">
              Repeat New Password
            </label>
            <input class="input-data" id="new_password_confirmation" type="password" name="new_password_confirmation">
          </div>
        </div>
        <div class="tw-mx-auto tw-text-center tw-mt-10 ">
          <button type="submit" class="tw-bg-sims-400 tw-font-medium tw-font-pop tw-text-white tw-py-3 tw-px-6 tw-rounded-lg">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection