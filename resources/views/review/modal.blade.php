<div class="card">
        <div class="card-body">
            <div class="row">

                <div class="mb-3">
                    <label class="form-label">Nomor PKPT</label>
                    <input type="text" name="id_pkpt" class="form-control" value="{{$pkpt}}">
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Uraian Temuan</label>
                        <input type="text" name="uraian_temuan" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Uraian Penyebab</label>
                        <input type="text" name="uraian_penyebab" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Uraian Rekomendasi</label>
                        <input type="text" name="uraian_rekomendasi" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Uraian Tindak Lanjut</label>
                        <input type="text" name="uraian_tindak_lanjut" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nilai Rekomendasi</label>
                        <input type="text" name="nilai_rekomendasi" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nilai Tindak Lanjut</label>
                        <input type="text" name="nilai_tindak_lanjut" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status Nilai</label>
                        <input type="number" name="status_nilai" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="">Pilih Status</option>
                            @foreach ($status as $el)
                                <option value="{{ $el->kode }}">{{ $el->status }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<script>

</script>


