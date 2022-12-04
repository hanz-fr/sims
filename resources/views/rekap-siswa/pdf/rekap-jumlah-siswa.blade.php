<!DOCTYPE html>
<html>
<head>
	<style>
		* {
		font-family: Arial, sans-serif;
		}

	table {
		border-collapse: collapse;
		width: 100%;
		font-size: 12px
	}

	table td, table th {
		border: 1px solid black;
		padding: 10px 7px;
		color: black;
		text-align: center;
	}

  </style>
</head>
<body>
	<h4 style="font-weight: 500; text-align: center; font-family:Arial, Helvetica, sans-serif">REKAPITULASI JUMLAH SISWA</h4>
<br>

	<table>
		<thead>
			<tr>
				<th scope="col" rowspan="2">KELAS</th>
				<th scope="col" colspan="3">JUMLAH SISWA AWAL BULAN</th>
				<th scope="col" colspan="3">JUMLAH SISWA KELUAR</th>
				<th scope="col" colspan="3">JUMLAH SISWA MASUK</th>
				<th scope="col" colspan="3">JUMLAH SISWA AKHIR BULAN</th>
			</tr>
			<tr>
				<th>P</th>
				<th>L</th>
				<th>JML</th>
				<th>P</th>
				<th>L</th>
				<th>JML</th>
				<th>P</th>
				<th>L</th>
				<th>JML</th>
				<th>P</th>
				<th>L</th>
				<th>JML</th>
			</tr>
		</thead>
		<tbody>
			<?php $sum_total_siswa_p = 0; ?>
			<?php $sum_total_siswa_l = 0; ?>
			<?php $sum_total_siswa = 0; ?>

			<?php $sum_total_siswa_p_keluar = 0; ?>
			<?php $sum_total_siswa_l_keluar = 0; ?>
			<?php $sum_total_siswa_keluar = 0; ?>

			<?php $sum_total_siswa_p_masuk = 0; ?>
			<?php $sum_total_siswa_l_masuk = 0; ?>
			<?php $sum_total_siswa_masuk = 0; ?>

			<?php $sum_total_siswa_p_akhir = 0; ?>
			<?php $sum_total_siswa_l_akhir = 0; ?>
			<?php $sum_total_siswa_akhir = 0; ?>

			@foreach ($semua_kelas as $k)

				<tr>
					<td>{{ $k->id }}</td>
					<td>{{ $k->jumlahSiswaPerempuan }}</td>
					<td>{{ $k->jumlahSiswaLaki }}</td>
					<td>{{ $k->jumlahSiswa }}</td>
					<td>{{ $k->siswaPerempuanKeluar }}</td>
					<td>{{ $k->siswaLakiKeluar }}</td>
					<td>{{ $k->jumlahSiswaKeluar }}</td>
					<td>{{ $k->siswaPerempuanMasuk }}</td>
					<td>{{ $k->siswaLakiMasuk }}</td>
					<td>{{ $k->jumlahSiswaMasuk }}</td>
					<td>
						{{ $k->jumlahSiswaPerempuan - $k->siswaPerempuanKeluar + $k->siswaPerempuanMasuk }}
					</td>
					<td>
						{{ $k->jumlahSiswaLaki - $k->siswaLakiKeluar + $k->siswaLakiMasuk }}</td>
					<td>
						{{ $k->jumlahSiswaPerempuan - $k->siswaPerempuanKeluar + $k->siswaPerempuanMasuk + $k->jumlahSiswaLaki - $k->siswaLakiKeluar + $k->siswaLakiMasuk }}
					</td>
				</tr>
				<?php $sum_total_siswa_p += $k->jumlahSiswaPerempuan; ?>
				<?php $sum_total_siswa_l += $k->jumlahSiswaLaki; ?>
				<?php $sum_total_siswa += $k->jumlahSiswa; ?>

				<?php $sum_total_siswa_p_keluar += $k->siswaPerempuanKeluar; ?>
				<?php $sum_total_siswa_l_keluar += $k->siswaLakiKeluar; ?>
				<?php $sum_total_siswa_keluar += $k->jumlahSiswaKeluar; ?>

				<?php $sum_total_siswa_p_masuk += $k->siswaPerempuanMasuk; ?>
				<?php $sum_total_siswa_l_masuk += $k->siswaLakiMasuk; ?>
				<?php $sum_total_siswa_masuk += $k->jumlahSiswaMasuk; ?>

				<?php $sum_total_siswa_p_akhir += $k->jumlahSiswaPerempuan - $k->siswaPerempuanKeluar + $k->siswaPerempuanMasuk; ?>
				<?php $sum_total_siswa_l_akhir += $k->jumlahSiswaLaki - $k->siswaLakiKeluar + $k->siswaLakiMasuk; ?>
				<?php $sum_total_siswa_akhir += $k->jumlahSiswaPerempuan - $k->siswaPerempuanKeluar + $k->siswaPerempuanMasuk + $k->jumlahSiswaLaki - $k->siswaLakiKeluar + $k->siswaLakiMasuk; ?>
			@endforeach

		<tr>
			<th>JUMLAH SISWA</th>
			<th>{{ $sum_total_siswa_p }}</th>
			<th>{{ $sum_total_siswa_l }}</th>
			<th>{{ $sum_total_siswa }}</th>
			<th>{{ $sum_total_siswa_p_keluar }}</th>
			<th>{{ $sum_total_siswa_l_keluar }}</th>
			<th>{{ $sum_total_siswa_keluar }}</th>
			<th>{{ $sum_total_siswa_p_masuk }}</th>
			<th>{{ $sum_total_siswa_l_masuk }}</th>
			<th>{{ $sum_total_siswa_masuk }}</th>
			<th>{{ $sum_total_siswa_p_akhir }}</th>
			<th>{{ $sum_total_siswa_l_akhir }}</th>
			<th>{{ $sum_total_siswa_akhir }}</th>
		</tr>

	</tbody>
	</table>

	<script type="text/javascript">
    window.print();
	</script>
</body>
</html>

