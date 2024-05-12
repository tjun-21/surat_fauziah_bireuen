<div class="row">
    <div class="row mt-3" >
       
      </div>
      <div class="container">
        <div class="row">
            <div class="col-auto">
              <h5>Tabel History Pengambilan Cuti </h5>
            </div>
            <div class="col text-end">
     
              <button type="button" class="btn btn-warning col-lg-3" data-bs-toggle="modal" data-bs-target="#modalcuti" data-bs-whatever="@mdo">Edit Cuti Tahunan</button>
     

            </div>
        </div>
    </div>
      <div class="container">
        <div class="">
        
            <div class="col-auto">
            
            </div>
        </div>
    </div>
  
  @foreach ($pegawai as $data)
      

<div class="modal fade" id="modalcuti" tabindex="-1" aria-labelledby="modalcutiLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalcutiLabel">DATA JUMLAH CUTI</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('cutisetting.update',$pegawai->id) }}" method="post">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Jumlah Cuti Tahun Ini</label>
            <input type="text" class="form-control" id="kuota_cuti_tahunan" value="{{ $pegawai->CutiSetting->cuti_diambil }}">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Jumlah Cuti 1 tahun Sebelumnya </label>
            <input type="text" class="form-control" id="cutiN_1" value="{{ $pegawai->CutiSetting->cutiN_1 }}">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Jumlah Cuti 2 tahun Sebelumnya</label>
            <input type="text" class="form-control" id="cutiN_2" value="{{ $pegawai->CutiSetting->cutiN_2 }}">
          </div>
        </form>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary">Ubah</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
       
      </div>
    </div>
  </div>
  </div>
</div>
@endforeach 
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
                            {{-- buat kondisi untuk mendeteksi pegawai  --}}
                            @if( $pegawai->kategori->nama == 'PNS')
                            <a href="/karyawan/print/{{ $s->id }}" >Print</a>
                            @else
                            <a href="/karyawan/printkontrak/{{ $s->id }}" >Print</a>
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
</div>

{{-- <script>
  // Melewatkan data ke dalam modal saat modal ditampilkan
  $('modalcuti').on('cutisetting.bs.modal', function (event) {
    var modal = $(this);
    var cutiData = @json($data); 
    modal.find('.modal-body #kuota_cuti_tahunan').text('{{ $data->kuota_cuti_tahunan }}');
    modal.find('.modal-body #cutiN_1').text('{{ $data->cutiN_1 }}');
    modal.find('.modal-body #cutiN_2').text('{{ $data->cutiN_2 }}');
    // Anda dapat menambahkan lebih banyak data di sini sesuai kebutuhan
  });
</script> --}}
