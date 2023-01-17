<style>
    table.table-bordered td {
        border-bottom-width: 1px;
        padding: 3px 10px;
    }
</style>
<div class="table-responsive">
    <table class="table table-bordered align-middle table-nowrap mb-0">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Area Pengawasan</th>
                
                <th scope="col">Jenis Pengawasan</th>
                <th scope="col">OPD</th>
                <th scope="col">RPM</th>
                <th scope="col">RPL</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no=>$o)
            <tr>
                <td class="fw-medium">{{$no+1}}</td>
                <td>{{$o->area_pengawasan}}</td>
                <td>{{$o->jenis_pengawasan}}</td>
                <td>{{$o->opd}}</td>
                <td>{{$o->rpm}}</td>
                <td>{{$o->rpl}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>