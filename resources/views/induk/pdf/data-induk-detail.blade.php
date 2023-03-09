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
            width: 141px;
            height: 200px;
            object-fit: cover;
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
    <table style="margin-bottom: 20px">
        <tbody style="text-align: left;">
            <tr>
                <th> </th>
                <td>&nbsp;&nbsp;&nbsp;&nbsp; NIS / NISN</td>
                <td>: {{ $siswa->nis_siswa }} / {{ $siswa->nisn_siswa }}</td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <th>1.</th>
                <td>Nama Peserta Didik</td>
                <td>: {{ $siswa->nama_siswa }}</td>
                @if (Route::is('siswa.pdf') && $siswa->foto)
                    <td rowspan="15" style="padding-left: 100px">
                        <div class="pas-foto">
                            <h3 style="text-align: center;">SMKN 11 <br> BANDUNG</h3>
                            <img src="{{ public_path('foto/' . $siswa->foto) }}" class="foto" style="object-fit: cover"
                                alt="Pas Foto" srcset="">
                        </div>
                    </td>
                @elseif(Route::is('siswa.print') && $siswa->foto)
                    <td rowspan="15" style="padding-left: 100px">
                        <div class="pas-foto">
                            <h3 style="text-align: center;">SMKN 11 <br> BANDUNG</h3>
                            <img src="{{ asset('foto/' . $siswa->foto) }}" class="foto" style="object-fit: cover"
                                alt="Pas Foto" srcset="">
                        </div>
                    </td>
                @else
                    <td rowspan="15" style="padding-left: 100px">
                        <div class="pas-foto">
                            <h3 style="text-align: center;">SMKN 11 <br> BANDUNG</h3>
                            <div class="foto">
                                <h4>PAS Photo</h4>
                                <h4>3 X 4</h4>
                                <h4>Waktu Masuk <br> Sekolah</h4>
                            </div>
                        </div>
                    </td>
                @endif
            </tr>
            <tr>
                <th>2.</th>
                <td>Tempat Tgl. Lahir</td>
                <td>: {{ $siswa->tmp_lahir }}, {{ $tgl_lahir_siswa }}</td>
            </tr>
            <tr>
                <th>3.</th>
                <td>Jenis Kelamin</td>
                <td>:
                    @if ($siswa->jenis_kelamin == 'L')
                        Laki-laki
                    @elseif($siswa->jenis_kelamin == 'P')
                        Perempuan
                    @else
                        L / P
                    @endif
                </td>
            </tr>
            <tr>
                <th>4.</th>
                <td>Agama</td>
                <td>: {{ $siswa->agama }}</td>
            </tr>
            <tr>
                <th>5.</th>
                <td>Anak Ke</td>
                <td>: {{ $siswa->anak_ke }}</td>
            </tr>
            <tr>
                <th>6.</th>
                <td>Status dalam Keluarga</td>
                <td>:
                    @if ($siswa->status == 'AK')
                        Anak Kandung
                    @elseif($siswa->status == 'AT')
                        Anak Tiri
                    @elseif($siswa->status == 'AA')
                        Anak Angkat
                    @else
                        AK / AA / AT
                    @endif
                </td>
            </tr>
            <tr>
                <th>7.</th>
                <td>Alamat Peserta Didik</td>
                <td>: {{ $siswa->alamat_siswa }}</td>
            </tr>
            <tr>
                <th></th>
                <td></td>
                <td>No.Telp/HP : {{ $siswa->no_telp_siswa }}</td>
            </tr>
            <tr>
                <th></th>
                <td>Alamat e-mail</td>
                <td>: {{ $siswa->email_siswa }}</td>
            </tr>
            <tr>
                <th>8.</th>
                <td>Diterima di sekolah ini</td>
                <td>: </td>
            </tr>
            <tr>
                <th></th>
                <td>a. Di kelas</td>
                <td>: {{ $siswa->diterima_di_kelas }}</td>
            </tr>
            <tr>
                <th></th>
                <td>b. Pada Tanggal</td>
                <td>: {{ $siswa->tgl_diterima }}</td>
            </tr>
            <tr>
                <th>9.</th>
                <td>Sekolah Asal</td>
                <td>: </td>
            </tr>
            <tr>
                <th></th>
                <td>a. Nama Sekolah</td>
                <td>: {{ $siswa->sekolah_asal }}</td>
            </tr>
            <tr>
                <th></th>
                <td>b. Alamat</td>
                <td>: {{ $siswa->alamat_sekolah_asal }}</td>
            </tr>
            <tr>
                <th>10.</th>
                <td>Ijazah SMP/MTs</td>
                <td>: </td>
            </tr>
            <tr>
                <th></th>
                <td>a. Tahun</td>
                <td>: {{ $siswa->thn_ijazah_smp }}</td>
            </tr>
            <tr>
                <th></th>
                <td>b. Nomor</td>
                <td>: {{ $siswa->no_ijazah_smp }}</td>
            </tr>
            <tr>
                <th>11.</th>
                <td>SKHUN SMP/MTs</td>
                <td>: </td>
            </tr>
            <tr>
                <th></th>
                <td>a. Tahun</td>
                <td>: {{ $siswa->thn_ijazah_smp }}</td>
            </tr>
            <tr>
                <th></th>
                <td>b. Nomor</td>
                <td>: {{ $siswa->no_skhun_smp }}</td>
            </tr>
            <tr>
                <th>12.</th>
                <td>Nama Orang Tua</td>
                <td>: </td>
            </tr>
            <tr>
                <th></th>
                <td>a. Ayah</td>
                <td>: {{ $siswa->ortu->nama_ayah }}</td>
                <td rowspan="15" style="padding-left: 100px">
                    <div class="pas-foto">
                        <h3 style="text-align: center;">SMKN 11 <br> BANDUNG</h3>
                        <div class="foto">
                            <h4>PAS Photo</h4>
                            <h4>3 X 4</h4>
                            <h4>Waktu Keluar <br> Sekolah</h4>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>b. Ibu</td>
                <td>: {{ $siswa->ortu->nama_ibu }}</td>
            </tr>
            <tr>
                <th>13.</th>
                <td>Alamat Orang Tua</td>
                <td>: {{ $siswa->ortu->alamat_ortu }}</td>
            </tr>
            <tr>
                <th></th>
                <th> </th>
                <td>No. Telp/HP : {{ $siswa->ortu->no_telp_ortu }}</td>
            </tr>
            <tr>
                <th></th>
                <td>Alamat e-mail</td>
                <td>: {{ $siswa->ortu->email_ortu }}</td>
            </tr>
            <tr>
                <th>14.</th>
                <td>Wali</td>
                <td>: </td>
            </tr>
            <tr>
                <th></th>
                <td>a. Nama</td>
                <td>: {{ $siswa->ortu->nama_wali }}</td>
            </tr>
            <tr>
                <th></th>
                <td>b. Alamat</td>
                <td>: {{ $siswa->ortu->alamat_wali }}</td>
            </tr>
            <tr>
                <th></th>
                <th> </th>
                <td>No. Telp/HP : {{ $siswa->ortu->no_telp_wali }}</td>
            </tr>
            <tr>
                <th></th>
                <td>c. Pekerjaan</td>
                <td>: {{ $siswa->ortu->pekerjaan_wali }}</td>
            </tr>
            <tr>
                <th>15.</th>
                <td>Meninggalkan Sekolah</td>
                <td>: </td>
            </tr>
            <tr>
                <th></th>
                <td>a. Tanggal</td>
                <td>: {{ $siswa->tgl_meninggalkan_sekolah }}</td>
            </tr>
            <tr>
                <th></th>
                <td>b. Alasan</td>
                <td>: {{ $siswa->alasan_meninggalkan_sekolah }}</td>
            </tr>
            <tr>
                <th>16.</th>
                <td>Tamat Di sekolah ini</td>
                <td>: </td>
            </tr>
            <tr>
                <th></th>
                <td>a. Nomor Ijazah</td>
                <td>: {{ $siswa->no_ijazah_smk }}</td>
            </tr>
            <tr>
                <th></th>
                <td>b. Tanggal Ijazah</td>
                <td>: {{ $siswa->tgl_ijazah_smk }}</td>
            </tr>
            <tr>
                <th>17.</th>
                <td>Keterangan Jasmani</td>
                <td>: </td>
            </tr>
            <tr>
                <th></th>
                <td>a. Berat Badan</td>
                <td>: {{ $siswa->berat_badan }} Kg</td>
            </tr>
            <tr>
                <th></th>
                <td>b. Tinggi Badan</td>
                <td>: {{ $siswa->tinggi_badan }} Cm</td>
            </tr>
            <tr>
                <th></th>
                <td>c. Lingkar Kepala</td>
                <td>: {{ $siswa->lingkar_kepala }} Cm</td>
            </tr>
            <tr>
                <th></th>
                <td>d. Golongan Darah</td>
                <td>: {{ $siswa->golongan_darah }}</td>
            </tr>
            <tr>
                <th>18.</th>
                <td>Keterangan lain-lain</td>
                <td>: {{ $siswa->keterangan_lain }}</td>
            </tr>
        </tbody>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
