<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="id" id="id" onchange="cariKategori(this.value)" class="form-control">
                    <option value="0">New</option>
                    <option value="1">Edit</option>
                    </select>
                </div>
                <div class="mb-3" id="tampilEdit">
                    <label class="form-label">Jenis</label>
                    <select name="nomor_pkpt" id="nomor_pkpt" class="form-control">
                    <option value="">--Pilih--</option>
                    @foreach ($data as $item)
                    <option value="{{ $item->nomor_pkpt }}">{{ $item->nomor_pkpt }}</option>
                    @endforeach
                    </select>
                </div>
                <p class="text-muted">Upload hanya bisa untuk file berformat excell.</p>
                <input name="file" class="form-control" type="file" multiple="multiple">
                <!-- end dropzon-preview -->
            </div>
            <!-- end card body -->
        </div>
    </div>
</div>

<script>
       $('#tampilEdit').hide();
    function cariKategori(id) {
        if (id == 1) {
            $('#tampilEdit').show();
        } else {
            $('#tampilEdit').hide();
        }
    }
</script>


