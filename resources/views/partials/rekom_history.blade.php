<div class="row mt-5">
        <h5>Tabel History Pembuatan Surat Rekomendasi</h5>
        <hr>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Id</th>
                <th>Alamat Rekomendasi</th>
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
                            <a href="" class="badge bg-warning"><span data-feather="edit"></span> </a>
                            {{-- <a href="/karyawan/hapusrekomendasi/{{ $s->id }}">Hapus | </a> --}}
                            <form action="{{ route ('karyawan.hapusrekomendasi',$s->id) }} " method="post" class="d-inline ">
                              @method("delete")
                              @csrf
                              <button class="badge bg-danger" onclick="return confirm('apakah anda yakin ingin menghapus?')"><span data-feather="trash-2"></span></button>
                            </form>

                            <a href="/karyawan/printrekomendasi/{{ $s->id }}"class="badge bg-primary "><span data-feather="printer"></span></a>
                            {{-- <a href="/lihatsurat/surat/{{ $s->id }}">lihat</a> --}}
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