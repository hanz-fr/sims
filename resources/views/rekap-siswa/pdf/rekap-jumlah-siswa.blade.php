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
	<h4 style="font-weight: 500; text-align: center; font-family:Arial, Helvetica, sans-serif">DATA REKAP JUMLAH SISWA</h4>
<br>
	<h4 style="font-weight: 500; text-align: left; font-family:Arial, Helvetica, sans-serif">DATA JUMLAH SISWA X</h4>
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

				<?php $sum_total_siswa_p_X = 0; ?>
				<?php $sum_total_siswa_l_X = 0; ?>
				<?php $sum_total_siswa_X = 0; ?>

				<?php $sum_total_siswa_p_keluar_X = 0; ?>
				<?php $sum_total_siswa_l_keluar_X = 0; ?>
				<?php $sum_total_siswa_keluar_X = 0; ?>

				<?php $sum_total_siswa_p_masuk_X = 0; ?>
				<?php $sum_total_siswa_l_masuk_X = 0; ?>
				<?php $sum_total_siswa_masuk_X = 0; ?>

				<?php $sum_total_siswa_p_akhir_X = 0; ?>
				<?php $sum_total_siswa_l_akhir_X = 0; ?>
				<?php $sum_total_siswa_akhir_X = 0; ?>

				@foreach ($kelas10 as $k10)

						<tr>
								<td>{{ $k10->id }}</td>
								<td>{{ $k10->jumlahSiswaPerempuan }}</td>
								<td>{{ $k10->jumlahSiswaLaki }}</td>
								<td>{{ $k10->jumlahSiswa }}</td>
								<td>{{ $k10->siswaPerempuanKeluar }}</td>
								<td>{{ $k10->siswaLakiKeluar }}</td>
								<td>{{ $k10->jumlahSiswaKeluar }}</td>
								<td>{{ $k10->siswaPerempuanMasuk }}</td>
								<td>{{ $k10->siswaLakiMasuk }}</td>
								<td>{{ $k10->jumlahSiswaMasuk }}</td>
								<td>
										{{ $k10->jumlahSiswaPerempuan - $k10->siswaPerempuanKeluar + $k10->siswaPerempuanMasuk }}
								</td>
								<td>
										{{ $k10->jumlahSiswaLaki - $k10->siswaLakiKeluar + $k10->siswaLakiMasuk }}</td>
								<td>
										{{ $k10->jumlahSiswaPerempuan - $k10->siswaPerempuanKeluar + $k10->siswaPerempuanMasuk + $k10->jumlahSiswaLaki - $k10->siswaLakiKeluar + $k10->siswaLakiMasuk }}
								</td>
						</tr>
						<?php $sum_total_siswa_p_X += $k10->jumlahSiswaPerempuan; ?>
						<?php $sum_total_siswa_l_X += $k10->jumlahSiswaLaki; ?>
						<?php $sum_total_siswa_X += $k10->jumlahSiswa; ?>

						<?php $sum_total_siswa_p_keluar_X += $k10->siswaPerempuanKeluar; ?>
						<?php $sum_total_siswa_l_keluar_X += $k10->siswaLakiKeluar; ?>
						<?php $sum_total_siswa_keluar_X += $k10->jumlahSiswaKeluar; ?>

						<?php $sum_total_siswa_p_masuk_X += $k10->siswaPerempuanMasuk; ?>
						<?php $sum_total_siswa_l_masuk_X += $k10->siswaLakiMasuk; ?>
						<?php $sum_total_siswa_masuk_X += $k10->jumlahSiswaMasuk; ?>

						<?php $sum_total_siswa_p_akhir_X += $k10->jumlahSiswaPerempuan - $k10->siswaPerempuanKeluar + $k10->siswaPerempuanMasuk; ?>
						<?php $sum_total_siswa_l_akhir_X += $k10->jumlahSiswaLaki - $k10->siswaLakiKeluar + $k10->siswaLakiMasuk; ?>
						<?php $sum_total_siswa_akhir_X += $k10->jumlahSiswaPerempuan - $k10->siswaPerempuanKeluar + $k10->siswaPerempuanMasuk + $k10->jumlahSiswaLaki - $k10->siswaLakiKeluar + $k10->siswaLakiMasuk; ?>
				@endforeach
				<tr>
					<th>JUMLAH SISWA</th>
					<th>{{ $sum_total_siswa_p_X }}</th>
					<th>{{ $sum_total_siswa_l_X }}</th>
					<th>{{ $sum_total_siswa_X }}</th>
					<th>{{ $sum_total_siswa_p_keluar_X }}</th>
					<th>{{ $sum_total_siswa_l_keluar_X }}</th>
					<th>{{ $sum_total_siswa_keluar_X }}</th>
					<th>{{ $sum_total_siswa_p_masuk_X }}</th>
					<th>{{ $sum_total_siswa_l_masuk_X }}</th>
					<th>{{ $sum_total_siswa_masuk_X }}</th>
					<th>{{ $sum_total_siswa_p_akhir_X }}</th>
					<th>{{ $sum_total_siswa_l_akhir_X }}</th>
					<th>{{ $sum_total_siswa_akhir_X }}</th>
				</tr>
		</tbody>
