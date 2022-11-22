@extends('layouts.admin')

@section('content')

<div class="tw-m-10 tw-w-screen tw-flex">
   <div class="tw-flex tw-flex-col tw-gap-8 tw-w-full">
      <div class="tw-flex">
            <a href="/admin/siswa"><i class="fa-solid fa-chevron-left tw-text-2xl tw-text-gray-400 hover:tw-text-gray-600"></i></a>
            <i class="fa-solid fa-users tw-text-2xl tw-ml-2 tw-text-[#95BBE8]"></i>
            <h4 class="tw-font-pop tw-font-bold tw-ml-2 tw-text-[#DBDBDB]">Detail Siswa</h4>
      </div>
            <div class="card-data-white">
                  <div class="tw-flex tw-bg-[#5A6C7C] tw-font-ubuntu tw-text-white tw-rounded-xl tw-gap-8 tw-py-16 tw-px-12">
                     <div class="tw-flex tw-flex-col">
                        <i class="fa-solid fa-user tw-text-7xl tw-mx-5"></i>
                     </div>
                  </div>
                  <div class="tw-flex tw-flex-col tw-px-7 tw-py-7">
                    <table class="tw-mt-5">
                        <tbody class="tw-text-left tw-font-ubuntu tw-text-[#B4B8BC] tw-font-bold">
                        <tr>
                           <th class="tw-pb-1 tw-font-bold tw-text-2xl">Sukma Dika</th>
                        </tr>
                        <tr>
                           <th class="tw-font-normal tw-pb-1 tw-text-lg">2005514872</th>
                        </tr>
                        <tr>
                           <th class="tw-font-normal tw-text-lg">XII MLOG 3</th>
                        </tr>
                        </tbody>
                    </table>
                  </div>
            </div>

         <div class="tw-mb-5">
            <li class="card-data-white tw-mb-10">
                  <div class="tw-flex tw-flex-col tw-px-7 tw-py-7">
                    <table>
                        <tbody class="tw-text-left tw-font-ubuntu tw-text-[#B4B8BC] tw-font-bold">
                        <tr>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">NIS</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">AGAMA</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">NO. SKHUN</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">NAMA AYAH</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">BERAT BADAN</th>
                        </tr>
                        <tr>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">02571486290</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">Kristodokslam</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">DN-28 DI-89727817361</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">Adolf Goebbls Cahyadi</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">65kg</td>
                        </tr>
                        <tr>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">NISN</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">STATUS</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">TAHUN SKHUN</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">NAMA IBU</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">TINGGI BADAN</th>
                        </tr>
                        <tr>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">2005546981</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">AK</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">2077</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">Eva Braun Nurhasanah</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">175</td>
                        </tr>
                        <tr>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">EMAIL SISWA</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">ANAK KE</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">NO. IJAZAH</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">ALAMAT ORTU</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">LINGKAR KEPALA</th>
                        </tr>
                        <tr>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">sugmadica@gmail.com</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">1</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">DN-09 DI-9123764615</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">Cimahi, Kec. Cimahi Utara, Kel. Citeureup, Jl. Buciper No.222</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">-</td>
                        </tr>
                        <tr>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">TANGGAL LAHIR</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">TANGGAL DITERIMA</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">TAHUN IJAZAH SMP</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">NO. TELP ORTU</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">KETERANGAN LAIN</th>
                        </tr>
                        <tr>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">10/10/1990</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">11/11/2011</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">2077</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">081800008180</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">-</td>
                        </tr>
                        <tr>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">TEMPAT LAHIR</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">SEMESTER DITERIMA</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">NO. IJAZAH SMK</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">EMAIL ORTU</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">TANGGAL MENINGGALKAN SEKOLAH</th>
                        </tr>
                        <tr>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">Chernobyl, Soviet Union</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">1</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">DN-12 DI-1122334455</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">meetler@gmail.com</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">-</td>
                        </tr>
                        <tr>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">NOMOR TELEPON</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">KELAS</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">TANGGAL IJAZAH SMK</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">NAMA WALI</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">ALASAN MENINGGALKAN SEKOLAH</th>
                        </tr>
                        <tr>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">081717088017</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">XII MLOG 3</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">2077</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">-</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">-</td>
                        </tr>
                        <tr>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">ALAMAT</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">ALAMAT SEKOLAH ASAL</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">ALUMNI</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">ALAMAT WALI</th>
                        </tr>
                        <tr>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">Cimahi, Kec. Cimahi Utara, Kel. Citeureup, Jl. Buciper No.222</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">Cimahi, Kec. Cimahi Tengah, Jl. Abdul Halim</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">YES</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">-</td>
                        </tr>
                        <tr>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">JENIS KELAMIN</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">SEKOLAH ASAL</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4"></th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">NOMOR TELEPON WALI</th>
                           <th class="tw-font-bold tw-pb-5 tw-pl-4">PEKERJAAN WALI</th>
                        </tr>
                        <tr>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">L</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">SMPN 15 CIMAHI</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4"></td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">-</td>
                           <td class="tw-font-normal tw-pb-5 tw-pl-4">-</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </li>
         </div>  
   </div>
</div>

@endsection