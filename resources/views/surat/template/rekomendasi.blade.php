<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        
        @page {
            size: A4;
            margin: 3px,6px, 4px,4px;
        }
        body {
            margin: 0;
            padding: 0;
        }

        table tr td{
            font-size: 12px;
        }

        table tr .text{
            text-align: center;
            font-size: 12px;
            margin-right: 20px;
        }
        .signature-table {
            float: left; /* Mengatur elemen untuk mengambang di sebelah kiri */
            margin-right: 20px; /* Memberikan jarak antara tanda tangan dan elemen lain */
        }
        .isi{
            margin: 3px,6px, 4px,4px;
        }
        .justify{
            text-align: justify
        }
        .t-underline{

            text-decoration: underline;
            font-weight: bold;
        }

        .paragraf-table {
        margin-top: 0px;
        margin-bottom: 30px;
        margin-left: 0px;
        margin-right: 40px;
    }

        .custom-table {
        margin-top: 0px;
        margin-bottom: 0px;
        margin-left: 60px;
        margin-right: 60px;
   
    }
    .custom-table td {
            padding-left: 50px;
           
            border: 0px;
    }

    .signature-table {
            width: 100%;
            border-collapse: collapse;
    }
    .signature-table td {
            padding-left: 200px;
            text-align: center;
            border: 0px;
    }
    .signature-column {
            width: 50%; /* Atur lebar kolom tanda tangan */
    }

    </style>
</head>
<body>
    <!-- {{-- <img src="img/profil.png" alt="gambar" > --}} -->
    <center>
        <table border="0" width="100%">
            <tr>
                <td width="10%">
                    {{-- <img src="foto/profil.png" alt="gambar" width="90" height="90"> --}}
                    <img src="image/Logo_Bireuen.jpg" width="90" height="90">
                    
                </td>
                <td width="80%">
                    <center>
                        <font size="4">PEMERINTAH KABUPATEN BIREUN</font><br>
                        <font size="5">RUMAH SAKIT UMUM DAERAH dr. FAUZIAH</font><br>
                        <font size="2">Jalan Mayjen T. Hamzah Bendahara No. 13 Bireun Kode Pos 24211</font><br>
                        <font size="2">Telpon (0644) 21228 Faximile (0644) 21228 E-Mail: rsd_fauziah@yahoo.co.id</font><br>
                    </center>
                </td>
                <td width="10%">
                    <img src="image/logo_fauziah.png" width="90" height="90">
                </td>
            </tr>
            <tr>
                <td colspan="3"><hr></td>
            </tr>

        </table>
        <div class="isi">
            <table border="0" width="100%">
                <tr>
                    <p class="text"> <font size="4" ><u>REKOMENDASI</u></font><br> 
                    <font size="2">Nomor : 800/____/2024</font><br></p>
                    
                   
                </tr>
            </table>
            <table border="0" width="100%">
                <tr>
                    <td>
                        <p style="text-indent: 30px;">Yang bertanda tangan dibawah ini Direktur RSUD dr. Fauziah Bireun dengan ini menerangkan bahwa:</p>
                    </td>
                </tr>
            </table>
            <table class="custom-table" border="0" width="100%">
                <tr >
                    <td width="25%">Nama</td>
                    <td width="2">:</td>
                    <td>{{ $rekom ->pegawai->nama }}</td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td width="2">:</td>
                    <td>{{ $rekom ->pegawai->nip}}</td>
                </tr>
                <tr>
                    <td>Pangkat / Gol.Ruang</td>
                    <td width="2">:</td>
                    <td>Pembina / {{ $rekom ->pegawai->golongan->nama }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td width="2">:</td>
                    <td>{{ $rekom ->pegawai->jabatan->nama }}</td>
                </tr>
                <tr>
                    <td>Unit Kerja</td>
                    <td width="2">:</td>
                    <td>{{ $rekom ->pegawai->unit->nama }}</td>
                </tr>
            </table>
            <table class="paragraf-table" border="0" width="100%" >
                <tr>
                    <td>
                       <p style="text-indent: 30px; line-height: 20px; font-size: 12px;" class="justify">
                        Pada prinsipnya dipihak kami tidak keberatan yang namanya tesebut praktek diluar RSUD dr. Fauziah Bireuen,
                        yaitu di {{ $rekom->alamatrekom}} Dengan catatan praktek ditempat tersebut diluar jam dinas ( jam kerja Rumah Sakit dari jam 08.00 s/d 16.30 WIB)
                         dan tidak mengganggu pelaksanaan tugas pada RSUD dr. Fauziah Bireuen serta menaati ketentuan Undang - undang Nomor 11 Tahun 2019
                        tentang Aparatur Sipil Negara dan Peraturan pemerintah Nomor 11 Tahun 2017 tentang manajemen PNS sebagaimana telah 
                        diubah dengan Peraturan Pemerintah Nomor 17 Tahun 2020 dan Peraturan Pemerintah Nomor 94 Tahun 2021 tentang disiplin 
                        Pegawai Negeri Sipil </p>
                        <p style="text-indent: 30px; line-height: 20px; font-size: 12px;" class="justify"> Demikian rekomendasi ini diberikan untuk dapat dipergunakan sebagaimana mestinya </p>
                    </td>
                </tr>
            </table>
            <table class="signature-table" border="0" width="100%">
            
                <tr>
                    <td class="tg" colspan="3"></td>
                    <td class="kiri">Bireuen, {{ $t }} <br>Direktur RSUD dr. Fauziah Bireun
                        <br>
                        <br>
                        <br>
                        <br>
              
    
                        @foreach ($pegawai as $pegawai)
                            @if($rekom->pegawai->jabatan && $rekom->pegawai->jabatan->nama == 'Direktur')
                                
                            @endif
                        @endforeach
                        <p class="t-underline">{{ $rekom->pegawai->nama }}</p>
                                {{ $rekom->pegawai->nip }}<br> 
    
                    </td>
                </tr>
            
            </table>
        </div>
        
    </center>
    
</body>
</html>