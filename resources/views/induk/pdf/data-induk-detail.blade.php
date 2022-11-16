<!DOCTYPE html>
<html>
<head>
  <style>
    * {
      font-family: Arial, sans-serif;
    }

  table {
    border-collapse: collapse;
    widtd: 100%;
    font-size: 12px
  }


  .foto {
    border: 1px solid black;
    text-align: center;
    justify-content: center;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    widtd: 141px;
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

	td {
		text-align: left;
	}

  </style>
</head>
<body>
<!-- <h4>NIS/NISN</h3> -->
	<table style="width: 100%;">
		<tbody>
			<tr>
				<td>
					<div class="pas-foto">
						{{-- <h3 style="text-align: center;">SMKN 11 <br> BANDUNG</h3> --}}
						<div class="foto">
							<h4>PAS Photo</h4>
							<h4>3 X 4</h4>
							<h4>Waktu Masuk <br> Sekolah</h4>
						</div>
					</div>
				</td>
				<td>
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
			<th>1</th>
			<td>NIS / NISN</td>
			<td>: {{ $siswa->nis_siswa }} / {{ $siswa->nisn_siswa }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Nama Peserta Didik</td>
			<td>: {{ $siswa->nama_siswa }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Tempat Tgl. Lahir</td>
			<td>: {{ $siswa->tmp_lahir }}, {{ $tgl_lahir_siswa }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Jenis Kelamin</td>
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
			<th>1</th>
			<td>Agama</td>
			<td>: {{ $siswa->agama }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Anak Ke</td>
			<td>: {{ $siswa->anak_ke }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Status dalam Keluarga</td>
			<td>:                                                  
			@if ($siswa->status == 'AK')
				Anak Kandung
			@elseif($siswa->status == 'AT')
				Anak Tiri
			@elseif($siswa->status == 'AA')
				Anak Angkat
			@endif</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Alamat Peserta Didik</td>
			<td>: {{ $siswa->alamat_siswa }}</td>
		</tr>
		<tr>
			<td></td>
			<td>No.Telp/HP : {{ $siswa->no_telp_siswa }}</td>
		</tr>
		<tr>
			<th>2</th>
			<td>Alamat e-mail</td>
			<td>: {{ $siswa->email_siswa }}</td>
		</tr>
		<tr>
			<th>3</th>
			<td>Diterima di sekolah ini</td>
			<td>: </td>
		</tr>
		<tr>
			<th>4</th>
			<td>Di kelas</td>
			<td>: {{ $siswa->diterima_di_kelas }}</td>
		</tr>
		<tr>
			<th>5</th>
			<td>Pada Tanggal</td>
			<td>: {{ $siswa->tgl_diterima }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Sekolah Asal</td>
			<td>: </td>
		</tr>
		<tr>
			<th>1</th>
			<td>Nama Sekolah</td>
			<td>: {{ $siswa->sekolah_asal }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Alamat</td>
			<td>: {{ $siswa->alamat_sekolah_asal }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Ijazah SMP/MTs</td>
			<td>: </td>
		</tr>
		<tr>
			<th>1</th>
			<td>Tahun</td>
			<td>: {{ $siswa->thn_ijazah_smp }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Nomor</td>
			<td>: {{ $siswa->no_ijazah_smp }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>SKHUN SMP/MTs</td>
			<td>: </td>
		</tr>
		<tr>
			<th>1</th>
			<td>Tahun</td>
			<td>: {{ $siswa->thn_ijazah_smp }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Nomor</td>
			<td>: {{ $siswa->no_skhun_smp }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Nama Orang Tua</td>
			<td>: </td>
		</tr>
		<tr>
			<th>1</th>
			<td>a. Ayah</td>
			<td>: {{ $siswa->nama_ayah }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>b. Ibu</td>
			<td>: {{ $siswa->nama_ibu }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Alamat Orang Tua</td>
			<td>: {{ $siswa->alamat_ortu }}</td>
		</tr>
		<tr>
			<td></td>
			<td>No. Telp/HP : {{ $siswa->no_telp_ortu }}</td>
		</tr>
		<tr>
			<td></td>
			<td>: {{ $siswa->email_ortu }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Nama Wali</td>
			<td>: {{ $siswa->nama_wali }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Alamat</td>
			<td>: {{ $siswa->alamat_wali }}</td>
		</tr>
		<tr>
			<td></td>
			<td>:No. Telp/HP {{ $siswa->no_telp_wali }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Pekerjaan Wali</td>
			<td>: {{ $siswa->pekerjaan_wali }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Meninggalkan Sekolah</td>
			<td>: </td>
		</tr>
		<tr>
			<th>1</th>
			<td>Tanggal</td>
			<td>: {{ $siswa->tgl_meninggalkan_sekolah }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Alasan</td>
			<td>: {{ $siswa->alasan_meninggalkan_sekolah }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Tamat Di sekolah ini</td>
			<td>: </td>
		</tr>
		<tr>
			<th>1</th>
			<td>a. Nomor Ijazah</td>
			<td>: {{ $siswa->no_ijazah_smk }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>a. Tanggal Ijazah</td>
			<td>: {{ $siswa->tgl_ijazah_smk }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Keterangan lain-lain</td>
			<td>: {{ $siswa->keterangan_lain }}</td>
		</tr>
		<tr>
			<td></td>
			<td>Keterangan Jasmani</td>
			<td>: </td>
		</tr>
		<tr>
			<th>1</th>
			<td>Berat Badan</td>
			<td>: {{ $siswa->berat_badan }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Tinggi Badan</td>
			<td>: {{ $siswa->tinggi_badan }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Lingkar Kepala</td>
			<td>: {{ $siswa->lingkar_kepala }}</td>
		</tr>
		<tr>
			<th>1</th>
			<td>Golongan Darah</td>
			<td>: {{ $siswa->golongan_darah }}</td>
		</tr>
	</tbody>
</table>

<script type="text/javascript">
    window.print();
</script>
</body>
</html>