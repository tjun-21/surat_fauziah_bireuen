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
          $jarak = $akhir - $awal;
          $selisih = ($jarak / 60 / 60 / 24) + 1;
          ?>
          <td>{{ $selisih }}</td>
          <td>{{ $s->tgl_mulai }}</td>
          <td>{{ $s->tgl_akhir }}</td>
          <td>
            {{ $s->alasan }}
          </td>
          <td>
            <a href="{{ route ('cuti.update',$pegawai->id )}}/edit" class="badge bg-warning"><span data-feather="edit"></span> </a>
            <button class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $s->id }}">
              <span data-feather="x-circle"></span>
            </button>

            <!-- Modal Bootstrap -->
            <div class="modal fade" id="deleteModal{{ $s->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $s->id }}" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $s->id }}">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus? Harap masukkan alasan penghapusan:</p>
                    <form id="deleteForm{{ $s->id }}" action="{{ route('cuti.destroy', $s->id) }}" method="post">
                      @method('DELETE')
                      @csrf
                      <div class="mb-3">
                        <label for="reason{{ $s->id }}" class="form-label">Alasan Penghapusan</label>
                        <input type="text" class="form-control" id="reason{{ $s->id }}" name="reason" required>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" onclick="submitDeleteForm({{ $s->id }})">Hapus</button>
                  </div>
                </div>
              </div>
            </div>
            {{-- buat kondisi untuk mendeteksi pegawai  --}}
            @if( $pegawai->kategori->nama == 'PNS')
            <a href="/karyawan/print/{{ $s->id }}">Print</a>
            @else
            <a href="/karyawan/printkontrak/{{ $s->id }}">Print</a>
            @endif
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
  {{-- <div class="row mt-5">
        <h5>Tabel History Pembuatan Surat Lainnya</h5>
        <hr>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Jenis Surat</th>
                <th>Tanggal Pembuatan</th>
                <th>Aksi</th>
                <th>Surat Cuti</th>
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
</div> --}}

<script>
  function submitDeleteForm(id) {
    const reason = document.getElementById('reason' + id).value;

    if (reason) {
      // Submit form jika alasan tidak kosong
      document.getElementById('deleteForm' + id).submit();
    } else {
      alert('Harap masukkan alasan penghapusan.');
    }
  }
</script>
</div>