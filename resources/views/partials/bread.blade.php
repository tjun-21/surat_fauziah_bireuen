<div class="bread-crumbs mb-4">
    <ul>
        <li><a href="/karyawan/{{ $pegawai->kategori->slug }}/{{ $pegawai->id }}">Data User</a></li>
        <?php
        if ($pegawai->hak_cuti == "1") { ?>
            <li><a href="/karyawan/{{ $pegawai->kategori->slug }}/setting_cuti/{{ $pegawai->id }}">Setting Cuti</a></li>
        <?php }
        ?>
        <li><a href="/surat/{{ $pegawai->kategori->slug }}/{{ $pegawai->id }}">Form Cuti</a></li>
        <li><a href="/formrekom/{{ $pegawai->kategori->slug }}/{{ $pegawai->id }}">Form Rekomendasi</a></li>
        {{-- <li><a href="">Surat Pernyataan</a></li> --}}
        {{-- <li><a href=""><i class="fa fa-user"></i></a></li>
            <li><a href=""><i class="fa fa-home"></i></a></li> --}}
    </ul>
</div>