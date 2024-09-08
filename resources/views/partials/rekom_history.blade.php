<div class="row mt-5">
        <h5>Tabel History Pembuatan Surat Rekomendasi</h5>
        <hr>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
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
                       

                        <td>{{ $s->alamatrekom  }}</td>
                        <td>{{ $s->created_at }}</td>
                        
                        <td>
                           <!-- Tombol untuk membuka modal edit  -->
                            <button type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"><span data-feather="edit"></span>
                        
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Alamat Praktek</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form id="form-rekomendasi" method="POST" action="{{ route('rekom.update',$s->id)}}">
                                      @csrf 
                                      @method('PUT')
                                    <div class="mb-3">
                                      <label for="alamat_cuti" class="form-label">Alamat Tempat Melakukan Praktek</label>
                                      <input type="text" name="alamat_cuti" class="form-control" value="{{ old('alamat', $s->alamatrekom)}}">
                                    </div>
                                  </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" form="form-rekomendasi" class="btn btn-primary">Simpan Perubahan</button>
                                  </div>
                                </div>
                              </div>
                            </div>


                           
                            {{-- <a href="/karyawan/hapusrekomendasi/{{ $s->id }}">Hapus | </a> --}}
                            
                            <form action="{{ route ('rekom.destroy',$s->id) }} " method="post" class="d-inline ">
                
                              @method("delete")
                              @csrf
                              <button class="badge bg-danger" onclick="return confirm('apakah anda yakin ingin menghapus?')"><span data-feather="x-circle"></span></button>
                            </form>

                            <a href="/karyawan/printrekomendasi/{{ $s->id }}"class="badge bg-primary "><span data-feather="printer"></span></a>
                            
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