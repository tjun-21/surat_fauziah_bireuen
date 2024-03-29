<div class="row mt-5">
        <h5>Tabel History Pembuatan Surat Rekomendasi</h5>
        <hr>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Jenis Surat</th>
                <th>id</th>
                <th>Tanggal Pembuatan</th>
                <th>Aksi</th>
                {{-- <th>Surat Cuti</th> --}}
              </tr>
            </thead>
            <tbody>
              @if ($rekom->count())
                  <?php 
                    $no = 1
                    ?>
                  @foreach ($rekom as $s)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $s->id  }}</td>

                        <td>{{ $s->alamatrekom  }}</td>
                        <td>{{ $s->created_at }}</td>
                        
                        <td>
                            <a href="">Edit | </a><a href="">Hapus | </a>
                            <a href="/karyawan/printrekomendasi/{{ $s->id }}">Print</a>
                            <a href="/lihatsurat/surat/{{ $s->id }}">lihat</a>
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