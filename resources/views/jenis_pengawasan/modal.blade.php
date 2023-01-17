<input type="hidden" name="id" value="{{ $id }}">

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="jenis" class="form-label">Jenis</label>
            <input type="text" name="jenis" class="form-control" id="jenis" value="{{$data->jenis}}" placeholder="Silakan Di isi">
        </div>
    </div>
</div>
<script>
$('#nm_jabatan').keypress(function (e) {
    var txt = String.fromCharCode(e.which);
    if (!txt.match(/[A-Za-z0-9&. ]/)) {
        return false;
    }
});
</script>