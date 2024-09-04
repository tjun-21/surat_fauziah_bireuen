    document.getElementById('myForm').addEventListener('submit', function(event) {
      // Ambil nilai dari input tgl_akhir
      const tglAwal = new Date(document.getElementById('tgl_awal').value);
      const tglAkhir = new Date(document.getElementById('tgl_akhir').value);
      // Ambil tanggal hari ini tanpa waktu (hanya tanggal)
      const today = new Date();
      today.setHours(0, 0, 0, 0);

      // Cek apakah tgl_akhir lebih kecil dari hari ini
      if (tglAkhir < today) {
        alert('Tanggal Akhir harus sama dengan atau lebih besar dari hari ini.');
        event.preventDefault(); // Batalkan submit form
      }
    });
