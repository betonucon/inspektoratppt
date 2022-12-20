<input type="hidden" name="id" value="{{ $data->id }}">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">PKPT</label>
                        <select class="form-control"  name="id_pkpt"  id="id_pkpt" onchange="jenisPengawsan()">
                            <option value=""> --Pilih-- </option>
                            @foreach ($pkpt as $o)
                            <option value="{{ $o->id }}" {{ $o->id == $data->id_pkpt ? 'selected' : '' }}>PKPT {{ $o->id }} </option>
                        @endforeach
                        </select>
                    </div>
                    @if ($data->id == null)
                    <div class="mb-3">
                        <label class="form-label">Jenis Pengawasan</label>
                        <input class="form-control" type="text" id="jenis_pengawasan" disabled>
                    </div>
                    <input class="form-control" type="file" name="file" id="file" required>
                    @endif
            </div>
        </div>
    </div>
</div>


<script>
    function jenisPengawsan(){
        var id = $('#id_pkpt').val();
        $.ajax({
            url: "{{ url('perencanaan/program-kerja-pengawasan/get-jenis-pengawasan')}}",
            type: "GET",
            data: {id:id},
            success: function(data){
                $('#jenis_pengawasan').val(data['data']);
            }
        });
    }
</script>

