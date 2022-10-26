@extends('layouts.admin')

@section('content')

<div class="tw-m-10 tw-w-screen tw-flex">
   <div class="tw-flex tw-flex-col tw-gap-8 tw-w-full">
      <div class="tw-flex">
            <a href="/all-siswa-admin"><i class="fa-solid fa-chevron-left tw-text-2xl tw-text-gray-400 hover:tw-text-gray-600"></i></a>
            <i class="fa-solid fa-users tw-text-2xl tw-ml-2 tw-text-[#95BBE8]"></i>
            <h4 class="tw-font-pop tw-font-bold tw-ml-2 tw-text-[#DBDBDB]">Detail Siswa</h4>
      </div>
            <li class="card-data-white">
                  <div class="tw-flex tw-bg-[#5A6C7C] tw-font-ubuntu tw-text-white tw-rounded-xl tw-gap-8 tw-py-16 tw-px-12">
                     <div class="tw-flex tw-flex-col">
                        <i class="fa-solid fa-user tw-text-7xl tw-mx-5"></i>
                     </div>
                  </div>

                  <div class="tw-flex tw-flex-col tw-px-7 tw-py-7">
                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-text-slate-400">Pas Foto</span>
                    <a href="#" class="tw-border tw-rounded-2xl tw-font-[ubuntu] tw-px-3 tw-py-1 tw-bg-white hover:tw-bg-slate-200">Choose from File</a>

                    
                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-text-slate-400 tw-mt-5">Nama</span>
                    <input type="text" placeholder="Nama Siswa..." class="input-account">
                  </div>
            </li>

         <div class="tw-mb-5">
            <li class="tw-flex card-data-white tw-mb-10 tw-gap-20 tw-justify-center">
                <div class="tw-flex-col tw-flex tw-px-7 tw-py-7">
                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-text-slate-400">NIS</span>
                    <input type="text" placeholder="NIS..." class="input-account tw-mr-32">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">NISN</span>
                    <input type="text" placeholder="NISN..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Email Siswa</span>
                    <input type="text" placeholder="Email..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Tanggal Lahir</span>
                    <input type="text" placeholder="Tgl Lahir..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Tempat Lahir</span>
                    <input type="text" placeholder="Tempat Lahir..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Nomor Telepon Siswa</span>
                    <input type="text" placeholder="No. Telp..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Alamat Siswa</span>
                    <input type="text" placeholder="Alamat..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Jenis Kelamin</span>
                    <input type="text" placeholder="Jenis Kelamin..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Nomor SKHUN</span>
                    <input type="text" placeholder="No SKHUN..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Tahun SKHUN</span>
                    <input type="text" placeholder="Thn SKHUN..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Nomor Ijazah SMP</span>
                    <input type="text" placeholder="No. Ijazah SMP..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Tahun Ijazah SMP</span>
                    <input type="text" placeholder="Thn Ijazah SMP..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Nomor Ijazah SMK</span>
                    <input type="text" placeholder="No. Ijazah SMK..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Tanggal Ijazah SMK</span>
                    <input type="text" placeholder="Tgl Ijazah SMK..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Alumni</span>
                    <input type="text" placeholder="Alumni..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Berat Badan</span>
                    <input type="text" placeholder="Berat Badan..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Tinggi Badan</span>
                    <input type="text" placeholder="Tinggi Badan..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Lingkar Kepala</span>
                    <input type="text" placeholder="Lingkar Kepala..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Keterangan Lain</span>
                    <input type="text" placeholder="Keterangan..." class="input-account">
                </div>

                <div class="tw-flex-col tw-flex tw-px-7 tw-py-7">
                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-text-slate-400">Agama</span>
                    <input type="text" placeholder="Agama..." class="input-account tw-mr-32">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Status</span>
                    <input type="text" placeholder="Status..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Anak Ke</span>
                    <input type="text" placeholder="Anak Ke-..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Tanggal Diterima</span>
                    <input type="text" placeholder="Tgl Diterima..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Semester Diterima</span>
                    <input type="text" placeholder="Semester Diterima..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Kelas</span>
                    <input type="text" placeholder="Kelas..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Sekolah Asal</span>
                    <input type="text" placeholder="Sekolah Asal..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Alamat Sekolah Asal</span>
                    <input type="text" placeholder="Alamat Sekolah Asal..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Nama Ayah</span>
                    <input type="text" placeholder="Nama Ayah..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Nama Ibu</span>
                    <input type="text" placeholder="Nama Ibu..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Alamat Orang Tua</span>
                    <input type="text" placeholder="Alamat Ortu..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Nomor Telepon Orang Tua</span>
                    <input type="text" placeholder="No. Telp Ortu..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Email Orang Tua</span>
                    <input type="text" placeholder="Email Ortu..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Nama Wali</span>
                    <input type="text" placeholder="Nama Wali..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Alamat Wali</span>
                    <input type="text" placeholder="Alamat Wali..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Nomor Telepon Wali</span>
                    <input type="text" placeholder="No. Telp Wali..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Pekerjaan Wali</span>
                    <input type="text" placeholder="Pekerjaan Siswa..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Tanggal Meninggalkan Sekolah</span>
                    <input type="text" placeholder="Tanggal..." class="input-account">

                    <span class="tw-font-[ubuntu] tw-mx-3 tw-font-medium tw-mt-5 tw-text-slate-400">Alasan Meninggalkan Sekolah</span>
                    <input type="text" placeholder="Alasan..." class="input-account">
                </div>
            </li>
            <div class="tw-text-end tw-mb-7">
            <a href="#" class="tw-mx-7 tw-my-3 tw-bg-[#95BBE8] hover:tw-bg-[#4c719f] tw-rounded-xl tw-border tw-px-7 tw-py-3 tw-font-[ubuntu] tw-text-slate-100 tw-font-medium">Submit Data</a>
            </div>
         </div>  
   </div>
</div>

@endsection