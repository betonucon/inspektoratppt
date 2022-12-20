<input type="hidden" name="id" id="id" value="{{$id}}">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body small">
                <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table width="100%" style="margin-top:2%;overflow-x:scroll;" class="text-small table table-bordered table-responsive dt-responsive nowrap table-striped align-middle no-footer dtr-inline collapsed">
                                <thead>
                                    @php
                                        $no=1;
                                    @endphp
                                    <tr>
                                        <th width="1%">No</th>
                                        <th>Jenis</th>
                                        <th width="30%">Area Pengawasan</th>
                                        <th width="30%">Jenis Pengawasan</th>
                                        <th >OPD</th>
                                        <th >RMP</th>
                                        <th >RPL</th>
                                        <th >Sarana & Prasarana</th>
                                        <th >Tingkat Resiko</th>
                                        <th >Keterangan</th>
                                        <th >Tujuan</th>
                                        <th >Koorwas</th>
                                        <th >PT</th>
                                        <th >KT</th>
                                        <th >AT</th>
                                        <th >Jumlah</th>
                                        <th >Jumlah Laporan</th>
                                        <th >Tahun</th>
                                        <th >Kategori</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($data as $d) --}}
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->jenis }}</td>
                                            <td width="30%">{{ $data->area_pengawasan }}</td>
                                            <td width="30%">{{ $data->jenis_pengawasan }}</td>
                                            <td>{{ $data->opd }}</td>
                                            <td>{{ $data->rmp }}</td>
                                            <td>{{ $data->rpl }}</td>
                                            <td>{{ $data->sarana_prasarana }}</td>
                                            <td>{{ $data->tingkat_resiko }}</td>
                                            <td>{{ $data->keterangan }}</td>
                                            <td>{{ $data->tujuan }}</td>
                                            <td>{{ $data->koorwas }}</td>
                                            <td>{{ $data->pt }}</td>
                                            <td>{{ $data->kt }}</td>
                                            <td>{{ $data->at }}</td>
                                            <td>{{ $data->jumlah }}</td>
                                            <td>{{ $data->jumlah_laporan }}</td>
                                            <td>{{ $data->tahun }}</td>
                                            <td>{{ $data->kategori }}</td>
                                        </tr>                                       
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

