<!DOCTYPE html>
<html>
<head>
  <style>
    * {
      font-family: Arial, sans-serif;
    }

  #data {
    border-collapse: collapse;
    width: 100%;
    font-size: 12px
  }

  #data td, #data th {
    border: 1px solid black;
    padding: 10px 7px;
    color: black;
    text-align: center;
  }

  .foto {
    border: 1px solid black;
    text-align: center;
    justify-content: center;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 141px;
    height: 200px;
  }

  .pas-foto {
    text-align: center;
	  display: flex;
    justify-content: center;
    align-items: center;
    display: flex;
    flex-direction: column;
  }

  .foto-foto {
    display: flex;
    flex-direction: row;
    margin-bottom: 30px;
    justify-content: center;
    align-items: center;
		justify-items: center;
  }

	th {
		text-align: left;
	}

  </style>
</head>
<body>
<!-- <h4>NIS/NISN</h3> -->
	<table style="width: 100%;">
		<tbody>
			<tr>
				<td class="foto-foto">
					<div class="pas-foto">
						{{-- <h3 style="text-align: center;">SMKN 11 <br> BANDUNG</h3> --}}
						<div class="foto">
							<h4>PAS Photo</h4>
							<h4>3 X 4</h4>
							<h4>Waktu Masuk <br> Sekolah</h4>
						</div>
					</div>
				</td>
				<td class="foto-foto">
					<div class="pas-foto">
						{{-- <h3 style="text-align: center;">SMKN 11 <br> BANDUNG</h3> --}}
						<div class="foto">
							<h4>PAS Photo</h4>
							<h4>3 X 4</h4>
							<h4>Waktu Keluar <br> Sekolah</h4>
						</div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
<div class="foto-foto">


