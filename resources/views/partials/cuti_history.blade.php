<div class="row">
    <div class="row mt-5">
        <h5>Tabel History Pengambilan Cuti</h5>
        <hr>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Jenis Surat</th>
                <th>Lamanya Cuti</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Berakhir</th>
                <th width="20%">Alasan</th>
                <th>Aksi</th>
                {{-- <th>Surat Cuti</th> --}}
              </tr>
            </thead>
            <tbody>
              @if ($cuti->count())
                  <?php 
                    $no = 1
                    ?>
                  @foreach ($cuti as $s)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $s->jcuti->nama  }}</td>
                        <?php 
                                $akhir = strtotime($s->tgl_akhir);
                                $awal = strtotime($s->tgl_mulai);
                                $jarak = $akhir-$awal;
                                $selisih = ($jarak / 60 / 60 / 24)+1;
                            ?>
                        <td>{{ $selisih }}</td>
                        <td>{{ $s->tgl_mulai }}</td>
                        <td>{{ $s->tgl_akhir }}</td>
                        <td>
                          {{ $s->alasan }}
                        </td>
                        <td>
                            <a href="{{ route ('cuti.update',$pegawai->id )}}/edit" class="badge bg-warning"><span data-feather="edit"></span> </a>
                
                            <form action="{{ route ('cuti.destroy',$pegawai->id) }} " method="post" class="d-inline ">
                          
                              @method("delete")
                              @csrf
                              <button class="badge bg-danger" onclick="return confirm('apakah anda yakin ingin menghapus?')"><span data-feather="x-circle"></span></button>
                            </form>
                            <a href="/karyawan/print/{{ $s->id }}" >Print</a>
                        </td>
                    </tr>
                  @endforeach
              @else
                <tr>
                  <td colspan="6" class="text-center m-3 text-primary"><i>Belum Ada Data Cuti</i></td>
                </tr>
              @endif
             
            
            </tbody>
            
          </table>
    </div>
    <div class="row mt-5">
        <h5>Tabel History Pembuatan Surat Lainnya</h5>
        <hr>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Jenis Surat</th>
                <th>Tanggal Pembuatan</th>
                <th>Aksi</th>
                {{-- <th>Surat Cuti</th> --}}
              </tr>
            </thead>
            <tbody>
              @if ($surat->count())
                  <?php 
                    $no = 1
                    ?>
                  @foreach ($surat as $s)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $s->jsurat->nama  }}</td>
                        <td>{{ $s->tgl }}</td>
                        
                        <td>
                            <a href="">Edit | </a><a href="">Hapus | </a><a href="/karyawan/print/{{ $s->id }}">Print</a>
                        </td>
                    </tr>
                  @endforeach
              @else
                <tr>
                  <td colspan="6" class="text-center m-3 text-primary"><i>Belum Ada Data Surat </i></td>
                </tr>
              @endif
            
            
            </tbody>
            
          </table>
      </div>
</div>