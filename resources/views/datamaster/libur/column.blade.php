<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Tanggal</th>
      <th>Keterangan</th>
      <th>Keterangan Slug</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    ?>
    @foreach($data_libur as $data)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $data->tanggal }}</td>
      <td>{{ $data->keterangan }}</td>
      <td>{{ $data->keterangan_slug }}</td>
      <td>
        <!-- Tombol Edit -->
        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $data->id }}">Edit</button>

        <!-- Tombol Delete -->
        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $data->id }}">
          Delete
        </button>
      </td>
    </tr>
    <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Hari Libur Nasional</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('libur_nasional.proses') }}" method="POST">
            @csrf
            <div class="modal-body">
              <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="hidden" class="form-control" id="key_old" name="key_old" value="{{ $data->id }}">
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $data->tanggal }}" required>
              </div>

              <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $data->keterangan }}" required oninput="generateSlug()">
              </div>

              <div class="mb-3">
                <label for="keterangan_slug" class="form-label">Keterangan Slug</label>
                <input type="text" class="form-control" id="keterangan_slug" name="keterangan_slug" value="{{ $data->keterangan_slug }}" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal Konfirmasi Delete -->
    <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda yakin ingin menghapus data libur nasional pada tanggal <strong>{{ $data->keterangan }}</strong>?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <!-- Form penghapusan data -->
            <form id="deleteForm{{ $data->id }}" action="{{ route('libur_nasional.delete', $data->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    @endforeach
  </tbody>
</table>