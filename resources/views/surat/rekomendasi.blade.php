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
        table tr td{
            font-size: 12px;
        }
        table tr .text{
            text-align: right;
            font-size: 12px;
            margin-right: 20px;
        }
        .isi{
            margin: 3px,6px, 4px,4px;
        }
        .justify{
            text-align: justify
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
                    <img src="image/logo_fauziah.png" width="90" height="90">
                    
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
                    <font size="4"><u>REKOMENDASI</u></font><br>
                    <font size="2">Nomor : 800/____/2023</font><br>
                    
                     <td class="text">Jember, 16 Mei 2000</td>
                </tr>
            </table>
            <table border="0" width="100%">
                <tr>
                    <td>
                        <p style="text-indent: 30px;">Yang bertanda tangan dibawah ini Direktur RSUD dr. Fauziah Bireun dengan ini menerangkan bahwa:</p>
                    </td>
                </tr>
            </table>
            <table border="0" width="100%">
                <tr>
                    <td width="20%">Nama</td>
                    <td width="2">:</td>
                    <td>{{ $pegawai->nama }}</td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td width="2">:</td>
                    <td>{{ $pegawai->nik }}</td>
                </tr>
                <tr>
                    <td>Pangkat / Gol.Ruang</td>
                    <td width="2">:</td>
                    <td>Pembina / {{ $pegawai->golongan->nama }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td width="2">:</td>
                    <td>{{ $pegawai->jabatan->nama }}</td>
                </tr>
                <tr>
                    <td>Unit Kerja</td>
                    <td width="2">:</td>
                    <td>{{ $pegawai->unit->nama }}</td>
                </tr>
            </table>
            <table border="0" width="100%">
                <tr>
                    <td>
                       <p style="text-indent: 30px; line-height: 20px; font-size: 12px;" class="justify">Pada Prinsipnya dipihak kami tidak keberatan yang namanya tersebut praktek duluar RSUD dr. Fauziah Bireun. Yaitu di rumah sakit blalalalalallalalla . dengan catatan Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque unde quam delectus molestiae sunt temporibus animi consequatur explicabo? Repellendus placeat quo, impedit consequuntur laborum sunt itaque expedita blanditiis voluptatum aperiam cumque voluptates alias sequi corrupti fugiat dolorum a eveniet voluptatem nemo suscipit esse quisquam sapiente debitis architecto! Delectus alias molestias exercitationem animi, consectetur aut autem deserunt ex cumque quae dicta! Magni, culpa minima debitis quos ex beatae laboriosam officia nemo reiciendis ad maiores vitae iusto doloremque temporibus, laudantium autem, ratione consequuntur quisquam a itaque eum consequatur ipsa ab? Magni ratione quaerat laborum iste iure optio? Necessitatibus ut excepturi impedit. Modi.</p>
                    </td>
                </tr>
            </table>
            <table border="0" width="100%">
                <tr>
                    <td width="70%"></td>
                    <td align="center">Hormat Kami <br> <br> <br> 
                        <u>
                            Tajun
                        </u><br>
                        1857301053
                    
                    </td>
                    
                </tr>
            </table>
        </div>
        
    </center>
    
</body>
</html>