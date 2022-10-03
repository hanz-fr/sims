@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl tw-mt-5">
            <table class="tw-w-full tw-text-sm tw-text-center">
                <thead class="tw-text-md tw-bg-gray-100 tw-text-basic-700 tw-border tw-font-pop">
                    <tr>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NO</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NIS</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NISN</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NAMA PESERTA DIDIK</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">GENDER</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">KELAS</th>
                        <th scope="col" class="tw-py-3 tw-px-6">ACTION</th>
                    </tr>
                </thead>    
            <tbody class="tw-text-base">

                    <a href="https://ccea-103-139-10-202.ngrok.io/siswa?page=0&perPage=3">Paginate 3</a>

                    <form method="get" action="https://ccea-103-139-10-202.ngrok.io/siswa">
                        <input name="param2">
                        <input name="param3">
                        <input type="hidden" name="param1" value="foo" />
                        <input type="hidden" name="param2" value="foo" />
                        <button type="submit">paginate</button>
                    </form>

                    {{ $url }}

                    @foreach($siswa as $s)
                    <h1>{{ $s->nama_siswa }}</h1>
                    @endforeach
                    {{-- @foreach ($siswa as $s)
                        <tr class="tw-bg-white tw-border">
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">{{ $s->nis_siswa }}</td>
                            <td class="tw-py-4 tw-px-6 tw-border">{{ $s->nisn_siswa }}</td>
                            <td class="tw-py-4 tw-px-6 tw-border">{{ $s->nama_siswa }}</td>
                            <td class="tw-py-4 tw-px-6 tw-border">{{ $s->jenis_kelamin }}</td>
                            <td class="tw-py-4 tw-px-6 tw-border">{{ $s->KelasId }}</td>
                            <td>
                                <a href=""
                                    class="tw-text-white tw-bg-sims hover:tw-bg-[#428888] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3 tw-mr-1">
                                    <i class="fa-light fa-clipboard-list"></i>
                                </a>
                                <a href="#"
                                    class="tw-text-white tw-bg-kuning hover:tw-bg-[#D3A007] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                    <i class="fa-solid fa-pen-to-square"></i></a>
                                </a>
                                <a href="#"
                                    class="tw-text-white tw-bg-gray-500 hover:tw-bg-gray-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