</div>
<table>
	<tbody style="text-align: left;">
		<tr>
			<th>NIS / NISN</th>
			<td>: {{ $siswa->nis_siswa }} / {{ $siswa->nisn_siswa }}</td>
		</tr>
		<tr>
			<th>Nama Peserta Didik</th>
			<td>: {{ $siswa->nama_siswa }}</td>
		</tr>
		<tr>
			<th>Tempat Tgl. Lahir</th>
			<td>: {{ $siswa->tmp_lahir }}, {{ $tgl_lahir_siswa }}</td>
		</tr>
		<tr>
			<th>Jenis Kelamin</th>
			<td>:                                                         
				@if ($siswa->jenis_kelamin == 'L')
				Laki-laki
			  	@elseif($siswa->jenis_kelamin == 'P')
				Perempuan
				@else
				-
			   @endif</td>
		</tr>
		<tr>
			<th>Agama</th>
			<td>: {{ $siswa->agama }}</td>
		</tr>
		<tr>
			<th>Anak Ke</th>
			<td>: {{ $siswa->anak_ke }}</td>
		</tr>
		<tr>
			<th>Status dalam Keluarga</th>
			<td>:                                                  @if ($siswa->status == 'AK')
				Anak Kandung
			@elseif($siswa->status == 'AT')
				Anak Tiri
			@elseif($siswa->status == 'AA')
				Anak Angkat
			@endif</td>
		</tr>
		<tr>
			<th>Alamat Peserta Didik</th>
			<td>: {{ $siswa->alamat_siswa }}</td>
		</tr>
		<tr>
			<th></th>
			<td>No.Telp/HP : {{ $siswa->no_telp_siswa }}</td>
		</tr>
		<tr>
			<th>Alamat e-mail</th>
			<td>: {{ $siswa->email_siswa }}</td>
		</tr>
		<tr>
			<th>Diterima di sekolah ini</th>
			<td>: </td>
		</tr>
		<tr>
			<th>Di kelas</th>
			<td>: {{ $siswa->diterima_di_kelas }}</td>
		</tr>
		<tr>
			<th>Pada Tanggal</th>
			<td>: {{ $siswa->tgl_diterima }}</td>
		</tr>
		<tr>
			<th>Sekolah Asal</th>
			<td>: </td>
		</tr>
		<tr>
			<th>Nama Sekolah</th>
			<td>: {{ $siswa->sekolah_asal }}</td>
		</tr>
		<tr>
			<th>Alamat</th>
			<td>: {{ $siswa->alamat_sekolah_asal }}</td>
		</tr>
		<tr>
			<th>Ijazah SMP/MTs</th>
			<td>: </td>
		</tr>
		<tr>
			<th>Tahun</th>
			<td>: {{ $siswa->thn_ijazah_smp }}</td>
		</tr>
		<tr>
			<th>Nomor</th>
			<td>: {{ $siswa->no_ijazah_smp }}</td>
		</tr>
		<tr>
			<th>SKHUN SMP/MTs</th>
			<td>: </td>
		</tr>
		<tr>
			<th>Tahun</th>
			<td>: {{ $siswa->thn_ijazah_smp }}</td>
		</tr>
		<tr>
			<th>Nomor</th>
			<td>: {{ $siswa->no_skhun_smp }}</td>
		</tr>
		<tr>
			<th>Nama Orang Tua</th>
			<td>: </td>
		</tr>
		<tr>
			<th>a. Ayah</th>
			<td>: {{ $siswa->nama_ayah }}</td>
		</tr>
		<tr>
			<th>b. Ibu</th>
			<td>: {{ $siswa->nama_ibu }}</td>
		</tr>
		<tr>
			<th>Alamat Orang Tua</th>
			<td>: {{ $siswa->alamat_ortu }}</td>
		</tr>
		<tr>
			<th></th>
			<td>No. Telp/HP : {{ $siswa->no_telp_ortu }}</td>
		</tr>
		<tr>
			<th></th>
			<td>: {{ $siswa->email_ortu }}</td>
		</tr>
		<tr>
			<th>Nama Wali</th>
			<td>: {{ $siswa->nama_wali }}</td>
		</tr>
		<tr>
			<th>Alamat</th>
			<td>: {{ $siswa->alamat_wali }}</td>
		</tr>
		<tr>
			<th></th>
			<td>:No. Telp/HP {{ $siswa->no_telp_wali }}</td>
		</tr>
		<tr>
			<th>Pekerjaan Wali</th>
			<td>: {{ $siswa->pekerjaan_wali }}</td>
		</tr>
		<tr>
			<th>Meninggalkan Sekolah</th>
			<td>: </td>
		</tr>
		<tr>
			<th>Tanggal</th>
			<td>: {{ $siswa->tgl_meninggalkan_sekolah }}</td>
		</tr>
		<tr>
			<th>Alasan</th>
			<td>: {{ $siswa->alasan_meninggalkan_sekolah }}</td>
		</tr>
		<tr>
			<th>Tamat Di sekolah ini</th>
			<td>: </td>
		</tr>
		<tr>
			<th>a. Nomor Ijazah</th>
			<td>: {{ $siswa->no_ijazah_smk }}</td>
		</tr>
		<tr>
			<th>a. Tanggal Ijazah</th>
			<td>: {{ $siswa->tgl_ijazah_smk }}</td>
		</tr>
		<tr>
			<th>Keterangan lain-lain</th>
			<td>: {{ $siswa->keterangan_lain }}</td>
		</tr>
		<tr>
			<th>Keterangan Jasmani</th>
			<td>: </td>
		</tr>
		<tr>
			<th>Berat Badan</th>
			<td>: {{ $siswa->berat_badan }}</td>
		</tr>
		<tr>
			<th>Tinggi Badan</th>
			<td>: {{ $siswa->tinggi_badan }}</td>
		</tr>
		<tr>
			<th>Lingkar Kepala</th>
			<td>: {{ $siswa->lingkar_kepala }}</td>
		</tr>
		<tr>
			<th>Golongan Darah</th>
			<td>: {{ $siswa->golongan_darah }}</td>
		</tr>
	</tbody>
</table>

<script type="text/javascript">
    window.print();
</script>
</body>
</html>