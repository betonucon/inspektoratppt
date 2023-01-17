@extends('layouts.app')

@section('content')
    <div class="page-content small">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ $menu }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">{{ $headermenu }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ $menu }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <form id="formPkpt">
                @csrf
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-header">
                                <h5>Jadwal</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Area Pengawasan</label>
                                            <input type="text" name="area_pengawasan" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Pengawasan</label>
                                            <select class="form-control"  name="jenis_pengawasan"  id="jenis_pengawasan">
                                                <option value=""> --Pilih-- </option>
                                                @foreach ($jenisPengawasan as $jp)
                                                    <option value="{{ $jp->jenis }}"> {{ $jp->jenis }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">OPD</label>
                                            <select class="form-control"  name="opd"  id="opd">
                                                <option value=""> --Pilih-- </option>
                                                @foreach ($opd as $o)
                                                    <option value="{{ $o->nama }}"> {{ $o->nama }} </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">RMP</label>
                                            <select class="form-control"  name="rmp"  id="rmp">
                                                <option value=""> --Pilih-- </option>
                                                @foreach ($rmp as $b)
                                                    <option value="{{ $b->bulan }}"> {{ $b->bulan }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">RPL</label>
                                            <select class="form-control"  name="rpl"  id="rpl">
                                                <option value=""> --Pilih-- </option>
                                                @foreach ($rmp as $b)
                                                    <option value="{{ $b->bulan }}"> {{ $b->bulan }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Sarana & Prasarana</label>
                                            <input type="text" name="sarana_prasarana" id="sarana_prasarana" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Tingkat Resiko</label>
                                            <select class="form-control"  name="tingkat_resiko"  id="tingkat_resiko">
                                                <option value=""> --Pilih-- </option>
                                                @foreach ($tingkatResiko as $ts)
                                                    <option value="{{ $ts->name }}"> {{ $ts->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label class="form-label">Keterangan</label>
                                            <input type="text" name="keterangan" id="keterangan" class="form-control" required>
                                        </div>
                                    </div>

                                        <div class="mb-3">
                                            <label class="form-label">Tujuan atau Sasaran</label>
                                            <textarea class="form-control" name="tujuan" id="tujuan" cols="5" rows="5" required></textarea>
                                        </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                               <h5>Kebutuhan HP</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Koorwas</label>
                                            <input type="number" name="koorwas" id="koorwas" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">PT</label>
                                            <input type="number" name="pt" id="pt" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">KT</label>
                                            <input type="number" name="kt" id="kt" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">AT</label>
                                            <input type="number" name="at" id="at" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Jumlah</label>
                                            <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Jumlah Laporan</label>
                                            <input type="number" name="jumlah_laporan" id="jumlah_laporan" class="form-control" required>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="text-end mb-3">
                            <a href="{{url('perencanaan/pkpt')}}" class="btn btn-default waves-effect waves-light">Kembali</a>
                            <button id="btn-save" class="btn btn-secondary waves-effect waves-light">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>

@endsection

@push('ajax')
<script>

$('#btn-save').on('click', () => {
        var form=document.getElementById('formPkpt');
            $.ajax({
                type: 'POST',
                url: "{{url('perencanaan/non-pkpt/store')}}",
                data: new FormData(form),
                contentType: false,
                cache: false,
                processData:false,
                dataType: 'json',
                beforeSend: function () {
                    $('#btn-save').attr('disabled', 'disabled');
                    $('#btn-save').html('Sending..');
                },
                error: function (msg) {
                        var data = msg.responseJSON;
                        $.each(data.errors, function (key, value) {
                            Swal.fire({
                                title: 'Gagal',
                                text: value,
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                $('#btn-save').removeAttr('disabled','false');
                                $('#btn-save').html('Simpan');
                            }
                        })
                        });
                },
                success:  function (msg) {
                    if (msg.status == 'success') {
                        Swal.fire({
                            title: 'Berhasil',
                            text: msg.message,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{url('perencanaan/pkpt')}}";
                            }
                        })
                    }
                }
            });
    });

</script>
@endpush
