<form action="{{ route('libur_nasional.proses') }}" method="POST">
    @csrf
    <div class="row">
        <!-- Tanggal Input -->
        <div class="col-md-9 mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="hidden" class="form-control" id="key_old" name="key_old" value="{{ $key_old }}">
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>

        <!-- Keterangan Input -->
        <div class="col-md-9 mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" required oninput="generateSlug()">
        </div>

        <!-- Keterangan Slug Input -->
        <div class="col-md-9 mb-3">
            <label for="keterangan_slug" class="form-label">Keterangan Slug</label>
            <input type="text" class="form-control" id="keterangan_slug" name="keterangan_slug" required readonly>
        </div>

        <!-- Submit Button -->
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>

<script>
    function generateSlug() {
        var keterangan = document.getElementById('keterangan').value; // Get value from 'keterangan' input
        var slug = keterangan
            .toLowerCase() // Convert to lowercase
            .replace(/[^a-z0-9\s]/g, '') // Remove non-alphanumeric characters (except spaces)
            .replace(/\s+/g, '-') // Replace spaces with hyphens
            .replace(/^-+|-+$/g, ''); // Remove hyphens from the start and end

        document.getElementById('keterangan_slug').value = slug; // Set the slug to the 'keterangan_slug' input
    }
</script>