</table>

<h4 style="font-weight: 500; text-align: left; font-family:Arial, Helvetica, sans-serif">DATA JUMLAH SISWA XII</h4>

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
			<?php $sum_total_siswa_p_XI = 0; ?>
			<?php $sum_total_siswa_l_XI = 0; ?>
			<?php $sum_total_siswa_XI = 0; ?>

			<?php $sum_total_siswa_p_keluar_XI = 0; ?>
			<?php $sum_total_siswa_l_keluar_XI = 0; ?>
			<?php $sum_total_siswa_keluar_XI = 0; ?>

			<?php $sum_total_siswa_p_masuk_XI = 0; ?>
			<?php $sum_total_siswa_l_masuk_XI = 0; ?>
			<?php $sum_total_siswa_masuk_XI = 0; ?>
			<?php $sum_total_siswa_p_akhir_XI = 0; ?>
			<?php $sum_total_siswa_l_akhir_XI = 0; ?>
			<?php $sum_total_siswa_akhir_XI = 0; ?>

			@foreach ($kelas11 as $k11)

					<tr>
							<td>{{ $k11->id }}</td>
							<td>{{ $k11->jumlahSiswaPerempuan }}</td>
							<td>{{ $k11->jumlahSiswaLaki }}</td>
							<td>{{ $k11->jumlahSiswa }}</td>
							<td>{{ $k11->siswaPerempuanKeluar }}</td>
							<td>{{ $k11->siswaLakiKeluar }}</td>
							<td>{{ $k11->jumlahSiswaKeluar }}</td>
							<td>{{ $k11->siswaPerempuanMasuk }}</td>
							<td>{{ $k11->siswaLakiMasuk }}</td>
							<td>{{ $k11->jumlahSiswaMasuk }}</td>
							<td>
									{{ $k11->jumlahSiswaPerempuan - $k11->siswaPerempuanKeluar + $k11->siswaPerempuanMasuk }}
							</td>
							<td>
									{{ $k11->jumlahSiswaLaki - $k11->siswaLakiKeluar + $k11->siswaLakiMasuk }}</td>
							<td>
									{{ $k11->jumlahSiswaPerempuan - $k11->siswaPerempuanKeluar + $k11->siswaPerempuanMasuk + $k11->jumlahSiswaLaki - $k11->siswaLakiKeluar + $k11->siswaLakiMasuk }}
							</td>
					</tr>
					<?php $sum_total_siswa_p_XI += $k11->jumlahSiswaPerempuan; ?>
					<?php $sum_total_siswa_l_XI += $k11->jumlahSiswaLaki; ?>
					<?php $sum_total_siswa_XI += $k11->jumlahSiswa; ?>

					<?php $sum_total_siswa_p_keluar_XI += $k11->siswaPerempuanKeluar; ?>
					<?php $sum_total_siswa_l_keluar_XI += $k11->siswaLakiKeluar; ?>
					<?php $sum_total_siswa_keluar_XI += $k11->jumlahSiswaKeluar; ?>

					<?php $sum_total_siswa_p_masuk_XI += $k11->siswaPerempuanMasuk; ?>
					<?php $sum_total_siswa_l_masuk_XI += $k11->siswaLakiMasuk; ?>
					<?php $sum_total_siswa_masuk_XI += $k11->jumlahSiswaMasuk; ?>

					<?php $sum_total_siswa_p_akhir_XI += $k11->jumlahSiswaPerempuan - $k11->siswaPerempuanKeluar + $k11->siswaPerempuanMasuk; ?>
					<?php $sum_total_siswa_l_akhir_XI += $k11->jumlahSiswaLaki - $k11->siswaLakiKeluar + $k11->siswaLakiMasuk; ?>
					<?php $sum_total_siswa_akhir_XI += $k11->jumlahSiswaPerempuan - $k11->siswaPerempuanKeluar + $k11->siswaPerempuanMasuk + $k11->jumlahSiswaLaki - $k11->siswaLakiKeluar + $k11->siswaLakiMasuk; ?>
			@endforeach
	<tr>
			<th>JUMLAH SISWA</th>
			<th>{{ $sum_total_siswa_p_XI }}</th>
			<th>{{ $sum_total_siswa_l_XI }}</th>
			<th>{{ $sum_total_siswa_XI }}</th>
			<th>{{ $sum_total_siswa_p_keluar_XI }}</th>
			<th>{{ $sum_total_siswa_l_keluar_XI }}</th>
			<th>{{ $sum_total_siswa_keluar_XI }}</th>
			<th>{{ $sum_total_siswa_p_masuk_XI }}</th>
			<th>{{ $sum_total_siswa_l_masuk_XI }}</th>
			<th>{{ $sum_total_siswa_masuk_XI }}</th>
			<th>{{ $sum_total_siswa_p_akhir_XI }}</th>
			<th>{{ $sum_total_siswa_l_akhir_XI }}</th>
			<th>{{ $sum_total_siswa_akhir_XI }}</th>
	</tr>
	</tbody>
</table>

