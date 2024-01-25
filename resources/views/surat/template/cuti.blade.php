<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      @page {
          size: A4;
          
      }
        .t{
            border-collapse: collapse;
        }
        .tg{
            border: 1px solid black;
        } 
        /* table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        } */
        /* th, td {
            padding: 10px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        } */
     
      .p1{
        font-size: 10px;
      }
    </style>
    <title>Surat</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <table border="0" class="mb-2">
            <tr>
                <td width="60%"></td>
                <td>
                    
                        Bireun, <br>
                        Kepada <br>
                        YTH. Direkrur RSUD dr. Fauziah Bireun <br>
                        di <br>
                        -  Tempat
                    </td>
                
            </tr>
        </table>
        <p class="text-center mb-0"><b>Formulir Permintaan dan pemberian cuti</b></p>
        <table cellspacing="0" cellspacing="0" class="p1 mb-2">
            <tr>
                <td colspan="4" class="tg">I. DATA PEGAWAI</td>
            </tr>
            <tr>
                <td width="10%" class="tg">Nama</td>
                <td width="40%" class="tg">{{ $cuti->pegawai->nama }}</td>
                <td width="15%" class="tg">Pangkat/Gol</td>
                <td width="35%" class="tg">{{ $cuti->pegawai->golongan->nama }}</td>
            </tr>
            <tr>
                <td class="tg">Jabatan</td>
                <td class="tg">{{ $cuti->pegawai->jabatan->nama }}</td>
                <td>NIP</td>
                <td class="tg">{{ $cuti->pegawai->nip }}</td>
            </tr>
            <tr>
                <td class="tg">Unit Kerja</td>
                <td class="tg">{{ $cuti->pegawai->unit->nama }}</td>
                <td class="tg">Masa Kerja</td>
                <td class="tg"></td>
            </tr>
        </table>
        <table cellspacing="0" cellspacing="0" class="p1 mb-2">
            <tr>
                <td colspan="4" class="tg">II. JENIS CUTI YANG DIAMBIL </td>
            </tr>
            <tr>
                <td width="40%" class="tg">1. Cuti Tahunan</td>
                <td width="10%" class="tg text-center">
                    <?php 
                        if ($cuti->jcuti->slug == "cuti-tahunan") { ?>
                             X
                       <?php }    
                    ?>
                </td>
                <td width="40%" class="tg">2. Cuti Besar</td>
                <td width="10%" class="tg text-center">
                    <?php 
                        if ($cuti->jcuti->slug == "cuti-besar") { ?>
                             X
                       <?php }    
                    ?>
                </td>
            </tr>
            <tr>
                <td class="tg">3. Cuti Sakit</td>
                <td class="tg text-center">
                    <?php 
                        if ($cuti->jcuti->slug == "cuti-sakit") { ?>
                             X
                       <?php }    
                    ?>
                </td>
                <td>4. Cuti Melahirkan</td>
                <td class="tg text-center">
                    <?php 
                        if ($cuti->jcuti->slug == "cuti-melahirkan") { ?>
                             X
                       <?php }    
                    ?>
                </td>
            </tr>
            <tr>
                <td class="tg">5. Cuti Karena Alasan Penting</td>
                <td class="tg text-center">
                    <?php 
                        if ($cuti->jcuti->slug == "cuti-karena-alasan-penting") { ?>
                             X
                       <?php }    
                    ?>
                </td>
                <td class="tg">6. Cuti Diluar tanggungan Negara</td>
                <td class="tg text-center">
                    <?php 
                        if ($cuti->jcuti->slug == "cuti-diluar-tanggungan-negara") { ?>
                             X
                       <?php }    
                    ?>
                </td>
            </tr>
        </table>
        <table cellspacing="0" cellspacing="0" class="p1 mb-2">
            <tr>
                <td class="tg" colspan="4">III. ALASAN CUTI</td>
            </tr>
            <tr>
                <td colspan="4" class="tg">{{ $cuti->alasan }}</td>
            </tr>
            
        </table>
        <table cellspacing="0" cellspacing="0" class="p1 mb-2">
            <tr>
                <td colspan="6" class="tg">IV. LAMANYA CUTI</td>
            </tr>
            <tr>
                <td width="10%" class="tg">Selama</td>
                <td width="15%" class="tg text-center">
                    <?php 
                            $akhir = strtotime($cuti->tgl_akhir);
                            $awal = strtotime($cuti->tgl_mulai);
                            $jarak = $akhir-$awal;
                            $selisih = ($jarak / 60 / 60 / 24)+1;
                    ?>
                    {{ $selisih }} Hari
                </td>
                <td width="15%" class="tg">Mulai Tanggal</td>
                <td width="20%" class="tg text-center">
                    {{ $cuti->tgl_mulai }}
                </td>
                <td width="5%" align="center" class="tg">s/d</td>
                <td width="20%" class="tg text-center">
                    {{ $cuti->tgl_akhir }}
                </td>
            </tr>
        </table>

        <table cellspacing="0" cellspacing="0"  class="p1 mb-2">
            <tr>
                <td colspan="6" class="tg">V. CATATAN CUTI</td>
            </tr>
            <tr>
                <td colspan="5" class="tg">1. CUTI TAHUNAN</td>
                <td width="35%" class="tg"></td>
            </tr>
            <tr>
                <td width="15%" colspan="2" align="center" class="tg">Tahun</td>
                <td width="10" align="center" class="tg">Sisa</td>
                <td width="15%" align="center" class="tg">Keterangan</td>
                <td width="25%" class="tg">2. CUTI BESAR</td>
                <td width="35%" class="tg"></td>
                
            </tr>
            <tr>
                <td align="center" class="tg">N-2</td>
                <td align="center" class="tg"></td>
                <td align="center" class="tg"></td>
                <td align="center" class="tg">2021</td>
                <td class="tg">3. CUTI SAKIT</td>
                <td class="tg"></td>
                
            </tr>
            <tr>
                <td align="center" class="tg">N-1</td>
                <td align="center" class="tg"></td>
                <td align="center" class="tg"></td>
                <td align="center" class="tg">2022</td>
                <td  class="tg">3. CUTI MELAHIRKAN</td>
                <td class="tg"></td>
                
            </tr>
            <tr>
                <td align="center" rowspan="2" class="tg">N</td>
                <td align="center" rowspan="2" class="tg">12</td>
                <td align="center" rowspan="2" class="tg"></td>
                <td align="center" rowspan="2" class="tg">2023</td>
                <td class="tg">4. CUTI KARENA ALASAN PENTING</td>
                <td class="tg"></td>
                
            </tr>
            <tr>
                
                <td width="40%" class="tg">5. CUTI DILUAR TANGGUNGAN NEGARA</td>
                <td width="20%"  class="tg"></td>
                
            </tr>
        </table>

        {{-- <table cellspacing="0" cellspacing="0" class="p1 mb-2">
            <tr>
                <td colspan="4" class="tg">VI. ALAMAT SELAMA MELAKSANAKAN CUTI</td>
            </tr>
            <tr>
                <td width="40%" class="tg"></td>
                <td width="31%" align="center" class="tg">Telp</td>
                <td width="30%" class="tg"></td>
            </tr>
            <tr>
                <td class="tg text-center">
                    {{ $cuti->alamat_cuti }}
                </td>
                <td class="tg"></td>
                <td class="tg text-center">
                    Hormat Saya
                    <br>
                    <br>
                    <br>
                    <br>
                    <u>{{ $cuti->pegawai->nama }}</u><br>
                    Nip. <i>{{ $cuti->pegawai->nip }}</i>
                </td>
            </tr>
        </table> --}}

        <table cellspacing="0" cellspacing="0" class="p1 mb-2">
            <tr>
                <td class="tg" colspan="4">VI. ALAMAT SELAMA MELAKSANAKAN CUTI</td>
            </tr>
            <tr align="center">
                <td class="tg" colspan="2"></td>
                {{-- <td class="tg" width="20%">PERUBAHAN****</td> --}}
                <td class="tg" width="30%">Telp</td>
                <td class="tg" width="30%"></td>
            </tr>
            <tr align="center">
                <td class="tg" colspan="2">{{ $cuti->alamat_cuti }}</td>
                <td class="tg">
                    {{ $cuti->pegawai->no_hp }}
                </td>
                <td class="tg">Hormat Saya ?
                    <br>
                    <br>
                    <br>
                    <u>{{ $cuti->pegawai->nama }}</u><br>
                    Nip. <i>{{ $cuti->pegawai->nip }}</i>
                </td>
            </tr>
        </table>

        <table cellspacing="0" cellspacing="0" class="p1 mb-2">
            <tr>
                <td class="tg" colspan="4">VII. PERTIMBANGAN ATASAN LANGSUNG **</td>
            </tr>
            <tr align="center">
                <td class="tg" width="20%">DISETUJUI</td>
                <td class="tg" width="20%">PERUBAHAN****</td>
                <td class="tg" width="31%">DITANGGUHKAN****</td>
                <td class="tg" width="30%">TIDAK DISETUJUI</td>
            </tr>
            <tr>
                <td class="tg">-</td>
                <td class="tg"></td>
                <td class="tg"></td>
                <td class="tg"></td>
            </tr>
            <tr align="center">
                <td class="tg" colspan="3"></td>
                <td class="tg">Kabid apa ?
                    <br>
                    <br>
                    <br>
                    <u>Nama Kabid</u><br>
                    Nip. 
                </td>
            </tr>
        </table>

        <table cellspacing="0" cellspacing="0" class="p1 mb-2">
            <tr>
                <td class="tg" colspan="4">VIII. KEPUTUSAN PEJABAT BERWENANG MEMBERIKAN CUTI</td>
            </tr>
            
            <tr align="center">
                <td class="tg" width="20%">DISETUJUI</td>
                <td class="tg" width="20%">PERUBAHAN****</td>
                <td class="tg" width="31%">DITANGGUHKAN****</td>
                <td class="tg" width="30%">TIDAK DISETUJUI</td>
            </tr>
            <tr>
                <td class="tg">-</td>
                <td class="tg"></td>
                <td class="tg"></td>
                <td class="tg"></td>
            </tr>
            <tr align="center">
                <td class="tg" colspan="3"></td>
                <td class="tg">Direktur RSUD dr. Fauziah Bireun
                    <br>
                    <br>
                    <br>
                    <u>Dr. Amir Addani, M.Kes</u><br>
                    Nip. 
                </td>
            </tr>
        </table>

        

      </div>
    </div>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript">
        window.print();
      </script>
  </body>
</html>