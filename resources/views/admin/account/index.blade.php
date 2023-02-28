@extends('layouts.main-new')


@section('content')
    <div class="tw-mt-10">
        <div class="tw-flex tw-ml-8">
            <h4 class="sims-heading-3xl">Data Akun</h4>
        </div>

        <div class="tw-flex tw-justify-between tw-ml-8 tw-mt-8 lg:tw-flex-row sm:tw-flex-col sm:tw-gap-5">
            <form action="{{ route('account.index') }}" method="GET">
                <div class="relative tw-border-[1.5px] tw-border-gray-300 tw-rounded-xl">

                    <input type="text" name="s" @if (isset($_GET['s'])) value="{{ $_GET['s'] }}" @endif
                        id="search"
                        class="tw-block tw-py-1 tw-px-5 tw-border-none tw-rounded-xl focus:tw-ring-sims-new-500">

                    <i
                        class="fa-thin fa-magnifying-glass tw-absolute tw-text-gray-400 right-0 tw-inset-y-1.5 tw-pr-5 tw-text-sm"></i>
                </div>
            </form>
            @can('admin-only')
                <div class="flex">
                    <a href="/admin/account/create"
                        class="tw-bg-sims-new-500 tw-text-white hover:tw-text-white hover:tw-bg-sims-new-700 tw-font-satoshi tw-rounded-lg tw-px-8 tw-py-2 tw-mr-7">
                        Tambah Akun +
                    </a>
                </div>
            @endcan
        </div>

        {{-- account data table --}}
        <section class="tw-overflow-x-auto tw-relative tw-mt-7">
            <table class="tw-w-full tw-text-lg tw-text-center tw-font-satoshi tw-text-bluewood-900">
                <thead class="tw-border-y">
                    <tr>
                        <th scope="col" class="tw-py-5 tw-px-6">No</th>
                        <th scope="col" class="tw-py-5 tw-px-6">NIP</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Nama</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Email</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Status</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Role</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Dibuat</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Aksi</th>
                    </tr>
                </thead>
                <tbody class="tw-text-base">
                    @foreach ($users as $key => $u)
                        <tr class="tw-bg-white">
                            <td class="tw-p-6">{{ $key + 1 }}</td>
                            <td class="tw-p-6">{{ $u->nip }}</td>
                            <td class="tw-p-6">{{ $u->nama }}</td>
                            <td class="tw-p-6">{{ $u->email }}</td>
                            <td class="tw-p-6 tw-justify-center">
                                @if ($u->email_verified_at)
                                    <span
                                        class="tw-w-fit tw-text-xs tw-py-1 tw-px-4 tw-text-center tw-whitespace-nowrap tw-items-center tw-justify-center tw-font-bold tw-bg-ijo-400 tw-text-white tw-rounded-full">Terverifikasi</span>
                                @else
                                    <span
                                        class="tw-w-fit tw-text-xs tw-py-1 tw-px-4 tw-text-center tw-whitespace-nowrap tw-items-center tw-justify-center tw-font-bold tw-bg-gray-400 hover:tw-bg-gray-500 tw-text-white tw-rounded-full">Belum
                                        Terverifikasi</span>
                                @endif
                            </td>
                            <td class="tw-p-6 tw-flex tw-items-center tw-justify-center">
                                @if ($u->role == 1)
                                    Tata Usaha
                                @endif
                                @if ($u->role == 2)
                                    Kesiswaan
                                @endif
                                @if ($u->role == 3)
                                    Kurikulum
                                @endif
                                @if ($u->role == 4)
                                    Wali Kelas
                                @endif
                                @if ($u->is_admin == 1)
                                    <i title="User ini merupakan Admin"
                                        class="fa-solid fa-shield-check tw-text-sims-500 tw-text-xl tw-ml-2"></i>
                                @endif
                            </td>
                            <td class="tw-p-6">
                                @if (!empty($created_at))
                                    {{ $created_at }}
                                @endif
                            </td>
                            <td class="tw-flex tw-justify-center tw-gap-3 tw-p-6">
                                @can('admin-only')
                                    <a title="Edit Data" href="/admin/account/{{ $u->id }}/edit"
                                        class="tw-text-kuning-500 hover:tw-bg-kuning-500 hover:tw-text-white hover:tw-shadow-md tw-transition-all tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"
                                        title="Edit Data">
                                        <i class="fa-solid fa-pen-to-square"></i></a>
                                    </a>
                                    <a href="/admin/account/{{ $u->id }}"
                                        class="tw-text-gray-400  hover:tw-text-white hover:tw-bg-gray-400 hover:tw-shadow-md tw-rounded-lg tw-text-xl tw-py-2 tw-px-3 tw-w-12 tw-transition-all"
                                        title="Detail Data">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="tw-flex tw-justify-center tw-my-8">
                {{ $users->links() }}
            </div>
    </div>
    </section>

    </div>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
@endpush
