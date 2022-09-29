@extends('layouts.main')

@section('content')
<div class="tw-mx-10">
  <div class="tw-flex tw-flex-col tw-rounded-[35px] tw-bg-white tw-w-4/5 tw-p-8 tw-h-full tw-mx-auto tw-my-14 tw-shadow-lg">
    <a href="/data-induk-siswa" class="tw-text-sims-400 tw-text-3xl"><i class="fa-solid fa-chevron-left"></i></a>
    <h3 class="tw-font-pop tw-font-semibold tw-mt-6 tw-text-sims-400 tw-text-center">Tambah Data Siswa</h3>
    
    <form method="POST" action="/api/siswa" enctype="multipart/form-data"  
    class="tw-w-full lg:tw-mx-auto sm:tw-mx-10 tw-my-10 tw-max-w-3xl tw-font-pop">
      
      @csrf
      @method('POST')
      {{-- biodata --}}
      <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">A.  Biodata Peserta Didik</div>
      <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
        <div class="tw-w-max md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
          <label class="label-input" for="nis">
            NIS
          </label>
          <input class="input-data tw-w-full" id="nis" name="nis" type="text" maxlength="10" required>
        </div>
        <div class="tw-w-fit md:tw-w-1/2 tw-px-3">
          <label class="label-input" for="nisn">
            NISN
          </label>
          <input class="input-data tw-w-full" id="nisn" name="nisn" type="text" maxlength="10" required>
        </div>
      </div>
      <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
        <div class="tw-w-full tw-px-3">
          <label class="label-input" for="nama">
            Pas Foto
          </label>
            <label class="">
              <span class="tw-sr-only">Choose profile photo</span>
              <input type="file" class=" tw-w-full tw-text-sm text-slate-500
                file:tw-mr-4 file:tw-py-2 file:tw-px-4
                file:tw-rounded-full file:tw-border-0
                file:tw-text-lg file:tw-text-gray-500 file:hover:tw-text-sims-400 file:tw-cursor-pointer file:tw-font-semibold
                file:bg-violet-50 file:text-sims-400
                hover:file:bg-violet-100
              " id="foto" name="foto"/>
            </label>
        </div>
      </div>
      <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
        <div class="tw-w-full tw-px-3">
          <label class="label-input" for="nama">
            Nama Peserta Didik
          </label>
          <input class="input-data" id="nama" type="text" name="nama" required>
        </div>
      </div>
      <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
        <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
          <label class="label-input" for="tmp_lahir">
            Tempat Lahir
          </label>
          <input class="input-data" id="tmp_lahir" name="tmp_lahir" type="text" required>
        </div>
        <div class="tw-w-full md:tw-w-1/2 tw-px-3">
          <label class="label-input" for="tgl_lahir">
            Tanggal Lahir
          </label>
          <input class="input-data" id="tgl_lahir" name="tgl_lahir" type="date" placeholder="dd/mm/yyyy" required>
        </div>
      </div>
      <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
        <div class="tw-w-full tw-px-3">
          <label class="label-input" for="agama">
            Agama
          </label>
          <input class="input-data" id="agama" type="text" name="agama" required>
        </div>
      </div>
      <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
        <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
          <label class="label-input" for="anak_ke">
            Anak-Ke
          </label>
          <input class="input-data" id="anak_ke" name="anak_ke" type="number" max="99" min="1" required>
        </div>
        <div class="tw-w-full md:tw-w-1/2 tw-px-3">
          <label class="label-input" for="jenis_kelamin">
            Jenis Kelamin
          </label>
          <select class="input-data" id="jenis_kelamin" name="jenis_kelamin" required>
            <option selected>Pilih</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
          </select>
        </div>
      </div>
      <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
        <div class="tw-w-full tw-px-3">
          <label class="label-input" for="status">
            Status dalam keluarga
          </label>
          <select class="input-data" id="status" name="status">
            <option selected>Pilih</option>
            <option value="AA">Anak Kandung</option>
            <option value="AK">Anak Angkat</option>
            <option value="AT">Anak Tiri</option>
          </select>
        </div>
      </div>
      <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
        <div class="tw-w-full tw-px-3">
          <label class="label-input" for="alamat_siswa">
            Alamat Peserta Didik
          </label>
          <textarea class="input-data" id="alamat_siswa" type="text" name="alamat_siswa" required></textarea>
        </div>
      </div>
      <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
        <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
          <label class="label-input" for="no_telp">
            No. HP
          </label>
          <input class="input-data" id="no_telp" type="text" name="no_telp" required  maxlength="20">
        </div>
        <div class="tw-w-full md:tw-w-1/2 tw-px-3">
          <label class="label-input" for="email">
            Alamat Email
          </label>
          <input class="input-data" id="email" type="email" name="email">
        </div>
      </div>

      {{-- section B, Diterima di sekolah ini --}}
    <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">B.  Diterima di sekolah ini</div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="label-input" for="kelas">
          Di kelas
        </label>
        <select class="input-data" id="kelas" name="kelas">
          <option value="">-</option>
          @foreach ($kelas as $k)
          <option value="{{ $k->id }}">{{ $k->id }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="label-input" for="tgl_masuk">
          Pada Tanggal
        </label>
        <input class="input-data" id="tgl_masuk" type="date" name="tgl_masuk">
      </div>
    </div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="label-input" for="semester">
          Semester
        </label>
        <input class="input-data" id="semester" type="number" name="semester">
      </div>
    </div>

    {{-- sekolah asal --}}
    <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">C.  Sekolah Asal</div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="label-input" for="nama_sekolah_asal">
          Nama Sekolah
        </label>
        <input class="input-data" id="nama_sekolah_asal" type="text" name="nama_sekolah_asal" required>
      </div>
    </div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="label-input" for="alamat_sekolah_asal">
          Alamat Sekolah
        </label>
        <input class="input-data" id="alamat_sekolah_asal" type="text" name="alamat_sekolah_asal" required>
      </div>
    </div>

    {{-- ijazah smp --}}
    <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">D.  Ijazah SMP/MTs</div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="label-input" for="nomor_ijazah_smp">
          Nomor Ijazah SMP
        </label>
        <input class="input-data" id="nomor_ijazah_smp" type="text" name="nomor_ijazah_smp">
      </div>
    </div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="label-input" for="tahun_ijazah_smp">
          Tahun Ijazah SMP
        </label>
        <input class="input-data" id="tahun_ijazah_smp" type="text" name="tahun_ijazah_smp" max="10">
      </div>
    </div>

    <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">E.  SKHUN SMP/Mts</div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="label-input" for="nomor_skhun">
          Nomor SKHUN
        </label>
        <input class="input-data" id="nomor_skhun" type="text" name="nomor_skhun">
      </div>
    </div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="label-input" for="tahun_skhun">
          Tahun SKHUN
        </label>
        <input class="input-data" id="tahun_skhun" type="text" name="tahun_skhun">
      </div>
    </div>
    

    <div x-data="{ openTab: 0}" class="tw-my-8">
      <label class="label-input tw-text-xl">
        Apakah Siswa memiliki orang tua?
      </label>
      <div class="tw-flex tw-flex-row tw-gap-3">
        <div @click="openTab = 1" class="tw-flex tw-items-center">
          <input id="default-radio-1" type="radio" name="default-radio" value="" class="tw-w-4 tw-h-4 tw-bg-gray-100 tw-border-gray-300 focus:tw-ring-2">
          <label for="default-radio-1" class="tw-ml-2 tw-text-sm tw-font-medium tw-text-basic-700">Ya</label>
        </div>
        <div @click="openTab = 2" class="tw-flex tw-items-center">
            <input id="default-radio-2" type="radio" name="default-radio" value="" class="tw-w-4 tw-h-4 tw-text-blue-600 tw-bg-gray-100 tw-border-gray-300 focus:tw-ring-blue-500 dark:focus:tw-ring-blue-600 dark:tw-ring-offset-gray-800 focus:tw-ring-2 dark:tw-bg-gray-700 dark:tw-border-gray-600">
            <label for="default-radio-2" class="tw-ml-2 tw-text-sm tw-font-medium tw-text-basic-700">Tidak</label>
        </div>
      </div>
  
      {{-- data orang tua --}}
      <div x-show="openTab === 1">
        <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">F.  Data Orang Tua</div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="nama_ayah">
              Nama Ayah
            </label>
            <input class="input-data" id="nama_ayah" type="text" name="nama_ayah">
          </div>
        </div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="nama_ibu">
              Nama Ibu
            </label>
            <input class="input-data" id="nama_ibu" type="text" name="nama_ibu">
          </div>
        </div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="alamat_ortu">
              Alamat
            </label>
            <textarea class="input-data" id="alamat_ortu" name="alamat_ortu"></textarea>
          </div>
        </div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
            <label class="label-input" for="no_telp_ortu">
              No.Telp/HP
            </label>
            <input class="input-data" id="no_telp_ortu" type="text" name="no_telp_ortu" maxlength="20">
          </div>
          <div class="tw-w-full md:tw-w-1/2 tw-px-3">
            <label class="label-input" for="email_ortu">
              Email
            </label>
            <input class="input-data" id="email_ortu" type="email_ortu" name="email_ortu">
          </div>
        </div>
      </div>
  
  
      {{-- data wali --}}
      <div x-show="openTab === 2">
        <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">F.  Data Wali</div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="nama_wali">
              Nama Wali
            </label>
            <input class="input-data" id="nama_wali" type="text" name="nama_wali">
          </div>
        </div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="alamat_wali">
              Alamat
            </label>
            <textarea class="input-data" id="alamat_wali" type="text" name="alamat_wali"></textarea>
          </div>
        </div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="no_telp_wali">
              No. Telp/HP
            </label>
            <input class="input-data" id="no_telp_wali" type="text" name="no_telp_wali"  maxlength="20">
          </div>
        </div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="pekerjaan_wali_2">
              Pekerjaan Wali
            </label>
            <input class="input-data" id="pekerjaan_wali_2" type="text" name="pekerjaan_wali">
          </div>
        </div>
      </div>
    </div>


    {{-- meninggalkan sekolah --}}
    <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">G.  Meninggalkan Sekolah</div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="label-input" for="tgl_meninggalkan_sekolah">
          Tanggal
        </label>
        <input class="input-data" id="tgl_meninggalkan_sekolah" type="date" name="tgl_meninggalkan_sekolah">
      </div>
    </div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="label-input" for="alasan_meninggalkan_sekolah">
          Alasan
        </label>
        <input class="input-data" id="alasan_meninggalkan_sekolah" type="text" name="alasan_meninggalkan_sekolah">
      </div>
    </div>

        {{-- tamat di sekolah ini --}}
        <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">H.  Tamat di Sekolah ini</div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="nomor_ijazah_smk">
              Nomor Ijazah
            </label>
            <input class="input-data" id="nomor_ijazah_smk" type="text" name="nomor_ijazah_smk">
          </div>
        </div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="label-input" for="tanggal_ijazah_smk">
              Tanggal Ijazah
            </label>
            <input class="input-data" id="tanggal_ijazah_smk" type="date" name="tanggal_ijazah_smk">
          </div>
        </div>

        {{-- keterangan lain2 --}}
        <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">I.  Keterangan Lain-lain</div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <textarea class="input-data" id="keterangan_lain" type="text" name="keterangan_lain"></textarea>
          </div>
        </div>

        {{-- rekap nilai --}}
        <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">J. Rekap Nilai</div>
        <div class="tw-flex tw-flex-col">
          <a href="/rekap-nilai" class="tw-py-2 tw-border tw-w-fit tw-border-gray-600 tw-px-6 hover:tw-text-sims-400 tw-text-gray-600 tw-rounded-md tw-bg-white tw-font-medium">View & Edit</a>
          <button type="submit" class="tw-bg-[#1D6F42] tw-w-fit tw-mt-4 tw-font-medium tw-text-white tw-py-3 tw-px-5 tw-rounded-lg">Upload dari excel</button>
        </div>

        <div class="tw-mx-auto tw-text-center tw-mt-10">
          <button type="submit" class="tw-bg-sims-400 tw-font-medium tw-text-white tw-py-3 tw-px-6 tw-rounded-lg">Upload Data</button>
        </div>
    </form>
  </div>
</div>
@endsection