<h4 style="font-weight: 500; text-align: left; font-family:Arial, Helvetica, sans-serif">DATA JUMLAH SISWA XII</h4>
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

			<?php $sum_total_siswa_p_XII = 0; ?>
			<?php $sum_total_siswa_l_XII = 0; ?>
			<?php $sum_total_siswa_XII = 0; ?>

			<?php $sum_total_siswa_p_keluar_XII = 0; ?>
			<?php $sum_total_siswa_l_keluar_XII = 0; ?>
			<?php $sum_total_siswa_keluar_XII = 0; ?>

			<?php $sum_total_siswa_p_masuk_XII = 0; ?>
			<?php $sum_total_siswa_l_masuk_XII = 0; ?>
			<?php $sum_total_siswa_masuk_XII = 0; ?>

			<?php $sum_total_siswa_p_akhir_XII = 0; ?>
			<?php $sum_total_siswa_l_akhir_XII = 0; ?>
			<?php $sum_total_siswa_akhir_XII = 0; ?>

			@foreach ($kelas12 as $k12)

					<tr>
							<td>{{ $k12->id }}</td>
							<td>{{ $k12->jumlahSiswaPerempuan }}</td>
							<td>{{ $k12->jumlahSiswaLaki }}</td>
							<td>{{ $k12->jumlahSiswa }}</td>
							<td>{{ $k12->siswaPerempuanKeluar }}</td>
							<td>{{ $k12->siswaLakiKeluar }}</td>
							<td>{{ $k12->jumlahSiswaKeluar }}</td>
							<td>{{ $k12->siswaPerempuanMasuk }}</td>
							<td>{{ $k12->siswaLakiMasuk }}</td>
							<td>{{ $k12->jumlahSiswaMasuk }}</td>
							<td>
									{{ $k12->jumlahSiswaPerempuan - $k12->siswaPerempuanKeluar + $k12->siswaPerempuanMasuk }}
							</td>
							<td>
									{{ $k12->jumlahSiswaLaki - $k12->siswaLakiKeluar + $k12->siswaLakiMasuk }}</td>
							<td>
									{{ $k12->jumlahSiswaPerempuan - $k12->siswaPerempuanKeluar + $k12->siswaPerempuanMasuk + $k12->jumlahSiswaLaki - $k12->siswaLakiKeluar + $k12->siswaLakiMasuk }}
							</td>
					</tr>
					<?php $sum_total_siswa_p_XII += $k12->jumlahSiswaPerempuan; ?>
					<?php $sum_total_siswa_l_XII += $k12->jumlahSiswaLaki; ?>
					<?php $sum_total_siswa_XII += $k12->jumlahSiswa; ?>

					<?php $sum_total_siswa_p_keluar_XII += $k12->siswaPerempuanKeluar; ?>
					<?php $sum_total_siswa_l_keluar_XII += $k12->siswaLakiKeluar; ?>
					<?php $sum_total_siswa_keluar_XII += $k12->jumlahSiswaKeluar; ?>

					<?php $sum_total_siswa_p_masuk_XII += $k12->siswaPerempuanMasuk; ?>
					<?php $sum_total_siswa_l_masuk_XII += $k12->siswaLakiMasuk; ?>
					<?php $sum_total_siswa_masuk_XII += $k12->jumlahSiswaMasuk; ?>

					<?php $sum_total_siswa_p_akhir_XII += $k12->jumlahSiswaPerempuan - $k12->siswaPerempuanKeluar + $k12->siswaPerempuanMasuk; ?>
					<?php $sum_total_siswa_l_akhir_XII += $k12->jumlahSiswaLaki - $k12->siswaLakiKeluar + $k12->siswaLakiMasuk; ?>
					<?php $sum_total_siswa_akhir_XII += $k12->jumlahSiswaPerempuan - $k12->siswaPerempuanKeluar + $k12->siswaPerempuanMasuk + $k12->jumlahSiswaLaki - $k12->siswaLakiKeluar + $k12->siswaLakiMasuk; ?>
			@endforeach
	<tr>
			<th>JUMLAH SISWA</th>
			<th>{{ $sum_total_siswa_p_XII }}</th>
			<th>{{ $sum_total_siswa_l_XII }}</th>
			<th>{{ $sum_total_siswa_XII }}</th>
			<th>{{ $sum_total_siswa_p_keluar_XII }}</th>
			<th>{{ $sum_total_siswa_l_keluar_XII }}</th>
			<th>{{ $sum_total_siswa_keluar_XII }}</th>
			<th>{{ $sum_total_siswa_p_masuk_XII }}</th>
			<th>{{ $sum_total_siswa_l_masuk_XII }}</th>
			<th>{{ $sum_total_siswa_masuk_XII }}</th>
			<th>{{ $sum_total_siswa_p_akhir_XII }}</th>
			<th>{{ $sum_total_siswa_l_akhir_XII }}</th>
			<th>{{ $sum_total_siswa_akhir_XII }}</th>
	</tr>
</tbody>
</table>

<h4 style="font-weight: 500; text-align: left; font-family:Arial, Helvetica, sans-serif">DATA JUMLAH SISWA KESELURUHAN</h4>
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

