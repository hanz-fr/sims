<!DOCTYPE html>
<html>
<head>
	<style>

	@font-face {
		font-family: Arial, Helvetica, sans-serif;
	}

    .footer {
        font-family: Arial, Helvetica, sans-serif;
        width: 100%;
        font-size: 12px;
        margin-top: 30px;
    }

	h5 {
        font-weight: bold;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
    }

	#data {
		border-collapse: collapse;
		width: 100%;
		font-size: 10px;
        font-family: Arial, Helvetica, sans-serif;
	}

	#data td, #data th {
		border: 1px solid black;
		padding: 10px 7px;
		color: black;
		text-align: center;
	}	

    th {
        background-color: turquoise;
    }

  </style>
</head>
<body>
	<h5 style="margin-bottom: -15px">REKAPITULASI JUMLAH SISWA</h5>
	<h5 style="margin-bottom: -15px">SMK NEGERI 11 BANDUNG</h5>
	<h5>TAHUN AJARAN {{ date('Y') }}/{{ date('Y') + 1 }}</h5>
<br>

	<table id="data">
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

    <table class="footer">
        <tbody>
            <tr>
                <td>Mengetahui,</td>
                <td ></td>
                <td style="padding-left: 70px">Bandung, {{ date('F Y') }}</td>
            </tr>
            <tr>
                <td>Kepala Sekolah</td>
                <td style="padding-left: 70px">Waka Kesiswaan,</td>
                <td style="padding-left: 70px">PELUR ADM Kesiswaan</td>
            </tr>
            <tr style="color: white"> 
                <td>.</td>
            </tr>
            <tr style="color: white"> 
                <td>.</td>
            </tr>
            <tr style="color: white">
                <td>.</td>
            </tr>
            <tr>
                <td>Ino Suprano, S.Pd, M.MPd</td>
                <td style="padding-left: 70px">Parwanto, S.Pd</td>
                <td style="padding-left: 70px">Rasminah</td>
            </tr>
            <tr>
                <td>NIP. 19630708 198703 1 009</td>
                <td style="padding-left: 70px">NIP. 19810521 201001 1 008</td>
                <td></td>
            </tr>
        </tbody>
    </table>

	<script type="text/javascript">
    window.print();
	</script>
</body>
</html>

